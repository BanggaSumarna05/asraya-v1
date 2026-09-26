<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Gaharu Prime — Casa Asraya</title>
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
        <img id="heroBgDay"
             src="/img/gaharu/hero.PNG"
             alt="Gaharu Prime"
             style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;display:block;">
        {{-- Gradient overlay --}}
        <div style="position:absolute;inset:0;background:linear-gradient(160deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.05) 40%, rgba(10,22,15,0.88) 100%);z-index:1;"></div>
        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center, transparent 50%, rgba(0,0,0,0.3) 100%);z-index:1;"></div>

        {{-- Content --}}
        <div style="position:relative;z-index:2;width:100%;padding:clamp(40px,6vw,80px) clamp(24px,5vw,80px);">
            <div style="max-width:720px;">
                <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Tipe Terbaru — Rumah Modern 2 Lantai</p>
                <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2.5rem,6vw,4.8rem); font-weight:200; color:#fff; line-height:1.0; letter-spacing:-0.03em; margin:0 0 20px;">GAHARU PRIME</h1>
                <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;margin:0 0 20px;">
                    <span style="font-size:13px;color:rgba(255,255,255,0.8);letter-spacing:0.08em;">LT: 92m²</span>
                    <span style="width:3px;height:3px;background:rgba(255,255,255,0.4);border-radius:50%;"></span>
                    <span style="font-size:13px;color:rgba(255,255,255,0.8);letter-spacing:0.08em;">LB: 115m²</span>
                    <span style="width:3px;height:3px;background:rgba(255,255,255,0.4);border-radius:50%;"></span>
                    <span style="font-size:13px;color:rgba(255,255,255,0.8);letter-spacing:0.08em;">2 Lantai</span>
                    <span style="width:3px;height:3px;background:rgba(255,255,255,0.4);border-radius:50%;"></span>
                    <span style="font-size:13px;color:#D4622A;font-weight:600;letter-spacing:0.08em;">Mulai Rp1,2 Miliar</span>
                </div>
                <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin:0 0 32px;">
                    <span style="font-size:12px;background:rgba(212,98,42,0.2);color:#ff9f68;border:1px solid rgba(212,98,42,0.4);padding:4px 12px;border-radius:9999px;font-weight:600;">Promo Diskon Rp50 Juta</span>
                    <span style="font-size:12px;background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.25);padding:4px 12px;border-radius:9999px;">DP Rendah</span>
                    <span style="font-size:12px;background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.25);padding:4px 12px;border-radius:9999px;">Cicilan Rp7 Jt/Bln</span>
                </div>
                <a href="https://wa.me/6281399998066?text=Halo%20saya%20tertarik%20dengan%20Tipe%20Gaharu%20Prime"
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

    {{-- OVERVIEW + SPESIFIKASI --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4">
                {{-- Preview Visual --}}
                <div class="col-lg-7">
                    <div style="border-radius:2.5rem; overflow:hidden; background:#1a3a2e;">
                        <img id="mainPhoto" src="{{ asset($data['slide'][0] ?? '') }}" alt="Gaharu Prime Casa Asraya"
                             style="width:100%; height:460px; object-fit:contain; background:#0c1a12; object-position:center; display:block; transition:opacity 0.3s;">
                        <div style="display:flex; gap:10px; padding:16px 20px; overflow-x:auto; scrollbar-width:none;">
                            @foreach($data['slide'] as $idx => $img)
                            <img src="{{ asset($img) }}"
                                 class="slide-thumb {{ $idx === 0 ? 'active' : '' }}"
                                 onclick="changePhoto(this, '{{ asset($img) }}', 'contain')"
                                 alt="foto {{ $idx+1 }}"
                                 style="object-fit:contain; background:#0d2218;">
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Deskripsi + Spec --}}
                <div class="col-lg-5">
                    <div style="background:#1a3a2e; border-radius:2.5rem; padding:clamp(24px,4vw,40px); height:100%;">
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Unit</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.3rem,2.5vw,1.8rem); font-weight:400; color:#fff; margin:0 0 16px;">Tipe Gaharu Prime</h2>
                        <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.85; margin:0 0 24px;">
                            Gaharu Prime menghadirkan konsep <strong style="color:#fff;">Rumah Modern 2 Lantai</strong> dengan desain modern, minimalis, nyaman, dan fungsional yang menyatu dengan alam (Living Harmony in Nature). Sangat cocok untuk keluarga muda yang menginginkan hunian eksklusif berkualitas dengan tata ruang fungsional.
                        </p>

                        {{-- Specs Grid --}}
                        <div>
                            @php
                            $specs = [
                                ['icon' => 'img/reduce/icons/sleeping.png',       'label' => '3 Kamar Tidur (1 Lt 1, 2 Lt 2 termasuk Master Bedroom)'],
                                ['icon' => 'img/reduce/icons/bathroom.png',       'label' => '2 Kamar Mandi (1 Lt 1, 1 Lt 2)'],
                                ['icon' => 'img/reduce/icons/livingroom.png',     'label' => '1 Ruang Keluarga (Area Santai)'],
                                ['icon' => 'img/reduce/icons/kitchen-table.png',  'label' => '1 Dapur & 1 Ruang Makan'],
                                ['icon' => 'img/reduce/icons/car-in-garage.png',  'label' => 'Carport Muat 2 Mobil'],
                                ['icon' => 'img/reduce/icons/balcony.png',        'label' => '1 Balkon (Terhubung Kamar Lt 2)'],
                                ['icon' => 'img/reduce/icons/livingroom.png',     'label' => '1 Backyard (Taman Belakang Hijau)'],
                            ];
                            @endphp
                            @foreach($specs as $s)
                            <div class="spec-row">
                                <div class="spec-icon">
                                    <img src="{{ asset($s['icon']) }}" alt="" style="width:22px;height:22px;filter:brightness(0) invert(1);object-fit:contain;">
                                </div>
                                <span style="font-size:14px; color:rgba(255,255,255,0.85);">{{ $s['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DENAH & SELLING POINTS --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="text-align:center; margin-bottom:48px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tata Ruang</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; margin:0;">Denah Lantai Gaharu Prime</h2>
            </div>

            {{-- Floor plan showcase --}}
            <div class="row g-4 justify-content-center align-items-stretch mb-5">
                <div class="col-12 col-lg-8">
                    <div class="floor-card" style="height:100%;">
                        <img src="{{ asset('img/gaharu/Denah Gaharu.webp') }}" alt="Denah Tipe Gaharu Prime" style="max-height:540px;">
                        <div class="floor-card-label">Denah Lantai 1 & 2 — Gaharu Prime</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">

            </div>

            {{-- Site Map landscape full width --}}
            <div class="floor-card mb-5">
                <img src="{{ asset('img/site-plan-available.jpeg') }}" alt="Site Map"
                     style="width:100%;height:auto;object-fit:contain;max-height:480px;">
                <div class="floor-card-label">Site Map</div>
            </div>

            {{-- CTA --}}
            <div style="text-align:center; margin-top:40px;">
                <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20Tipe%20Gaharu%20Prime"
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
