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
    <div class="site-blocks-cover overlay unit-1 lazy-bg" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
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
                Facility
            </h1>
            <div class="row" style="margin-left: 0.2vh;">
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/sleeping.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    3 Master Rooms <br>
                    1 Housekeeper’s room
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/dinner-table.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    1 Dining Room
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/kitchen-table.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    1 Kitchen
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto " src="img/reduce/icons/car-in-garage.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    1 Carport
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/bathroom.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    4 Bathroom
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/livingroom.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    2 Living Room
                </div>
                <div class="col-1 col-md-1 padding-0">
                    <img class="w-50 mx-auto lazy" src="img/reduce/icons/balcony.png" alt="">
                </div>
                <div class="col-2 col-md-2">
                    1 Balcony
                </div>

            </div>
            <br><br>
            <h1 class="mb-4">
                Specification
            </h2>
            @include('templates/spesifikasi')

            <div class="container">
                <div class="site-block-retro d-block d-md-flex">
                    <h1 class="mb-4">Concept Gallery</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12" style="padding: 0px">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($data['slide'] as $i => $item)
                                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                        <center><img class="image-fluid w-100 lazy" src="{{ $item }}">
                                        </center>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="color:red"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('templates/units')
        @include('templates/igFeeds')
    </div>
    @include('templates/footer')
</body>

</html>
