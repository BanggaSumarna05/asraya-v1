<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates.meta')
    @include('templates.head')
    <title>Berita & Artikel - Casa Asraya</title>
    <style>
        .blog-card {
            background: #fff;
            border-radius: 2rem;
            border: 1px solid #e8e4de;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.03);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(26,58,46,0.08);
        }
        .blog-img-wrapper {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #e8e4de;
        }
        .blog-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .blog-card:hover .blog-img-wrapper img {
            transform: scale(1.05);
        }
        .blog-info {
            padding: 28px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .blog-title {
            font-family: 'Outfit', sans-serif;
            font-size: 18px;
            font-weight: 500;
            color: #1a3a2e;
            line-height: 1.4;
            margin: 0 0 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-desc {
            font-size: 14px;
            color: #666;
            line-height: 1.7;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-meta {
            font-family: 'Outfit', monospace;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #D4622A;
            margin-bottom: 8px;
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates.navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; padding:140px clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden; text-align:center;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:720px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Berita &amp; Inspirasi</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Artikel &amp; Kegiatan
            </h1>
            <p style="font-size:14.5px; color:rgba(255,255,255,0.7); line-height:1.8; max-width:540px; margin:0 auto;">
                Inspirasi seputar properti, hunian asri, tips desain, dan gaya hidup modern.
            </p>
        </div>
    </section>

    {{-- ARTICLES GRID --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                            <div class="blog-card">
                                @if ($post->image)
                                    <div class="blog-img-wrapper">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    </div>
                                @endif
                                <div class="blog-info">
                                    <span class="blog-meta">
                                        {{ optional($post->category)->name ?? 'Artikel' }} &nbsp;·&nbsp; {{ $post->created_at->format('d M Y') }}
                                    </span>
                                    <h2 class="blog-title">{{ $post->title }}</h2>
                                    <p class="blog-desc">
                                        {{ Str::limit(strip_tags($post->content), 120) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mt-5 d-flex justify-content-center">
                <style>
                    svg.w-5.h-5 {
                        width: 20px !important;
                        height: 20px !important;
                    }
                    nav[role="navigation"] {
                        font-family: 'Outfit', sans-serif;
                    }
                    nav[role="navigation"] a, nav[role="navigation"] span {
                        border-radius: 8px !important;
                        margin: 0 4px;
                    }
                </style>
                {{ $posts->links() }}
            </div>
        </div>
    </section>

    @include('templates.footer')
</body>
</html>
