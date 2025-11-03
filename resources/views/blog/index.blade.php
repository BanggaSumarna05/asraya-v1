<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.meta')
    @include('templates.head')
</head>

<body>
    @include('templates.navbar')
    <div class="container" style="margin-top: 20vh;">

        <h1 class="text-center mb-4 fw-bold">Berita & Artikel</h1>
        <p class="text-center text-muted mb-5">
            Inspirasi seputar Perumahan, Hunian, Desain & Lifestyle.
        </p>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4 col-sm-6 col-md-4 col-lg-4 pb-3 pt-3">
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
        <div class="mt-5  mb-5 d-flex justify-content-center">
            <style>
                svg.w-5.h-5 {
                    width: 22px !important;
                    height: 22px !important;
                }
            </style>

            {{ $posts->links() }}
        </div>
    </div>
    @include('templates.footer')
</body>

</html>
