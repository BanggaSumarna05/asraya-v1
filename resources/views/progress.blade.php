<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Progress Pembangunan - Casa Asraya</title>
    <style>
        /* ── TABS ── */
        .progress-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }
        .tab-btn {
            padding: 10px 22px;
            border-radius: 100px;
            border: 1.5px solid #c8c2ba;
            background: transparent;
            font-family: 'Outfit', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: #6b6560;
            cursor: pointer;
            transition: all 0.25s ease;
            letter-spacing: 0.03em;
        }
        .tab-btn:hover {
            border-color: #1a3a2e;
            color: #1a3a2e;
        }
        .tab-btn.active {
            background: #1a3a2e;
            border-color: #1a3a2e;
            color: #fff;
        }

        /* ── GRID ── */
        .progress-panel { display: none; }
        .progress-panel.active { display: block; }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 16px;
        }
        @media (max-width: 576px) {
            .photo-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        }

        .photo-card {
            position: relative;
            border-radius: 1.25rem;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
            background: #e8e4de;
        }
        .photo-card img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.45s ease;
        }
        .photo-card:hover img { transform: scale(1.06); }
        .photo-card-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(26,58,46,0.65) 0%, transparent 55%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex; align-items: flex-end;
            padding: 18px;
        }
        .photo-card:hover .photo-card-overlay { opacity: 1; }
        .photo-card-overlay span {
            font-family: 'Outfit', sans-serif;
            font-size: 12px; font-weight: 500;
            color: #fff; letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        /* ── PAGINATION ── */
        .pg-wrap {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 48px;
            flex-wrap: wrap;
        }
        .pg-btn {
            min-width: 40px; height: 40px;
            padding: 0 14px;
            border-radius: 100px;
            border: 1.5px solid #c8c2ba;
            background: transparent;
            font-family: 'Outfit', sans-serif;
            font-size: 13px; font-weight: 500;
            color: #6b6560;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.2s;
            text-decoration: none;
        }
        .pg-btn:hover { border-color: #1a3a2e; color: #1a3a2e; }
        .pg-btn.pg-active {
            background: #1a3a2e;
            border-color: #1a3a2e;
            color: #fff;
        }
        .pg-btn.pg-disabled { opacity: 0.35; pointer-events: none; }

        /* ── LIGHTBOX ── */
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
            cursor: pointer; font-size: 22px; transition: background 0.2s;
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
        #lb-counter {
            position: absolute; bottom: 20px; left: 50%;
            transform: translateX(-50%);
            font-family: 'Outfit', sans-serif;
            font-size: 12px; color: rgba(255,255,255,0.6);
            letter-spacing: 0.1em;
        }
        @media (max-width: 576px) {
            #lb-prev { left: 8px; }
            #lb-next { right: 8px; }
            .lb-btn { width: 38px; height: 38px; font-size: 17px; }
            #lightbox { padding: 12px; }
            #lightbox-img { border-radius: 0.5rem; }
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; padding:140px clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:680px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Construction Update</p>
            <h1 style="font-family:'Outfit',system-ui,sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Progress<br>Pembangunan
            </h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:460px; margin:0 auto;">
                Pantau perkembangan terbaru pembangunan Casa Asraya setiap periodenya.
            </p>
        </div>
    </section>

    {{-- CONTENT --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0; padding-right:0;">

            @if($progress->total() === 0)
                {{-- EMPTY STATE --}}
                <div style="text-align:center; padding:80px 20px;">
                    <div style="font-size:48px; margin-bottom:16px;">🏗️</div>
                    <p style="font-size:15px; color:#6b6560;">Data progress pembangunan belum tersedia.</p>
                </div>
            @else
                {{-- PERIOD TABS --}}
                <div class="progress-tabs" id="periodTabs">
                    @foreach($progress->items() as $i => $period)
                        @php $periodKey = str_replace([' ', '/'], '_', $period['period']); @endphp
                        <button class="tab-btn {{ $i === 0 ? 'active' : '' }}"
                                data-target="panel-{{ $periodKey }}"
                                onclick="switchTab(this, 'panel-{{ $periodKey }}')">
                            {{ $period['period'] }}
                        </button>
                    @endforeach
                </div>

                {{-- PANELS --}}
                @foreach($progress->items() as $i => $period)
                    @php
                        $periodKey = str_replace([' ', '/'], '_', $period['period']);
                        $photos    = $period['images'];
                    @endphp
                    <div id="panel-{{ $periodKey }}" class="progress-panel {{ $i === 0 ? 'active' : '' }}">
                        {{-- Period Label --}}
                        <div style="display:flex; align-items:center; gap:16px; margin-bottom:28px;">
                            <div style="width:4px; height:36px; background:#1a3a2e; border-radius:4px;"></div>
                            <div>
                                <p style="font-size:10px; font-weight:600; letter-spacing:0.22em; text-transform:uppercase; color:#D4622A; margin:0 0 4px;">Periode</p>
                                <h2 style="font-family:'Outfit',sans-serif; font-size:1.35rem; font-weight:500; color:#1a3a2e; margin:0;">{{ $period['period'] }}</h2>
                            </div>
                            <span style="margin-left:auto; background:#1a3a2e1a; color:#1a3a2e; font-size:12px; font-weight:600; padding:6px 14px; border-radius:100px;">
                                {{ count($photos) }} Foto
                            </span>
                        </div>

                        @if(count($photos) === 0)
                            <div style="text-align:center; padding:40px; color:#6b6560; font-size:14px;">
                                Belum ada foto untuk periode ini.
                            </div>
                        @else
                            <div class="photo-grid">
                                @foreach($photos as $idx => $imgPath)
                                    @php
                                        $imgUrl = (str_starts_with($imgPath, 'img/') || str_starts_with($imgPath, '/img/') || str_starts_with($imgPath, 'http') || str_starts_with($imgPath, 'storage/') || str_starts_with($imgPath, '/storage/'))
                                            ? $imgPath
                                            : 'storage/' . $imgPath;
                                    @endphp
                                    <div class="photo-card"
                                         data-period="{{ $periodKey }}"
                                         data-idx="{{ $idx }}"
                                         onclick="openLightbox('{{ $periodKey }}', {{ $idx }})">
                                        <img src="{{ asset($imgUrl) }}"
                                             alt="Progress {{ $period['period'] }}"
                                             loading="lazy">
                                        <div class="photo-card-overlay">
                                            <span>Lihat Foto</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach

                {{-- PAGINATION --}}
                @if($progress->lastPage() > 1)
                    <div class="pg-wrap">
                        {{-- Prev --}}
                        <a href="{{ $progress->previousPageUrl() }}"
                           class="pg-btn {{ !$progress->previousPageUrl() ? 'pg-disabled' : '' }}">
                            ‹ Sebelumnya
                        </a>

                        {{-- Page numbers --}}
                        @for($p = 1; $p <= $progress->lastPage(); $p++)
                            <a href="{{ $progress->url($p) }}"
                               class="pg-btn {{ $progress->currentPage() === $p ? 'pg-active' : '' }}">
                                {{ $p }}
                            </a>
                        @endfor

                        {{-- Next --}}
                        <a href="{{ $progress->nextPageUrl() }}"
                           class="pg-btn {{ !$progress->nextPageUrl() ? 'pg-disabled' : '' }}">
                            Berikutnya ›
                        </a>
                    </div>
                @endif
            @endif

        </div>
    </section>

    {{-- LIGHTBOX --}}
    <div id="lightbox">
        <div id="lb-close" onclick="closeLightbox()">✕</div>
        <div class="lb-btn" id="lb-prev" onclick="prevPhoto()">‹</div>
        <img id="lightbox-img" src="" alt="Progress Pembangunan">
        <div class="lb-btn" id="lb-next" onclick="nextPhoto()">›</div>
        <div id="lb-counter"></div>
    </div>

    @include('templates/footer')

    <script>
        // ── TAB SWITCHER ──
        function switchTab(btn, targetId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.progress-panel').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById(targetId).classList.add('active');
        }

        // ── LIGHTBOX DATA ──
        const periodPhotos = @json($photoMap ?? []);

        let currentPeriod = null;
        let currentIdx    = 0;

        function openLightbox(period, idx) {
            currentPeriod = period;
            currentIdx    = idx;
            updateLightbox();
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        function prevPhoto() {
            const photos = periodPhotos[currentPeriod] || [];
            currentIdx = (currentIdx - 1 + photos.length) % photos.length;
            updateLightbox();
        }

        function nextPhoto() {
            const photos = periodPhotos[currentPeriod] || [];
            currentIdx = (currentIdx + 1) % photos.length;
            updateLightbox();
        }

        function updateLightbox() {
            const photos = periodPhotos[currentPeriod] || [];
            document.getElementById('lightbox-img').src = photos[currentIdx];
            document.getElementById('lb-counter').textContent = (currentIdx + 1) + ' / ' + photos.length;
        }

        document.addEventListener('keydown', e => {
            if (!document.getElementById('lightbox').classList.contains('active')) return;
            if (e.key === 'ArrowLeft')  prevPhoto();
            if (e.key === 'ArrowRight') nextPhoto();
            if (e.key === 'Escape')     closeLightbox();
        });

        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });
    </script>
</body>
</html>
