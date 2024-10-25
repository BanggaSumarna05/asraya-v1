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

<body>
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

                Penggemar kebugaran akan menghargai gym kami yang canggih, dilengkapi dengan mesin-mesin mutakhir dan
                dan pelatih ahli untuk membantu Anda mencapai tujuan kesehatan dan kebugaran Anda. Dari latihan kardio
                hingga latihan kekuatan
                kekuatan, gym kami menawarkan pengalaman kebugaran yang komprehensif untuk semua tingkatan.
            </p>
        </div>
        @include('templates/units')
        @include('templates/facilities')
        @include('templates/igFeeds')
    </div>
    @include('templates/footer')
</body>

</html>
