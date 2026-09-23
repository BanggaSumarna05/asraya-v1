# Requirements Document

## Introduction

Pembaruan visual styling website Casa Asraya (casaasrayaproperty.com) pada semua section **kecuali Hero section** (scroll-stage, sticky-wrap, canvas, hero.css, scroll-scrub-hero.js). Pembaruan mencakup pengenalan design tokens baru, pola tekstur SVG, divider hairline gold, icon containers, section Fasilitas dengan foto grid 2×2, section Testimonial berlatar foto forest, section Map & Lokasi dengan Google Maps JS API monokrom, Footer bertekstur, serta section baru "Our Architect". Seluruh perubahan dilakukan pada Blade templates Laravel, menggunakan Tailwind CSS v3 sebagai basis, dengan dukungan Bootstrap legacy. Target: mobile-first responsive, kontras WCAG AA minimum.

---

## Glossary

- **System**: Keseluruhan website Casa Asraya yang berjalan di atas Laravel + Blade templates.
- **Design Token File**: File CSS `public/new/assets/css/casa-tokens.css` yang mendefinisikan custom properties dan pola tekstur SVG global.
- **Eyebrow Label**: Teks kecil uppercase (≤ 12px, letter-spacing ≥ 0.3em) yang muncul di atas judul section sebagai label kategori.
- **Gold Hairline Divider**: Garis dekoratif tipis (1px) berwarna `--color-gold-hairline` (#C9A227) yang memisahkan elemen.
- **Icon Container**: Elemen lingkaran atau rounded-square yang membungkus ikon, dengan background cream atau forest-light dan ikon berwarna terracotta.
- **Section Fasilitas**: Section yang menampilkan 4 foto fasilitas utama (clubhouse, gym, spool, taman) dalam grid 2×2 dengan overlay gradien gelap dan judul font-display di pojok kiri bawah setiap foto.
- **Section Testimonial**: Section dengan background foto hutan/estate (`cover-clubhouse.jpg` atau `F11.jpg`), panel kaca blur untuk kutipan, dan bracket dekoratif hairline gold.
- **Section Map & Lokasi**: Section yang menampilkan Google Maps JS API dengan styling monokrom hijau tua dan pin oranye, dengan daftar kategori lokasi 2 kolom di sebelah kanan peta.
- **Section Our Architect**: Section baru yang menampilkan informasi firma arsitek Atelier Riri dengan header font-script, foto asimetris, dan deskripsi.
- **Footer Baru**: Footer berlatar `--color-forest-dark` bertekstur SVG, dengan inset frame hairline gold, logo center-aligned, dan blok teks About, Sitemap, Lokasi.
- **Blade Template**: File `.blade.php` di `resources/views/` yang dirender server-side oleh Laravel.
- **WCAG AA**: Standar aksesibilitas web Level AA — rasio kontras teks normal ≥ 4.5:1, teks besar ≥ 3:1.
- **Hero Section**: Blok `.scroll-stage` / `.sticky-wrap` / canvas / `hero.css` / `scroll-scrub-hero.js` — **tidak boleh disentuh sama sekali**.
- **Laravel Mix**: Build tool yang mengompilasi aset frontend (CSS/JS) via `npm run dev` / `npm run prod`.

---

## Requirements

### Requirement 1: Design Tokens & Tekstur SVG Global

**User Story:** As a developer, I want a single source-of-truth CSS file for design tokens and the tropical leaf SVG texture pattern, so that all sections use consistent brand colors, typography, and texture without duplicating styles.

#### Acceptance Criteria

1. THE System SHALL create the file `public/new/assets/css/casa-tokens.css` that defines the following CSS custom properties on `:root`:
   - `--color-forest-dark: #1B3B2E`
   - `--color-cream: #F4F1EA`
   - `--color-terracotta: #E0632A`
   - `--color-gold-hairline: #C9A227`
   - `--color-charcoal-text: #2B2B26`
   - `--font-display: 'Anton', 'Bebas Neue', sans-serif`
   - `--font-body: 'Inter', 'Poppins', sans-serif`
   - `--font-script: 'Caveat', 'Playfair Display Italic', cursive`

2. THE System SHALL define a reusable CSS class `.ca-texture` in `casa-tokens.css` that renders an inline SVG tropical leaf pattern as `background-image`, with `background-repeat: repeat`, `background-size` between 200px–400px, and `opacity` on the pattern layer between 4%–8% (achieved via `rgba` fill values in the SVG or a pseudo-element overlay).

3. THE System SHALL load `casa-tokens.css` via a `<link>` tag in `resources/views/templates/head.blade.php` **after** the existing CSS links and **before** `hero.css`, so the tokens are available to all pages.

4. THE System SHALL load the Google Fonts for Anton, Inter, and Caveat via a single `<link>` request appended to `resources/views/templates/head.blade.php`, using `display=swap` and `preconnect` hints already present in the template.

5. IF `casa-tokens.css` is loaded on a page that includes `hero.css`, THEN THE System SHALL ensure no custom property in `casa-tokens.css` overrides or conflicts with any variable defined in `hero.css` (i.e., `--clr-accent`, `--clr-bg`, `--clr-text`, etc. remain unchanged in the hero context).

---

### Requirement 2: Eyebrow Label & Gold Hairline Divider Pattern

**User Story:** As a designer, I want a consistent eyebrow label and gold hairline divider pattern reusable across all sections, so that section headers have a unified typographic hierarchy.

#### Acceptance Criteria

1. THE System SHALL define a CSS class `.ca-eyebrow` in `casa-tokens.css` with: `font-family: var(--font-body)`, `font-size: 11px`, `font-weight: 500`, `letter-spacing: 0.35em`, `text-transform: uppercase`, and `color: var(--color-terracotta)`.

2. THE System SHALL define a CSS class `.ca-hairline` in `casa-tokens.css` that renders a horizontal rule of `height: 1px`, `background-color: var(--color-gold-hairline)`, `border: none`, and configurable `width` via inline style or modifier class.

3. WHEN the `.ca-eyebrow` and `.ca-hairline` elements are rendered on a `--color-cream` (`#F4F1EA`) background, THEN THE System SHALL produce a contrast ratio of at least 3:1 for the terracotta eyebrow text (#E0632A on #F4F1EA) as required by WCAG AA for large/decorative text.

4. WHEN the `.ca-eyebrow` element is rendered on a `--color-forest-dark` (`#1B3B2E`) background, THEN THE System SHALL use `color: var(--color-cream)` (overridden via a `.ca-eyebrow--light` modifier class) to maintain a contrast ratio of at least 4.5:1.

---

### Requirement 3: Icon Containers

**User Story:** As a designer, I want standardized icon container components, so that all facility icons across the site have consistent shape, background, and icon color.

#### Acceptance Criteria

1. THE System SHALL define a CSS class `.ca-icon-circle` in `casa-tokens.css` for a circle icon container: `width: 56px`, `height: 56px`, `border-radius: 50%`, `background-color: var(--color-cream)`, `display: flex`, `align-items: center`, `justify-content: center`.

2. THE System SHALL define a CSS class `.ca-icon-square` in `casa-tokens.css` for a rounded-square icon container: `width: 56px`, `height: 56px`, `border-radius: 12px`, `background-color: var(--color-forest-dark)`, `opacity: 0.12` on the background layer (achieved via a semi-transparent background value), `display: flex`, `align-items: center`, `justify-content: center`.

3. THE System SHALL define a CSS class `.ca-icon-inner` applied to the `<i>` or `<svg>` inside either container, setting `color: var(--color-terracotta)` and `font-size: 22px`.

4. WHEN `.ca-icon-circle` is used on a `--color-forest-dark` background section, THEN THE System SHALL support a `.ca-icon-circle--forest` modifier that sets `background-color: rgba(244, 241, 234, 0.12)` so the container remains visible without harsh contrast.

---

### Requirement 4: Section Fasilitas — Grid Foto 2×2

**User Story:** As a visitor, I want to see the four main facilities (Clubhouse, Gym, Sports Pool, Taman) presented as a 2×2 photo grid with dark gradient overlay and display-font titles, so that I can quickly understand the premium amenities available.

#### Acceptance Criteria

1. THE System SHALL add or replace a "Section Fasilitas" block in `resources/views/index.blade.php` (between the KPR Banks section and the Management section, or in a logical position that does not touch the Hero section) containing a 2×2 CSS Grid layout.

2. THE System SHALL load the following four images as `<img>` tags (with `loading="lazy"` and descriptive `alt` attributes) as grid items:
   - `{{ asset('new/assets/img/clubhouse1.jpg') }}` — alt: "Clubhouse"
   - `{{ asset('new/assets/img/gym1.jpg') }}` — alt: "Gym & Fitness Center"
   - `{{ asset('new/assets/img/spool.jpg') }}` — alt: "Sports Pool"
   - `{{ asset('new/assets/img/taman1.jpg') }}` — alt: "Taman & Landscape"

3. WHEN a grid item is rendered, THE System SHALL overlay a CSS `linear-gradient` from `rgba(0,0,0,0)` at 50% to `rgba(0,0,0,0.72)` at 100% over each image to ensure the facility title text is legible.

4. WHEN the facility title text is positioned at the bottom-left of each grid item, THE System SHALL use `font-family: var(--font-display)`, `font-size: clamp(1.25rem, 2.5vw, 1.75rem)`, `color: #ffffff`, `letter-spacing: 0.03em`, and `text-shadow: 0 2px 8px rgba(0,0,0,0.6)`.

5. WHEN the facility title text is displayed on the darkened gradient portion of the image (perceived background luminance ≤ 10%), THEN THE System SHALL produce a contrast ratio of at least 4.5:1 (white text on near-black background satisfies this).

6. THE System SHALL include an eyebrow label above the grid using `.ca-eyebrow` with text "Fasilitas Premium" and a section title (h2) using `var(--font-display)`.

7. WHEN rendered on a viewport width ≤ 640px (mobile), THE System SHALL collapse the 2×2 grid to a single-column layout with each cell maintaining a minimum height of 220px via `aspect-ratio: 4/3` or equivalent.

8. WHEN rendered on a viewport width ≥ 641px, THE System SHALL display the 2×2 grid with equal cell dimensions and each cell having a minimum height of 280px.

---

### Requirement 5: Section Testimonial — Background Foto Forest

**User Story:** As a visitor, I want to see testimonials displayed over a forest/estate photo background with a glass-panel quote and gold hairline bracket decorations, so that the section feels premium and immersive.

#### Acceptance Criteria

1. THE System SHALL add a "Section Testimonial" block in `resources/views/index.blade.php` that uses `cover-clubhouse.jpg` or `F11.jpg` (from `public/new/assets/img/`) as a full-bleed `background-image` with `background-size: cover` and `background-position: center`.

2. THE System SHALL apply a semi-transparent dark blur overlay (`background: rgba(10, 25, 18, 0.55)`, `backdrop-filter: blur(2px)`) as an `::after` pseudo-element or stacked `<div>` over the background image to maintain legibility.

3. THE System SHALL render each testimonial quote inside a `.ca-glass-panel` element with:
   - `background: rgba(244, 241, 234, 0.08)`
   - `backdrop-filter: blur(16px)`
   - `-webkit-backdrop-filter: blur(16px)`
   - `border: 1px solid rgba(201, 162, 39, 0.3)` (gold hairline tint)
   - `border-radius: 4px`
   - `padding: clamp(24px, 4vw, 48px)`

4. THE System SHALL render the testimonial quote text with `font-family: var(--font-script)`, `font-style: italic`, `font-size: clamp(1rem, 2vw, 1.25rem)`, and `color: var(--color-cream)`.

5. THE System SHALL add decorative bracket characters (`「` and `」`, or CSS-generated `::before` / `::after` lines) using `--color-gold-hairline` at 40px× 40px rendered at the top-left and bottom-right corners of the glass panel to frame the quote.

6. WHEN a testimonial author name is rendered, THE System SHALL use `.ca-eyebrow--light` styles (`color: var(--color-cream)`, `font-size: 11px`, `letter-spacing: 0.3em`) below the quote text.

7. WHEN the quote text (`color: #F4F1EA`) is measured against the darkened background (effective `rgba(10,25,18,0.55)` blend over the forest photo), THEN THE System SHALL ensure a minimum contrast ratio of 4.5:1 as required by WCAG AA for normal text.

8. WHERE multiple testimonials are present, THE System SHALL render them in a horizontally scrollable row on mobile (overflow-x: auto) and a 2–3 column grid on desktop (≥ 768px).

---

### Requirement 6: Section Map & Lokasi — Google Maps JS API Monokrom

**User Story:** As a visitor, I want to see the property location on an interactive map with a dark forest-green monochrome style and an orange pin, alongside a two-column list of nearby places, so that the location section matches the brand identity.

#### Acceptance Criteria

1. THE System SHALL replace the existing `<iframe>` Google Maps embed in the "OUR LOCATION" section of `resources/views/index.blade.php` with a `<div id="ca-map">` container of `height: 400px` and a Google Maps JavaScript API initialization `<script>` block.

2. THE System SHALL apply a monochrome dark-green JSON style array to the Google Maps instance using `google.maps.StyledMapType`, with all map features desaturated and tinted toward `#1B3B2E` (forest-dark), roads shown in a slightly lighter tint, and water/parks in a complementary dark tone.

3. THE System SHALL place a custom marker at coordinates `0.5174550533018407, 101.46526836995564` (Pesona Hutan by Asraya) using a pin icon with fill color `#E0632A` (terracotta/orange) and a white stroke of 2px.

4. THE System SHALL load the Google Maps JavaScript API using the existing API key configured in the application environment (`GOOGLE_MAPS_API_KEY` from `.env`) via a `<script>` tag with `loading="async"` and `callback=initCaMap`.

5. IF `GOOGLE_MAPS_API_KEY` is not set or empty, THEN THE System SHALL fall back to displaying the existing `<iframe>` Google Maps embed so the map is never blank.

6. THE System SHALL restructure the Map & Lokasi section layout to a two-column layout on desktop (≥ 768px): map on the left (60% width) and a styled location list on the right (40% width).

7. THE System SHALL render the location list in 2 internal columns on desktop using CSS Grid (`grid-template-columns: 1fr 1fr`), each item prefixed with a terracotta dot (`•`), `font-size: 13px`, `color: rgba(255,255,255,0.75)`, and `line-height: 1.6`.

8. WHEN rendered on viewport width ≤ 767px, THE System SHALL stack the map above the location list in a single-column layout, with the map height reduced to 260px.

---

### Requirement 7: Footer — Background Forest-Dark Bertekstur

**User Story:** As a visitor, I want the footer to have a dark forest-green textured background with a gold hairline inset frame and center-aligned logo, so that the footer reflects the brand identity and feels premium.

#### Acceptance Criteria

1. THE System SHALL update `resources/views/templates/footer.blade.php` to replace the existing `<footer class="site-footer">` background with `background-color: var(--color-forest-dark)` and apply the `.ca-texture` class to add the tropical SVG texture overlay.

2. THE System SHALL render an inset decorative frame inside the footer using a `<div>` with `border: 1px solid rgba(201, 162, 39, 0.35)` (gold hairline, 35% opacity), `margin: 24px`, `padding: 40px clamp(24px, 6vw, 80px)`, so the gold line creates a rectangular border inset from the footer edges.

3. THE System SHALL center-align the Casa Asraya logo (`img/asraya-icon.png` or `img/asraya-2.png`) at the top of the footer inset frame, with `height: 48px`, `width: auto`, `filter: brightness(0) invert(1)` (to render it white on dark background), and `margin-bottom: 32px`.

4. THE System SHALL update all footer text (About Asraya paragraph, Sitemap links, OUR LOCATION heading) to use `color: rgba(244, 241, 234, 0.75)` for body text and `color: var(--color-cream)` for headings, replacing the existing `.text-black` classes.

5. THE System SHALL update footer link colors to `color: rgba(244, 241, 234, 0.65)` with a `hover` state of `color: var(--color-gold-hairline)`.

6. WHEN the footer heading text (`color: #F4F1EA`) is rendered on the `--color-forest-dark` background (`#1B3B2E`), THEN THE System SHALL produce a contrast ratio of at least 4.5:1 (verified: #F4F1EA on #1B3B2E ≈ 10.4:1, compliant).

7. THE System SHALL update the social icon bar above the footer (Instagram, YouTube, WhatsApp) to use `background-color: rgba(244, 241, 234, 0.08)` per icon cell and `color: var(--color-cream)` for icon glyphs, removing the `.bg-primary` Bootstrap class from the wrapper `<div>`.

8. THE System SHALL retain the existing footer map `<iframe>`, Sitemap links, and copyright script without removing any functional content.

---

### Requirement 8: Section Baru "Our Architect"

**User Story:** As a visitor, I want to learn about the architect firm (Atelier Riri) behind Casa Asraya's design, presented with a script-font header, an asymmetric photo layout, and a firm description, so that the professional design pedigree is communicated clearly.

#### Acceptance Criteria

1. THE System SHALL insert a new "Our Architect" section in `resources/views/index.blade.php` positioned **after** the "SECTION: TENTANG KAMI" (About/video) block and **before** the "OUR MANAGEMENT" section.

2. THE System SHALL render the section header using `font-family: var(--font-script)`, `font-size: clamp(2rem, 4vw, 3rem)`, `color: var(--color-forest-dark)`, with text content "Atelier Riri" or "Our Architect".

3. THE System SHALL include an eyebrow label above the script header using `.ca-eyebrow` with text "Mitra Arsitektur".

4. THE System SHALL use an asymmetric two-column layout on desktop (≥ 768px): image column at 45% width with `border-radius: 4px` and `aspect-ratio: 3/4`, and text column at 55% width with `padding-left: clamp(32px, 5vw, 72px)`.

5. THE System SHALL use an existing estate/architecture photo for the architect section image — using `{{ asset('new/assets/img/F7.jpg') }}` or `{{ asset('new/assets/img/F2.png') }}` as a placeholder, with `loading="lazy"` and `alt="Atelier Riri — Architectural Firm"`.

6. THE System SHALL include the following descriptive text (or equivalent): a brief paragraph about Atelier Riri as the architectural partner, referencing modern tropical design, premium materials, and sustainability principles.

7. THE System SHALL include a gold hairline divider (`.ca-hairline`, `width: 48px`) below the eyebrow label and above the script header.

8. WHEN rendered on viewport width ≤ 767px, THE System SHALL stack the image above the text in a single-column layout, with the image width set to 100% and `max-height: 320px` with `object-fit: cover`.

9. WHEN the section body text (`color: var(--color-charcoal-text)` = `#2B2B26`) is rendered on a white or cream background (`#F4F1EA`), THEN THE System SHALL produce a contrast ratio of at least 7:1 (verified: #2B2B26 on #F4F1EA ≈ 11.2:1, compliant).

---

### Requirement 9: Hero Section — Immutability Constraint

**User Story:** As a developer, I want a clear constraint that the Hero section is never modified, so that the scroll-scrub canvas animation continues to function correctly without regression.

#### Acceptance Criteria

1. THE System SHALL leave the following files completely unmodified:
   - `public/new/assets/css/hero.css`
   - `public/new/assets/js/scroll-scrub-hero.js`

2. THE System SHALL leave the following Blade elements inside `resources/views/index.blade.php` completely unmodified:
   - The `<div class="scroll-stage" id="scrollStage">` element and all its children
   - The `<div class="sticky-wrap">` element and all its children
   - The `<canvas class="hero-canvas" id="heroCanvas">` element
   - The `<img class="hero-first-paint" id="heroFirstPaint">` element
   - The `<div class="hero-loader" id="heroLoader">` element
   - The `<div class="hero-chapters-container">` element and all its children
   - The `<div class="scroll-indicator" id="scrollIndicator">` element
   - All inline overlay `<div>` elements that are direct children of `.sticky-wrap`

3. THE System SHALL retain the `<link rel="stylesheet" href="{{ asset('new/assets/css/hero.css') }}">` and `<script src="{{ asset('new/assets/js/scroll-scrub-hero.js') }}">` references in `index.blade.php` without alteration.

4. IF any new CSS class or custom property introduced by `casa-tokens.css` shares a name with an existing hero CSS variable (prefixed `--clr-`), THEN THE System SHALL use a distinct `--ca-` prefix namespace for all new design token custom properties to prevent name collision (note: requirements 1–8 already use `--color-` prefix, which is distinct from hero's `--clr-` prefix — this constraint confirms that convention).
