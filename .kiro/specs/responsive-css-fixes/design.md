# Responsive CSS Fixes Bugfix Design

## Overview

Casa Asraya mengalami serangkaian masalah responsive CSS di mana elemen-elemen pada berbagai halaman menjadi cramped (terlalu sempit/mepet) dan layout berantakan pada viewport mobile dan tablet. Masalah ini meliputi: spacing dan padding yang tidak proporsional pada hero sections, bento grid yang tidak collapse dengan benar, chapter overlay yang cramped, card spacing yang tidak optimal, form KPR yang tidak responsif, serta inconsistency padding pada navigation bar.

Strategi perbaikan berfokus pada pendekatan minimal dan terarah: memperbaiki nilai-nilai `clamp()` yang tidak optimal, menambahkan media queries yang hilang untuk breakpoint mobile/tablet, dan memastikan grid layouts collapse menjadi single-column di mobile — tanpa mengubah tampilan desktop atau fungsionalitas JavaScript yang sudah berjalan.

## Glossary

- **Bug_Condition (C)**: Kondisi yang memicu bug — ketika sebuah elemen diakses pada viewport di mana CSS rules yang ada tidak memberikan spacing/layout yang adequate, sehingga menghasilkan tampilan cramped atau broken
- **Property (P)**: Perilaku yang diharapkan ketika bug condition terpenuhi — elemen harus menampilkan spacing, padding, dan layout yang proporsional dan readable sesuai dengan ukuran viewport
- **Preservation**: Behavior yang sudah benar pada desktop (>1200px) dan fungsionalitas JavaScript yang harus tetap tidak berubah oleh perbaikan
- **isBugCondition(viewport, element)**: Fungsi yang mengidentifikasi apakah kombinasi viewport + elemen sedang mengalami tampilan cramped
- **clamp()**: Fungsi CSS untuk responsive sizing — `clamp(min, preferred, max)`, digunakan secara ekstensif di codebase ini
- **bento grid**: Layout grid pada section "Tentang Kami" di `index.blade.php` menggunakan class `.ab-bento-grid` dengan `grid-template-columns: 200px 1fr 1fr`
- **hero scroll section**: Komponen scroll-scrub berbasis canvas di `index.blade.php` yang menggunakan `hero.css` dan menampilkan chapter overlays
- **chapter overlay**: Elemen `.hero-chapter` berisi `.chapter-overline`, `.chapter-headline`, `.chapter-cta` yang muncul di atas hero canvas
- **unit-strip**: Layout expand-on-hover untuk featured units di `index.blade.php` menggunakan flex dengan `height: 560px`
- **viewport mobile**: Lebar layar `< 768px`
- **viewport tablet**: Lebar layar `768px - 991px`
- **viewport desktop**: Lebar layar `> 1200px`

## Bug Details

### Bug Condition

Bug termanifestasi ketika halaman diakses pada viewport mobile atau tablet, dan satu atau lebih kondisi berikut terjadi: nilai `clamp()` minimum terlalu kecil sehingga padding menjadi cramped, grid layout tidak memiliki breakpoint yang tepat untuk collapse ke single column, atau elemen menggunakan fixed dimensions yang tidak scale down dengan benar.

**Formal Specification:**
```
FUNCTION isBugCondition(viewport, element)
  INPUT: viewport (lebar layar dalam px), element (CSS selector atau deskripsi elemen)
  OUTPUT: boolean

  IF viewport < 768
    IF element IN [hero-sections, chapter-overlays, facility-icons, bento-grid, video-container]
      RETURN true
    END IF
    IF element IN [kpr-form, navigation-bar, featured-unit-cards]
      RETURN true
    END IF
  END IF

  IF viewport >= 768 AND viewport <= 991
    IF element IN [bento-grid, unit-cards-featured-house]
      RETURN true
    END IF
  END IF

  IF clampMinValue(element) < MINIMUM_ADEQUATE_SPACING(element)
    RETURN true
  END IF

  RETURN false
END FUNCTION

FUNCTION MINIMUM_ADEQUATE_SPACING(element)
  IF element == "hero-horizontal-padding"  RETURN 16  (px)
  IF element == "hero-top-padding"         RETURN 60  (px)
  IF element == "chapter-overlay-padding"  RETURN 24  (px)
  IF element == "container-padding"        RETURN 16  (px)
  DEFAULT                                  RETURN 16  (px)
END FUNCTION
```

