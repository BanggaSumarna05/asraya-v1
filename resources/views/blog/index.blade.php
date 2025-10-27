<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.meta')
    @include('templates.head')
</head>

<body>
    @include('templates.navbar')
    <div class="container" style="margin-top: 20vh;">

        <h1 class="text-center mb-4 fw-bold">Blog & Artikel</h1>
        <p class="text-center text-muted mb-5">
            Inspirasi seputar hunian, desain, dan gaya hidup.
        </p>

        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100 border-0">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="fw-semibold">{{ $post->title }}</h5>
                                <p class="text-muted small mb-2">
                                    {{ optional($post->category)->name }} • {{ $post->created_at->format('d M Y') }}
                                </p>
                                <p class="text-secondary" style="font-size:14px;">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

    </div>
    @include('templates.footer')
</body>
</html>
