<!DOCTYPE html>
<html lang="en">

<head>
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
                Jelajahi luar gerbang kami dan temukan energi semarak kota di taman tetangga kami. Terletak di
                belakang Mahoni, ruang publik yang dicintai ini disukai oleh penduduk dari segala usia karena
                fleksibilitasnya dalam mengakomodasi berbagai kegiatan. Dari piknik hingga olahraga luar ruangan,
                benamkan diri Anda dalam permadani budaya Pesona Hutan Asraya saat Anda menjelajahi berbagai kemungkinan
                yang menanti hanya beberapa langkah dari depan pintu Anda.
            </p>
        </div>
        {{-- @include('templates/units')
        @include('templates/facilities')
        @include('templates/igFeeds') --}}
    </div>
    @include('templates/footer')
</body>

</html>