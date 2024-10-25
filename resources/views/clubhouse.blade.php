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
    <div class="site-blocks-cover overlay unit-1" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
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
                Clubhouse
            </h1>
            <p class="rapih">
                Terletak di dalam komunitas perumahan yang indah, clubhouse ini berdiri sebagai lambang kehidupan mewah
                di sektor real estate di Pekanbaru, Riau. Area ini berfungsi sebagai jantung dari lingkungan tersebut,
                menawarkan penghuni berbagai fasilitas dan rasa kebersamaan yang benar-benar mendefinisikan kehidupan
                modern
                pengalaman hidup modern. <br> <br>
                Dari clubhouse yang elegan dan luas, ideal untuk menikmati alam, hingga pusat kebugaran yang canggih dan
                dan klub yoga yang mempromosikan gaya hidup sehat, clubhouse ini melayani berbagai macam minat dan
                kebutuhan. Area outdoor yang ditata dengan indah, termasuk kolam renang alami dan restoran yang tenang &
                area
                area lounge, memberikan penghuni tempat untuk bersantai dan bersosialisasi. Ini adalah fitur yang
                menonjol di
                lanskap real estat.
            </p>
            <br><br>
            @include('templates/spesifikasi')
        </div>
        @include('templates/units')
        @include('templates/igFeeds')
    </div>
    @include('templates/footer')
</body>

</html>
