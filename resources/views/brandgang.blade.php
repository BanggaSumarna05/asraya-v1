<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <style>
        .carousel-control-next,
        .carousel-control-prev

        /*, .carousel-indicators */
            {
            filter: invert(100%);
        }
    </style>
</head>

<body style="font-family: 'Archivo'">
    @include('templates/navbar')
    <div class="site-blocks-cover overlay" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="mb-4">{{ $data['name'] }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="home">
        <div class="container py-4" data-aos="fade-up">
            <h1 class="mb-4">
                {{ $data['name'] }}
            </h1>
            <p class="rapih">
                Brandgang merupakan salah satu fasilitas yang dihadirkan di kawasan perumahan Pesona Hutan Asraya. Area
                Brandgang ini difungsikan sebagai area taman di antara Blok A & Blok B unit Cendana. secara khusus di
                area brandgang ini akan kami desain sebagai taman yang ditanami pepohonan yang rindang untuk menambah
                nilai keasrian lingkungan demi mewujudkan konsep hunian Pesona Hutan Asraya.
            </p>
        </div>
        {{-- @include('templates/units')
        @include('templates/facilities')
        @include('templates/igFeeds') --}}
    </div>
    @include('templates/footer')
</body>

</html>
