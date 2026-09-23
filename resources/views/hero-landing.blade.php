<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pesona Hutan Asraya — Hunian premium forest-hillside townhouse di jantung Kota Pekanbaru, Riau. Desain arsitektur modern di tengah hutan tropis.">
    <title>Pesona Hutan Asraya — Authentically Living</title>

    {{-- Fonts: IBM Plex Sans + IBM Plex Mono --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Hero Styles --}}
    <link rel="stylesheet" href="{{ asset('new/assets/css/hero.css') }}">

    {{-- Preload first frame for LCP --}}
    <link rel="preload" as="image" href="{{ asset('new/assets/asraya-hero-frames/frame-0001.webp') }}" type="image/webp">

    <style>
        /* Inline critical styles to prevent FOUC */
        body { margin: 0; background: #0c0c0a; }
    </style>
</head>

<body class="hero-page">

    {{-- ═══════════════════════════════════════════════════════════════════
         SITE NAV — fixed, transparent → solid on scroll
         Mounted at layout level, persists across all sections
    ═══════════════════════════════════════════════════════════════════ --}}
    <nav class="site-nav" id="siteNav" role="navigation" aria-label="Main navigation">
        {{-- Logo --}}
        <a href="{{ route('index') }}" class="nav-logo" aria-label="Asraya Property — Halaman Utama">
            <img src="{{ asset('img/asraya-2.png') }}" alt="Asraya Property" width="140" height="36">
        </a>

        {{-- Desktop Nav Links --}}
        <ul class="nav-links" id="navLinksDesktop">
            <li><a href="#tipe-unit">Tipe Unit</a></li>
            <li><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
            <li><a href="#lokasi">Lokasi</a></li>
            <li>
                <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="nav-cta"
                   id="navCtaDesktop">Hubungi Kami</a>
            </li>
        </ul>

        {{-- Hamburger (mobile) --}}
        <button class="nav-hamburger" id="navHamburger" aria-label="Buka menu navigasi" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    {{-- Mobile Nav Panel --}}
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <div class="mobile-nav-panel" id="mobileNavPanel" role="dialog" aria-label="Menu navigasi mobile">
        <a href="#tipe-unit">Tipe Unit</a>
        <a href="{{ route('fasilitas') }}">Fasilitas</a>
        <a href="#lokasi">Lokasi</a>
        <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
           target="_blank"
           rel="noopener noreferrer"
           class="nav-cta-mobile">Hubungi Kami</a>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════
         HERO SCROLL-SCRUB SECTION
         400vh tall stage with sticky canvas viewport
    ═══════════════════════════════════════════════════════════════════ --}}
    <div class="scroll-stage" id="scrollStage">
        <div class="sticky-wrap">
            {{-- First-paint static image (visible before canvas takes over, helps LCP) --}}
            <img class="hero-first-paint"
                 id="heroFirstPaint"
                 src="{{ asset('new/assets/asraya-hero-frames/frame-0001.webp') }}"
                 alt="Pesona Hutan Asraya — Aerial view of the forest-hillside townhouse complex"
                 fetchpriority="high"
                 decoding="async">

            {{-- Canvas (hidden behind first-paint until frames are loaded) --}}
            <canvas class="hero-canvas" id="heroCanvas" aria-hidden="true"></canvas>

            {{-- Loading overlay --}}
            <div class="hero-loader" id="heroLoader">
                <span class="loader-progress" id="loaderPercent">0%</span>
                <div class="loader-bar-track">
                    <div class="loader-bar-fill" id="loaderBarFill"></div>
                </div>
            </div>

            {{-- Caption overlay (bottom-left) --}}
            <div class="hero-caption" id="heroCaption">
                <span class="caption-overline">Pesona Hutan Asraya</span>
                <h1 class="caption-headline">
                    <strong>Authentically</strong> Living<br>
                    in Nature
                </h1>
            </div>

            {{-- Scroll-down indicator (bottom-right) --}}
            <div class="scroll-indicator" id="scrollIndicator">
                <span class="scroll-indicator-label">Scroll</span>
                <div class="scroll-indicator-line"></div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════
         NEXT SECTION — placeholder for Unit Types
         Required for sticky to release correctly
    ═══════════════════════════════════════════════════════════════════ --}}
    <section class="section-next" id="tipe-unit">
        <div class="section-next-inner">
            <p class="section-next-label">Temukan Hunian Impian Anda</p>
            <h2 class="section-next-title">Tipe Unit</h2>
        </div>
    </section>

    {{-- Scroll-Scrub Engine --}}
    <script src="{{ asset('new/assets/js/scroll-scrub-hero.js') }}"></script>
</body>

</html>