### Contoh Manifestasi Bug

1. **Hero Section — `index.blade.php` (viewport: 375px)**
   - **Aktual**: `padding: 140px clamp(16px,4vw,48px) 64px` → pada 375px, `4vw = 15px` → padding horizontal hanya 15px (di bawah minimum 16px) dan top padding 140px terlalu besar untuk mobile
   - **Diharapkan**: Horizontal padding ≥ 16px, top padding ≈ 80px untuk mobile

2. **Bento Grid "Tentang Kami" — `index.blade.php` (viewport: 480px)**
   - **Aktual**: `.ab-bento-grid` collapse ke `grid-template-columns: 1fr` pada `max-width: 639px`, tetapi breakpoint 639px menyebabkan gap coverage di antara 640–767px dimana grid masih menggunakan 2 kolom yang cramped
   - **Diharapkan**: Grid collapse ke single column dengan proper spacing di semua mobile viewports

3. **Chapter CTA Buttons — `hero.css` (viewport: 375px)**
   - **Aktual**: `.chapter-cta` memiliki `flex-direction: column` dan `.btn-explore, .btn-book` mendapat `width: 220px` di mobile — tapi container `.hero-chapter` mendapat `padding: 0 24px` yang oke, namun pada viewport sangat kecil (< 360px) tombol bisa overflow
   - **Diharapkan**: Tombol menggunakan `width: 100%; max-width: 280px` agar tidak overflow

4. **Unit Cards Tablet — `featured-house.blade.php` (viewport: 768–991px)**
   - **Aktual**: Menggunakan Bootstrap `col-md-6` dengan `g-4` (gap 24px), tetapi `.unit-info` memiliki `padding: 32px` fixed yang menyebabkan konten cramped pada kartu di tablet
   - **Diharapkan**: Padding pada `.unit-info` menggunakan `clamp(20px, 3vw, 32px)` untuk scaling yang lebih baik

5. **Form KPR — `perhitungan_kpr.blade.php` (viewport: 375px)**
   - **Aktual**: Form dan result panel menggunakan `col-lg-6` sehingga pada mobile keduanya full-width dan stack secara vertikal — ini sudah benar, tetapi spacing antar elemen form menggunakan `gap: 24px` fixed yang menjadi terlalu rapat saat padding container mengecil
   - **Diharapkan**: Form stacks vertically dengan proper spacing (gap minimum 20px, touch target padding ≥ 44px pada inputs)

6. **Facility Icons — `index.blade.php` (viewport: 375px)**
   - **Aktual**: `.facility-icon` memiliki `width: 70px; height: 70px; font-size: 26px` fixed tanpa media query — pada mobile viewport yang sempit, beberapa icon bisa cramped jika dalam grid/flex container
   - **Diharapkan**: Icon size scale down ke `clamp(50px, 12vw, 70px)` pada mobile

## Expected Behavior

### Preservation Requirements

