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
    <div class="site-blocks-cover overlay" style="background-image:url('new/assets/img/cover-clubhouse-1.jpg')"
        data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-center" style="font-family: 'Archivo'; font-size: 50px">UNIT UNGGULAN</h1>
                    <h4 class="text-white rapih text-center">
                        Casa Asraya adalah tempat di mana keindahan desain bertemu kedamaian hutan dalam satu kesatuan
                        hunian istimewa. Dikelilingi hijaunya pepohonan, dilengkapi fasilitas premium dan dirancang
                        dengan arsitektur memikat. Nikmati hidup asri dan elegan hanya selangkah dari pusat kota.
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="site-section" id="home">
            <div class="row" style="padding-top: -30px">
                @foreach ($units as $item)
                    <div class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
