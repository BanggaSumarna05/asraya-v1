/**
 * Image Trail Effect — Casa Asraya Unit Strip
 * Foto-foto unit muncul mengikuti cursor saat hover di section #tipe-unit
 * Pakai object pooling — tidak ada create/destroy DOM, hanya recycle
 */
(function () {
  'use strict';

  // Skip touch devices
  if (window.matchMedia('(hover: none)').matches) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  // ── Image pool ─────────────────────────────────────────────────────────
  const IMAGES = [
    '/img/mahogany/mahogany-interior-0.jpg',
    '/img/mahogany/F7.jpg',
    '/img/cendana/cendana-interior.jpg',
    '/img/cendana/cendana-interior-0.jpg',
    '/img/cendana/cendana-units (1).jpeg',
    '/img/cendana/cendana-units (2).jpeg',
    '/img/cendana/cendana-units (3).jpeg',
    '/img/cendana/f10-1.jpg',
    '/img/mahogany/floor side.jpg',
    '/img/cendana/cendana-b.png',
  ];

  const POOL_SIZE   = 8;     // max elemen aktif sekaligus
  const TRAIL_DELAY = 80;    // ms antar spawn (throttle)
  const IMG_W       = 160;   // px width setiap trail image
  const IMG_H       = 110;   // px height setiap trail image

  // ── State ──────────────────────────────────────────────────────────────
  let pool        = [];
  let poolIndex   = 0;
  let imgIndex    = 0;
  let lastSpawn   = 0;
  let lastX       = 0;
  let lastY       = 0;
  let isActive    = false;

  // ── Build pool ─────────────────────────────────────────────────────────
  function buildPool() {
    const container = document.createElement('div');
    container.id = 'trail-container';
    container.style.cssText = [
      'position:fixed',
      'inset:0',
      'pointer-events:none',
      'z-index:9990',
      'overflow:hidden',
    ].join(';');
    document.body.appendChild(container);

    for (let i = 0; i < POOL_SIZE; i++) {
      const el = document.createElement('div');
      el.className = 'trail-img';
      el.style.cssText = [
        'position:absolute',
        'width:'  + IMG_W + 'px',
        'height:' + IMG_H + 'px',
        'border-radius:16px',
        'overflow:hidden',
        'opacity:0',
        'pointer-events:none',
        'will-change:transform,opacity',
        'box-shadow:0 12px 40px rgba(0,0,0,0.25)',
        'border:1px solid rgba(255,255,255,0.12)',
      ].join(';');

      const img = document.createElement('img');
      img.style.cssText = 'width:100%;height:100%;object-fit:cover;display:block;';
      el.appendChild(img);
      container.appendChild(el);
      pool.push({ el, img, active: false });
    }
  }

  // ── Spawn one trail item ───────────────────────────────────────────────
  function spawnAt(x, y) {
    const item = pool[poolIndex % POOL_SIZE];
    poolIndex++;

    const src = IMAGES[imgIndex % IMAGES.length];
    imgIndex++;

    // Random slight rotation & vertical offset
    const rot    = (Math.random() - 0.5) * 18;   // -9deg to +9deg
    const offY   = (Math.random() - 0.5) * 20;   // ±10px vertical scatter
    const scale  = 0.88 + Math.random() * 0.18;  // 0.88 – 1.06

    item.img.src = src;
    item.el.style.left = (x - IMG_W / 2) + 'px';
    item.el.style.top  = (y - IMG_H / 2 + offY) + 'px';
    item.el.style.transform = 'rotate(' + rot + 'deg) scale(' + scale + ')';
    item.el.style.opacity   = '0';
    item.el.style.transition = 'none';

    // Force reflow then animate in
    void item.el.offsetWidth;
    item.el.style.transition = 'opacity 0.18s ease, transform 0.18s ease';
    item.el.style.opacity    = '1';
    item.el.style.transform  = 'rotate(' + rot + 'deg) scale(1)';

    // Fade out after 550ms
    clearTimeout(item._timeout);
    item._timeout = setTimeout(function () {
      item.el.style.transition = 'opacity 0.4s ease, transform 0.5s ease';
      item.el.style.opacity    = '0';
      item.el.style.transform  = 'rotate(' + rot + 'deg) scale(0.92) translateY(12px)';
    }, 550);
  }

  // ── Mouse handlers ─────────────────────────────────────────────────────
  function onMouseMove(e) {
    if (!isActive) return;

    const now = Date.now();
    if (now - lastSpawn < TRAIL_DELAY) return;

    // Only spawn if cursor moved enough (avoid spawning on tiny jitter)
    const dx = e.clientX - lastX;
    const dy = e.clientY - lastY;
    if (Math.abs(dx) < 6 && Math.abs(dy) < 6) return;

    lastX     = e.clientX;
    lastY     = e.clientY;
    lastSpawn = now;

    // Coordinates relative to viewport (container is fixed)
    spawnAt(e.clientX, e.clientY);
  }

  // ── Init after DOM ready ───────────────────────────────────────────────
  function init() {
    const section = document.querySelector('#tipe-unit');
    if (!section) return;

    buildPool();

    section.addEventListener('mouseenter', function () {
      isActive = true;
    });

    section.addEventListener('mouseleave', function () {
      isActive = false;
    });

    document.addEventListener('mousemove', onMouseMove, { passive: true });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