**Unchanged Behaviors:**
- Layout, spacing, dan typography pada viewport desktop (>1200px) harus tetap identik
- Hero scroll animation berbasis canvas di `index.blade.php` harus tetap berfungsi — `scroll-stage`, `sticky-wrap`, frame-scrubbing JavaScript tidak boleh dimodifikasi
- Hover effects pada `.unit-card`, `.ab-arrow-hover`, `.btn-explore`, `.btn-book`, dan semua interactive elements harus tetap berfungsi
- Color scheme brand (#D4622A, #1a3a2e, #f5f1ea) dan typography fonts (Outfit, IBM Plex) harus tetap konsisten
- Navigation dropdown menus desktop dan mobile hamburger menu (termasuk JavaScript `openMobileMenu`, `closeMobileMenu`, `toggleSub`) harus tetap berfungsi
- Chapter transitions dan visual effects (opacity, filter blur, transform) di hero section harus tetap display correctly
- Form validation dan JavaScript `calculateKPR()` di `perhitungan_kpr.blade.php` harus tetap berfungsi
- Breakpoint logic pada media queries yang sudah ada (`@media (max-width: 768px)`, `@media (min-width: 992px)`) harus tetap dihormati

**Scope:**
Semua input yang TIDAK melibatkan kondisi bug (yakni viewport mobile/tablet dengan elemen yang cramped) harus sama sekali tidak terpengaruh oleh perbaikan ini. Ini mencakup:
- Semua tampilan pada desktop (>1200px)
- JavaScript functionality (scroll scrubbing, KPR calculator, mobile menu)
- Hover states dan CSS transitions
- Brand colors dan font choices

**Catatan:** Expected behavior untuk kondisi bug (tampilan yang benar pada mobile/tablet) didefinisikan di bagian Correctness Properties di bawah.

## Hypothesized Root Cause

Berdasarkan analisis kode, penyebab utama yang paling mungkin adalah:

1. **Nilai clamp() minimum yang tidak adequate**: Di beberapa tempat, nilai minimum `clamp()` ditetapkan terlalu kecil. Contoh: `clamp(16px,4vw,48px)` pada viewport 360px menghasilkan `4vw = 14.4px` yang lebih kecil dari minimum 16px. Seharusnya menggunakan `max(16px, 4vw)` atau `clamp(20px, 5vw, 48px)` agar minimum terjaga.

2. **Missing atau incomplete breakpoints untuk bento grid**: `.ab-bento-grid` memiliki breakpoint di `639px` untuk single column, tetapi pada rentang `640–767px` grid menggunakan `1fr 1fr` (2 kolom) dengan kolom pertama (`ab-col-left`) di-set ke full width — ini menyebabkan layout yang cramped pada tablet kecil.

3. **Fixed dimensions tanpa responsive fallback**: Beberapa elemen menggunakan fixed pixel values tanpa media query:
   - `.unit-strip { height: 560px }` — tidak ada fallback untuk mobile
   - `.facility-icon { width: 70px; height: 70px }` — tidak scale down
   - `.unit-info { padding: 32px }` — tidak ada responsive variant

4. **Conflict antara hero.css dan inline styles di index.blade.php**: `hero.css` mendefinisikan responsive rules untuk `.hero-chapter` (padding, btn sizing), tetapi beberapa inline styles di blade file menggunakan nilai absolut yang bisa menimpa atau conflict dengan stylesheet rules di beberapa breakpoint.

5. **Top padding hero section terlalu besar untuk mobile**: Banyak hero section menggunakan `padding: 140px ... 80px` di bagian atas. Nilai 140px di-set untuk mengakomodasi navbar fixed, tetapi pada mobile navbar lebih kecil, sehingga 140px menjadi berlebihan dan membuang ruang layar yang terbatas.

## Correctness Properties

Property 1: Bug Condition - Responsive Spacing di Mobile/Tablet

_For any_ kombinasi viewport dan elemen di mana `isBugCondition(viewport, element)` mengembalikan `true` (yakni elemen diakses pada viewport mobile <768px atau tablet 768–991px dan mengalami cramped layout), fungsi CSS yang telah diperbaiki SHALL menghasilkan tampilan di mana:
- Horizontal padding pada hero sections ≥ 16px
- Top padding pada hero sections ≤ 100px (adequate tapi tidak berlebihan)
- Bento grid collapse ke single column pada viewport ≤ 639px tanpa overlap atau content yang terpotong
- Chapter overlay CTA buttons tidak overflow container pada viewport ≥ 320px
- Card spacing pada unit cards tablet menggunakan gap ≥ 20px dan padding menggunakan `clamp()` agar tidak cramped
- Form KPR inputs memiliki minimum touch target padding yang adequate (padding ≥ 12px vertical)
- Facility icons scale down proportionally pada mobile

**Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5, 2.6, 2.7, 2.8, 2.9, 2.10**

Property 2: Preservation - Desktop dan Fungsionalitas yang Sudah Benar

_For any_ viewport di mana `isBugCondition(viewport, element)` mengembalikan `false` (yakni desktop viewport >1200px, atau elemen yang tidak mengalami bug), CSS yang telah diperbaiki SHALL menghasilkan tampilan yang identik dengan kode asli, mempertahankan:
- Layout dan spacing desktop yang sudah correct
- Semua hover effects dan CSS transitions
- Hero scroll animation behavior
- Brand colors, typography, dan design system
- JavaScript functionality (KPR calculator, mobile menu, hero scrubbing)

**Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9, 3.10**

## Fix Implementation

### Changes Required

Asumsi root cause analysis benar, berikut adalah perubahan spesifik yang diperlukan:

---

**File**: `public/new/assets/css/hero.css`

**Perubahan yang Diperlukan**:

1. **Perbaiki chapter CTA button sizing pada mobile**: Ubah dari `width: 220px` menjadi `width: min(220px, calc(100vw - 48px))` agar tidak overflow pada viewport < 268px. Tambahkan juga `max-width: 100%` sebagai safety net.

2. **Tambahkan media query untuk very small screens (<360px)**: Kurangi padding chapter overlay dari `0 24px` menjadi `0 16px` agar readable di semua modern phones.

3. **Perbaiki `.site-nav` padding clamp pada mobile**: Nilai `clamp(20px, 4vw, 48px)` pada nav padding sudah baik, tetapi tidak perlu perubahan di sini karena nav menggunakan fixed `top: 16px` dengan island capsule yang sudah responsive.

---

**File**: `resources/views/index.blade.php`

**Perubahan yang Diperlukan**:

1. **Perbaiki top padding hero scroll section**: Hero section utama menggunakan `scroll-stage` dan tidak memiliki explicit padding — tidak ada perubahan diperlukan di sini.

2. **Perbaiki bento grid breakpoint gap (640–767px)**: Di dalam `<style>` tag di `index.blade.php`, perbaiki media query untuk `.ab-bento-grid`:
   - Tambahkan breakpoint `@media (max-width: 767px)` yang eksplisit untuk single-column collapse, menggantikan `639px` yang kurang tepat

3. **Perbaiki `.ab-bottom` grid-template-columns pada mobile**: Pada `max-width: 639px`, `.ab-bottom` harus menjadi single column (`grid-template-columns: 1fr`) agar video dan teks tidak cramped. Ini sudah didefinisikan sebagai `grid-template-columns: 1fr !important` di breakpoint 639px, tetapi perlu validasi apakah selector specificity-nya benar.

4. **Perbaiki `facility-icon` sizing pada mobile**: Tambahkan media query untuk `.facility-icon` agar `width` dan `height` menggunakan `clamp(50px, 12vw, 70px)` pada mobile.

5. **Perbaiki `.facility-wrapper` padding-top**: Nilai `padding-top: 15%` bisa menjadi terlalu besar atau terlalu kecil tergantung viewport — ubah ke `clamp(32px, 10vh, 80px)`.

---

**File**: `resources/views/featured-house.blade.php`

**Perubahan yang Diperlukan**:

1. **Perbaiki `.unit-info` padding**: Ubah dari `padding: 32px` fixed menjadi `padding: clamp(20px, 4vw, 32px)` agar lebih proporsional pada tablet.

2. **Perbaiki hero section top padding**: `padding: 140px clamp(16px,4vw,48px) 80px` — ubah top padding ke `clamp(80px, 18vw, 140px)` agar tidak terlalu besar pada mobile.

---

**File**: `resources/views/perhitungan_kpr.blade.php`

**Perubahan yang Diperlukan**:

1. **Pastikan form stack vertically dengan adequate spacing**: Form sudah menggunakan `col-lg-6` dan `row g-4` sehingga stacks di mobile — tidak ada perubahan struktural, tetapi tambahkan media query dalam `<style>` tag untuk memastikan:
   - `.kpr-input` memiliki `padding: 14px 16px` pada mobile (touch-friendly)
   - Form card padding menggunakan `clamp(20px, 4vw, 48px)` sudah tepat

2. **Perbaiki hero section top padding**: Sama seperti `featured-house.blade.php`, gunakan `clamp(80px, 18vw, 140px)` untuk top padding.

---

**File**: `resources/views/spool.blade.php` (dan halaman fasilitas serupa: `gym.blade.php`, `clubhouse.blade.php`, dll.)

**Perubahan yang Diperlukan**:

1. **Perbaiki hero top padding**: `padding: 140px clamp(16px,4vw,48px) 64px` → ubah ke `padding: clamp(80px,18vw,140px) clamp(16px,4vw,48px) clamp(40px,6vw,64px)` untuk scaling yang lebih baik.

## Testing Strategy

### Validation Approach

Strategi testing mengikuti pendekatan dua fase: pertama, surface counterexamples yang mendemonstrasikan bug pada kode yang BELUM diperbaiki untuk mengkonfirmasi atau menyangkal root cause analysis; kemudian verifikasi bahwa fix bekerja dengan benar dan preserves existing behavior.

### Exploratory Bug Condition Checking

**Goal**: Surface counterexamples yang mendemonstrasikan bug SEBELUM implementasi fix. Konfirmasi atau sangkal root cause analysis. Jika disangkal, perlu re-hypothesize.

**Test Plan**: Gunakan browser DevTools atau visual regression tool untuk mensimulasikan viewport mobile dan tablet pada setiap halaman yang teridentifikasi sebagai buggy. Screenshot dan catat semua elemen yang terlihat cramped atau broken.

**Test Cases**:
1. **Hero Section Mobile Test**: Akses `index.blade.php` pada viewport 375px — observasi apakah chapter overlay text terbaca dengan baik dan CTA buttons tidak overflow (diperkirakan gagal pada kode yang belum diperbaiki)
2. **Bento Grid Tablet Test**: Akses `index.blade.php` pada viewport 700px — observasi apakah bento grid menggunakan 2 kolom yang cramped atau sudah collapse ke single column (diperkirakan gagal pada kode yang belum diperbaiki)
3. **Unit Cards Tablet Test**: Akses `featured-house.blade.php` pada viewport 768px — observasi apakah `.unit-info padding: 32px` menyebabkan content cramped dalam kartu (diperkirakan gagal pada kode yang belum diperbaiki)
4. **KPR Form Mobile Test**: Akses `perhitungan_kpr.blade.php` pada viewport 375px — observasi apakah form inputs memiliki adequate touch target spacing (mungkin gagal pada kode yang belum diperbaiki)
5. **Facility Icons Mobile Test**: Akses section fasilitas di `index.blade.php` pada viewport 375px — observasi apakah icon size dan spacing adequate (diperkirakan gagal)

**Expected Counterexamples**:
- Chapter overlay CTA buttons overflow pada viewport < 300px
- Bento grid menggunakan layout cramped pada 640–767px karena breakpoint gap
- Hero top padding 140px membuang terlalu banyak ruang di mobile
- Facility icon wrapper menggunakan `padding-top: 15%` yang tidak optimal

### Fix Checking

**Goal**: Verifikasi bahwa untuk semua input di mana bug condition holds, CSS yang telah diperbaiki menghasilkan tampilan yang expected.

**Pseudocode:**
```
FOR ALL (viewport, element) WHERE isBugCondition(viewport, element) DO
  renderedLayout := renderPage_fixed(page, viewport)
  ASSERT spacing(element, renderedLayout) >= MINIMUM_ADEQUATE_SPACING(element)
  ASSERT noOverflow(element, renderedLayout)
  ASSERT noOverlap(element, renderedLayout)
  ASSERT isReadable(element, renderedLayout)
END FOR
```

### Preservation Checking

**Goal**: Verifikasi bahwa untuk semua input di mana bug condition TIDAK holds, CSS yang telah diperbaiki menghasilkan hasil yang identik dengan kode asli.

**Pseudocode:**
```
FOR ALL (viewport, element) WHERE NOT isBugCondition(viewport, element) DO
  ASSERT renderPage_original(page, viewport) == renderPage_fixed(page, viewport)
END FOR
```

**Testing Approach**: Property-based testing direkomendasikan untuk preservation checking karena:
- Menghasilkan banyak test case secara otomatis di seluruh domain viewport
- Menangkap edge cases yang mungkin tidak tertangkap oleh manual testing
- Memberikan jaminan kuat bahwa behavior tidak berubah untuk semua desktop viewports

**Test Plan**: Observasi tampilan desktop pada kode yang belum diperbaiki terlebih dahulu, kemudian tulis visual regression tests untuk memastikan tampilan desktop tetap identik setelah perbaikan.

**Test Cases**:
1. **Desktop Layout Preservation**: Verifikasi tampilan `index.blade.php` pada viewport 1440px identik sebelum dan sesudah fix
2. **Hover Effect Preservation**: Verifikasi semua hover states pada cards, buttons, dan nav items tetap berfungsi
3. **JavaScript Functionality Preservation**: Verifikasi `calculateKPR()`, mobile menu toggle, dan hero scroll scrubbing tetap berfungsi
4. **Breakpoint Logic Preservation**: Verifikasi media queries yang ada tidak conflict dengan yang baru ditambahkan

### Unit Tests

- Test individual CSS rule untuk memverifikasi nilai `clamp()` menghasilkan output yang benar pada viewport tertentu (contoh: `clamp(20px, 5vw, 48px)` pada 375px = max(20px, 18.75px) = 20px ✓)
- Test bahwa `.ab-bento-grid` pada viewport 639px menggunakan single column
- Test bahwa `.ab-bento-grid` pada viewport 700px menggunakan layout yang tidak overlap
- Test bahwa `.chapter-cta` buttons tidak overflow `.hero-chapter` container pada viewport 320px

### Property-Based Tests

- Untuk semua viewport dalam range [320, 767], verifikasi bahwa tidak ada elemen hero section yang memiliki horizontal overflow
- Untuk semua viewport dalam range [768, 991], verifikasi bahwa bento grid tidak memiliki elemen yang overlap
- Untuk semua viewport dalam range [1200, 2560], verifikasi bahwa layout identik dengan kode asli (preservation)
- Untuk semua viewport dalam range [320, 767], verifikasi bahwa semua form inputs memiliki computed padding ≥ 12px vertical

### Integration Tests

- Test full page render `index.blade.php` pada viewport 375px, 414px, 768px, 1024px, 1440px — tidak ada overflow horizontal, tidak ada cramped content
- Test full page render `featured-house.blade.php` pada viewport 375px dan 768px — card layout readable dan spacing adequate
- Test full page render `perhitungan_kpr.blade.php` pada viewport 375px — form input stacks vertically, button full-width, adequate touch targets
- Test hero chapter overlay di `index.blade.php` pada viewport 375px — scroll ke chapter-4 dan verifikasi CTA buttons tidak overflow dan readable
- Test navigation scroll behavior pada viewport 375px — hamburger menu toggle berfungsi, mobile overlay menu scrollable
