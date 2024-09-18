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
                Located within a beautiful residential community, this clubhouse stands as the epitome of luxury living
                in the real estate sector in Pekanbaru, Riau. This area serves as the heart of the neighborhood,
                offering residents an array of amenities and a sense of community that truly defines the modern living
                experience. <br> <br>
                From the elegant and spacious clubhouse, ideal for enjoying nature, to the state-of-the-art gym and warm
                yoga club that promotes a healthy lifestyle, this clubhouse caters to a wide range of interests and
                needs. Beautifully landscaped outdoor areas, including a natural swimming pool and tranquil restaurant &
                lounge area, provide residents with a place to relax and socialize. It is a prominent feature in the
                real estate landscape.
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
