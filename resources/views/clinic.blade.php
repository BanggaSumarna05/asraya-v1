<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Dr Synd Slim & Beauty Clinic — Casa Asraya</title>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; position:relative; overflow:hidden; min-height:65vh; display:flex; align-items:flex-end; padding:clamp(80px,18vw,140px) clamp(16px,4vw,48px) clamp(40px,6vw,64px);">
        <div style="position:absolute;inset:0;background:url('{{ $data['cover'] }}') center/cover; opacity:0.4;"></div>
        <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(26,58,46,0.9) 0%, rgba(26,58,46,0.2) 70%, transparent 100%);"></div>
        <div style="position:relative;z-index:2; max-width:700px;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Wellness Center</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,5vw,3.5rem); font-weight:300; color:#fff; line-height:1.1; letter-spacing:-0.02em; margin:0 0 16px;">{{ $data['name'] }}</h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.7); margin:0; line-height:1.7;">Destinasi utama perawatan kecantikan dan kesehatan tubuh secara menyeluruh.</p>
        </div>
    </section>

    {{-- CLINIC DESCRIPTION --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div style="border-radius:2.5rem; overflow:hidden; aspect-ratio:4/3; background:#e8e4de;">
                        <img src="{{ $data['cover'] }}" alt="Dr Synd Clinic" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Tentang Klinik</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">Dr Synd Slim &amp; Beauty Clinic</h2>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0 0 16px;">
                        Selamat datang di Dr Synd Slim & Beauty Clinic, tempat transformasi bertemu dengan kesegaran baru. Klinik kami merupakan destinasi utama bagi Anda yang menginginkan solusi perawatan kecantikan dan kesehatan tubuh yang komprehensif.
                    </p>
                    <p style="font-size:15px; color:#555; line-height:1.9; margin:0;">
                        Kami memahami bahwa penampilan terbaik beriringan dengan kesehatan yang optimal. Dipimpin oleh tenaga profesional berdedikasi, kami siap membantu mewujudkan impian estetika Anda secara personal dan tepercaya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- DOCTOR PROFILE --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px); border-top:1px solid #e8e4de; border-bottom:1px solid #e8e4de;">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4">
                    <div style="border-radius:2rem; overflow:hidden; border:1px solid #e8e4de; box-shadow:0 8px 30px rgba(0,0,0,0.03); background:#f5f1ea; padding:12px;">
                        <img src="{{ asset('img/drSynd/drSynd.jpg') }}" alt="Dr. Syndy Taurisia" style="width:100%; border-radius:1.5rem; display:block;">
                    </div>
                </div>
                <div class="col-lg-8">
                    <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Dokter Pendiri</p>
                    <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:300; color:#1a3a2e; line-height:1.2; margin:0 0 24px;">Dr. Syndy Taurisia</h2>
                    <div style="font-size:15px; color:#555; line-height:1.85; display:flex; flex-direction:column; gap:16px;">
                        <p>
                            Dr. Syndy Taurisia adalah praktisi medis berdedikasi tinggi dengan ketertarikan mendalam pada pengobatan holistik serta estetika medis. Memulai perjalanannya di Pekanbaru, dedikasi beliau didorong oleh komitmen tulus membantu pasien mencapai keseimbangan hidup sehat.
                        </p>
                        <p>
                            Sejak tahun 2015, beliau terus memperdalam keahliannya melalui berbagai sertifikasi estetika medis nasional. Beliau juga aktif memadukan metode akupunktur dan akupresur bersertifikat dari KEPPTI Bekasi serta berpengalaman aktif dalam kolaborasi bersama Lembaga Estetika Medik Jakarta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OUR WORK GALLERY --}}
    @if(isset($pics) && count($pics) > 0)
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="text-align:center; margin-bottom:56px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Koleksi</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.8rem,3.5vw,2.6rem); font-weight:300; color:#1a3a2e; margin:0 0 16px;">Our Work</h2>
                <p style="font-size:14.5px; color:#666; max-width:620px; margin:0 auto; line-height:1.8;">
                    Dokumentasi hasil perawatan terbaik yang kami lakukan dengan standar profesionalisme tinggi demi memberikan hasil optimal bagi para klien.
                </p>
            </div>
            <div class="row g-4">
                @foreach ($pics as $item)
                    <div class="col-6 col-md-4">
                        <div style="border-radius:1.5rem; overflow:hidden; aspect-ratio:1; background:#fff; border:1px solid #e8e4de; box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                            <img src="{{ $item }}" alt="Work item" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;"
                                 onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('templates/footer')
</body>
</html>
