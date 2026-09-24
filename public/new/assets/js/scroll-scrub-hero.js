/**
 * Asraya Scroll-Scrub Hero
 * Canvas-based scroll-driven image-sequence animation
 *
 * Preloads 120 WebP frames, maps scroll position to frame index,
 * and draws to a <canvas> using requestAnimationFrame debouncing.
 * Crops the bottom-right Veo watermark during draw.
 */
(function () {
  'use strict';

  // ── Configuration ──────────────────────────────────────────────────────
  const CONFIG = {
    frameCount: 120,
    framePath: '/new/assets/asraya-hero-frames/frame-',
    frameExt: '.webp',
    // Native frame dimensions
    frameWidth: 960,
    frameHeight: 540,
    // Crop dimensions (removes bottom-right watermark)
    cropWidth: 920,
    cropHeight: 520,
    cropX: 0,
    cropY: 0,
    // Scroll stage height in vh units
    stageHeightVh: 400,
    // Nav scroll threshold
    navScrollThreshold: 60,
    // Caption fade threshold (0–1 scroll progress)
    captionFadeAt: 0.15,
  };

  // ── DOM Elements ───────────────────────────────────────────────────────
  const canvas = document.getElementById('heroCanvas');
  const ctx = canvas ? canvas.getContext('2d', { alpha: false }) : null;
  const scrollStage = document.getElementById('scrollStage');
  const firstPaintImg = document.getElementById('heroFirstPaint');
  const loaderEl = document.getElementById('heroLoader');
  const loaderText = document.getElementById('loaderPercent');
  const loaderBarFill = document.getElementById('loaderBarFill');
  const captionEl = document.getElementById('heroCaption');
  const scrollIndicator = document.getElementById('scrollIndicator');
  const siteNav = document.getElementById('siteNav');
  const navHamburger = document.getElementById('navHamburger');
  const mobileNavPanel = document.getElementById('mobileNavPanel');
  const mobileNavOverlay = document.getElementById('mobileNavOverlay');

  if (!canvas || !ctx || !scrollStage) {
    console.warn('[ScrollScrubHero] Required DOM elements not found.');
    return;
  }

  // ── State ──────────────────────────────────────────────────────────────
  const frames = [];
  let loadedCount = 0;
  let allLoaded = false;
  let ticking = false;
  let currentFrameIndex = 0;
  let prefersReducedMotion = false;

  // ── Utilities ──────────────────────────────────────────────────────────
  function padNumber(n, width) {
    return String(n).padStart(width, '0');
  }

  function getFrameSrc(index) {
    return CONFIG.framePath + padNumber(index, 4) + CONFIG.frameExt;
  }

  function clamp(val, min, max) {
    return Math.max(min, Math.min(max, val));
  }

  // ── Canvas Sizing ──────────────────────────────────────────────────────
  function setCanvasSize() {
    // Use crop dimensions as backing store (no upscaling)
    canvas.width = CONFIG.cropWidth;
    canvas.height = CONFIG.cropHeight;
  }

  // ── Frame Drawing ──────────────────────────────────────────────────────
  function drawFrame(index) {
    const frame = frames[index];
    // If target frame not ready, find the nearest loaded frame to avoid blank canvas
    let usedFrame = frame;
    if (!frame || !frame.complete || !frame.naturalWidth) {
      // Walk backward to find a loaded frame
      for (let i = index - 1; i >= 0; i--) {
        if (frames[i] && frames[i].complete && frames[i].naturalWidth) {
          usedFrame = frames[i];
          break;
        }
      }
    }
    if (!usedFrame || !usedFrame.complete || !usedFrame.naturalWidth) return;

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(
      usedFrame,
      CONFIG.cropX, CONFIG.cropY,
      CONFIG.cropWidth, CONFIG.cropHeight,
      0, 0,
      canvas.width, canvas.height
    );
  }

  // ── Scroll Progress Calculation ────────────────────────────────────────
  function getScrollProgress() {
    if (!scrollStage) return 0;
    const rect = scrollStage.getBoundingClientRect();
    const stageHeight = scrollStage.offsetHeight;
    const viewportHeight = window.innerHeight;
    // progress goes from 0 (stage top at viewport top) to 1 (stage bottom at viewport bottom)
    const scrolled = -rect.top;
    const total = stageHeight - viewportHeight;
    return clamp(scrolled / total, 0, 1);
  }

  // ── Scroll Handler ─────────────────────────────────────────────────────
  function onScroll() {
    if (ticking) return;
    ticking = true;

    requestAnimationFrame(function () {
      // Nav background
      if (siteNav) {
        if (window.scrollY > CONFIG.navScrollThreshold) {
          siteNav.classList.add('is-scrolled');
        } else {
          siteNav.classList.remove('is-scrolled');
        }
      }

      // Frame scrubbing and text chapters
      if (allLoaded) {
        const progress = getScrollProgress();
        const frameIndex = Math.min(
          Math.floor(progress * CONFIG.frameCount),
          CONFIG.frameCount - 1
        );

        if (frameIndex !== currentFrameIndex && !prefersReducedMotion) {
          currentFrameIndex = frameIndex;
          drawFrame(frameIndex);
        }

        // Chapters logic
        const chapters = document.querySelectorAll('.hero-chapter');
        if (chapters.length > 0) {
          chapters.forEach(function(chap, index) {
            let active = false;
            let past = false;
            
            // Chapter 1: 1-25
            if (index === 0) {
              if (frameIndex >= 0 && frameIndex <= 25) active = true;
              else if (frameIndex > 25) past = true;
            }
            // Chapter 2: 36-55
            else if (index === 1) {
              if (frameIndex >= 36 && frameIndex <= 55) active = true;
              else if (frameIndex > 55) past = true;
            }
            // Chapter 3: 66-85
            else if (index === 2) {
              if (frameIndex >= 66 && frameIndex <= 85) active = true;
              else if (frameIndex > 85) past = true;
            }
            // Chapter 4: 96-120
            else if (index === 3) {
              if (frameIndex >= 96) active = true;
            }

            if (active) {
              chap.classList.add('is-active');
              chap.classList.remove('is-past');
            } else if (past) {
              chap.classList.remove('is-active');
              chap.classList.add('is-past');
            } else {
              chap.classList.remove('is-active');
              chap.classList.remove('is-past');
            }
          });
        }

        // Scroll indicator fade
        if (scrollIndicator) {
          if (progress > 0.05) {
            scrollIndicator.classList.add('is-hidden');
          } else {
            scrollIndicator.classList.remove('is-hidden');
          }
        }
      }

      ticking = false;
    });
  }

  // ── Frame Preloading ───────────────────────────────────────────────────
  // Progressive loading: load first PRIORITY_COUNT frames first so the
  // animation becomes interactive quickly, then load the rest in background.
  const PRIORITY_COUNT = 15;

  function loadSingleFrame(i, onDone) {
    const img = new Image();
    // Store immediately so drawFrame can access it as soon as img.complete
    frames[i - 1] = img;

    img.onload = async function () {
      if ('decode' in img) {
        try { await img.decode(); } catch(e) {}
      }
      loadedCount++;
      const pct = Math.round((loadedCount / CONFIG.frameCount) * 100);
      if (loaderText) loaderText.textContent = pct + '%';
      if (loaderBarFill) loaderBarFill.style.width = pct + '%';
      if (onDone) onDone();
    };

    img.onerror = function () {
      loadedCount++;
      console.warn('[ScrollScrubHero] Failed to load: ' + img.src);
      if (onDone) onDone();
    };

    img.src = getFrameSrc(i);
  }

  function preloadFrames() {
    let priorityLoaded = 0;

    function onPriorityDone() {
      priorityLoaded++;
      // Once priority frames are ready, allow scrubbing and load the rest lazily
      if (priorityLoaded === PRIORITY_COUNT) {
        // Show 100% on loader before hiding — feels snappy
        if (loaderText) loaderText.textContent = '100%';
        if (loaderBarFill) loaderBarFill.style.width = '100%';
        allLoaded = true;
        onAllFramesLoaded();
        // Load remaining frames in background without blocking interaction
        loadRemainingFrames();
      }
    }

    // Load first PRIORITY_COUNT frames with high priority
    for (let i = 1; i <= PRIORITY_COUNT; i++) {
      loadSingleFrame(i, onPriorityDone);
    }
  }

  function loadRemainingFrames() {
    // Use requestIdleCallback when available for truly background loading
    const schedule = window.requestIdleCallback
      ? function(fn) { window.requestIdleCallback(fn, { timeout: 2000 }); }
      : function(fn) { setTimeout(fn, 200); };

    let i = PRIORITY_COUNT + 1;

    function loadNext() {
      if (i > CONFIG.frameCount) return;
      loadSingleFrame(i, null);
      i++;
      // Stagger: load one frame per idle period to avoid blocking main thread
      schedule(loadNext);
    }

    schedule(loadNext);
  }

  function onAllFramesLoaded() {
    // Hide loader dengan smooth fade
    if (loaderEl) {
      setTimeout(function() {
        loaderEl.classList.add('is-loaded');
      }, 100);
    }

    // Hide first-paint static image
    if (firstPaintImg) {
      setTimeout(function() {
        firstPaintImg.classList.add('is-hidden');
      }, 200);
    }

    // Set canvas size and draw initial frame
    setCanvasSize();

    // Draw based on current scroll position
    const progress = getScrollProgress();
    currentFrameIndex = Math.min(
      Math.floor(progress * CONFIG.frameCount),
      CONFIG.frameCount - 1
    );
    
    if (prefersReducedMotion) {
      // Show static midpoint frame
      drawFrame(Math.floor(CONFIG.frameCount / 2));
    } else {
      drawFrame(currentFrameIndex);
    }

    // Bind scroll so scrubbing and text chapters work
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // ── Intersection Observer for lazy preload trigger ─────────────────────
  function initIntersectionObserver() {
    if (!('IntersectionObserver' in window)) {
      // Fallback: preload immediately
      preloadFrames();
      return;
    }

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            preloadFrames();
            observer.disconnect();
          }
        });
      },
      {
        rootMargin: '200px 0px',
        threshold: 0,
      }
    );

    observer.observe(scrollStage);
  }

  // ── Mobile Nav Toggle ──────────────────────────────────────────────────
  function initMobileNav() {
    if (!navHamburger || !mobileNavPanel || !mobileNavOverlay) return;

    function openMobileNav() {
      navHamburger.classList.add('is-active');
      mobileNavPanel.classList.add('is-open');
      mobileNavOverlay.classList.add('is-visible');
      document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
      navHamburger.classList.remove('is-active');
      mobileNavPanel.classList.remove('is-open');
      mobileNavOverlay.classList.remove('is-visible');
      document.body.style.overflow = '';
    }

    navHamburger.addEventListener('click', function () {
      if (mobileNavPanel.classList.contains('is-open')) {
        closeMobileNav();
      } else {
        openMobileNav();
      }
    });

    mobileNavOverlay.addEventListener('click', closeMobileNav);

    // Close mobile nav when clicking a link
    mobileNavPanel.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMobileNav);
    });
  }

  // ── Nav Scroll (always active, not just when frames loaded) ────────────
  function initNavScroll() {
    window.addEventListener('scroll', function () {
      if (!siteNav) return;
      if (window.scrollY > CONFIG.navScrollThreshold) {
        siteNav.classList.add('is-scrolled');
      } else {
        siteNav.classList.remove('is-scrolled');
      }
    }, { passive: true });
  }

  // ── Resize Handler ─────────────────────────────────────────────────────
  function initResize() {
    let resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        if (allLoaded) {
          setCanvasSize();
          drawFrame(currentFrameIndex);
        }
      }, 150);
    });
  }

  // ── Init ───────────────────────────────────────────────────────────────
  function init() {
    // Check reduced motion preference
    const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    prefersReducedMotion = motionQuery.matches;

    motionQuery.addEventListener('change', function (e) {
      prefersReducedMotion = e.matches;
      if (prefersReducedMotion && allLoaded) {
        drawFrame(Math.floor(CONFIG.frameCount / 2));
      } else if (!prefersReducedMotion && allLoaded) {
        onScroll();
      }
    });

    // Initialize modules
    initNavScroll();
    initMobileNav();
    initResize();
    initIntersectionObserver();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
