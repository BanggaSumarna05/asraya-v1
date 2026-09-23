<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Sejarah & Profil - Casa Asraya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; position:relative; overflow:hidden; min-height:65vh; display:flex; align-items:center; padding:140px clamp(16px,4vw,48px) 80px; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('new/assets/img/F11.jpg') }}') center/cover; opacity:0.18;"></div>
        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center, transparent 30%, rgba(26,58,46,0.7) 100%);"></div>
        <div style="position:relative;z-index:2; max-width:700px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Profil Perusahaan</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.5rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                PESONA HUTAN ASRAYA
            </h1>
            <p style="font-size:13px; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; color:rgba(255,255,255,0.5); margin:0 0 16px;">The Ultimate Luxury Living Experience in Pekanbaru</p>
            <p style="font-size:15px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:520px; margin:0 auto;">
                Living Harmony in Nature is the Authentically Living
            </p>
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                    <div style="border-radius:2.5rem; overflow:hidden; aspect-ratio:4/5;">
                        <img src="{{ asset('img/reduce/F5.jpg') }}" alt="Casa Asraya"
                             style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div style="padding:clamp(0px,3vw,40px);">
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Kami</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">
                            Hunian Asri di Tengah Hutan Kota Pekanbaru
                        </h2>
                        <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                            <strong style="color:#1a3a2e;">Pesona Hutan Asraya</strong> merupakan sebuah kawasan hunian premium yang dirancang untuk menghadirkan keseimbangan sempurna antara kehidupan modern dan keindahan alam. Berlokasi strategis di Kota Pekanbaru, Riau, proyek ini dikembangkan dengan visi menciptakan lingkungan tempat tinggal yang eksklusif, nyaman, sehat, dan berkelanjutan bagi generasi masa kini maupun masa depan.
                        </p>
                        <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 32px;">
                            Lebih dari sekadar perumahan, Pesona Hutan Asraya adalah sebuah destinasi hidup yang menggabungkan arsitektur modern, fasilitas kelas premium, ruang terbuka hijau, serta konsep <strong style="color:#1a3a2e;">resort living</strong> yang memberikan pengalaman tinggal berbeda dari kawasan hunian konvensional.
                        </p>

                        {{-- Stats --}}
                        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:16px;">
                            @foreach([['2022', 'Tahun Berdiri'], ['29', 'Total Unit'], ['3', 'Tipe Hunian']] as $stat)
                            <div style="background:#fff; border:1px solid #e8e4de; border-radius:1.5rem; padding:20px 16px; text-align:center;">
                                <div style="font-family:'Outfit',sans-serif; font-size:clamp(1.4rem,3vw,2rem); font-weight:600; color:#1a3a2e; margin-bottom:4px;">{{ $stat[0] }}</div>
                                <div style="font-size:11px; color:#888; letter-spacing:0.05em; text-transform:uppercase;">{{ $stat[1] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FILOSOFI ASRAYA --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="max-width:680px; margin:0 auto 56px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Filosofi</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 20px;">Makna "Āśraya"</h2>
                <p style="font-size:15px; color:#555; line-height:1.9; margin:0;">
                    Nama <strong style="color:#1a3a2e;">Āśraya</strong> berasal dari bahasa Sanskerta yang bermakna: tempat berlindung, tempat bertumpu, sumber kehidupan, dan tempat kembali. Dalam filosofi kehidupan Timur, Asraya melambangkan tempat di mana manusia menemukan keseimbangan antara kebutuhan fisik, emosional, sosial, dan spiritual.
                </p>
            </div>
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1px; background:#e8e4de; border:1px solid #e8e4de; border-radius:2rem; overflow:hidden;">
                @php
                $asrayaMeanings = [
                    ['num' => '01', 'title' => 'Tempat Berlindung',   'desc' => 'Ruang yang memberi rasa aman dan nyaman bagi seluruh penghuni.'],
                    ['num' => '02', 'title' => 'Sumber Kehidupan',    'desc' => 'Lingkungan yang menumbuhkan dan menopang kehidupan yang berkualitas.'],
                    ['num' => '03', 'title' => 'Tempat Kembali',      'desc' => 'Rumah sejati yang selalu dirindukan setelah menjalani hari.'],
                    ['num' => '04', 'title' => 'Perlindungan',        'desc' => 'Kawasan yang menjaga keamanan dan privasi penghuni sepenuhnya.'],
                    ['num' => '05', 'title' => 'Tempat Bertumpu',     'desc' => 'Fondasi kuat untuk kehidupan keluarga yang harmonis dan berkelanjutan.'],
                    ['num' => '06', 'title' => 'Keseimbangan Hidup',  'desc' => 'Memadukan alam, modernitas, dan kenyamanan dalam satu kesatuan.'],
                ];
                @endphp
                @foreach($asrayaMeanings as $m)
                <div style="background:#fff; padding:32px 28px;">
                    <div style="font-family:'Outfit',monospace; font-size:11px; font-weight:600; color:#D4622A; letter-spacing:0.12em; margin-bottom:12px;">{{ $m['num'] }}</div>
                    <h3 style="font-family:'Outfit',sans-serif; font-size:15px; font-weight:600; color:#1a3a2e; margin:0 0 10px; line-height:1.3;">{{ $m['title'] }}</h3>
                    <p style="font-size:13px; color:#888; line-height:1.75; margin:0;">{{ $m['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- LOKASI & AKSESIBILITAS --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4 align-items-start">
                <div class="col-lg-4">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Lokasi Premium</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 20px;">Di Jantung Pekanbaru</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0;">
                    Berada di salah satu kawasan paling strategis di Kota Pekanbaru, Provinsi Riau, pusat pertumbuhan ekonomi terbesar di Sumatera bagian tengah.
                    </p>
                </div>
                <div class="col-lg-8">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        @php
                        $locations = [
                            ['15 mnt', 'Bandara Internasional Sultan Syarif Kasim II'],
                            ['10 mnt', 'Mall Pekanbaru'],
                            ['10 mnt', 'Perpustakaan Soeman HS'],
                            ['10 mnt', 'Central Business District Pekanbaru'],
                            [' 3 mnt', 'Polda Riau'],
                            ['< 15 mnt', 'RS Arifin Achmad & Awal Bros Hospital'],
                        ];
                        @endphp
                        @foreach($locations as $loc)
                        <div style="background:#fff; border:1px solid #e8e4de; border-radius:1.25rem; padding:20px 24px; display:flex; align-items:center; gap:20px;">
                            <div style="flex-shrink:0; text-align:right; min-width:52px;">
                                <div style="font-family:'Outfit',monospace; font-size:17px; font-weight:700; color:#1a3a2e; line-height:1;">{{ $loc[0] }}</div>
                            </div>
                            <div style="width:1px; height:32px; background:#e8e4de; flex-shrink:0;"></div>
                            <div style="font-family:'Outfit',sans-serif; font-size:13px; color:#555; line-height:1.5;">{{ $loc[1] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG DEVELOPER --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Developer</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.6rem,3vw,2.4rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 20px;">Casa Asraya</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                        Dikembangkan oleh <strong style="color:#1a3a2e;">Casa Asraya</strong>, perusahaan pengembang properti yang berkomitmen menghadirkan standar baru dalam industri real estate Indonesia. Casa Asraya percaya bahwa properti bukan hanya sekadar bangunan, melainkan ruang kehidupan yang akan membentuk kualitas hidup penghuninya selama bertahun-tahun.
                    </p>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 28px;">
                        Dirancang oleh <strong style="color:#1a3a2e;">Atelier Riri</strong> yang dipimpin arsitek ternama <strong style="color:#1a3a2e;">Novriansyah Yakub</strong>, dengan pendekatan Modern Tropical Architecture, Sustainability Design, dan Human-Centered Design.
                    </p>
                    <div style="display:flex; flex-wrap:wrap; gap:10px;">
                        @foreach(['Desain Berkelas & Timeless','Kualitas Konstruksi Terbaik','Inovasi Berkelanjutan','Keamanan Investasi','Harmoni dengan Lingkungan'] as $v)
                        <span style="font-family:'Outfit',sans-serif; font-size:11px; font-weight:600; color:#1a3a2e; background:#f5f1ea; border:1px solid #e8e4de; border-radius:9999px; padding:6px 16px;">{{ $v }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div style="background:#1a3a2e; border-radius:2.5rem; padding:40px;">
                        <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Visi Pengembangan</p>
                        <p style="font-size:15px; color:rgba(255,255,255,0.75); line-height:1.9; margin:0 0 28px;">
                            Sebagai bagian dari visi jangka panjang, Casa Asraya tidak hanya mengembangkan hunian eksklusif, tetapi juga memperluas bisnis ke sektor hospitality, resort, kawasan wisata alam, restoran, dan fasilitas rekreasi keluarga yang saling terintegrasi dalam satu ekosistem gaya hidup modern.
                        </p>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            @foreach([['Hunian Premium','Residential'],['Hospitality & Resort','Hotel & Resort'],['Wisata Alam','Eco Tourism'],['Kuliner & Rekreasi','F&B & Lifestyle']] as $v)
                            <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.1); border-radius:1rem; padding:16px 18px;">
                                <div style="font-family:'Outfit',sans-serif; font-size:13px; font-weight:600; color:#fff; margin-bottom:4px;">{{ $v[0] }}</div>
                                <div style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(255,255,255,0.4);">{{ $v[1] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- NILAI PERUSAHAAN --}}
    <section style="background:#1a3a2e; padding:120px 0 100px;">
        <div class="container" style="padding-left:24px; padding-right:24px;">
            <div style="text-align:center; margin-bottom:72px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Keunggulan Kami</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.8rem,3.5vw,2.6rem); font-weight:300; color:#fff; margin:0; line-height:1.2;">Mengapa Casa Asraya?</h2>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:28px;">
                @php
                $features = [
                    ['icon' => 'fa-solid fa-tree',         'title' => 'Green Environment',   'desc' => 'Dikelilingi ruang terbuka hijau dan brandgang yang menciptakan suasana segar dan alami.'],
                    ['icon' => 'fa-solid fa-star',          'title' => 'Premium Design',      'desc' => 'Arsitektur modern dari Atelier Riri dengan material berkualitas tinggi untuk kenyamanan optimal.'],
                    ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Smart Home Ready',   'desc' => 'Infrastruktur siap untuk integrasi sistem smart home guna kehidupan modern yang lebih efisien.'],
                    ['icon' => 'fa-solid fa-location-dot',  'title' => 'Lokasi Strategis',   'desc' => 'Aksesibilitas tinggi ke berbagai fasilitas penting Pekanbaru dalam hitungan menit.'],
                ];
                @endphp
                @foreach($features as $f)
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:2rem; padding:40px; transition:background 0.3s;"
                     onmouseover="this.style.background='rgba(255,255,255,0.12)'"
                     onmouseout="this.style.background='rgba(255,255,255,0.07)'">
                    <div style="width:60px;height:60px; background:rgba(212,98,42,0.15); border-radius:50%; display:flex;align-items:center;justify-content:center; margin-bottom:28px;">
                        <i class="{{ $f['icon'] }}" style="font-size:24px; color:#D4622A;"></i>
                    </div>
                    <h3 style="font-family:'Outfit',sans-serif; font-size:18px; font-weight:600; color:#fff; margin:0 0 14px; line-height:1.3;">{{ $f['title'] }}</h3>
                    <p style="font-family:'Outfit',sans-serif; font-size:14px; color:rgba(255,255,255,0.65); line-height:1.9; margin:0;">{{ $f['desc'] }}</p>
                </div>
                @endforeach
            </div>
            <style>
            @media (max-width: 600px) {
                .feature-grid { grid-template-columns: 1fr !important; }
            }
            </style>
        </div>
    </section>

    @include('templates/footer')
</body>
</html>