<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Unit Unggulan — Casa Asraya</title>
    <style>
        .unit-card {
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
        .unit-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(26,58,46,0.08);
        }
        .unit-img-wrapper {
            width: 100%;
            aspect-ratio: 16/10;
            overflow: hidden;
            background: #e8e4de;
        }
        .unit-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .unit-card:hover .unit-img-wrapper img {
            transform: scale(1.05);
        }
        .unit-info {
            padding: clamp(20px, 4vw, 32px);
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; padding:clamp(80px, 18vw, 140px) clamp(16px,4vw,48px) clamp(40px,6vw,80px); position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('new/assets/img/cover-clubhouse-1.jpg') }}') center/cover; opacity:0.15;"></div>
        <div style="position:relative;z-index:2; max-width:720px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Featured Units</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Unit Unggulan kami
            </h1>
            <p style="font-size:14.5px; color:rgba(255,255,255,0.7); line-height:1.8; max-width:540px; margin:0 auto;">
                Temukan pilihan rumah premium dengan desain artistik modern yang asri dan berkelas.
            </p>
        </div>
    </section>

    {{-- GRID UNITS --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4 justify-content-center">
                @foreach ($units as $item)
                    <div class="col-12 col-md-6">
                        <div class="unit-card">
                            <div class="unit-img-wrapper">
                                <img src="{{ asset($item['cover']) }}" alt="{{ $item['name'] }}">
                            </div>
                            <div class="unit-info">
                                <span style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.2em; text-transform:uppercase; color:#D4622A; margin-bottom:8px;">Tipe Unit</span>
                                <h2 style="font-family:'Outfit',sans-serif; font-size:24px; font-weight:400; color:#1a3a2e; margin:0 0 16px;">Tipe {{ $item['name'] }}</h2>
                                <p style="font-size:14px; color:#666; line-height:1.7; margin:0 0 28px;">
                                    {{ $item['description'] ?? 'Hunian premium dengan desain modern dan fasilitas lengkap.' }}
                                </p>
                                <div style="margin-top:auto;">
                                    <a href="{{ route($item['link']) }}"
                                       style="display:inline-flex; align-items:center; gap:10px; font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; text-decoration:none; color:#fff; background:#1a3a2e; border-radius:9999px; padding:12px 28px; transition:background 0.25s;"
                                       onmouseover="this.style.background='#D4622A'"
                                       onmouseout="this.style.background='#1a3a2e'">
                                        Lihat Detail Unit
                                        <span style="font-size:12px;">↗</span>
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
