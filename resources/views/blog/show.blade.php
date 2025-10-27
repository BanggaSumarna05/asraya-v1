<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head')
    @include('templates.meta')
</head>

<body style="font-family: 'Archivo'">
    @include('templates.navbar')
    @php
        use App\Helpers\BlogHelper;
    @endphp
    <div class="container" style="margin-top: 20vh; margin-bottom: 10vh;">

        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

        <p class="text-muted mb-4">
            {{ optional($post->category)->name }} • {{ $post->created_at->format('d M Y') }}
        </p>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-100 rounded mb-4" style="object-fit:cover;">
        @endif
        <div class="content" style="line-height:1.8; font-size:18px;">
            {!! BlogHelper::convertMedia($post->content) !!}
        </div>

    </div>
    @include('templates.footer')
</body>

</html>
