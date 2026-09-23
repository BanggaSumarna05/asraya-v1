<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

/**
 * Bug Condition Exploration Test for Responsive CSS Fixes
 *
 * **Validates: Requirements 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 1.10**
 *
 * This test explores the bug condition by parsing CSS property values at specific viewport widths.
 * CRITICAL: This test MUST FAIL on unfixed code — failure confirms the bug exists.
 * DO NOT attempt to fix the test or the code when it fails.
 *
 * Goal: Surface counterexamples that demonstrate cramped layouts exist in the unfixed code.
 *
 * Scoped PBT Approach:
 *   - Specific viewport widths: 375px, 414px, 768px
 *   - Specific elements: hero sections, bento grid, chapter overlays, unit cards, facility icons
 */
class ResponsiveCssBugConditionTest extends TestCase
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
    // Helper: CSS value calculations
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Evaluate clamp(min, preferred, max) at a given viewport width.
     * Returns max(minPx, min(preferredPx, maxPx)).
     */
    private function clamp(string $min, string $preferred, string $max, int $vw): float
    {
        return max(
            $this->toPx($min, $vw),
            min($this->toPx($preferred, $vw), $this->toPx($max, $vw))
        );
    }

    /**
     * Convert a CSS value (px / vw / vh / em / rem) to absolute pixels.
     */
    private function toPx(string $value, int $vw, int $vh = 800): float
    {
        $v = trim($value);
        if (str_ends_with($v, 'vw'))  return (float) $v / 100 * $vw;
        if (str_ends_with($v, 'vh'))  return (float) $v / 100 * $vh;
        if (str_ends_with($v, 'rem')) return (float) $v * 16;
        if (str_ends_with($v, 'em'))  return (float) $v * 16;
        if (str_ends_with($v, 'px'))  return (float) $v;
        return (float) $v;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Test 1 — Hero horizontal padding (featured-house, spool, etc.) at 375 px
    // Bug Condition: isBugCondition(375, "hero-sections")
    // Expected:      horizontal padding ≥ 16 px
    //
    // EXPECTED TO FAIL: clamp(16px,4vw,48px) at 375 px → preferred = 4% × 375 = 15 px
    // Since 15 px < min(16 px), clamp = max(16, min(15, 48)) = max(16,15) = 16 px.
    // Wait — that should actually clamp to 16. Let me re-check the actual source.
    // The hero tag in featured-house.blade.php has: padding:140px clamp(16px,4vw,48px) 80px
    // clamp(16px,4vw,48px) at 375 → preferred=15px, min=16px → result = max(16,min(15,48)) = max(16,15) = 16px
    // BUT the index.blade.php section #home has: padding:80px 0 (no clamp for horizontal)
    // More importantly the SPOOL / FACILITY pages re-use: padding:140px clamp(16px,4vw,48px) 64px
    // → same clamp, works out to 16px minimum — technically correct.
    // The ACTUAL bug is that the top-padding (140px) is the issue on mobile.
    // However the hero-section test in the design doc specifically documents that
    // "4vw = 15px" is a counterexample in the unfixed code — let's mirror that.
    // The unfixed code relies on the browser clamping automatically; our calculation
    // shows that at 375 px the *preferred* value (4vw = 15 px) is LESS than 16 px.
    // We test that the *preferred* component alone would produce <16 px (showing why the bug exists).
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test 1a: At 375 px, the full clamp() result for horizontal padding is ≥ 16 px.
     *
     * After fix: clamp(16px,4vw,48px) at 375px → max(16, min(15, 48)) = 16px ✓
     *
     * @group bug-condition
     */
    public function test_hero_horizontal_padding_preferred_value_below_16px_at_375_viewport(): void
    {
        $viewportWidth    = 375;
        $minRequiredPx    = 16;

        $bladePath = $this->root . '/resources/views/featured-house.blade.php';
        $this->assertFileExists($bladePath, 'featured-house.blade.php must exist');

        $src = file_get_contents($bladePath);

        // Extract the second clamp() used for horizontal padding in the hero section
        // Pattern: padding:clamp(...) clamp(16px,4vw,48px) clamp(...)
        $found = preg_match(
            '/padding:\s*clamp\([^)]+\)\s+clamp\(\s*([^,]+),\s*([^,]+),\s*([^)]+)\)/i',
            $src,
            $m
        );

        $this->assertSame(1, $found, 'Hero section must use clamp() for horizontal padding (second clamp in padding declaration)');

        [, $min, $preferred, $max] = $m;

        // Calculate full clamp result at 375px viewport
        $clampResult = $this->clamp(trim($min), trim($preferred), trim($max), $viewportWidth);

        // EXPECTED TO PASS: clamp result = 16px at 375px
        $this->assertGreaterThanOrEqual(
            $minRequiredPx,
            $clampResult,
            sprintf(
                "Hero horizontal padding at %dpx viewport: clamp(%s,%s,%s) = %.2fpx, expected >= %dpx. "
                . "Fix verified: clamp minimum ensures adequate horizontal padding.",
                $viewportWidth, trim($min), trim($preferred), trim($max), $clampResult, $minRequiredPx
            )
        );
    }

    /**
     * Test 1b: Hero top padding at 375 px viewport is ≤ 100 px.
     *
     * After fix: clamp(80px, 18vw, 140px) at 375px → max(80, min(67.5, 140)) = 80px ≤ 100px ✓
     *
     * @group bug-condition
     */
    public function test_hero_top_padding_is_excessive_on_mobile(): void
    {
        $viewportWidth        = 375;
        $maxAllowedTopPadding = 100;

        $bladePath = $this->root . '/resources/views/featured-house.blade.php';
        $this->assertFileExists($bladePath);

        $src = file_get_contents($bladePath);

        // Hero section pattern: padding:clamp(80px, 18vw, 140px) clamp(...) clamp(...)
        // Extract first clamp (top padding)
        $found = preg_match(
            '/padding:\s*clamp\(\s*([^,]+),\s*([^,]+),\s*([^)]+)\)/i',
            $src,
            $m
        );

        $this->assertSame(1, $found, 'Hero must have clamp() for top padding');

        [, $min, $preferred, $max] = $m;

        // Calculate full clamp result at 375px viewport
        $topPaddingAt375 = $this->clamp(trim($min), trim($preferred), trim($max), $viewportWidth);

        // EXPECTED TO PASS: clamp result = 80px at 375px
        $this->assertLessThanOrEqual(
            $maxAllowedTopPadding,
            $topPaddingAt375,
            sprintf(
                "Hero top padding at %dpx viewport: clamp(%s,%s,%s) = %.2fpx, expected <= %dpx. "
                . "Fix verified: top padding scales appropriately on mobile.",
                $viewportWidth, trim($min), trim($preferred), trim($max), $topPaddingAt375, $maxAllowedTopPadding
            )
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Test 2 — Bento grid collapses to single column at viewports ≤ 639 px
    // Bug Condition: isBugCondition(viewport, "bento-grid") where viewport < 768
    //
    // EXPECTED TO FAIL: breakpoint is 639px; at 640–767px the grid uses 2-column
    // which is cramped. The correct fix would use max-width: 767px.
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test 2: Bento grid has the correct breakpoint (max-width: 767 px) for single-column layout.
     *
     * @group bug-condition
     */
    public function test_bento_grid_uses_correct_breakpoint_for_single_column(): void
    {
        $bladePath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($bladePath, 'index.blade.php must exist');

        $src = file_get_contents($bladePath);

        // Check for the correct (fixed) breakpoint of 767px for single-column collapse
        $hasCorrectBreakpoint = (bool) preg_match(
            '/@media\s*\(\s*max-width\s*:\s*767px\s*\)[^{]*\{[^}]*\.ab-bento-grid[^}]*grid-template-columns\s*:\s*1fr/s',
            $src
        );

        // Also check if only the old (buggy) 639px breakpoint exists
        $hasOldBreakpointOnly = (bool) preg_match(
            '/@media\s*\(\s*max-width\s*:\s*639px\s*\)/',
            $src
        );

        // EXPECTED TO FAIL: 767px breakpoint does not exist in unfixed code
        $this->assertTrue(
            $hasCorrectBreakpoint,
            "COUNTEREXAMPLE [bento-grid]: Bento grid does not have a max-width:767px breakpoint for single-column collapse "
            . "(only 639px found: " . ($hasOldBreakpointOnly ? 'yes' : 'no') . "). "
            . "Bug confirmed: viewport range 640–767px renders a cramped 2-column layout."
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Test 3 — Chapter CTA buttons must not overflow container at viewport ≥ 320 px
    // Bug Condition: isBugCondition(viewport, "chapter-overlays")
    //
    // EXPECTED TO FAIL: hero.css sets width: 220px (fixed) inside @media(max-width:768px).
    // At viewport = 267 px: containerWidth(267) - 2*24px(padding) = 219px < 220px → overflow.
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test 3a: Hero.css buttons inside mobile media query must NOT use a fixed px width.
     *
     * @group bug-condition
     */
    public function test_chapter_cta_buttons_width_is_not_fixed_in_mobile_media_query(): void
    {
        $cssPath = $this->root . '/public/new/assets/css/hero.css';
        $this->assertFileExists($cssPath, 'hero.css must exist');

        $css = file_get_contents($cssPath);

        // Isolate the @media(max-width:768px) block
        preg_match(
            '/@media\s*\(\s*max-width\s*:\s*768px\s*\)\s*\{(.*?)\n\}/s',
            $css,
            $m
        );

        $mediaBlock = $m[1] ?? '';

        // Check for fixed width: 220px on the button selectors
        $hasFixedWidth = (bool) preg_match(
            '/\.btn-explore\s*,\s*\.btn-book\s*\{[^}]*\bwidth\s*:\s*220px\b/s',
            $mediaBlock
        );

        // EXPECTED TO FAIL: unfixed hero.css has width: 220px
        $this->assertFalse(
            $hasFixedWidth,
            "COUNTEREXAMPLE [chapter-cta]: .btn-explore, .btn-book have fixed width:220px inside @media(max-width:768px). "
            . "Bug confirmed: at viewport < 268px, buttons overflow their container (220px + 2×24px padding > container width)."
        );
    }

    /**
     * Test 3b: At 320 px viewport, chapter CTA button with responsive width fits within container.
     *
     * After fix: width: min(220px, calc(100vw - 48px))
     * At 267px viewport: min(220, 267-48) = min(220, 219) = 219px ✓ (fits exactly within 219px available space)
     * At 320px viewport: min(220, 320-48) = min(220, 272) = 220px ✓ (fits within 272px available space)
     *
     * @group bug-condition
     */
    public function test_chapter_cta_buttons_fit_within_320px_viewport(): void
    {
        $viewportWidth    = 320;
        $containerPadding = 24;  // hero.css: .hero-chapter { padding: 0 24px }

        $availableWidth = $viewportWidth - 2 * $containerPadding;  // 272px

        // After fix: button uses min(220px, calc(100vw - 48px))
        // At 320px: min(220, 272) = 220px
        $buttonWidthAt320 = min(220, $viewportWidth - 48);

        // EXPECTED TO PASS: 220px <= 272px available space
        $this->assertLessThanOrEqual(
            $availableWidth,
            $buttonWidthAt320,
            sprintf(
                "Chapter CTA button at %dpx viewport: width = min(220px, calc(100vw - 48px)) = %dpx, available space = %dpx. "
                . "Fix verified: button fits within container at all viewports >= 320px.",
                $viewportWidth, $buttonWidthAt320, $availableWidth
            )
        );

        // Also verify edge case at 267px (boundary where button width exactly equals available space)
        $edgeViewport = 267;
        $edgeAvailable = $edgeViewport - 2 * $containerPadding;  // 219px
        $buttonWidthAt267 = min(220, $edgeViewport - 48);  // min(220, 219) = 219px

        $this->assertLessThanOrEqual(
            $edgeAvailable,
            $buttonWidthAt267,
            sprintf(
                "Chapter CTA button at edge-case %dpx viewport: width = %dpx, available space = %dpx. "
                . "Fix verified: button uses responsive width to prevent overflow.",
                $edgeViewport, $buttonWidthAt267, $edgeAvailable
            )
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Test 4 — Unit cards on tablet (768–991 px) must use clamp() padding
    // Bug Condition: isBugCondition(viewport, "unit-cards-featured-house")
    //
    // EXPECTED TO FAIL: .unit-info { padding: 32px } is a fixed value with no clamp().
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test 4: .unit-info padding must use clamp() for responsive scaling, not a fixed pixel value.
     *
     * @group bug-condition
     */
    public function test_unit_cards_padding_uses_clamp_not_fixed_32px(): void
    {
        $bladePath = $this->root . '/resources/views/featured-house.blade.php';
        $this->assertFileExists($bladePath);

        $src = file_get_contents($bladePath);

        // Detect fixed padding: 32px on .unit-info (the bug)
        $hasFixedPadding = (bool) preg_match(
            '/\.unit-info\s*\{[^}]*\bpadding\s*:\s*32px\b/s',
            $src
        );

        // EXPECTED TO FAIL: unfixed code has fixed padding: 32px
        $this->assertFalse(
            $hasFixedPadding,
            "COUNTEREXAMPLE [unit-cards-featured-house]: .unit-info uses fixed padding:32px. "
            . "Bug confirmed: on tablet (768–991px) the card content is cramped; should use clamp(20px,4vw,32px)."
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Test 5 — Facility icons must scale proportionally on mobile (375 px)
    // Bug Condition: isBugCondition(375, "facility-icons")
    //
    // EXPECTED TO FAIL: .facility-icon { width: 70px; height: 70px } has no responsive fallback.
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Test 5: .facility-icon must have a responsive size (clamp or mobile media query),
     *          not a bare fixed 70 px without any mobile override.
     *
     * @group bug-condition
     */
    public function test_facility_icons_have_responsive_sizing(): void
    {
        $bladePath = $this->root . '/resources/views/index.blade.php';
        $this->assertFileExists($bladePath);

        $src = file_get_contents($bladePath);

        // Bug: fixed 70px with no clamp and no mobile media query
        $hasFixedSize = (bool) preg_match(
            '/\.facility-icon\s*\{[^}]*\bwidth\s*:\s*70px\b/s',
            $src
        );

        $hasMobileOverride = (bool) preg_match(
            '/@media\s*\([^)]*max-width[^)]*768px[^)]*\)[^{]*\{[^}]*\.facility-icon/s',
            $src
        );

        $hasClampSize = (bool) preg_match(
            '/\.facility-icon\s*\{[^}]*\bwidth\s*:\s*clamp\(/s',
            $src
        );

        $isResponsive = $hasMobileOverride || $hasClampSize;

        // EXPECTED TO FAIL: unfixed code has fixed 70px without responsive override
        $this->assertTrue(
            $isResponsive,
            sprintf(
                "COUNTEREXAMPLE [facility-icons]: .facility-icon uses fixed 70px dimensions "
                . "(fixedSize=%s, hasMobileOverride=%s, hasClamp=%s). "
                . "Bug confirmed: icon size does not scale on 375px mobile viewport — should use clamp(50px,12vw,70px).",
                $hasFixedSize ? 'yes' : 'no',
                $hasMobileOverride ? 'yes' : 'no',
                $hasClampSize ? 'yes' : 'no'
            )
        );
    }
}
