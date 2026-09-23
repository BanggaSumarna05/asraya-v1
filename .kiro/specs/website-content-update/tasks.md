# Implementation Plan: Website Content Update

## Overview
Update website content across 5 blade templates to match the Pesona Hutan Asraya company profile exactly. No visual/layout changes — only text, data values, and spec lists.

## Tasks

- [x] 1. Update homepage Mahogany unit card pills
  - File: `resources/views/index.blade.php`
  - Change "4 Kamar Tidur" → "3 Master Bedroom + 1 Kamar ART"
  - Change "Carport 2 Mobil" → "1 Garasi + 1 Carport"
  - Add new pill "4 Kamar Mandi" using the same `unit-spec-pill` SVG + text pattern as existing pills

- [x] 2. Update homepage Cendana unit card pills
  - File: `resources/views/index.blade.php`
  - Change "4 Kamar Tidur" → "3 Master Bedroom + 1 Kamar ART"
  - Change "Carport 2 Mobil" → "1 Carport"
  - Add new pill "5 Kamar Mandi" using the same `unit-spec-pill` SVG + text pattern as existing pills

- [x] 3. Add Perpustakaan Soeman HS to homepage location list
  - File: `resources/views/index.blade.php`
  - In the `#map` section `@foreach` array, insert `['Perpustakaan Soeman HS', '10 Mnt']` between "Central Business District" and "Kantor Polda Riau"

- [x] 4. Update Mahogany detail page spec list
  - File: `resources/views/mahogany.blade.php`
  - Verify "4 Bathroom" row is present (it is — keep it)
  - Verify both "1 Carport" and "1 Garage" rows exist (currently only Carport exists — add Garage row using `img/reduce/icons/private-garage.png`)
  - Add new spec row for Smart Home: icon `img/reduce/icons/livingroom.png`, label "Smart Home: Living Room, Dining Room & Master Bedroom"

- [x] 5. Update Cendana detail page spec list
  - File: `resources/views/cendana.blade.php`
  - Change "4 Bathroom" → "5 Kamar Mandi"
  - Remove the "1 Garage" spec row entirely (Cendana has no garage per company profile)
  - Add new spec row for Smart Home: icon `img/reduce/icons/livingroom.png`, label "Smart Home: Living Room, Dining Room & Master Bedroom"

- [x] 6. Update Clubhouse page description and add facilities grid
  - File: `resources/views/clubhouse.blade.php`
  - Replace the two generic `<p>` paragraphs with accurate text naming the five specific facilities
  - After the updated prose and before the CTA button, add a facilities grid/pill list showing: Swimming Pool, Fitness Center, Yoga Club, Restaurant & Lounge, Community Area
  - Use inline-style consistent with site design (no new CSS classes)

- [x] 7. Update Featured House page with unit-specific descriptions
  - File: `resources/views/featured-house.blade.php` and `app/Http/Controllers/FrontController.php`
  - In `FrontController.php`, add a `description` key to each unit in the `$units` array:
    - Mahogany: "Hunian premium seluas 220m² di atas lahan 157m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 4 Kamar Mandi, Smart Home, Garasi dan Carport."
    - Cendana: "Hunian eksklusif seluas 138m² di atas lahan 90m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 5 Kamar Mandi, Smart Home, dan Carport."
  - In `featured-house.blade.php`, replace the hardcoded generic description string with `{{ $item['description'] }}`

## Task Dependency Graph

```
1 → (none, independent)
2 → (none, independent)
3 → (none, independent)
4 → (none, independent)
5 → (none, independent)
6 → (none, independent)
7 → (none, independent)
```

All tasks are independent and can be executed in parallel.

## Notes

- No visual or layout changes — only text content and data values
- Match existing inline-style CSS patterns; do not introduce new CSS classes
- Bahasa Indonesia for user-facing copy; "Smart Home" label stays in English
- Source of truth: Pesona-Hutan-Asraya-Company-Profile.md
