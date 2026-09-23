# Preservation Test Observations

**Task**: Task 2 - Write preservation property tests (BEFORE implementing fix)  
**Date**: Run on UNFIXED code  
**Status**: ✅ ALL TESTS PASS (18 tests, 87 assertions)

## Overview

This document captures the baseline behavior observed on the UNFIXED code that MUST be preserved after implementing the responsive CSS fixes. All observations have been encoded as property-based tests in `ResponsiveCssPreservationTest.php`.

## Test Results Summary

```
PHPUnit 9.6.34

..................                                                18 / 18 (100%)

OK (18 tests, 87 assertions)
```

## Observed Baseline Behaviors (Desktop >1200px & Non-Buggy Elements)

### 1. Brand Colors (Requirement 3.4)

**Observation**: Brand colors are consistently defined and used throughout the codebase.

- **hero.css** defines CSS custom properties:
  - `--clr-accent: #D4622A` (burnt orange)
  - `--clr-bg: #0c0c0a` (charcoal)
  - `--clr-text: #f5f2ea` (off-white)

- **index.blade.php** uses brand colors extensively:
  - `#D4622A` appears multiple times (accent color)
  - `#1a3a2e` appears multiple times (dark green)
  - `#f5f1ea` appears multiple times (off-white background)

**Tests**:
- ✅ `test_brand_colors_are_preserved_in_hero_css()`
- ✅ `test_brand_colors_are_preserved_in_blade_templates()`

---

### 2. Typography Fonts (Requirement 3.4)

**Observation**: Typography uses IBM Plex fonts and Outfit consistently.

- **hero.css** defines:
  - `--ff-body: 'IBM Plex Sans'` (body font)
  - `--ff-mono: 'IBM Plex Mono'` (monospace/label font)

- **Blade templates** use:
  - `font-family: 'Outfit'` extensively throughout (primary site font)
  - Outfit appears 10+ times in index.blade.php

**Tests**:
- ✅ `test_typography_fonts_are_preserved_in_hero_css()`
- ✅ `test_outfit_font_is_preserved_in_blade_templates()`

---

### 3. Hover Effects and CSS Transitions (Requirement 3.3)

**Observation**: Extensive hover effects and smooth transitions are present across all interactive elements.

- **hero.css** contains:
  - `.btn-explore:hover` - button hover with background transition
  - `.btn-book:hover` - button hover with glassmorphism effect
  - `.nav-links a:hover` - nav link underline animation
  - 10+ `transition:` properties throughout

- **index.blade.php** contains:
  - `.ab-arrow-hover` class for arrow hover effects
  - `.ab-card-hover` class for card hover effects
  - `.unit-card` expand-on-hover with flex transition
  - 5+ inline hover effects using `onmouseover`/`onmouseout`

**Tests**:
- ✅ `test_hover_effects_are_preserved_in_hero_css()`
- ✅ `test_hover_effects_are_preserved_in_index_blade()`

---

### 4. JavaScript Functionality (Requirements 3.5, 3.7)

**Observation**: Multiple JavaScript functions power interactive features.

#### KPR Calculator (`perhitungan_kpr.blade.php`)
- `function calculateKPR()` - main calculation function
- `const principal` - loan principal calculation
- `const tiers` - tiered payment calculation
- `getElementById("resultTable")` - DOM manipulation for results

#### Mobile Menu (`hero.css` structure)
- `.mobile-nav-panel` - mobile menu panel
- `.nav-hamburger` - hamburger button
- `.mobile-nav-overlay` - backdrop overlay
- `.mobile-nav-panel.is-open` - JavaScript toggle state
- `.nav-hamburger.is-active` - hamburger animation state

#### Hero Scroll Animation (`index.blade.php`)
- `class="scroll-stage"` - scroll container
- `class="sticky-wrap"` - sticky positioning wrapper
- `id="heroCanvas"` - canvas element for frame scrubbing
- `class="hero-chapter"` - chapter overlay elements
- `scroll-scrub-hero.js` - external animation script

**Tests**:
- ✅ `test_kpr_calculator_javascript_is_preserved()`
- ✅ `test_mobile_menu_javascript_patterns_exist()`
- ✅ `test_hero_scroll_animation_infrastructure_is_preserved()`

---

### 5. Desktop Layout Patterns (Requirement 3.1)

**Observation**: Desktop layouts use sophisticated grid and flexbox patterns.

#### Bento Grid Layout (`index.blade.php`)
- `.ab-bento-grid` - main grid container
- `grid-template-columns: 200px 1fr 1fr` - desktop 3-column layout
- `.ab-col-left` - left column (3 text cards)
- `.ab-img-center` - center column (large image)
- `.ab-col-right` - right column (2 small images)

#### Hero Section Padding
- Uses `clamp()` function for responsive padding
- Pattern observed: `padding: 140px clamp(16px,4vw,48px) 80px`

