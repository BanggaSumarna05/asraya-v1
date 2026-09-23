<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Visi & Misi - Casa Asraya</title>
</head>

<body style="background: #f5f1ea; font-family: 'Outfit', system-ui, sans-serif;">
    @include('templates/navbar')

    {{-- HERO BANNER --}}
    <section style="background: #1a3a2e; padding: 140px clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:680px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Tentang Kami</p>
            <h1 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Visi, Misi &amp; Nilai
            </h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:480px; margin:0 auto;">
                Fondasi yang membangun kepercayaan dan komitmen kami terhadap hunian premium di Pekanbaru.
            </p>
        </div>
    </section>

    {{-- VISI & MISI --}}
    <section style="background: #f5f1ea; padding: 80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0; padding-right:0;">

            {{-- Visi --}}
            <div style="background:#fff; border-radius:2.5rem; border:1px solid #e8e4de; padding:clamp(28px,5vw,56px); margin-bottom:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:20px;">
                    <div style="width:48px; height:48px; background:#1a3a2e; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                    </div>
                    <div>
                        <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 4px;">Visi</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.3rem,2.5vw,1.8rem); font-weight:500; color:#1a3a2e; margin:0; line-height:1.2;">Hunian yang Tenang dan Nyaman</h2>
                    </div>
                </div>
                <p style="font-size:15px; color:#555; line-height:1.9; margin:0; padding-left:64px;">
                    Kami berdedikasi untuk membangun rumah tinggal yang tenang dan nyaman dimana keluarga menikmati
                    tinggal didalam rumah yang penuh kedamaian dan ketenangan.
                </p>
            </div>

            {{-- Misi --}}
            <div style="background:#fff; border-radius:2.5rem; border:1px solid #e8e4de; padding:clamp(28px,5vw,56px); margin-bottom:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:20px;">
                    <div style="width:48px; height:48px; background:#1a3a2e; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    </div>
                    <div>
                        <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 4px;">Misi</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.3rem,2.5vw,1.8rem); font-weight:500; color:#1a3a2e; margin:0; line-height:1.2;">Komitmen Kami</h2>
                    </div>
                </div>
                <ul style="font-size:15px; color:#555; line-height:1.9; margin:0; padding-left:80px; display:flex; flex-direction:column; gap:12px;">
                    <li>Mengintegrasikan ketenangan dari hutan kota ke dalam ruang kota yang semarak, menyelaraskan alam dengan kehidupan modern.</li>
                    <li>Memprioritaskan nilai tambah, komitmen, dan keunggulan tanpa henti untuk mendapatkan kepercayaan dari pelanggan dan mitra.</li>
                </ul>
            </div>

        </div>
    </section>

    {{-- HARMONY VALUES --}}
    <section style="background: #1a3a2e; padding: 80px clamp(16px,4vw,48px); position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0; background:radial-gradient(ellipse at 80% 20%, rgba(212,98,42,0.08) 0%, transparent 60%);"></div>
        <div class="container" style="padding-left:0; padding-right:0; position:relative; z-index:2;">

            {{-- Header --}}
            <div style="text-align:center; margin-bottom:56px;">
                <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Nilai Inti</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 16px;">HARMONY</h2>
                <p style="font-size:13px; color:rgba(255,255,255,0.5); letter-spacing:0.15em; text-transform:uppercase; margin:0;">
                    Humanity · Authenticity · Respect · Mastery · Openness · NoveltY
                </p>
                <p style="font-size:14.5px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:680px; margin:24px auto 0;">
                    Dengan menjunjung tinggi nilai inti HARMONY, Casa Asraya memantapkan dirinya sebagai perusahaan properti yang berkomitmen menciptakan ruang yang memperkaya kehidupan individu dan masyarakat.
                </p>
            </div>

            {{-- Grid --}}
            @php
            $values = [
                ['letter' => 'H', 'name' => 'Humanity',     'desc' => 'Memprioritaskan kesejahteraan semua individu dengan mengakui pentingnya ketenangan dan keterkaitan antara manusia dan alam.'],
                ['letter' => 'A', 'name' => 'Authenticity', 'desc' => 'Berusaha untuk menjadi unik dan orisinil dalam semua aspek produk bisnis kami.'],
                ['letter' => 'R', 'name' => 'Respect',      'desc' => 'Komitmen terhadap keadilan, pertimbangan, dan memberikan nilai tambah bagi semua pemangku kepentingan, membangun hubungan yang harmonis.'],
                ['letter' => 'M', 'name' => 'Mastery',      'desc' => 'Mengejar keunggulan dan peningkatan berkelanjutan, berjuang mencapai standar tertinggi keahlian dan profesionalisme.'],
                ['letter' => 'O', 'name' => 'Openness',     'desc' => 'Mengedepankan transparansi, komunikasi, dan kolaborasi di dalam organisasi dan dengan mitra eksternal.'],
                ['letter' => 'Y', 'name' => 'NoveltY',      'desc' => 'Merangkul inovasi, kreativitas, dan eksplorasi ide serta solusi baru untuk mengatasi tantangan dalam dinamika pasar.'],
            ];
            @endphp

            <div class="row g-4">
                @foreach($values as $val)
                <div class="col-12 col-md-6 col-lg-4">
                    <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.1); border-radius:2rem; padding:32px; height:100%; transition:background 0.3s;"
                         onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                         onmouseout="this.style.background='rgba(255,255,255,0.06)'">
                        <div style="width:52px; height:52px; border:2px solid #D4622A; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
                            <span style="font-family:'Outfit',sans-serif; font-size:22px; font-weight:600; color:#D4622A;">{{ $val['letter'] }}</span>
                        </div>
                        <h3 style="font-family:'Outfit',sans-serif; font-size:18px; font-weight:500; color:#fff; margin:0 0 12px;">{{ $val['name'] }}</h3>
                        <p style="font-size:14px; color:rgba(255,255,255,0.6); line-height:1.8; margin:0;">{{ $val['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    @include('templates/footer')
</body>
</html>
