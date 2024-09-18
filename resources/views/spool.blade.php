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
                Take a dip in our sparkling swimming pool, the ideal spot to cool off on a sunny day or simply soak in
                the serene surroundings. Whether you prefer to swim laps or lounge by the poolside with a refreshing
                drink, our pool area promises endless enjoyment for residents of all ages.
            </p>
        </div>
        @include('templates/units')
        @include('templates/facilities')
        @include('templates/igFeeds')
    </div>
    @include('templates/footer')
</body>

</html>
