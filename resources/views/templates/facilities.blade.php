<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Fasilitas - Casa Asraya</title>
    <style>
        .facility-card {
            background: #fff;
            border-radius: 2.5rem;
            border: 1px solid #e8e4de;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.03);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .facility-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(26,58,46,0.08);
        }
        .facility-img-wrapper {
            width: 100%;
            aspect-ratio: 16/10;
            overflow: hidden;
            background: #e8e4de;
        }
        .facility-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .facility-card:hover .facility-img-wrapper img {
            transform: scale(1.05);
        }
        .facility-info {
            padding: 32px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        @media (max-width: 576px) {
            .facility-info { padding: 20px; }
            .facility-card { border-radius: 1.5rem; }
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; padding:140px clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('new/assets/img/cover-clubhouse.jpg') }}') center/cover; opacity:0.15;"></div>
        <div style="position:relative;z-index:2; max-width:720px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Fasilitas Premium</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Fasilitas Casa Asraya
            </h1>
            <p style="font-size:14.5px; color:rgba(255,255,255,0.7); line-height:1.8; max-width:540px; margin:0 auto;">
                Temukan perpaduan sempurna antara kehidupan modern nan mewah dengan harmoni alam yang menenangkan.
            </p>
        </div>
    </section>

    {{-- GRID FACILITIES --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4">
                @foreach ($facilities as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="facility-card">
                            <div class="facility-img-wrapper">
                                <img src="{{ asset($item['cover']) }}" alt="{{ $item['title'] }}">
                            </div>
                            <div class="facility-info">
                                <span style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.2em; text-transform:uppercase; color:#D4622A; margin-bottom:8px;">Fasilitas</span>
                                <h2 style="font-family:'Outfit',sans-serif; font-size:20px; font-weight:400; color:#1a3a2e; margin:0 0 16px;">{{ $item['title'] }}</h2>
                                <p style="font-size:13.5px; color:#666; line-height:1.7; margin:0 0 24px;">
                                    Nikmati fasilitas eksklusif yang dirancang khusus untuk kenyamanan, rekreasi, dan gaya hidup sehat Anda di Casa Asraya.
                                </p>
                                <div style="margin-top:auto;">
                                    <a href="{{ route($item['link']) }}"
                                       style="display:inline-flex; align-items:center; gap:8px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; text-decoration:none; color:#1a3a2e; background:#f5f1ea; border-radius:9999px; padding:10px 20px; transition:all 0.25s; border:1px solid #e8e4de;"
                                       onmouseover="this.style.background='#1a3a2e';this.style.color='#fff';"
                                       onmouseout="this.style.background='#f5f1ea';this.style.color='#1a3a2e';">
                                        Selengkapnya
                                        <span>↗</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('templates/footer')
</body>
</html>