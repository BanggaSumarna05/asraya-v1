# Design: Website Content Update — Pesona Hutan Asraya

## Source of Truth

All content must align with the **Pesona-Hutan-Asraya-Company-Profile.md** document.

---

## Section-by-Section Change Map

### 1. Homepage — Unit Card Specs (`index.blade.php`)

#### Mahogany unit card (homepage)
Current pills:
- "3 Lantai" ✓
- "4 Kamar Tidur" ✗ → **"3 Master Bedroom + 1 Kamar ART"**
- "Smart Home Ready" ✓
- "Carport 2 Mobil" ✗ → **"1 Garasi + 1 Carport"**

Add pill: **"4 Kamar Mandi"**

#### Cendana unit card (homepage)
Current pills:
- "3 Lantai" ✓
- "4 Kamar Tidur" ✗ → **"3 Master Bedroom + 1 Kamar ART"**
- "Smart Home Ready" ✓
- "Carport 2 Mobil" ✗ → **"1 Carport"**

Add pill: **"5 Kamar Mandi"**

---

### 2. Homepage — Location / Aksesibilitas Section (`index.blade.php`)

Current list (6 items). Add **Perpustakaan Soeman HS — 10 Mnt** per company profile.

Final list (7 items):
1. Bandara Syarif Kasim II — 15 Mnt
2. RS Awal Bros — 10 Mnt
3. Mall Pekanbaru — 10 Mnt
4. SKA Tomorrowland — 10 Mnt
5. Central Business District — 10 Mnt
6. Perpustakaan Soeman HS — 10 Mnt *(new)*
7. Kantor Polda Riau — 3 Mnt

---

### 3. Mahogany Detail Page (`mahogany.blade.php`)

#### Hero stats bar
Current: `LT: 157m² · LB: 220m² · 3 Lantai`  ✓ (correct)

#### Spec list (dark card)
Current specs include "1 Garage" but profile confirms both 1 Garasi + 1 Carport.
Current bathroom count label: verify against profile (4 Kamar Mandi ✓).

Update spec list to match profile exactly:
- 3 Master Rooms + 1 Housekeeper's Room ✓
- 4 Kamar Mandi ✓ (profile says 4)
- 1 Garasi ✓
- 1 Carport ✓
- Add **Smart Home** feature note: "Smart Home: Living Room, Dining Room, Master Bedroom"
- Description text: confirm "4 unit" and "Connected Garden" language is consistent

---

### 4. Cendana Detail Page (`cendana.blade.php`)

#### Hero stats bar
Current: `LT: 90m² · LB: 138m² · 3 Lantai` ✓ (correct)

#### Spec list (dark card)
Current shows **4 Bathroom** — profile says **5 Kamar Mandi** → update to 5.
Current shows **1 Garage** — profile says Cendana has **no garage, only 1 Carport** → remove garage row.

Update spec list:
- 3 Master Rooms + 1 Housekeeper's Room ✓
- **5 Kamar Mandi** (was 4)
- 1 Carport ✓
- **Remove** 1 Garage row (profile does not list garage for Cendana)
- Add **Smart Home** feature note: "Smart Home: Living Room, Dining Room, Master Bedroom"
- Description text: confirm "25 unit, 3 blok" and Brandgang language is accurate

---

### 5. Clubhouse Page (`clubhouse.blade.php`)

The existing description is generic. Update to reflect the five specific facilities from the profile:

**Add a "Fasilitas Clubhouse" list/grid section** below the current description, displaying:
1. 🏊 Swimming Pool
2. 💪 Fitness Center
3. 🧘 Yoga Club
4. 🍽️ Restaurant & Lounge
5. 🏡 Community Area

This can be implemented as pill/badge row or a small icon grid consistent with the site's design language (same style as the facility pills used on the homepage hero area).

Update the prose description to specifically name these facilities instead of the current generic text.

---

### 6. Featured House Page (`featured-house.blade.php`)

The generic description "Rasakan kemewahan hunian 3 lantai..." is the same for both unit cards.

Update to unit-specific descriptions:
- **Mahogany**: "Hunian premium seluas 220m² di atas lahan 157m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 4 Kamar Mandi, Smart Home, Garasi & Carport."
- **Cendana**: "Hunian eksklusif seluas 138m² di atas lahan 90m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 5 Kamar Mandi, Smart Home, dan Carport."

---

## Design Constraints

- **No visual/layout changes** — only text content and data values.
- Match the existing inline-style CSS patterns (no new CSS classes).
- Maintain Bahasa Indonesia for user-facing copy; technical labels (e.g. "Smart Home") may stay in English.
- Spec pills on unit cards use the existing `unit-spec-pill` class — add new pills following the same SVG + text pattern.
- The architect credit "Atelier Riri" and "Novriansyah Yakub" is already present on index in the bento grid ("Dirancang Atelier Riri.") — no change needed.

---

## Files to Modify

| File | Section | Change Type |
|------|---------|------------|
| `resources/views/index.blade.php` | Unit card — Mahogany pills | Update + Add pill |
| `resources/views/index.blade.php` | Unit card — Cendana pills | Update + Add pill |
| `resources/views/index.blade.php` | Location list | Add 1 row |
| `resources/views/mahogany.blade.php` | Spec list, Smart Home | Update row + Add note |
| `resources/views/cendana.blade.php` | Spec list, Smart Home | Update bathroom count, remove garage, add note |
| `resources/views/clubhouse.blade.php` | Facility description | Rewrite prose + Add facilities list |
| `resources/views/featured-house.blade.php` | Unit card descriptions | Unit-specific copy |
