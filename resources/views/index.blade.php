<!DOCTYPE html>
<html lang="id">

<head>
    @include('templates/meta')
    @include('templates/head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    {{-- Hero Styles & Preload --}}
    <link rel="stylesheet" href="{{ asset('new/assets/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preload" as="image" href="{{ asset('new/assets/asraya-hero-frames/frame-0001.webp') }}" type="image/webp">
    
    {{-- GSAP for scroll animations --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
</head>
<style>
    .facility-wrapper {
        position: relative;
        z-index: 2;
        padding-top: clamp(32px, 10vh, 80px);
    }

    .facility-item {
        text-align: center;
        color: #fff;
    }

    .facility-icon {
        width: 70px;
        height: 70px;
        /* background: #2f4f2f; */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-size: 26px;
        transition: 0.3s ease;
    }

    .facility-icon i {
        color: #fff;
    }

    .facility-text {
        font-size: 13px;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .facility-item:hover .facility-icon {
        background: transparent;
        transform: translateY(-3px);
    }

    .site-blocks-cover.video-bg {
        position: relative;
        overflow: hidden;
        height: 100vh;
        min-height: 500px;
        display: flex;
        align-items: center;
    }

    .site-blocks-cover.video-bg video {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        object-fit: cover;
        filter: brightness(0.75);
    }

    .site-blocks-cover.video-bg .container {
        position: relative;
        z-index: 2;
    }

    .video-wrap {
        float: left;
        width: 100%;
        max-width: 420px;
        /* ukuran maksimal video */
        aspect-ratio: 16 / 9;
        margin: 24px;
        border-radius: 8px;
        object-fit: cover;
    }

    /* Responsive breakpoint */
    @media (max-width: 768px) {
        .video-wrap {
            float: none;
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100%;
            width: 100%;
        }
    }

    .side-text-overlay {
        position: absolute;
        right: -10vh;
        top: 40%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.85) 35%, rgba(255, 255, 255, 1) 100%);
        padding: 30px 60px 30px 40px;
        text-align: right;
        color: #333;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }
</style>

<body>
    @include('templates/navbar')
    <div class="scroll-stage" id="scrollStage" style="position: relative; z-index: 1;">
        <div class="sticky-wrap">
            {{-- First-paint static image (visible before canvas takes over, helps LCP) --}}
            <img class="hero-first-paint"
                 id="heroFirstPaint"
                 src="{{ asset('new/assets/asraya-hero-frames/frame-0001.webp') }}"
                 alt="Pesona Hutan Asraya"
                 width="960" height="540"
                 fetchpriority="high"
                 decoding="async">

            {{-- Canvas (hidden behind first-paint until frames are loaded) --}}
            <canvas class="hero-canvas" id="heroCanvas" aria-hidden="true"></canvas>

            {{-- Shadow overlay: gelap di tepi/bawah, terang di tengah agar gambar tetap terlihat --}}
            <div style="position: absolute; top:0; left:0; width:100%; height:100%;
                background:
                    linear-gradient(to bottom, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.0) 30%, rgba(0,0,0,0.0) 60%, rgba(0,0,0,0.6) 100%),
                    linear-gradient(to right, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.0) 40%, rgba(0,0,0,0.0) 60%, rgba(0,0,0,0.25) 100%);
                pointer-events: none; z-index: 2;"></div>

            {{-- Loading overlay --}}
            <div class="hero-loader" id="heroLoader">
                <div class="loader-logo-wrap">
                    <img src="/img/asraya-2.png" alt="Asraya" class="loader-logo" width="160" height="48">
                </div>
                <div class="loader-bottom">
                    <div class="loader-bar-track">
                        <div class="loader-bar-fill" id="loaderBarFill"></div>
                    </div>
                    <span class="loader-progress" id="loaderPercent">0%</span>
                </div>
            </div>

            {{-- Caption overlay: Chapters --}}
            <div class="hero-chapters-container" style="z-index: 3;">
                <!-- Chapter 1 (Frame 1-25) -->
                <div class="hero-chapter" id="chapter-1">
                    <span class="chapter-overline">Living Harmony</span>
                    <h2 class="chapter-headline">IN NATURE</h2>
                    <p style="font-family: var(--ff-mono); font-size: 12px; color: rgba(245,242,234,0.6); letter-spacing: 0.2em; text-transform: uppercase; margin-top: 16px; text-shadow: 0 2px 8px rgba(0,0,0,0.8);">Casa Asraya — Pekanbaru</p>
                </div>

                <!-- Chapter 2 (Frame 36-55) -->
                <div class="hero-chapter" id="chapter-2">
                    <span class="chapter-overline">Premium Residence Pekanbaru</span>
                    <h2 class="chapter-headline">DESIGNED AROUND NATURE</h2>
                </div>

                <!-- Chapter 3 (Frame 66-85) -->
                <div class="hero-chapter" id="chapter-3">
                    <span class="chapter-overline">Smart Home Ready</span>
                    <h2 class="chapter-headline">CRAFTED FOR MODERN LIVING</h2>
                    <div class="chapter-stats">
                        <span>15 Minutes Airport</span>
                        <span class="dot-separator">•</span>
                        <span>10 Minutes CBD</span>
                    </div>
                </div>

                <!-- Chapter 4 (Frame 96-120) -->
                <div class="hero-chapter" id="chapter-4">
                    <span class="chapter-overline">Living Harmony in Nature</span>
                    <img src="{{ asset('img/asraya-2.png') }}" alt="Pesona Hutan Asraya" width="260" height="130" style="height: clamp(60px, 12vw, 130px); width: auto; margin: 0 auto; display: block; filter: drop-shadow(0 4px 12px rgba(0,0,0,0.6));">
                    <div class="chapter-cta">
                        <a href="#tipe-unit" class="btn-explore">Explore Residence</a>
                        <a href="https://wa.me/6281399998066" class="btn-book">Book Private Visit</a>
                    </div>
                </div>
            </div>

            {{-- Scroll-down indicator --}}
            <div class="scroll-indicator" id="scrollIndicator" style="z-index: 3;">
                <span class="scroll-indicator-label">Scroll</span>
                <div class="scroll-indicator-line"></div>
            </div>

            {{-- Fade ke bawah: hero menyatu dengan section berikutnya --}}
            <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 180px;
                background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(26,58,46,1) 100%);
                pointer-events: none; z-index: 4;"></div>
        </div>
    </div>

    {{-- hero --}}
    {{-- SECTION: TENTANG KAMI --}}
    <style>
    .ab-video-wrap { position: relative; width: 100%; padding-top: 56.25%; }
    .ab-video-wrap iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: none; display: block; }
    .ab-img-fill { width: 100%; height: 100%; object-fit: cover; display: block; }
    .ab-img-center-h { min-height: 280px; }
    .ab-img-sm-h { min-height: 130px; }
    .ab-chip-bg { background: rgba(0,0,0,0.6); backdrop-filter: blur(6px); }
    .ab-card-hover:hover { background: #f5f1ea !important; }
    .ab-arrow-hover:hover { background: #D4622A !important; color: #fff !important; }
    .ab-pill-hover:hover { color: #1a3a2e !important; border-color: #1a3a2e !important; }
    .ab-btn-hover:hover { background: #1a3a2e !important; color: #fff !important; border-color: #1a3a2e !important; }
    .ab-bento-grid { display: grid; grid-template-columns: 200px 1fr 1fr; grid-template-rows: auto auto; gap: 8px; }
    @media (max-width: 991px) {
        .ab-bento-grid { grid-template-columns: 1fr 1fr; }
        .ab-col-left { grid-column: 1 / -1 !important; grid-row: 1 !important; flex-direction: row !important; }
        .ab-img-center { grid-column: 1 !important; grid-row: 2 !important; }
        .ab-col-right { grid-column: 2 !important; grid-row: 2 !important; }
        .ab-bottom { grid-column: 1 / -1 !important; grid-row: 3 !important; }
    }
    @media (max-width: 767px) {
        .ab-bento-grid { grid-template-columns: 1fr !important; }
        .ab-col-left { grid-column: 1 !important; grid-row: 1 !important; flex-direction: column !important; }
        .ab-img-center { grid-column: 1 !important; grid-row: 2 !important; }
        .ab-col-right { grid-column: 1 !important; grid-row: 3 !important; flex-direction: row !important; }
        .ab-col-right > div { flex: 1 1 0; min-width: 0; }
        /* CRITICAL: force ab-bottom grid to single column on mobile */
        .ab-bottom { grid-column: 1 !important; grid-row: 4 !important; grid-template-columns: 1fr !important; display: grid !important; }
        .ab-bottom > div:first-child { min-height: 200px; }
        #home { padding-left: 16px !important; padding-right: 16px !important; }
        .facility-icon {
            width: clamp(50px, 12vw, 70px);
            height: clamp(50px, 12vw, 70px);
        }
    }
    @media (max-width: 639px) {
        .ab-bento-grid { grid-template-columns: 1fr !important; }
        .ab-col-left { grid-column: 1 !important; grid-row: 1 !important; flex-direction: column !important; }
        .ab-img-center { grid-column: 1 !important; grid-row: 2 !important; }
        .ab-col-right { grid-column: 1 !important; grid-row: 3 !important; flex-direction: row !important; }
        .ab-col-right > div { flex: 1 1 0; min-width: 0; }
        .ab-bottom { grid-column: 1 !important; grid-row: 4 !important; grid-template-columns: 1fr !important; display: grid !important; }
        .ab-bottom > div:first-child { min-height: 200px; }
        #home { padding-left: 16px !important; padding-right: 16px !important; }
    }
    </style>

    <section id="home" style="background:#f5f1ea; padding:80px 0; overflow:hidden;">
        <div class="container px-3 px-md-4">
            {{-- Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mb-5" style="gap: 16px;">
                <div>
                    <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Kami</p>
                    <h2 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; color:#1a3a2e; line-height:1.15; letter-spacing:-0.02em; margin:0;">
                        Hunian Premium,<br>Harmoni dengan Alam
                    </h2>
                </div>
                <p style="font-family:'Outfit',system-ui,sans-serif; font-size:13.5px; color:#666; line-height:1.8; max-width:320px; margin:0;">
                    Jelajahi keindahan arsitektur modern yang dipadukan secara sempurna dengan nuansa hutan tropis yang asri di jantung Kota Pekanbaru.
                </p>
            </div>

            {{-- Bento Grid --}}
            <div class="ab-bento-grid">
                {{-- Kiri: 3 card teks --}}
                <div class="ab-col-left d-flex flex-column" style="gap: 10px; grid-column:1; grid-row:1;">
                    <div class="ab-card-hover d-flex flex-column justify-content-between flex-fill transition-all p-4" style="border-radius: 2.5rem; background:#fff; border:1px solid #e8e4de; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                        <h4 style="font-family:'Outfit',system-ui,sans-serif; font-size:14px; font-weight:500; color:#1a3a2e; line-height:1.45; margin:0 0 16px;">Mengapa Casa Asraya?</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('visimisi') }}" class="ab-pill-hover transition-all" style="font-family:'Outfit',sans-serif; font-size:10px; font-weight: 600; letter-spacing:.05em; text-transform:uppercase; color:#666; border:1px solid #dcd7ce; border-radius:9999px; padding:6px 14px; text-decoration:none; background: #fff;">Pelajari</a>
                            <a href="{{ route('visimisi') }}" class="ab-arrow-hover d-inline-flex align-items-center justify-content-center transition-all" style="width:28px;height:28px; border-radius:50%; background:#fcfbfa; border: 1px solid #e8e4de; font-size:11px;color:#1a3a2e;text-decoration:none;">↗</a>
                        </div>
                    </div>
                    <div class="ab-card-hover d-flex flex-column justify-content-between flex-fill transition-all p-4" style="border-radius: 2.5rem; background:#fff; border:1px solid #e8e4de; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                        <h4 style="font-family:'Outfit',system-ui,sans-serif; font-size:14px; font-weight:500; color:#1a3a2e; line-height:1.45; margin:0 0 16px;">Alam &amp;<br>Kehidupan Kota.</h4>
                        <a href="{{ route('visimisi') }}" class="ab-arrow-hover d-inline-flex align-items-center justify-content-center transition-all mt-auto align-self-end" style="width:28px;height:28px; border-radius: 50%; background:#fcfbfa; border: 1px solid #e8e4de; font-size:11px;color:#1a3a2e;text-decoration:none;">↗</a>
                    </div>
                    <div class="ab-card-hover d-flex flex-column justify-content-between flex-fill transition-all p-4" style="border-radius: 2.5rem; background:#fff; border:1px solid #e8e4de; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                        <h4 style="font-family:'Outfit',system-ui,sans-serif; font-size:14px; font-weight:500; color:#1a3a2e; line-height:1.45; margin:0 0 16px;">Material Terbaik,<br>Bertahan Lama.</h4>
                        <a href="{{ route('unitUnggulan') }}" class="ab-arrow-hover d-inline-flex align-items-center justify-content-center transition-all mt-auto align-self-end" style="width:28px;height:28px; border-radius: 50%; background:#fcfbfa; border: 1px solid #e8e4de; font-size:11px;color:#1a3a2e;text-decoration:none;">↗</a>
                    </div>
                </div>

                {{-- Tengah: gambar besar --}}
                <div class="ab-img-center position-relative overflow-hidden" style="border-radius: 2.5rem; grid-column:2; grid-row:1; border: 1px solid #e8e4de;">
                    <img src="{{ asset('img/reduce/F1.jpg') }}" alt="Casa Asraya" width="800" height="600" class="ab-img-fill ab-img-center-h">
                    <div class="ab-chip-bg position-absolute d-flex align-items-center" style="gap: 8px; border-radius: 9999px; padding: 6px 14px; top: 16px; left: 16px; background: rgba(255,255,255,0.9); border: 1px solid #e8e4de; backdrop-filter: blur(8px);">
                        <span style="width:6px;height:6px;background:#6ab04c; border-radius: 50%; flex-shrink:0;"></span>
                        <span style="font-family:'Outfit',sans-serif;font-size:10px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:#1a3a2e;">Hunian Eksklusif</span>
                    </div>
                    <a href="{{ route('unitUnggulan') }}" class="ab-arrow-hover position-absolute d-inline-flex align-items-center justify-content-center transition-all" style="bottom: 16px; right: 16px; width:36px;height:36px; border-radius:50%; background:#fff; border: 1px solid #e8e4de; font-size:13px;color:#1a3a2e;text-decoration:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">↗</a>
                </div>

                {{-- Kanan: 2 gambar kecil --}}
                <div class="ab-col-right d-flex flex-column" style="gap: 10px; grid-column:3; grid-row:1;">
                    <div class="position-relative overflow-hidden flex-fill" style="border-radius: 2.5rem; border: 1px solid #e8e4de;">
                        <img src="{{ asset('img/reduce/F3.jpg') }}" alt="Arsitektur" width="400" height="300" class="ab-img-fill ab-img-sm-h">
                        <div class="ab-chip-bg position-absolute d-flex align-items-center" style="gap: 8px; border-radius: 9999px; padding: 6px 14px; top: 12px; left: 12px; background: rgba(255,255,255,0.9); border: 1px solid #e8e4de; backdrop-filter: blur(8px);">
                            <span style="width:6px;height:6px;background:#D4622A; border-radius: 50%; flex-shrink:0;"></span>
                            <span style="font-family:'Outfit',sans-serif;font-size:10px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:#1a3a2e;">Arsitektur</span>
                        </div>
                        <div class="position-absolute d-flex justify-content-between align-items-end px-4 pb-4 pt-5" style="bottom: 0; left: 0; right: 0; background:linear-gradient(to top,rgba(0,0,0,0.65) 0%,transparent 100%);">
                            <span style="font-family:'Outfit',system-ui,sans-serif;font-size:13px;font-weight:500;color:#fff;line-height:1.3;">Dirancang Atelier Riri.</span>
                            <a href="{{ route('visimisi') }}" class="ab-arrow-hover d-inline-flex align-items-center justify-content-center flex-shrink-0 transition-all" style="width:28px;height:28px; border-radius: 50%; background:#fff; font-size:11px;color:#1a3a2e;text-decoration:none;">↗</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden flex-fill" style="border-radius: 2.5rem; border: 1px solid #e8e4de;">
                        <img src="{{ asset('img/reduce/F5.jpg') }}" alt="Fasilitas" width="400" height="300" class="ab-img-fill ab-img-sm-h">
                        <div class="ab-chip-bg position-absolute d-flex align-items-center" style="gap: 8px; border-radius: 9999px; padding: 6px 14px; top: 12px; left: 12px; background: rgba(255,255,255,0.9); border: 1px solid #e8e4de; backdrop-filter: blur(8px);">
                            <span style="width:6px;height:6px;background:#6ab04c; border-radius: 50%; flex-shrink:0;"></span>
                            <span style="font-family:'Outfit',sans-serif;font-size:10px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:#1a3a2e;">Fasilitas</span>
                        </div>
                        <div class="position-absolute d-flex justify-content-between align-items-end px-4 pb-4 pt-5" style="bottom: 0; left: 0; right: 0; background:linear-gradient(to top,rgba(0,0,0,0.65) 0%,transparent 100%);">
                            <span style="font-family:'Outfit',system-ui,sans-serif;font-size:13px;font-weight:500;color:#fff;line-height:1.3;">Nyaman &amp; Berkelanjutan.</span>
                            <a href="{{ route('unitUnggulan') }}" class="ab-arrow-hover d-inline-flex align-items-center justify-content-center flex-shrink-0 transition-all" style="width:28px;height:28px; border-radius: 50%; background:#fff; font-size:11px;color:#1a3a2e;text-decoration:none;">↗</a>
                        </div>
                    </div>
                </div>

                {{-- Bottom: video + teks --}}
                <div class="ab-bottom overflow-hidden" style="border-radius: 2.5rem; grid-column:1/-1; grid-row:2; display: grid; grid-template-columns:2fr 3fr; background:#fff; border:1px solid #e8e4de; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                    <div class="position-relative" style="background:#000;">
                        <div class="ab-video-wrap">
                            <iframe src="https://www.youtube.com/embed/ntQcdtnWgds?si=y0dyMfkvTF9QyfHD&autoplay=1&mute=1&loop=1&playlist=ntQcdtnWgds"
                                title="ASRAYA PROPERTY - LIVING HARMONY IN NATURE"
                                allow="autoplay; encrypted-media;" allowfullscreen></iframe>
                        </div>
                        <div class="absolute bottom-2 left-2 hidden md:flex flex-wrap gap-1 pointer-events-none">
                            @foreach(['#CasaAsraya','#LivingInNature','#HunianPremium','#PekanbaruProperty'] as $tag)
                            <span style="font-family:'Outfit',monospace;font-size:9px;color:rgba(255,255,255,0.6);background:rgba(0,0,0,0.45);border-radius:4px;padding:2px 6px;">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center p-4 p-md-5 min-w-0">
                        <h3 style="font-family:'Outfit',system-ui,sans-serif;font-size:clamp(1.2rem,2vw,1.6rem);font-weight:300;color:#1a3a2e;line-height:1.25;letter-spacing:-0.02em;margin:0 0 16px;">
                            Wujudkan Hunian Impian,<br>Indah &amp; Bertahan Lama
                        </h3>
                        <p style="font-family:'Outfit',system-ui,sans-serif;font-size:13px;color:#666;line-height:1.8;margin:0 0 28px;">
                            Jelajahi koleksi hunian premium kami — desain modern, material berkualitas tinggi, dan lokasi strategis di jantung Pekanbaru.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('unitUnggulan') }}" class="ab-btn-hover d-inline-flex align-items-center justify-content-center gap-2 transition-all" style="font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:.02em;text-transform:uppercase;padding:12px 28px;background:#1a3a2e;color:#fff;border:1px solid #1a3a2e;border-radius:9999px;text-decoration:none;">
                                Lihat Unit <span class="d-inline-flex align-items-center justify-content-center rounded-full" style="width:20px;height:20px;background:rgba(255,255,255,0.15);font-size:10px;">↗</span>
                            </a>
                            <a href="{{ route('visimisi') }}" class="ab-btn-hover d-inline-flex align-items-center justify-content-center gap-2 transition-all" style="font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:.02em;text-transform:uppercase;padding:12px 28px;background:transparent;color:#1a3a2e;border:1px solid #dcd7ce;border-radius:9999px;text-decoration:none;"
                               onmouseover="this.style.background='#1a3a2e'; this.style.color='#fff'; this.style.borderColor='#1a3a2e'"
                               onmouseout="this.style.background='transparent'; this.style.color='#1a3a2e'; this.style.borderColor='#dcd7ce'">
                                Visi &amp; Misi <span class="d-inline-flex align-items-center justify-content-center rounded-full" style="width:20px;height:20px;background:rgba(26,58,46,0.06);font-size:10px;">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>{{-- /ab-bento-grid --}}
        </div>
    </section>

        {{-- SECTION: FEATURED UNITS --}}
        <style>
        /* ── Unit Strip ─────────────────────────────────────────────────── */
        .unit-strip {
            display: flex;
            gap: 12px;
            height: 560px;
        }

        .unit-card {
            position: relative;
            flex: 1;
            border-radius: 2.5rem;
            overflow: hidden;
            cursor: pointer;
            transition: flex 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e8e4de;
            background: #1a3a2e;
        }

        .unit-strip:hover .unit-card {
            flex: 0.35;
        }

        .unit-strip .unit-card:hover {
            flex: 5;
        }

        /* Background cover image */
        .unit-card-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1),
                        filter 0.5s ease;
            filter: brightness(0.6) saturate(0.85);
        }

        .unit-card:hover .unit-card-bg {
            transform: scale(1.04);
            filter: brightness(0.55) saturate(1);
        }

        /* Dark gradient overlay */
        .unit-card-grad {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(10, 22, 15, 0.95) 0%,
                rgba(10, 22, 15, 0.5) 45%,
                rgba(10, 22, 15, 0.1) 100%
            );
            z-index: 1;
        }

        /* Collapsed state: vertical label */
        .unit-card-collapsed-label {
            position: absolute;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            transition: opacity 0.3s ease;
            white-space: nowrap;
        }

        .unit-strip .unit-card:hover .unit-card-collapsed-label {
            opacity: 0;
            pointer-events: none;
        }

        .unit-collapsed-name {
            font-family: 'Outfit', monospace;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.75);
            writing-mode: vertical-rl;
            text-orientation: mixed;
        }

        /* Expanded state: full content */
        .unit-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 36px 32px 32px;
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.45s ease 0.15s, transform 0.45s ease 0.15s;
            pointer-events: none;
        }

        .unit-strip .unit-card:hover .unit-card-content {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Preview thumbnail strip inside card */
        .unit-thumbnails {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }

        .unit-thumb {
            width: 72px;
            height: 52px;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
            flex-shrink: 0;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .unit-thumb:hover {
            transform: scale(1.05);
            border-color: rgba(212,98,42,0.7);
        }

        .unit-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Spec pills */
        .unit-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 20px;
        }

        .unit-spec-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-family: 'Outfit', sans-serif;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: rgba(255,255,255,0.8);
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 9999px;
            padding: 5px 12px;
        }

        /* Type badge */
        .unit-type-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Outfit', monospace;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #D4622A;
            background: rgba(212,98,42,0.15);
            border: 1px solid rgba(212,98,42,0.35);
            border-radius: 9999px;
            padding: 5px 14px;
            margin-bottom: 10px;
        }

        .unit-card-title {
            font-family: 'Outfit', system-ui, sans-serif;
            font-size: clamp(28px, 3.5vw, 44px);
            font-weight: 300;
            color: #fff;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin: 0 0 6px;
        }

        .unit-card-sub {
            font-family: 'Outfit', monospace;
            font-size: 11px;
            color: rgba(255,255,255,0.55);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin: 0 0 20px;
        }

        .unit-card-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #fff;
            background: #D4622A;
            border: 1.5px solid #D4622A;
            border-radius: 9999px;
            padding: 12px 28px;
            text-decoration: none;
            transition: background 0.25s ease, transform 0.2s ease, box-shadow 0.25s ease;
            box-shadow: 0 4px 20px rgba(212,98,42,0.35);
        }

        .unit-card-cta:hover {
            background: transparent;
            color: #D4622A;
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(212,98,42,0.2);
        }

        .unit-card-cta-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.7);
            background: transparent;
            border: 1.5px solid rgba(255,255,255,0.25);
            border-radius: 9999px;
            padding: 12px 24px;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .unit-card-cta-ghost:hover {
            color: #fff;
            border-color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.08);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .unit-strip {
                flex-direction: column;
                height: auto;
                gap: 10px;
            }

            .unit-card {
                flex: none !important;
                height: 300px;
                border-radius: 2rem;
            }

            .unit-strip:hover .unit-card { flex: none; }
            .unit-card-collapsed-label { display: none; }
            .unit-card-content {
                opacity: 1 !important;
                transform: translateY(0) !important;
                pointer-events: auto !important;
                padding: 24px 20px 20px;
            }
            .unit-card-title { font-size: clamp(22px, 6vw, 32px); }
            .unit-thumbnails { display: none; } /* hide thumbnails on mobile to save space */
        }
        </style>

        <section id="tipe-unit" style="background: #f5f1ea; padding: 80px clamp(16px, 4vw, 48px);">
            <div class="container" style="padding-left: 0; padding-right: 0;">
                {{-- Header --}}
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mb-5" style="gap: 16px;">
                    <div>
                        <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Featured Units</p>
                        <h2 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; color:#1a3a2e; line-height:1.15; letter-spacing:-0.02em; margin:0;">
                            Pilih Hunian<br>Impian Anda
                        </h2>
                    </div>
                    <p style="font-family:'Outfit',system-ui,sans-serif; font-size:13.5px; color:#666; line-height:1.8; max-width:300px; margin:0;">
                        Arahkan kursor ke setiap unit untuk melihat detail dan fasilitas eksklusifnya.
                    </p>
                </div>

                {{-- Unit Strip --}}
                <div class="unit-strip">

                    

                    {{-- MAHOGANY --}}
                    <div class="unit-card">
                        <img class="unit-card-bg"
                             src="{{ asset('img/mahogany/F7.jpg') }}"
                             alt="Unit Mahogany">
                        <div class="unit-card-grad"></div>

                        {{-- Collapsed label --}}
                        <div class="unit-card-collapsed-label">
                            <span class="unit-collapsed-name">Mahogany</span>
                        </div>

                        {{-- Expanded content --}}
                        <div class="unit-card-content">
                            {{-- Thumbnails --}}
                            <div class="unit-thumbnails">
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/mahogany/mahogany-interior-0.jpg') }}" alt="Interior Mahogany" width="400" height="300">
                                </div>
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/mahogany/floor.jpg') }}" alt="Denah Mahogany" width="400" height="300">
                                </div>
                                <div class="unit-thumb">
                                    <img src="{{ asset('new/assets/img/F11.jpg') }}" alt="Eksterior Mahogany" width="400" height="300">
                                </div>
                            </div>

                            {{-- Badge --}}
                            <div class="unit-type-badge">
                                <span style="width:5px;height:5px;background:#D4622A;border-radius:50%;flex-shrink:0;"></span>
                                Tipe Premium
                            </div>

                            {{-- Name & sub --}}
                            <h3 class="unit-card-title">Mahogany</h3>
                            <p class="unit-card-sub">Casa Asraya — Pekanbaru</p>

                            {{-- Specs --}}
                            <div class="unit-specs">
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                                    3 Lantai
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    3 Master Bedroom + 1 Kamar ART
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                    4 Kamar Mandi
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 20H3a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h4"/><polyline points="11 20 7 20 7 4 11 4"/></svg>
                                    Smart Home Ready
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 Garasi + 1 Carport
                                </span>
                            </div>

                            {{-- CTAs --}}
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('mahogany') }}" class="unit-card-cta">
                                    Lihat Detail
                                    <span style="display:inline-flex;align-items:center;justify-content:center;width:18px;height:18px;background:rgba(255,255,255,0.2);border-radius:50%;font-size:10px;">↗</span>
                                </a>
                                <a href="https://wa.me/6281399998066?text=Halo,%20saya%20tertarik%20dengan%20unit%20Mahogany%20Casa%20Asraya" target="_blank" class="unit-card-cta-ghost">
                                    Tanya via WA
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- CENDANA --}}
                    <div class="unit-card">
                        <img class="unit-card-bg"
                             src="{{ asset('img/cendana/F10.jpg') }}"
                             alt="Unit Cendana">
                        <div class="unit-card-grad"></div>

                        {{-- Collapsed label --}}
                        <div class="unit-card-collapsed-label">
                            <span class="unit-collapsed-name">Cendana</span>
                        </div>

                        {{-- Expanded content --}}
                        <div class="unit-card-content">
                            {{-- Thumbnails --}}
                            <div class="unit-thumbnails">
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/cendana/cendana-interior-0.jpg') }}" alt="Interior Cendana" width="400" height="300">
                                </div>
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/cendana/FLOOR.jpg') }}" alt="Denah Cendana" width="400" height="300">
                                </div>
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/cendana/cendana-units (2).jpeg') }}" alt="Eksterior Cendana" width="400" height="300">
                                </div>
                            </div>

                            {{-- Badge --}}
                            <div class="unit-type-badge">
                                <span style="width:5px;height:5px;background:#D4622A;border-radius:50%;flex-shrink:0;"></span>
                                Tipe Eksklusif
                            </div>

                            {{-- Name & sub --}}
                            <h3 class="unit-card-title">Cendana</h3>
                            <p class="unit-card-sub">Casa Asraya — Pekanbaru</p>

                            {{-- Specs --}}
                            <div class="unit-specs">
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                                    3 Lantai
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    3 Master Bedroom + 1 Kamar ART
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                    5 Kamar Mandi
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 20H3a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h4"/><polyline points="11 20 7 20 7 4 11 4"/></svg>
                                    Smart Home Ready
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    1 Carport
                                </span>
                            </div>

                            {{-- CTAs --}}
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('cendana') }}" class="unit-card-cta">
                                    Lihat Detail
                                    <span style="display:inline-flex;align-items:center;justify-content:center;width:18px;height:18px;background:rgba(255,255,255,0.2);border-radius:50%;font-size:10px;">↗</span>
                                </a>
                                <a href="https://wa.me/6281399998066?text=Halo,%20saya%20tertarik%20dengan%20unit%20Cendana%20Casa%20Asraya" target="_blank" class="unit-card-cta-ghost">
                                    Tanya via WA
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- GAHARU PRIME --}}
                    <div class="unit-card">
                        <img class="unit-card-bg"
                             src="{{ asset('img/gaharu/hero.PNG') }}"
                             alt="Unit Gaharu Prime">
                        <div class="unit-card-grad"></div>

                        {{-- Collapsed label --}}
                        <div class="unit-card-collapsed-label">
                            <span class="unit-collapsed-name">Gaharu Prime</span>
                        </div>

                        {{-- Expanded content --}}
                        <div class="unit-card-content">
                            {{-- Thumbnails --}}
                            <div class="unit-thumbnails">
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/gaharu/hero.PNG') }}" alt="Gaharu Prime" width="400" height="300">
                                </div>
                                <div class="unit-thumb">
                                    <img src="{{ asset('img/gaharu/Denah Gaharu.webp') }}" alt="Denah Gaharu Prime" width="400" height="300">
                                </div>
                            </div>

                            {{-- Badge --}}
                            <div class="unit-type-badge">
                                <span style="width:5px;height:5px;background:#D4622A;border-radius:50%;flex-shrink:0;"></span>
                                Tipe Terbaru
                            </div>

                            {{-- Name & sub --}}
                            <h3 class="unit-card-title">Gaharu Prime</h3>
                            <p class="unit-card-sub">Casa Asraya — Pekanbaru</p>

                            {{-- Specs --}}
                            <div class="unit-specs">
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                                    2 Lantai (LB 115m² / LT 92m²)
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    3 Kamar Tidur
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                    2 Kamar Mandi
                                </span>
                                <span class="unit-spec-pill">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    Carport 2 Mobil
                                </span>
                            </div>

                            {{-- CTAs --}}
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('gaharu') }}" class="unit-card-cta">
                                    Lihat Detail
                                    <span style="display:inline-flex;align-items:center;justify-content:center;width:18px;height:18px;background:rgba(255,255,255,0.2);border-radius:50%;font-size:10px;">↗</span>
                                </a>
                                <a href="https://wa.me/6281399998066?text=Halo,%20saya%20tertarik%20dengan%20unit%20Gaharu%20Prime%20Casa%20Asraya" target="_blank" class="unit-card-cta-ghost">
                                    Tanya via WA
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Bottom CTA --}}
                <div class="text-center mt-4">
                    <a href="{{ route('unitUnggulan') }}"
                       style="display: inline-flex; align-items: center; gap: 10px;
                              font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600;
                              letter-spacing: 0.08em; text-transform: uppercase; text-decoration: none;
                              color: #1a3a2e; border: 1px solid #c8c4bc; border-radius: 9999px;
                              padding: 13px 32px; background: transparent;
                              transition: background 0.25s ease, color 0.25s ease, border-color 0.25s ease;"
                       onmouseover="this.style.background='#1a3a2e'; this.style.color='#fff'; this.style.borderColor='#1a3a2e';"
                       onmouseout="this.style.background='transparent'; this.style.color='#1a3a2e'; this.style.borderColor='#c8c4bc';">
                        Lihat Semua Unit
                        <span style="display:inline-flex; align-items:center; justify-content:center;
                                     width:22px; height:22px; border-radius:50%;
                                     background:rgba(26,58,46,0.07); font-size:12px; line-height:1;">↗</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- SECTION: SITE PLAN --}}
        <section id="site-plan" style="background: #f5f1ea; padding: 80px clamp(16px, 4vw, 48px);">
            <div class="container" style="padding-left: 0; padding-right: 0;">
                <div style="background: #fff; border-radius: 3rem; border: 1px solid #e8e4de; padding: clamp(24px, 5vw, 48px); box-shadow: 0 15px 40px rgba(0,0,0,0.03);">
                    {{-- Header --}}
                    <div class="text-center mb-4">
                        <p style="font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600; letter-spacing: 0.25em; text-transform: uppercase; color: #D4622A; margin-bottom: 8px;">Pesona Hutan</p>
                        <h2 style="font-family: 'Outfit', sans-serif; font-size: clamp(1.5rem, 3vw, 2.2rem); font-weight: 700; color: #1a3a2e; margin: 0 0 12px;">Site Plan</h2>
                        <p style="font-family: 'Outfit', sans-serif; font-size: 14px; color: #666; max-width: 480px; margin: 0 auto; line-height: 1.6;">
                            Peta kawasan Pesona Hutan by Asraya — pilih kavling impian Anda.
                        </p>
                    </div>

                    {{-- Site Plan Image --}}
                    <div style="border-radius: 2rem; overflow: hidden; border: 1px solid #e8e4de;">
                        <img src="{{ asset('img/site-plan-available.jpeg') }}"
                             alt="Site Plan Pesona Hutan Asraya — Ketersediaan Kavling"
                             width="1600" height="900"
                             loading="lazy"
                             style="width: 100%; height: auto; display: block;">
                    </div>

                    {{-- CTA --}}
                    <div class="text-center mt-4">
                        <a href="https://wa.me/6281399998066?text=Halo%2C%20saya%20tertarik%20melihat%20site%20plan%20dan%20ketersediaan%20kavling%20Pesona%20Hutan%20Asraya"
                           target="_blank"
                           style="display: inline-flex; align-items: center; gap: 8px; background: #1a3a2e; color: #fff; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 600; padding: 14px 32px; border-radius: 9999px; text-decoration: none; transition: background 0.2s;"
                           onmouseover="this.style.background='#D4622A'" onmouseout="this.style.background='#1a3a2e'">
                            Tanyakan Ketersediaan Kavling →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: GALLERY --}}
        <style>
        .gallery-strip {
            display: flex;
            gap: 10px;
            height: 480px;
            overflow: hidden;
        }

        .gallery-item {
            position: relative;
            flex: 1;
            min-width: 0;
            border-radius: 2rem;
            overflow: hidden;
            cursor: pointer;
            transition: flex 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e8e4de;
        }

        .gallery-strip:hover .gallery-item {
            flex: 0.4;
        }

        .gallery-strip .gallery-item:hover {
            flex: 4;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), filter 0.4s ease;
            filter: brightness(0.85) saturate(0.9);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
            filter: brightness(1) saturate(1.1);
        }

        .gallery-item-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 32px 24px 24px;
            background: linear-gradient(to top, rgba(12,20,14,0.85) 0%, rgba(12,20,14,0.3) 60%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.4s ease 0.1s, transform 0.4s ease 0.1s;
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-item-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Outfit', monospace;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #D4622A;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 9999px;
            padding: 4px 12px;
            margin-bottom: 10px;
            width: fit-content;
        }

        .gallery-item-title {
            font-family: 'Outfit', system-ui, sans-serif;
            font-size: clamp(14px, 1.6vw, 19px);
            font-weight: 500;
            color: #fff;
            line-height: 1.3;
            letter-spacing: -0.01em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Thin label visible when collapsed */
        .gallery-item-label {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%) rotate(0deg);
            font-family: 'Outfit', monospace;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            white-space: nowrap;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transition: opacity 0.3s ease;
        }

        .gallery-strip .gallery-item:hover .gallery-item-label,
        .gallery-strip:not(:hover) .gallery-item.gallery-item--active .gallery-item-label {
            opacity: 0;
        }

        /* Responsive: 2-column grid on mobile */
        @media (max-width: 768px) {
            .gallery-strip {
                flex-direction: column;
                height: auto;
                gap: 8px;
            }

            .gallery-item {
                flex: none !important;
                height: 220px;
                border-radius: 1.5rem;
            }

            .gallery-item-label { display: none; }

            .gallery-item-overlay {
                opacity: 1;
                transform: translateY(0);
            }

            .gallery-strip:hover .gallery-item { flex: none; }
        }

        @media (min-width: 769px) and (max-width: 1199px) {
            .gallery-strip { height: 380px; }
        }
        </style>

        <section id="galeri" style="background: #f5f1ea; padding: 80px clamp(16px, 4vw, 48px);">
            <div class="container" style="padding-left: 0; padding-right: 0;">
                {{-- Header --}}
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mb-5" style="gap: 16px;">
                    <div>
                        <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Photo Gallery</p>
                        <h2 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; color:#1a3a2e; line-height:1.15; letter-spacing:-0.02em; margin:0;">
                            Keindahan yang<br>Berbicara Sendiri
                        </h2>
                    </div>
                    <p style="font-family:'Outfit',system-ui,sans-serif; font-size:13.5px; color:#666; line-height:1.8; max-width:300px; margin:0;">
                        Arahkan kursor ke setiap gambar untuk melihat lebih dekat setiap sudut Casa Asraya.
                    </p>
                </div>

                {{-- Gallery Strip --}}
                <div class="gallery-strip">
                    @php
                    $galleryItems = [
                        ['img' => 'img/reduce/F1.jpg',  'tag' => 'Susana sekitar',   'title' => 'Fasad Hunian Modern'],
                        ['img' => 'img/reduce/F5.jpg',  'tag' => 'Fasilitas',  'title' => 'Clubhouse'],
                        ['img' => 'img/reduce/F8.jpg',  'tag' => 'Interior',    'title' => 'Ruang Tamu Elegan'],
                        ['img' => 'new/assets/img/taman1.jpg',  'tag' => 'Taman',       'title' => 'Taman Hijau Asri'],
                        ['img' => 'img/reduce/F7.jpg',  'tag' => 'Eksterior',   'title' => 'Eksterior Rumah'],
                        ['img' => 'img/cendana/new/cendana (46).jpg',  'tag' => 'Keluarga',  'title' => 'Ruang Keluarga'],
                    ];
                    @endphp

                    @foreach($galleryItems as $item)
                    <div class="gallery-item">
                        <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}" width="600" height="400" loading="lazy">
                        <span class="gallery-item-label">{{ $item['tag'] }}</span>
                        <div class="gallery-item-overlay">
                            <span class="gallery-item-tag">
                                <span style="width:5px;height:5px;background:#D4622A;border-radius:50%;flex-shrink:0;"></span>
                                {{ $item['tag'] }}
                            </span>
                            <span class="gallery-item-title">{{ $item['title'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- View All Button --}}
                <div class="text-center mt-4">
                    <a href="{{ route('galeri') }}"
                       style="display: inline-flex; align-items: center; gap: 10px;
                              font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600;
                              letter-spacing: 0.08em; text-transform: uppercase; text-decoration: none;
                              color: #1a3a2e; border: 1px solid #c8c4bc; border-radius: 9999px;
                              padding: 13px 32px; background: transparent;
                              transition: background 0.25s ease, color 0.25s ease, border-color 0.25s ease;"
                       onmouseover="this.style.background='#1a3a2e'; this.style.color='#fff'; this.style.borderColor='#1a3a2e';"
                       onmouseout="this.style.background='transparent'; this.style.color='#1a3a2e'; this.style.borderColor='#c8c4bc';">
                        Lihat Semua Foto
                        <span style="display:inline-flex; align-items:center; justify-content:center;
                                     width:22px; height:22px; border-radius:50%;
                                     background:rgba(26,58,46,0.07); font-size:12px; line-height:1;">↗</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- SECTION: PROMO BANNERS --}}
        @include('templates.promos')

        {{-- SECTION: OUR LOCATION --}}
        <section id="map" style="background: #f5f1ea; padding: 80px clamp(16px, 4vw, 48px);">
            <div class="container" style="padding-left: 0; padding-right: 0;">
                {{-- Header --}}
                <div class="text-center mb-5">
                    <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Coverage Area</p>
                    <h2 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 16px;">Lokasi Strategis &amp; Aksesibilitas</h2>
                    <p style="font-size:13.5px; color:#666; max-width:500px; margin:0 auto; line-height:1.8;">Pesona Hutan Asraya dikelilingi oleh berbagai fasilitas penting di Pekanbaru, memudahkan mobilitas harian Anda.</p>
                </div>

                {{-- Clean Rounded Card Layout --}}
                <div style="background: #fff; border-radius: 3rem; border: 1px solid #e8e4de; padding: clamp(16px, 4vw, 32px); box-shadow: 0 15px 40px rgba(0,0,0,0.03); overflow: hidden;">
                    <div class="row align-items-center">
                        {{-- Left Column: List --}}
                        <div class="col-lg-5 col-md-12 mb-4 mb-lg-0" style="padding: 0 20px;">
                            <div style="display: flex; flex-direction: column; gap: 10px;">
                                @foreach([
                                    ['Pusat Kota', '5 Mnt'],
                                    ['Bandara Syarif Kasim II', '15 Mnt'],
                                    ['RS Awal Bros', '10 Mnt'],
                                    ['Mall Pekanbaru', '10 Mnt'],
                                    ['Livin World/SKA Mall ', '10 Mnt'],
                                    ['RSU Arifin Ahmad Pekanbaru', '10 Mnt'],
                                    ['Universitas Riau', '10 Mnt'],
                                    ['Kantor Polda Riau', '5 Mnt'],
                                ] as [$place, $time])
                                <div style="display: flex; justify-content: space-between; align-items: center; background: #fcfbfa; border: 1px solid #e8e4de; border-radius: 9999px; padding: 12px 24px; transition: all 0.2s;">
                                    <span style="font-family: 'Outfit', sans-serif; font-size: 13px; color: #1a3a2e; font-weight: 450;">{{ $place }}</span>
                                    <span style="font-family: 'Outfit', monospace; font-size: 11px; font-weight: 600; color: #D4622A; background: rgba(212, 98, 42, 0.08); padding: 4px 12px; border-radius: 9999px;">{{ $time }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Right Column: Map --}}
                        <div class="col-lg-7 col-md-12" style="padding: 0 20px;">
                            <div style="border-radius: 2.5rem; overflow: hidden; border: 1px solid #e8e4de; height: 380px; position: relative;">
                                <img src="{{ asset('img/maps-02.png') }}" alt="Lokasi Pesona Hutan Asraya"
                                     width="800" height="380"
                                     style="width:100%; height:100%; object-fit:cover; display:block;">
                                
                                {{-- Floating Action Button on Map --}}
                                <a href="https://maps.app.goo.gl/SAUiNRp6t8WuwxfX9" target="_blank"
                                   style="position: absolute; bottom: 20px; right: 20px; display: inline-flex; align-items: center; gap: 8px; background: #fff; color: #1a3a2e; border: 1px solid #e8e4de; border-radius: 9999px; padding: 10px 20px; font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600; text-decoration: none; box-shadow: 0 8px 24px rgba(0,0,0,0.1); transition: all 0.2s;"
                                   onmouseover="this.style.background='#1a3a2e'; this.style.color='#fff';"
                                   onmouseout="this.style.background='#fff'; this.style.color='#1a3a2e';">
                                    Petunjuk Arah ↗
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: KPR BANK'S --}}
        <section style="background: #f5f1ea; padding: 0 clamp(16px, 4vw, 48px) 80px;">
            <div class="container" style="padding-left: 0; padding-right: 0;">
                <div style="background: #fff; border-radius: 3rem; border: 1px solid #e8e4de; padding: clamp(24px, 5vw, 40px) clamp(20px, 5vw, 48px); box-shadow: 0 15px 40px rgba(0,0,0,0.03);">
                    <h2 style="text-align: center; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 600; letter-spacing: 0.25em; text-transform: uppercase; color: #1a3a2e; margin-bottom: 36px;">Kemitraan KPR Bank</h2>
                    <div style="display: flex; align-items: center; justify-content: center; gap: 40px; flex-wrap: wrap;">
                        @foreach($banks as $bank)
                        @php
                            $logo = is_array($bank) ? ($bank['logo'] ?? $bank['src'] ?? '') : ($bank->logo ?? '');
                            $name = is_array($bank) ? ($bank['name'] ?? $bank['alt'] ?? 'Bank Partner') : ($bank->name ?? 'Bank Partner');
                            $src  = (str_starts_with($logo, 'http') || str_starts_with($logo, '/')) ? asset($logo) : asset('/' . $logo);
                        @endphp
                        <img src="{{ $src }}" alt="{{ $name }}"
                             width="120" height="36"
                             style="height: 36px; width: auto; max-width: 120px; object-fit: contain; filter: grayscale(60%); opacity: 0.65; transition: all 0.3s ease;"
                             onmouseover="this.style.filter='grayscale(0%)'; this.style.opacity='1'"
                             onmouseout="this.style.filter='grayscale(60%)'; this.style.opacity='0.65'">
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: AHLI PEMASARAN --}}
        <section style="background: #f5f1ea; padding: 0 0 80px;">
            <div class="container px-3 px-md-4">
                <div class="text-center mb-5">
                    <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Marketing Expert</p>
                    <h2 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0;">Hubungi Tim Pemasaran Kami</h2>
                </div>

                <div class="row justify-content-center g-4" style="max-width: 860px; margin: 0 auto;">
                    {{-- Sales 1 --}}
                    <div class="col-12 col-sm-8 col-md-5">
                        <div style="background:#fff; border-radius:2.5rem; border:1px solid #e8e4de; padding:clamp(24px,4vw,36px); display:flex; flex-direction:column; align-items:center; text-align:center; box-shadow:0 10px 30px rgba(0,0,0,0.02); height:100%; gap:4px;">
                            <div style="width:64px; height:64px; border-radius:9999px; background:#fcfbfa; border:1px solid #e8e4de; display:flex; align-items:center; justify-content:center; margin-bottom:12px; flex-shrink:0;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1a3a2e" stroke-width="1.5">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <h4 style="font-family:'Outfit',sans-serif; font-size:16px; font-weight:600; color:#1a3a2e; margin:0 0 6px;">Marketing</h4>
                            <!-- <p style="font-family:'Outfit',sans-serif; font-size:11px; text-transform:uppercase; letter-spacing:0.05em; color:#888; margin:0 0 8px;">Sales &amp; </p> -->
                            <p style="font-family:'Outfit',monospace; font-size:13px; color:#555; margin:0 0 20px;">(+62)813-9999-8066</p>
                            <a href="https://wa.me/+6281399998066" target="_blank"
                               style="margin-top:auto; display:inline-flex; align-items:center; gap:8px; background:#1a3a2e; color:#fff; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; padding:12px 28px; border-radius:9999px; text-decoration:none; transition:all 0.2s; width:100%; justify-content:center;"
                               onmouseover="this.style.background='#D4622A'" onmouseout="this.style.background='#1a3a2e'">
                                Chat WhatsApp ↗
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    @include('templates/footer')
    
    {{-- Engine for scroll-scrub hero --}}
    <script src="{{ asset('new/assets/js/scroll-scrub-hero.js') }}"></script>
</body>

</html>
