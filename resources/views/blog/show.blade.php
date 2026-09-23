<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates.meta')
    @include('templates.head')
    <title>{{ $post->title }} — Casa Asraya</title>
    <style>
        .blog-content-body {
            font-size: 16px;
            color: #444;
            line-height: 1.9;
        }
        .blog-content-body p {
            margin-bottom: 24px;
        }
        .blog-content-body h2, .blog-content-body h3, .blog-content-body h4 {
            font-family: 'Outfit', sans-serif;
            color: #1a3a2e;
            margin-top: 40px;
            margin-bottom: 16px;
            font-weight: 500;
        }
        .blog-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 1.5rem;
            margin: 24px 0;
            border: 1px solid #e8e4de;
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            text-decoration: none;
            color: #1a3a2e;
            background: #fff;
            border: 1px solid #e8e4de;
            border-radius: 9999px;
            padding: 12px 24px;
            transition: all 0.25s;
            margin-bottom: 40px;
        }
        .back-btn:hover {
            background: #1a3a2e;
            color: #fff;
            border-color: #1a3a2e;
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates.navbar')

    @php
        use App\Helpers\BlogHelper;
    @endphp

    {{-- MAIN CONTENT AREA --}}
    <main style="padding: 140px clamp(16px,4vw,48px) 80px;">
        <div class="container" style="padding-left:0; padding-right:0; max-width:820px;">
            
            {{-- Back Link --}}
            <a href="{{ route('blog.index') }}" class="back-btn">
                <span>←</span> Kembali ke Blog
            </a>

            {{-- Post Card --}}
            <article style="background:#fff; border-radius:2.5rem; border:1px solid #e8e4de; padding:clamp(24px,5vw,56px); box-shadow:0 8px 30px rgba(0,0,0,0.03);">
                
                {{-- Meta --}}
                <div style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.15em; text-transform:uppercase; color:#D4622A; margin-bottom:16px;">
                    {{ optional($post->category)->name ?? 'Artikel' }} &nbsp;·&nbsp; {{ $post->created_at->format('d M Y') }}
                </div>

                {{-- Title --}}
                <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(1.8rem,4vw,2.8rem); font-weight:300; color:#1a3a2e; line-height:1.2; letter-spacing:-0.01em; margin:0 0 32px;">
                    {{ $post->title }}
                </h1>

                {{-- Featured Image --}}
                @if ($post->image)
                    <div style="border-radius:1.5rem; overflow:hidden; margin-bottom:40px; border:1px solid #e8e4de; aspect-ratio:16/9;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                    </div>
                @endif

                {{-- Content Body --}}
                <div class="blog-content-body">
                    {!! BlogHelper::convertMedia($post->content) !!}
                </div>

            </article>

        </div>
    </main>

    @include('templates.footer')
</body>
</html>
