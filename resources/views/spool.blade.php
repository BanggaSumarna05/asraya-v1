<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Kolam Renang — Casa Asraya</title>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; position:relative; overflow:hidden; min-height:65vh; display:flex; align-items:flex-end; padding:clamp(80px,18vw,140px) clamp(16px,4vw,48px) clamp(40px,6vw,64px);">
        <div style="position:absolute;inset:0;background:url('{{ $data['cover'] }}') center/cover; opacity:0.4;"></div>
        <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(26,58,46,0.9) 0%, rgba(26,58,46,0.2) 70%, transparent 100%);"></div>
        <div style="position:relative;z-index:2; max-width:700px;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Fasilitas</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,5vw,3.5rem); font-weight:300; color:#fff; line-height:1.1; letter-spacing:-0.02em; margin:0 0 16px;">{{ $data['name'] }}</h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.7); margin:0; line-height:1.7;">Rasakan kesegaran dan ketenangan di kolam renang yang dikelilingi hijaunya alam.</p>
        </div>
    </section>

    {{-- CONTENT --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div style="border-radius:2.5rem; overflow:hidden; aspect-ratio:4/3; background:#e8e4de;">
                        <img src="{{ $data['cover'] }}" alt="{{ $data['name'] }}" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Swimming Pool</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">Kolam Renang Alami &amp; Asri</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                        Berenanglah di kolam renang kami yang berkilau, tempat yang ideal untuk menyejukkan diri di hari yang
                        cerah atau sekadar berendam di lingkungan yang tenang.
                    </p>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 32px;">
                        Apakah Anda lebih suka berenang atau bersantai di tepi kolam renang dengan minuman yang menyegarkan, area kolam renang kami menjanjikan kenikmatan tanpa akhir bagi penghuni segala usia.
                    </p>
                    <a href="https://wa.me/6281319999806?text=Halo%20saya%20tertarik%20dengan%20info%20Kolam%20Renang%20Casa%20Asraya" target="_blank"
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
