<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Pusat Kebugaran (Gym) — Casa Asraya</title>
    <style>
        .video-card {
            border-radius: 2rem;
            overflow: hidden;
            border: 1px solid #e8e4de;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            background: #fff;
            padding: 12px;
        }
        .video-card video {
            width: 100%;
            border-radius: 1.5rem;
            display: block;
            object-fit: cover;
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; position:relative; overflow:hidden; min-height:65vh; display:flex; align-items:flex-end; padding:clamp(100px,14vw,140px) clamp(16px,4vw,48px) clamp(40px,6vw,64px);">
        <div style="position:absolute;inset:0;background:url('{{ asset($data['cover']) }}') center/cover; opacity:0.4;"></div>
        <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(26,58,46,0.92) 0%, rgba(26,58,46,0.3) 50%, rgba(0,0,0,0.2) 100%);"></div>
        <div style="position:relative;z-index:2; max-width:700px;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Fasilitas</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,5vw,3.5rem); font-weight:300; color:#fff; line-height:1.1; letter-spacing:-0.02em; margin:0 0 16px;">{{ $data['name'] }}</h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.7); margin:0; line-height:1.7;">Menjaga kesehatan tubuh dengan fasilitas olahraga berkualitas tinggi di lingkungan yang asri.</p>
        </div>
    </section>

    {{-- CONTENT --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Wellness &amp; Health</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">Gaya Hidup Sehat di Casa Asraya</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                        Asraya Property menawarkan fasilitas gym yang dirancang untuk memenuhi kebutuhan kebugaran penghuni.
                        Gym ini merupakan bagian dari komitmen Asraya Property dalam menciptakan hunian yang nyaman dan membawa berkah dalam kehidupan, sesuai dengan arti "āśraya" dalam bahasa Sanskerta yang berarti dasar, sumber, bantuan, perlindungan, atau tempat berlindung.
                    </p>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 32px;">
                        Dilengkapi dengan peralatan olahraga modern, area ini menyajikan suasana yang memotivasi Anda untuk selalu aktif setiap hari.
                    </p>
                    <a href="https://wa.me/6281319999806?text=Halo%20saya%20tertarik%20dengan%20info%20Gym%20Casa%20Asraya" target="_blank"
                       style="display:inline-flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;color:#fff;background:#1a3a2e;border-radius:9999px;padding:14px 28px;transition:background 0.25s;"
                       onmouseover="this.style.background='#D4622A'" onmouseout="this.style.background='#1a3a2e'">
                        Tanya via WhatsApp ↗
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="video-card" style="min-height: 250px; background: #e8e4de; display: flex; align-items: center; justify-content: center;">
                                <video src="{{ asset('vids/gym1.webm') }}" autoplay loop muted playsinline preload="metadata" style="width: 100%; height: auto;"></video>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="video-card" style="min-height: 250px; background: #e8e4de; display: flex; align-items: center; justify-content: center;">
                                <video src="{{ asset('vids/gym2.mp4') }}" autoplay loop muted playsinline preload="metadata" style="width: 100%; height: auto;"></video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('templates/footer')
</body>
</html>