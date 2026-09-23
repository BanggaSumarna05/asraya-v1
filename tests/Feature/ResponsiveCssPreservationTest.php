<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

/**
 * Preservation Property Tests for Responsive CSS Fixes
 *
 * **Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9, 3.10**
 *
 * This test suite observes and validates the BASELINE behavior of the unfixed code
 * that MUST be preserved after implementing the responsive CSS fixes.
 *
 * IMPORTANT: These tests should PASS on unfixed code (confirming what to preserve).
 * After the fix is implemented, these tests must still PASS (confirming no regressions).
 *
 * Testing Approach:
 *   - Read CSS, Blade, and JavaScript files directly
 *   - Verify brand colors, fonts, JavaScript functions, and CSS hover states exist
 *   - Validate desktop layout patterns and styling rules are present
 *   - Check that existing media query breakpoints remain intact
 *
 * Observation-First Methodology:
 *   We observe the CURRENT behavior on desktop viewports (>1200px) and non-buggy elements,
 *   then encode those observations as property tests to ensure they don't change.
 */
class ResponsiveCssPreservationTest extends TestCase
{
    /** Absolute path to project root */
    private string $root;

    protected function setUp(): void
    {
        parent::setUp();
        // Resolve root: this file lives in tests/Feature/, root is two levels up
        $this->root = realpath(__DIR__ . '/../../');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.1: Brand Colors Preservation
    // Validates: Requirement 3.4 — Brand colors must remain consistent
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that brand colors are defined in hero.css and remain unchanged.
     *
     * @group preservation
     * @group brand-colors
     */
    public function test_brand_colors_are_preserved_in_hero_css(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath, 'hero.css must exist');

        $css = file_get_contents($cssPath);

        // Brand colors from design spec:
        // --clr-accent: #D4622A (burnt orange)
        // --clr-bg: #0c0c0a (charcoal)
        // --clr-text: #f5f2ea (off-white)
        
        $this->assertStringContainsString(
            '--clr-accent: #D4622A',
            $css,
            'PRESERVATION FAILED: Brand accent color #D4622A must remain in hero.css'
        );

        $this->assertStringContainsString(
            '--clr-bg: #0c0c0a',
            $css,
            'PRESERVATION FAILED: Brand background color #0c0c0a must remain in hero.css'
        );

        $this->assertStringContainsString(
            '--clr-text: #f5f2ea',
            $css,
            'PRESERVATION FAILED: Brand text color #f5f2ea must remain in hero.css'
        );
    }

    /**
     * Test that brand colors are used consistently across Blade templates.
     *
     * @group preservation
     * @group brand-colors
     */
    public function test_brand_colors_are_preserved_in_blade_templates(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath, 'index.blade.php must exist');

        $src = file_get_contents($indexPath);

        // Check for consistent use of #D4622A (accent orange)
        $accentCount = substr_count(strtolower($src), '#d4622a');
        $this->assertGreaterThan(
            0,
            $accentCount,
            'PRESERVATION FAILED: Brand accent color #D4622A must be used in index.blade.php'
        );

        // Check for consistent use of #1a3a2e (dark green)
        $darkGreenCount = substr_count(strtolower($src), '#1a3a2e');
        $this->assertGreaterThan(
            0,
            $darkGreenCount,
            'PRESERVATION FAILED: Brand dark green #1a3a2e must be used in index.blade.php'
        );

