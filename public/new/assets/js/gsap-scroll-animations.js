/**
 * GSAP Scroll-Driven Animations — Casa Asraya
 * Animasi bergerak SEIRING scroll (scrub), bukan sekali trigger.
 * Scroll turun = reveal, scroll naik = mundur kembali.
 */
(function () {
  'use strict';

  function init() {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    gsap.registerPlugin(ScrollTrigger);

    // ── Helper: scroll-driven reveal ──────────────────────────────────────
    // scrub: true  → ikut kecepatan scroll persis
    // scrub: 0.6   → smooth lag sedikit (lebih enak di mata)
    function scrubReveal(targets, fromVars, triggerOpts) {
      const els = typeof targets === 'string'
        ? Array.from(document.querySelectorAll(targets))
        : (Array.isArray(targets) ? targets : [targets]);

      if (!els.length) return;

      els.forEach(function (el, i) {
        const staggerDelay = (fromVars.stagger || 0) * i;

        gsap.fromTo(el,
          // FROM state (hidden)
          Object.assign({ opacity: 0, y: 40 }, fromVars, { stagger: undefined }),
          // TO state (visible)
          {
            opacity: 1,
            y: 0,
            x: 0,
            scale: 1,
            duration: 1,
            ease: 'none',   // ease:none penting untuk scrub agar linear mengikuti scroll
            scrollTrigger: Object.assign({
              trigger: el,
              start: 'top 88%',
              end: 'top 45%',
              scrub: 0.6,    // 0.6s lag — smooth tapi masih scroll-driven
            }, triggerOpts),
            delay: staggerDelay,
          }
        );
      });
    }

    // ── Helper: scale+fade untuk card/image ──────────────────────────────
    function scrubScale(targets, triggerOpts) {
      scrubReveal(targets, { y: 50, scale: 0.93 }, triggerOpts);
    }

    // ──────────────────────────────────────────────────────────────────────
    // UNIVERSAL: data-gsap attribute
    // ──────────────────────────────────────────────────────────────────────
    document.querySelectorAll('[data-gsap]').forEach(function (el) {
      const type = el.getAttribute('data-gsap');
      const from = { opacity: 0 };

      if (type === 'fade-up')    { from.y = 40; }
      if (type === 'fade-down')  { from.y = -40; }
      if (type === 'fade-left')  { from.x = 50; }
      if (type === 'fade-right') { from.x = -50; }
      if (type === 'scale')      { from.scale = 0.9; from.y = 20; }

      const to = Object.assign({ opacity: 1, y: 0, x: 0, scale: 1, ease: 'none',
        scrollTrigger: {
          trigger: el,
          start: 'top 88%',
          end:   'top 45%',
          scrub: 0.6,
        }
      });

      gsap.fromTo(el, from, to);
    });

    // ──────────────────────────────────────────────────────────────────────
    // INDEX PAGE
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('#home')) {
      // Header text
      scrubReveal('#home .container > div:first-child h2', { y: 30 });
      scrubReveal('#home .container > div:first-child p',  { y: 20 }, { start: 'top 85%', end: 'top 50%' });

      // Bento grid: setiap cell muncul seiring scroll
      scrubScale('.ab-bento-grid > *');
    }

    if (document.querySelector('#about')) {
      scrubReveal('#about .text-center > *', { y: 25, stagger: 0.05 });
      scrubScale('#about .col-md-5 > div');
    }

    if (document.querySelector('#tipe-unit')) {
      scrubReveal('#tipe-unit .container > div:first-child > div > h2', { y: 28 });
      scrubScale('.unit-card');
    }

    if (document.querySelector('.facility-item')) {
      scrubReveal('.facility-item', { y: 35, scale: 0.85, stagger: 0.04 });
    }

    // ──────────────────────────────────────────────────────────────────────
    // FEATURED HOUSE
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('.unit-info')) {
      scrubScale('.unit-card');
      scrubReveal('.unit-info', { y: 24, stagger: 0.05 });
    }

    // ──────────────────────────────────────────────────────────────────────
    // FACILITY & UNIT PAGES (gym, spool, clubhouse, dll)
    // ──────────────────────────────────────────────────────────────────────

    // Content image panels
    document.querySelectorAll(
      '.col-lg-5 > div[style*="border-radius:2.5rem"], .col-lg-6 > div[style*="border-radius:2.5rem"], .col-lg-7 > div[style*="border-radius:2.5rem"]'
    ).forEach(function (el) {
      gsap.fromTo(el,
        { opacity: 0, y: 50, scale: 0.94 },
        { opacity: 1, y: 0,  scale: 1,
          ease: 'none',
          scrollTrigger: { trigger: el, start: 'top 85%', end: 'top 40%', scrub: 0.6 }
        }
      );
    });

    // Text columns
    scrubReveal('.col-lg-6 h2, .col-lg-7 h2, .col-lg-5 h2', { y: 24 });
    scrubReveal('.col-lg-6 p,  .col-lg-7 p,  .col-lg-5 p',  { y: 16, stagger: 0.04 });
    scrubReveal('.col-lg-6 a[style*="border-radius:9999px"], .col-lg-7 a[style*="border-radius:9999px"]', { y: 12 });

    // ──────────────────────────────────────────────────────────────────────
    // CENDANA / MAHOGANY
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('.floor-card')) {
      scrubScale('.floor-card');
    }
    if (document.querySelector('.slide-thumb')) {
      scrubScale('.col-lg-7 > div[style*="border-radius:2.5rem"]');
      scrubScale('.col-lg-5 > div[style*="background:#1a3a2e"]');
    }

    // ──────────────────────────────────────────────────────────────────────
    // KPR CALCULATOR
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('#propertyPrice')) {
      scrubReveal('.col-lg-6 > div[style*="border-radius:2.5rem"]', { y: 30, stagger: 0.05 });
    }

    // ──────────────────────────────────────────────────────────────────────
    // GALERI
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('.gallery a')) {
      document.querySelectorAll('.gallery a, [style*="grid-template-columns:repeat"] > div').forEach(function (el, i) {
        gsap.fromTo(el,
          { opacity: 0, scale: 0.88, y: 30 },
          { opacity: 1, scale: 1,    y: 0,
            ease: 'none',
            scrollTrigger: {
              trigger: el,
              start: 'top 90%',
              end:   'top 60%',
              scrub: 0.5,
            }
          }
        );
      });
    }

    // ──────────────────────────────────────────────────────────────────────
    // FAQ
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('.accordion-item, .faq-item')) {
      scrubReveal('.accordion-item, .faq-item', { y: 20, stagger: 0.04 });
    }

    // ──────────────────────────────────────────────────────────────────────
    // VIDEO CARDS
    // ──────────────────────────────────────────────────────────────────────
    if (document.querySelector('.video-card')) {
      scrubScale('.video-card');
    }

    // ──────────────────────────────────────────────────────────────────────
    // FOOTER columns
    // ──────────────────────────────────────────────────────────────────────
    scrubReveal('footer .col-lg-3', { y: 28, stagger: 0.06 });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () { setTimeout(init, 120); });
  } else {
    setTimeout(init, 120);
  }

  // Refresh ScrollTrigger setelah semua resource (terutama video/gambar) dimuat penuh
  window.addEventListener('load', function() {
    setTimeout(function() {
      if (typeof ScrollTrigger !== 'undefined') {
        ScrollTrigger.refresh();
      }
    }, 500);
  });

})();
