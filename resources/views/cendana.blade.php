<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Cendana — Casa Asraya</title>
    <style>
        .spec-row {
            display: flex; align-items: center; gap: 16px;
            padding: 18px 0; border-bottom: 1px solid rgba(255,255,255,0.12);
        }
        .spec-row:last-child { border-bottom: none; }
        .spec-icon {
            width: 44px; height: 44px; background: rgba(255,255,255,0.1);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .floor-card {
            background: #f5f1ea;
            border-radius: 1.5rem;
            border: 1px solid #e8e4de;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            display: flex;
            flex-direction: column;
        }
        .floor-card img {
            width: 100%;
            height: auto;
            object-fit: contain;
            background: #f5f1ea;
            display: block;
        }
        .floor-card-label {
            padding: 14px 20px;
            font-family: 'Outfit', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #1a3a2e;
            border-top: 1px solid #e8e4de;
            text-align: center;
        }
        .slide-thumb {
            width: 72px; height: 52px; object-fit: cover; border-radius: 8px;
            cursor: pointer; opacity: 0.55; border: 2px solid transparent;
            transition: opacity 0.2s, border-color 0.2s;
        }
        .slide-thumb.active { opacity: 1; border-color: #D4622A; }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#0c1a12; position:relative; overflow:hidden; height:100vh; min-height:600px; display:flex; align-items:flex-end;">
        {{-- Siang --}}
        <img id="heroBgDay"
             src="/img/cendana/cendana-siang.jpg"
             alt="Cendana Siang"
             style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;display:block;transition:opacity 0.8s ease;">
        {{-- Malam --}}
        <img id="heroBgNight"
             src="/img/cendana/cendana-malam.jpg"
             alt="Cendana Malam"
             style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;display:block;opacity:0;transition:opacity 0.8s ease;">
        {{-- Gradient overlay --}}
        <div style="position:absolute;inset:0;background:linear-gradient(160deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.05) 40%, rgba(10,22,15,0.88) 100%);z-index:1;"></div>
        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center, transparent 50%, rgba(0,0,0,0.3) 100%);z-index:1;"></div>

        {{-- Day/Night Toggle --}}
        <div style="position:absolute;top:clamp(90px,12vw,120px);right:clamp(24px,4vw,64px);z-index:4;">
            <button id="btnDayNight" onclick="toggleHeroMode()" title="Ganti Siang/Malam"
                    style="width:40px;height:40px;border-radius:50%;border:1.5px solid rgba(255,255,255,0.4);background:rgba(255,255,255,0.12);color:#fff;font-size:16px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all 0.25s;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);">
                <span id="dayNightIcon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                </span>
            </button>
        </div>

        {{-- Content --}}
        <div style="position:relative;z-index:2;width:100%;padding:clamp(40px,6vw,80px) clamp(24px,5vw,80px);">
            <div style="max-width:720px;">
                <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Tipe Hunian</p>
                <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(3rem,7vw,5.5rem); font-weight:200; color:#fff; line-height:1.0; letter-spacing:-0.03em; margin:0 0 20px;">CENDANA</h1>
                <div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap;margin:0 0 32px;">
                    <span style="font-size:13px;color:rgba(255,255,255,0.6);letter-spacing:0.08em;">LT: 90m²</span>
                    <span style="width:3px;height:3px;background:rgba(255,255,255,0.3);border-radius:50%;"></span>
                    <span style="font-size:13px;color:rgba(255,255,255,0.6);letter-spacing:0.08em;">LB: 138m²</span>
                    <span style="width:3px;height:3px;background:rgba(255,255,255,0.3);border-radius:50%;"></span>
                    <span style="font-size:13px;color:rgba(255,255,255,0.6);letter-spacing:0.08em;">3 Lantai</span>
                </div>
                <a href="https://wa.me/6281319999806?text=Halo%20saya%20tertarik%20dengan%20Tipe%20Cendana"
                   target="_blank"
                   style="display:inline-flex; align-items:center; gap:10px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; text-decoration:none; color:#1a3a2e; background:#fff; border-radius:9999px; padding:15px 32px; transition:background 0.25s, color 0.25s; box-shadow:0 4px 24px rgba(0,0,0,0.25);"
                   onmouseover="this.style.background='#D4622A';this.style.color='#fff';"
                   onmouseout="this.style.background='#fff';this.style.color='#1a3a2e';">
                    Tanya via WhatsApp
                    <span style="display:inline-flex;align-items:center;justify-content:center;width:22px;height:22px;border-radius:50%;background:rgba(26,58,46,0.1);font-size:12px;">↗</span>
                </a>
            </div>
        </div>

        {{-- Scroll hint --}}
        <div style="position:absolute;bottom:32px;right:clamp(24px,4vw,64px);z-index:3;display:flex;flex-direction:column;align-items:center;gap:8px;opacity:0.5;">
            <span style="font-family:'Outfit',monospace;font-size:9px;letter-spacing:0.2em;text-transform:uppercase;color:#fff;writing-mode:vertical-rl;">Scroll</span>
            <div style="width:1px;height:40px;background:rgba(255,255,255,0.4);"></div>
        </div>
    </section>

    <script>
        var _heroMode = 'day';

        function toggleHeroMode() {
            setHeroMode(_heroMode === 'day' ? 'night' : 'day');
        }

        function setHeroMode(mode) {
            _heroMode = mode;
            const bgDay   = document.getElementById('heroBgDay');
            const bgNight = document.getElementById('heroBgNight');
            const icon    = document.getElementById('dayNightIcon');
            if (mode === 'night') {
                bgDay.style.opacity   = '0';
                bgNight.style.opacity = '1';
                icon.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';
            } else {
                bgDay.style.opacity   = '1';
                bgNight.style.opacity = '0';
                icon.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>';
            }
        }
        (function () {
            const h = new Date().getHours();
            setHeroMode(h < 6 || h >= 18 ? 'night' : 'day');
        })();
    </script>

    {{-- OVERVIEW + FASILITAS --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4">
                {{-- Foto Carousel --}}
                <div class="col-lg-7">
                    <div style="border-radius:2.5rem; overflow:hidden; background:#1a3a2e;">
                        <img id="mainPhoto" src="{{ asset($data['slide'][0] ?? '') }}" alt="Cendana Casa Asraya"
                             style="width:100%; height:420px; object-fit:cover; object-position:center; display:block; transition:opacity 0.3s;">
                        <div style="display:flex; gap:10px; padding:16px 20px; overflow-x:auto; scrollbar-width:none;">
                            {{-- Foto landscape --}}
                            @foreach($data['slide'] as $idx => $img)
                            <img src="{{ asset($img) }}"
                                 class="slide-thumb {{ $idx === 0 ? 'active' : '' }}"
                                 onclick="changePhoto(this, '{{ asset($img) }}', 'cover')"
                                 alt="foto {{ $idx+1 }}"
                                 style="object-fit:cover;">
                            @endforeach
                            {{-- Render views eksterior (contain) --}}
                            @foreach($data['slideRender'] as $idx => $img)
                            <img src="{{ asset($img) }}"
                                 class="slide-thumb"
                                 onclick="changePhoto(this, '{{ asset($img) }}', 'contain')"
                                 alt="render {{ $idx+1 }}"
                                 style="object-fit:contain; background:#0d2218;">
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Deskripsi + Spec --}}
                <div class="col-lg-5">
                    <div style="background:#1a3a2e; border-radius:2.5rem; padding:clamp(24px,4vw,40px); height:100%;">
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Unit</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.3rem,2.5vw,1.8rem); font-weight:400; color:#fff; margin:0 0 16px;">Tipe Cendana</h2>
                        <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.85; margin:0 0 28px;">
                            Tipe Cendana adalah hunian <strong style="color:#fff;">Elegant Compact Luxury Home</strong> dengan Luas Bangunan 138m² dan Luas Tanah 90m², 3 lantai. Berjumlah 25 unit terbagi dalam 3 blok, dengan Brandgang (Taman Hijau Terbuka) sebagai jogging track dan area bersantai.
                        </p>
                        {{-- Specs --}}
                        <div>
                            @php
                            $specs = [
                                ['icon' => 'img/reduce/icons/sleeping.png',       'label' => '3 Master Bedroom + 1 Kamar Asisten Rumah Tangga'],
                                ['icon' => 'img/reduce/icons/dinner-table.png',   'label' => '1 Ruang Makan'],
                                ['icon' => 'img/reduce/icons/kitchen-table.png',  'label' => '1 Dapur'],
                                ['icon' => 'img/reduce/icons/car-in-garage.png',  'label' => '1 Carport'],
                                ['icon' => 'img/reduce/icons/bathroom.png',       'label' => '5 Kamar Mandi'],
                                ['icon' => 'img/reduce/icons/livingroom.png',     'label' => '2 Ruang Keluarga'],
                                ['icon' => 'img/reduce/icons/balcony.png',        'label' => '1 Balkon'],
                                ['icon' => 'img/reduce/icons/livingroom.png',     'label' => 'Smart Home: Living Room, Dining Room & Master Bedroom'],
                            ];
                            @endphp
                            @foreach($specs as $s)
                            <div class="spec-row">
                                <div class="spec-icon">
                                    <img src="{{ asset($s['icon']) }}" alt="" style="width:22px;height:22px;filter:brightness(0) invert(1);object-fit:contain;">
                                </div>
                                <span style="font-size:14px; color:rgba(255,255,255,0.8);">{{ $s['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- GALERI CENDANA --}}
    @if(isset($data['galeries']) && count($data['galeries']) > 0)
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="text-align:center; margin-bottom:48px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Foto</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; margin:0;">Galeri Cendana</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); gap:16px;">
                @foreach($data['galeries'] as $img)
                <div style="border-radius:1.5rem; overflow:hidden; aspect-ratio:4/3; background:#f5f1ea;">
                    <img src="{{ $img }}" alt="Galeri Cendana" loading="lazy"
                         style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;"
                         onmouseover="this.style.transform='scale(1.06)'"
                         onmouseout="this.style.transform='scale(1)'">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- DENAH --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="text-align:center; margin-bottom:48px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Denah</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; margin:0;">Denah Lantai Cendana</h2>
            </div>

            {{-- 3 Lantai portrait --}}
            <div class="row g-4 justify-content-center mb-4">
                <div class="col-6 col-md-4">
                    <div class="floor-card">
                        <img src="{{ asset('img/cendana/lt1.png') }}" alt="Lantai 1 Cendana">
                        <div class="floor-card-label">Ground Floor</div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="floor-card">
                        <img src="{{ asset('img/cendana/lt2.png') }}" alt="Lantai 2 Cendana">
                        <div class="floor-card-label">2nd Floor</div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="floor-card">
                        <img src="{{ asset('img/cendana/lt3.png') }}" alt="Lantai 3 Cendana">
                        <div class="floor-card-label">Upper Floor</div>
                    </div>
                </div>
            </div>

            {{-- Site Map landscape full width --}}
            <div class="floor-card">
                <img src="{{ asset('img/sitemap.jpg') }}" alt="Site Map"
                     style="width:100%;height:auto;object-fit:contain;max-height:480px;">
                <div class="floor-card-label">Site Map</div>
            </div>

            {{-- CTA --}}
            <div style="text-align:center; margin-top:56px;">
                <a href="https://wa.me/6281319999806?text=Hi%20saya%20tertarik%20dengan%20Tipe%20Cendana"
                   target="_blank"
                   style="display:inline-flex; align-items:center; gap:10px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; text-decoration:none; color:#fff; background:#1a3a2e; border-radius:9999px; padding:16px 36px; box-shadow:0 4px 20px rgba(26,58,46,0.25); transition:background 0.25s;"
                   onmouseover="this.style.background='#D4622A'"
                   onmouseout="this.style.background='#1a3a2e'">
                    Book Sekarang
                    <span style="display:inline-flex;align-items:center;justify-content:center;width:24px;height:24px;border-radius:50%;background:rgba(255,255,255,0.15);font-size:13px;">↗</span>
                </a>
            </div>
        </div>
    </section>

    @include('templates/footer')

    <script>
        function changePhoto(thumb, src, fit) {
            const main = document.getElementById('mainPhoto');
            main.style.opacity = '0';
            setTimeout(() => {
                main.src = src;
                main.style.objectFit = fit || 'cover';
                main.style.background = fit === 'contain' ? '#0d2218' : 'transparent';
                main.style.opacity = '1';
            }, 200);
            document.querySelectorAll('.slide-thumb').forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
        }
    </script>
</body>
</html>