        // Check for consistent use of #f5f1ea (off-white background)
        $offWhiteCount = substr_count(strtolower($src), '#f5f1ea');
        $this->assertGreaterThan(
            0,
            $offWhiteCount,
            'PRESERVATION FAILED: Brand off-white #f5f1ea must be used in index.blade.php'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.2: Typography Fonts Preservation
    // Validates: Requirement 3.4 — Typography fonts must remain consistent
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that typography fonts (Outfit, IBM Plex) are preserved in hero.css.
     *
     * @group preservation
     * @group typography
     */
    public function test_typography_fonts_are_preserved_in_hero_css(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check for IBM Plex Sans (body font)
        $this->assertStringContainsString(
            'IBM Plex Sans',
            $css,
            'PRESERVATION FAILED: IBM Plex Sans font must remain in hero.css'
        );

        // Check for IBM Plex Mono (monospace/label font)
        $this->assertStringContainsString(
            'IBM Plex Mono',
            $css,
            'PRESERVATION FAILED: IBM Plex Mono font must remain in hero.css'
        );
    }

    /**
     * Test that Outfit font is used consistently across Blade templates.
     *
     * @group preservation
     * @group typography
     */
    public function test_outfit_font_is_preserved_in_blade_templates(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Outfit is the primary font used throughout the site
        $outfitCount = substr_count($src, 'Outfit');
        $this->assertGreaterThan(
            10,
            $outfitCount,
            'PRESERVATION FAILED: Outfit font must be used extensively in index.blade.php'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.3: Hover Effects and CSS Transitions Preservation
    // Validates: Requirement 3.3 — Hover effects and transitions must work
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that hover effects are preserved in hero.css.
     *
     * @group preservation
     * @group hover-effects
     */
    public function test_hover_effects_are_preserved_in_hero_css(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check for .btn-explore:hover
        $this->assertStringContainsString(
            '.btn-explore:hover',
            $css,
            'PRESERVATION FAILED: .btn-explore:hover effect must be preserved'
        );

        // Check for .btn-book:hover
        $this->assertStringContainsString(
            '.btn-book:hover',
            $css,
            'PRESERVATION FAILED: .btn-book:hover effect must be preserved'
        );

        // Check for nav link hover effects
        $this->assertStringContainsString(
            '.nav-links a:hover',
            $css,
            'PRESERVATION FAILED: .nav-links a:hover effect must be preserved'
        );

        // Check for transition properties
        $transitionCount = substr_count(strtolower($css), 'transition:');
        $this->assertGreaterThan(
            10,
            $transitionCount,
            'PRESERVATION FAILED: CSS transitions must be preserved throughout hero.css'
        );
    }

    /**
     * Test that hover effects are preserved in index.blade.php.
     *
     * @group preservation
     * @group hover-effects
     */
    public function test_hover_effects_are_preserved_in_index_blade(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for .ab-arrow-hover class (used for arrow hover effects)
        $this->assertStringContainsString(
            'ab-arrow-hover',
            $src,
            'PRESERVATION FAILED: .ab-arrow-hover class must be preserved in index.blade.php'
        );

        // Check for .ab-card-hover class
        $this->assertStringContainsString(
            'ab-card-hover',
            $src,
            'PRESERVATION FAILED: .ab-card-hover class must be preserved in index.blade.php'
        );

        // Check for .unit-card hover transition
        $this->assertStringContainsString(
            '.unit-card',
            $src,
            'PRESERVATION FAILED: .unit-card hover effects must be preserved'
        );

        // Check for hover inline styles (onmouseover/onmouseout)
        $hoverInlineCount = substr_count($src, 'onmouseover');
        $this->assertGreaterThan(
            5,
            $hoverInlineCount,
            'PRESERVATION FAILED: Inline hover effects (onmouseover) must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.4: JavaScript Functionality Preservation
    // Validates: Requirement 3.5, 3.7 — JavaScript must continue to work
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that KPR calculator JavaScript function is preserved.
     *
     * @group preservation
     * @group javascript
     */
    public function test_kpr_calculator_javascript_is_preserved(): void
    {
        $kprPath = $this->root . '/resources/views/perhitungan_kpr.blade.php';
        $this->assertFileExists($kprPath, 'perhitungan_kpr.blade.php must exist');

        $src = file_get_contents($kprPath);

        // Check for calculateKPR function
        $this->assertStringContainsString(
            'function calculateKPR()',
            $src,
            'PRESERVATION FAILED: calculateKPR() function must be preserved'
        );

        // Check for key calculation logic
        $this->assertStringContainsString(
            'const principal',
            $src,
            'PRESERVATION FAILED: KPR principal calculation must be preserved'
        );



        // Check for DOM manipulation
        $this->assertStringContainsString(
            'getElementById("resultTable")',
            $src,
            'PRESERVATION FAILED: KPR result table DOM manipulation must be preserved'
        );
    }

    /**
     * Test that mobile menu JavaScript functions are preserved in index.blade.php.
     *
     * Note: Mobile menu JavaScript may be in a separate file or in templates/navbar.
     * We check for the expected JavaScript patterns.
     *
     * @group preservation
     * @group javascript
     */
    public function test_mobile_menu_javascript_patterns_exist(): void
    {
        // Check hero.css for hamburger and mobile nav classes
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Mobile nav panel must exist
        $this->assertStringContainsString(
            '.mobile-nav-panel',
            $css,
            'PRESERVATION FAILED: .mobile-nav-panel must be preserved in hero.css'
        );

        // Hamburger button must exist
        $this->assertStringContainsString(
            '.nav-hamburger',
            $css,
            'PRESERVATION FAILED: .nav-hamburger must be preserved in hero.css'
        );

        // Mobile nav overlay must exist
        $this->assertStringContainsString(
            '.mobile-nav-overlay',
            $css,
            'PRESERVATION FAILED: .mobile-nav-overlay must be preserved in hero.css'
        );

        // Check for is-open and is-active classes (JavaScript toggle states)
        $this->assertStringContainsString(
            '.mobile-nav-panel.is-open',
            $css,
            'PRESERVATION FAILED: Mobile menu toggle states must be preserved'
        );

        $this->assertStringContainsString(
            '.nav-hamburger.is-active',
            $css,
            'PRESERVATION FAILED: Hamburger toggle states must be preserved'
        );
    }

    /**
     * Test that hero scroll animation infrastructure is preserved.
     *
     * @group preservation
     * @group javascript
     */
    public function test_hero_scroll_animation_infrastructure_is_preserved(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for scroll-stage container
        $this->assertStringContainsString(
            'class="scroll-stage"',
            $src,
            'PRESERVATION FAILED: scroll-stage container must be preserved'
        );

        // Check for sticky-wrap
        $this->assertStringContainsString(
            'class="sticky-wrap"',
            $src,
            'PRESERVATION FAILED: sticky-wrap container must be preserved'
        );

        // Check for hero canvas
        $this->assertStringContainsString(
            'id="heroCanvas"',
            $src,
            'PRESERVATION FAILED: hero canvas element must be preserved'
        );

        // Check for chapter containers
        $this->assertStringContainsString(
            'class="hero-chapter"',
            $src,
            'PRESERVATION FAILED: hero-chapter elements must be preserved'
        );

        // Check for scroll-scrub JS file reference
        $this->assertStringContainsString(
            'scroll-scrub-hero.js',
            $src,
            'PRESERVATION FAILED: scroll-scrub-hero.js reference must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.5: Desktop Layout Patterns Preservation
    // Validates: Requirement 3.1 — Desktop layout must remain unchanged
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that bento grid desktop layout structure is preserved.
     *
     * @group preservation
     * @group desktop-layout
     */
    public function test_bento_grid_desktop_layout_is_preserved(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for bento grid class
        $this->assertStringContainsString(
            'ab-bento-grid',
            $src,
            'PRESERVATION FAILED: .ab-bento-grid class must be preserved'
        );

        // Check for desktop grid-template-columns definition
        $this->assertStringContainsString(
            'grid-template-columns: 200px 1fr 1fr',
            $src,
            'PRESERVATION FAILED: Desktop bento grid layout (200px 1fr 1fr) must be preserved'
        );

        // Check for grid column and row assignments
        $this->assertStringContainsString(
            'ab-col-left',
            $src,
            'PRESERVATION FAILED: ab-col-left grid column must be preserved'
        );

        $this->assertStringContainsString(
            'ab-img-center',
            $src,
            'PRESERVATION FAILED: ab-img-center grid column must be preserved'
        );

        $this->assertStringContainsString(
            'ab-col-right',
            $src,
            'PRESERVATION FAILED: ab-col-right grid column must be preserved'
        );
    }

    /**
     * Test that hero section desktop padding patterns are preserved.
     *
     * @group preservation
     * @group desktop-layout
     */
    public function test_hero_section_desktop_padding_patterns_are_preserved(): void
    {
        $featuredHousePath = $this->root . '/resources/views/featured-house.blade.php';
        $this->assertFileExists($featuredHousePath);

        $src = file_get_contents($featuredHousePath);

        // Hero sections use clamp() for responsive padding
        // The PATTERN of using clamp() must be preserved (specific values may change for the fix)
        $clampCount = substr_count(strtolower($src), 'clamp(');
        $this->assertGreaterThan(
            0,
            $clampCount,
            'PRESERVATION FAILED: Hero sections must continue using clamp() for responsive padding'
        );
    }

    /**
     * Test that unit card expand-on-hover layout is preserved.
     *
     * @group preservation
     * @group desktop-layout
     */
    public function test_unit_card_hover_layout_is_preserved(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for unit-strip container
        $this->assertStringContainsString(
            'class="unit-strip"',
            $src,
            'PRESERVATION FAILED: .unit-strip container must be preserved'
        );

        // Check for unit-card
        $this->assertStringContainsString(
            'class="unit-card"',
            $src,
            'PRESERVATION FAILED: .unit-card elements must be preserved'
        );

        // Check for flex-based expand-on-hover pattern
        $this->assertStringContainsString(
            'height: 560px',
            $src,
            'PRESERVATION FAILED: unit-strip height must be preserved'
        );

        // Check for hover transition
        $this->assertMatchesRegularExpression(
            '/\.unit-strip .unit-card:hover\s*\{[^}]*flex\s*:\s*[^;]+;/s',
            $src,
            'PRESERVATION FAILED: unit-card hover expansion effect must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.6: Existing Media Query Breakpoints Preservation
    // Validates: Requirement 3.10 — Existing breakpoints must be respected
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that existing media query breakpoints are preserved in hero.css.
     *
     * @group preservation
     * @group breakpoints
     */
    public function test_existing_breakpoints_are_preserved_in_hero_css(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check for 768px mobile breakpoint
        $this->assertStringContainsString(
            '@media (max-width: 768px)',
            $css,
            'PRESERVATION FAILED: @media (max-width: 768px) breakpoint must be preserved'
        );

        // Check for 769px desktop breakpoint
        $this->assertStringContainsString(
            '@media (min-width: 769px)',
            $css,
            'PRESERVATION FAILED: @media (min-width: 769px) breakpoint must be preserved'
        );
    }

    /**
     * Test that existing media query breakpoints are preserved in index.blade.php.
     *
     * @group preservation
     * @group breakpoints
     */
    public function test_existing_breakpoints_are_preserved_in_index_blade(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for 991px tablet breakpoint
        $has991Breakpoint = (bool) preg_match(
            '/@media\s*\(\s*max-width\s*:\s*991px\s*\)/i',
            $src
        );

        $this->assertTrue(
            $has991Breakpoint,
            'PRESERVATION FAILED: @media (max-width: 991px) breakpoint must be preserved'
        );

        // Check for 768px mobile breakpoint
        $has768Breakpoint = (bool) preg_match(
            '/@media\s*\(\s*max-width\s*:\s*768px\s*\)/i',
            $src
        );

        $this->assertTrue(
            $has768Breakpoint,
            'PRESERVATION FAILED: @media (max-width: 768px) breakpoint must be preserved'
        );

        // Check for 639px breakpoint (bento grid)
        $has639Breakpoint = (bool) preg_match(
            '/@media\s*\(\s*max-width\s*:\s*639px\s*\)/i',
            $src
        );

        $this->assertTrue(
            $has639Breakpoint,
            'PRESERVATION FAILED: @media (max-width: 639px) breakpoint must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.7: CSS Custom Properties Preservation
    // Validates: Requirement 3.4 — Design system variables must remain consistent
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that CSS custom properties (design tokens) are preserved.
     *
     * @group preservation
     * @group design-system
     */
    public function test_css_custom_properties_are_preserved(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check for :root declaration
        $this->assertStringContainsString(
            ':root {',
            $css,
            'PRESERVATION FAILED: :root CSS custom properties block must be preserved'
        );

        // Check for key custom properties
        $customProps = [
            '--clr-accent',
            '--clr-bg',
            '--clr-text',
            '--ff-body',
            '--ff-mono',
            '--nav-height',
            '--nav-transition',
        ];

        foreach ($customProps as $prop) {
            $this->assertStringContainsString(
                $prop,
                $css,
                "PRESERVATION FAILED: CSS custom property {$prop} must be preserved"
            );
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.8: Navigation Structure Preservation
    // Validates: Requirement 3.5 — Navigation must continue to work
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that navigation structure and classes are preserved.
     *
     * @group preservation
     * @group navigation
     */
    public function test_navigation_structure_is_preserved(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check for site-nav
        $this->assertStringContainsString(
            '.site-nav',
            $css,
            'PRESERVATION FAILED: .site-nav class must be preserved'
        );

        // Check for nav-logo
        $this->assertStringContainsString(
            '.nav-logo',
            $css,
            'PRESERVATION FAILED: .nav-logo class must be preserved'
        );

        // Check for nav-links
        $this->assertStringContainsString(
            '.nav-links',
            $css,
            'PRESERVATION FAILED: .nav-links class must be preserved'
        );

        // Check for scrolled state
        $this->assertStringContainsString(
            '.site-nav.is-scrolled',
            $css,
            'PRESERVATION FAILED: .site-nav.is-scrolled state must be preserved'
        );

        // Check for backdrop-filter (glassmorphism effect)
        $this->assertStringContainsString(
            'backdrop-filter:',
            $css,
            'PRESERVATION FAILED: Navigation backdrop-filter effect must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.9: Form Elements Preservation
    // Validates: Requirement 3.7 — Form validation must work
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that KPR form structure and input elements are preserved.
     *
     * @group preservation
     * @group forms
     */
    public function test_kpr_form_structure_is_preserved(): void
    {
        $kprPath = $this->root . '/resources/views/perhitungan_kpr.blade.php';
        $this->assertFileExists($kprPath);

        $src = file_get_contents($kprPath);

        // Check for form inputs
        $this->assertStringContainsString(
            'id="propertyPrice"',
            $src,
            'PRESERVATION FAILED: Property price input must be preserved'
        );

        $this->assertStringContainsString(
            'id="downPayment"',
            $src,
            'PRESERVATION FAILED: Down payment input must be preserved'
        );

        $this->assertStringContainsString(
            'id="interestRate"',
            $src,
            'PRESERVATION FAILED: Interest rate input must be preserved'
        );

        $this->assertStringContainsString(
            'id="loanTerm"',
            $src,
            'PRESERVATION FAILED: Loan term input must be preserved'
        );

        // Check for kpr-input class
        $this->assertStringContainsString(
            'class="kpr-input"',
            $src,
            'PRESERVATION FAILED: .kpr-input class styling must be preserved'
        );

        // Check for calculate button
        $this->assertStringContainsString(
            'onclick="calculateKPR()"',
            $src,
            'PRESERVATION FAILED: Calculate button with onclick handler must be preserved'
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // PROPERTY 2.10: Image and Asset References Preservation
    // Validates: Requirement 3.8 — Asset optimization must work
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test that hero image references and asset loading patterns are preserved.
     *
     * @group preservation
     * @group assets
     */
    public function test_hero_image_references_are_preserved(): void
    {
        $indexPath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($indexPath);

        $src = file_get_contents($indexPath);

        // Check for hero first-paint image
        $this->assertStringContainsString(
            'class="hero-first-paint"',
            $src,
            'PRESERVATION FAILED: hero-first-paint image must be preserved'
        );

        // Check for fetchpriority="high" (performance optimization)
        $this->assertStringContainsString(
            'fetchpriority="high"',
            $src,
            'PRESERVATION FAILED: fetchpriority="high" optimization must be preserved'
        );

        // Check for loading="lazy" pattern usage
        $lazyCount = substr_count($src, 'loading="lazy"');
        $this->assertGreaterThan(
            0,
            $lazyCount,
            'PRESERVATION FAILED: Lazy loading optimization must be preserved'
        );

        // Check for asset() helper usage
        $assetCount = substr_count($src, "asset('");
        $this->assertGreaterThan(
            10,
            $assetCount,
            'PRESERVATION FAILED: Laravel asset() helper usage must be preserved'
        );
    }
}
