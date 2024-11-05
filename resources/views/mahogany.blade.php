<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/head')
    <style>
        .carousel-control-next,
        .carousel-control-prev,
        .carousel-indicators {
            filter: invert(100%);
        }

        .icx {
            width: 36px;
            height: 36px;
        }
    </style>
</head>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover overlay unit-1 lazy-bg" style="background-image:url({{ $data['cover'] }})"
        data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
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
            {{-- @include('templates/spesifikasi') --}}

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
                <div class="site-block-retro d-block d-md-flex">
                    <h1 class="mb-4">Lantai Dasar</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <img class="image-fluid w-100 lazy" src="img/mahogany/lt1.png">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <img class="image-fluid w-100 lazy" src="img/mahogany/lt2.png">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <img class="image-fluid w-100 lazy" src="img/mahogany/lt3.png">
                    </div>
                </div>
            </div>

            {{-- facility --}}
            <br>
            <div>
                <h1 class="mb-4">
                    Facility
                </h1>
                {{--  --}}
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">                    
                    <tbody>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/sleeping.png" class="icx" alt="">
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                3 Master Rooms <br>
                                1 Housekeeper’s room
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/dinner-table.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                1 Dining Room
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/kitchen-table.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                1 Kitchen
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/car-in-garage.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                1 Carport
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/bathroom.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                4 Bathroom
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/livingroom.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                3 Living Room
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/balcony.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                1 Balcony
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="symbol symbol-4px me-3">
                                    <img src="img/reduce/icons/private-garage.png" class="icx" alt="">
                                </div>
                            </td>
                            <td>
                                1 Garage
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
        </div>
        {{-- @include('templates/units') --}}
        {{-- @include('templates/igFeeds') --}}
    </div>

    @include('templates/footer')
</body>

</html>
