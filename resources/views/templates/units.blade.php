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
    <div class="site-blocks-cover overlay" style="background-image:url('new/assets/img/cover-clubhouse.jpg')"
        data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="mb-4">Unit Unggulan</h1>
                    <h3 class="align-center text-white">
                        Casa Asraya berdiri sebagai bukti pengalaman gaya hidup holistik, di mana keunggulan arsitektur
                        berpadu dengan keramahan yang tiada banding. Bergabunglah dengan kami dalam perjalanan
                        kemewahan,
                        inovasi, dan peluang tanpa batas ini.
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="site-section" id="home">
            <div class="row" style="padding-top: -30px">
                @foreach ($units as $item)
                <div class="col-12 col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ $item['link'] }}" class="unit-9">
                        <div class="image lazy" style="background-image:url({{ $item['cover'] }})"></div>
                        <div class="unit-9-content">
                            <h2>{{ $item['name'] }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    @include('templates/footer')
</body>

</html>
