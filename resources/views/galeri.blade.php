<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Galeri Foto - Casa Asraya</title>
    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }
        @media (max-width: 576px) {
            .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        }
        .gallery-card {
            position: relative;
            border-radius: 1.25rem;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
            background: #e8e4de;
        }
        .gallery-card img,
        .gallery-card video {
            width: 100%; height: 100%;
            object-fit: cover;
            image-orientation: from-image;
            display: block;
            transition: transform 0.45s ease;
        }
        .gallery-card:hover img,
        .gallery-card:hover video {
            transform: scale(1.06);
        }
        .gallery-card-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(26,58,46,0.6) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex; align-items: flex-end;
            padding: 20px;
        }
        .gallery-card:hover .gallery-card-overlay { opacity: 1; }
        .gallery-card-overlay span {
            font-family: 'Outfit', sans-serif;
            font-size: 13px; font-weight: 500;
            color: #fff; letter-spacing: 0.04em;
        }

        /* Lightbox */
        #lightbox {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,0.92);
            display: none; align-items: center; justify-content: center;
            padding: 24px;
        }
        #lightbox.active { display: flex; }
        #lightbox-img {
            max-width: 90vw; max-height: 88vh;
            object-fit: contain; border-radius: 1rem;
        }
        .lb-btn {
            position: absolute; top: 50%; transform: translateY(-50%);
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
            color: #fff; border-radius: 50%; width: 48px; height: 48px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 20px; transition: background 0.2s;
            z-index: 10;
        }
        .lb-btn:hover { background: rgba(255,255,255,0.25); }
        #lb-prev { left: 16px; }
        #lb-next { right: 16px; }
        #lb-close {
            position: absolute; top: 16px; right: 16px;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
            color: #fff; border-radius: 50%; width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 18px; transition: background 0.2s;
            z-index: 10;
        }
        #lb-close:hover { background: rgba(212,98,42,0.7); }
        @media (max-width: 576px) {
            .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; }
            #lb-prev { left: 8px; }
            #lb-next { right: 8px; }
            .lb-btn { width: 38px; height: 38px; font-size: 16px; }
            #lightbox { padding: 12px; }
            #lightbox-img { border-radius: 0.5rem; }
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO BANNER --}}
    <section style="background:#1a3a2e; padding:140px clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:680px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Photo Gallery</p>
            <h1 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Keindahan yang<br>Berbicara Sendiri
            </h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:460px; margin:0 auto;">
                Jelajahi setiap sudut Casa Asraya melalui koleksi foto eksklusif.
            </p>
        </div>
    </section>

    {{-- GALLERY GRID --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0; padding-right:0;">
            <div class="gallery-grid" id="galleryGrid">
                @php $imgIdx = 0; @endphp
                @foreach ($data['galeries'] as $item)
                    @if (preg_match('/\.mp4($|\?)/i', $item['gambar']))
                        <div class="gallery-card">
                            <video src="{{ $item['gambar'] }}" preload="metadata" playsinline muted loop></video>
                            <div class="gallery-card-overlay"><span>Video</span></div>
                        </div>
                    @else
                        @php $thisIdx = $imgIdx++; @endphp
                        <div class="gallery-card" data-idx="{{ $thisIdx }}" data-src="{{ $item['gambar'] }}" onclick="openLightbox({{ $thisIdx }})">
                            <img src="{{ $item['gambar'] }}" alt="Gallery Casa Asraya" loading="lazy">
                            <div class="gallery-card-overlay"><span>Lihat Foto</span></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- LIGHTBOX --}}
    <div id="lightbox">
        <div id="lb-close" onclick="closeLightbox()">✕</div>
        <div class="lb-btn" id="lb-prev" onclick="prevPhoto()">‹</div>
        <img id="lightbox-img" src="" alt="Gallery">
        <div class="lb-btn" id="lb-next" onclick="nextPhoto()">›</div>
    </div>

    @include('templates/footer')

    <script>
        const photos = @php
            $imgOnly = array_values(array_filter($data['galeries'], fn($i) => !preg_match('/\.mp4($|\?)/i', $i['gambar'])));
            echo json_encode(array_column($imgOnly, 'gambar'));
        @endphp;
        let currentIdx = 0;

        function openLightbox(idx) {
            currentIdx = idx;
            document.getElementById('lightbox-img').src = photos[currentIdx];
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }
        function prevPhoto() {
            currentIdx = (currentIdx - 1 + photos.length) % photos.length;
            document.getElementById('lightbox-img').src = photos[currentIdx];
        }
        function nextPhoto() {
            currentIdx = (currentIdx + 1) % photos.length;
            document.getElementById('lightbox-img').src = photos[currentIdx];
        }
        document.addEventListener('keydown', e => {
            if (!document.getElementById('lightbox').classList.contains('active')) return;
            if (e.key === 'ArrowLeft') prevPhoto();
            if (e.key === 'ArrowRight') nextPhoto();
            if (e.key === 'Escape') closeLightbox();
        });
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });
    </script>
</body>
</html>