#### Unit Card Expand-on-Hover
- `.unit-strip` container with `height: 560px`
- `.unit-card` elements with flex-based expansion
- Hover transition: `transition: flex 0.7s cubic-bezier(0.4, 0, 0.2, 1)`

**Tests**:
- ✅ `test_bento_grid_desktop_layout_is_preserved()`
- ✅ `test_hero_section_desktop_padding_patterns_are_preserved()`
- ✅ `test_unit_card_hover_layout_is_preserved()`

---

### 6. Existing Media Query Breakpoints (Requirement 3.10)

**Observation**: Multiple breakpoints are defined and must remain intact.

#### hero.css Breakpoints
- `@media (max-width: 768px)` - mobile viewport
- `@media (min-width: 769px)` - desktop viewport

#### index.blade.php Breakpoints
- `@media (max-width: 991px)` - tablet viewport
- `@media (max-width: 768px)` - mobile viewport
- `@media (max-width: 639px)` - bento grid collapse breakpoint

**Note**: The fix will ADD a new breakpoint (`max-width: 767px`) for bento grid, but existing breakpoints must remain.

**Tests**:
- ✅ `test_existing_breakpoints_are_preserved_in_hero_css()`
- ✅ `test_existing_breakpoints_are_preserved_in_index_blade()`

---

### 7. CSS Custom Properties (Requirement 3.4)

**Observation**: Design tokens are defined as CSS custom properties in `:root`.

- `--clr-accent` - accent color
- `--clr-bg` - background color
- `--clr-text` - text color
- `--ff-body` - body font family
- `--ff-mono` - monospace font family
- `--nav-height` - navigation height (72px)
- `--nav-transition` - navigation transition timing

**Tests**:
- ✅ `test_css_custom_properties_are_preserved()`

---

### 8. Navigation Structure (Requirement 3.5)

**Observation**: Navigation uses glassmorphism with scroll-based state changes.

- `.site-nav` - main navigation container
- `.nav-logo` - logo element
- `.nav-links` - desktop navigation links
- `.site-nav.is-scrolled` - scrolled state with backdrop blur
- `backdrop-filter: blur(12px)` - glassmorphism effect

**Tests**:
- ✅ `test_navigation_structure_is_preserved()`

---

### 9. Form Elements (Requirement 3.7)

**Observation**: KPR form has structured inputs with specific IDs for JavaScript.

- `id="propertyPrice"` - property price input
- `id="downPayment"` - down payment input
- `id="interestRate"` - interest rate input
- `id="loanTerm"` - loan term range slider
- `class="kpr-input"` - input styling class
- `onclick="calculateKPR()"` - calculate button handler

**Tests**:
- ✅ `test_kpr_form_structure_is_preserved()`

---

### 10. Image and Asset References (Requirement 3.8)

**Observation**: Asset loading uses performance optimizations.

- `class="hero-first-paint"` - first-paint optimization image
- `fetchpriority="high"` - prioritize hero image loading
- `loading="lazy"` - lazy loading for below-fold images (2 instances)
- `asset()` helper - Laravel asset URL helper (10+ instances)

**Tests**:
- ✅ `test_hero_image_references_are_preserved()`

---

## Property-Based Testing Coverage

All tests use property-based assertions to ensure behavior holds across:
- Multiple files (hero.css, index.blade.php, featured-house.blade.php, perhitungan_kpr.blade.php)
- Multiple element types (colors, fonts, hover states, JavaScript functions, layouts)
- Multiple breakpoints (existing media queries must remain)

## Expected Outcomes After Fix Implementation

When the responsive CSS fix is implemented:

1. ✅ **All 18 preservation tests MUST still PASS** - confirming no regressions
2. ✅ **Bug condition test (Task 1) MUST PASS** - confirming the bug is fixed
3. ✅ **Desktop layout remains identical** - visual regression testing recommended
4. ✅ **All JavaScript continues to function** - manual testing recommended

## Files Covered by Preservation Tests

- ✅ `public/new/assets/css/hero.css`
- ✅ `resources/views/index.blade.php`
- ✅ `resources/views/featured-house.blade.php`
- ✅ `resources/views/perhitungan_kpr.blade.php`

## Next Steps

1. ✅ **Task 2 Complete** - Preservation tests written and passing on unfixed code
2. ⏳ **Task 3** - Implement responsive CSS fixes across affected files
3. ⏳ **Task 3.7** - Re-run bug condition test (must PASS after fix)
4. ⏳ **Task 3.8** - Re-run preservation tests (must still PASS after fix)

## Notes

- These tests encode the OBSERVED behavior of the current (unfixed) codebase
- Tests are designed to catch regressions - they verify structure, patterns, and presence of key elements
- Tests do NOT verify pixel-perfect layout (use visual regression tools for that)
- Tests focus on semantic patterns that should remain stable regardless of responsive fixes
- All 87 assertions passed on the unfixed code, establishing a solid baseline
