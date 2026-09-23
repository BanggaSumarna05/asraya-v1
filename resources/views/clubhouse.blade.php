<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Clubhouse - Casa Asraya</title>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; position:relative; overflow:hidden; min-height:70vh; display:flex; align-items:flex-end; padding:clamp(80px,18vw,140px) clamp(16px,4vw,48px) clamp(40px,6vw,64px);">
        <div style="position:absolute;inset:0;background:url('{{ $data['cover'] }}') center/cover; opacity:0.4;"></div>
        <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(26,58,46,0.9) 0%, rgba(26,58,46,0.2) 70%, transparent 100%);"></div>
        <div style="position:relative;z-index:2; max-width:700px;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Fasilitas Premium</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:300; color:#fff; line-height:1.1; letter-spacing:-0.02em; margin:0 0 16px;">{{ $data['name'] }}</h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); margin:0; line-height:1.7; max-width:520px;">Fasilitas eksklusif di jantung komunitas Casa Asraya, dirancang untuk penghuni.</p>
        </div>
    </section>

    {{-- KONTEN --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div style="border-radius:2.5rem; overflow:hidden; aspect-ratio:4/3; background:#e8e4de;">
                        <img src="{{ $data['cover'] }}" alt="Clubhouse Casa Asraya"
                             style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Fasilitas</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">Clubhouse Eksklusif</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                        Clubhouse Casa Asraya berdiri sebagai jantung komunitas Pesona Hutan Asraya, sebuah ruang eksklusif yang dirancang untuk memperkaya gaya hidup penghuni dengan memadukan keindahan alam dan fasilitas modern berkelas internasional.
                    </p>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 24px;">
                        Tersedia lima fasilitas utama yang dapat dinikmati seluruh penghuni, mulai dari kolam renang, pusat kebugaran, yoga club, restoran &amp; lounge, hingga community area yang menjadi tempat bersantai dan bersosialisasi antar penghuni.
                    </p>
                    <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:28px;">
                        <span style="display:inline-flex; align-items:center; gap:6px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.06em; text-transform:uppercase; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:8px 16px;">
                            <span style="width:6px;height:6px;background:#1a3a2e;border-radius:50%;flex-shrink:0;"></span>
                            Swimming Pool
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:6px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.06em; text-transform:uppercase; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:8px 16px;">
                            <span style="width:6px;height:6px;background:#1a3a2e;border-radius:50%;flex-shrink:0;"></span>
                            Fitness Center
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:6px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.06em; text-transform:uppercase; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:8px 16px;">
                            <span style="width:6px;height:6px;background:#1a3a2e;border-radius:50%;flex-shrink:0;"></span>
                            Yoga Club
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:6px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.06em; text-transform:uppercase; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:8px 16px;">
                            <span style="width:6px;height:6px;background:#D4622A;border-radius:50%;flex-shrink:0;"></span>
                            Restaurant &amp; Lounge
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:6px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.06em; text-transform:uppercase; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:8px 16px;">
                            <span style="width:6px;height:6px;background:#1a3a2e;border-radius:50%;flex-shrink:0;"></span>
                            Community Area
                        </span>
                    </div>
                    <a href="https://wa.me/6281319999806?text=Halo%20saya%20ingin%20info%20Clubhouse%20Casa%20Asraya"
                       target="_blank"
                       style="display:inline-flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;color:#fff;background:#1a3a2e;border-radius:9999px;padding:14px 28px;transition:background 0.25s;"
                       onmouseover="this.style.background='#D4622A'" onmouseout="this.style.background='#1a3a2e'">
                        Hubungi Kami ↗
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('templates/footer')
</body>
</html>
