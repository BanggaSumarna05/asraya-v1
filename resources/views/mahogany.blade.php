<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
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
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body style="font-family: 'Archivo'!important">
    @include('templates/navbar')
    <div class="site-blocks-cover overlay lazy-bg" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-center" style="font-family: 'Archivo'; font-size: 50px">MAHOGANY</h1>
                    <h4 class="text-white rapih text-center">
                        Mahogany di Casa Asraya adalah hunian luas yang terinspirasi alam, menawarkan
                        keanggunan dan ketenangan. Dengan pemandangan hijau dan interior bercahaya, rumah ini
                        menggabungkan kenyamanan modern dengan kedamaian hutan.
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="home">
        <div class="container text-white">
            <div class="row" {{-- secondary color --}} style="background-color: #ad8e79;padding: 3vh">
                <div class="col-5">
                    <div class="align-items-center justify-content-center"
                        style="padding-top: 8vh; padding-bottom: 8vh; ">
                        <h2 class="" style="padding-right: 40px;padding-left: 40px;color:whitesmoke;">
                            TIPE MAHOGANY</h2>
                        <p style="color: whitesmoke;padding-right: 40px;padding-left: 40px; position: -20px"
                            class="mb-4">
                            LT: 157m² | LB: 220m²
                        </p>
                        <p class="rapih" style="padding-right: 40px;padding-left: 40px; font-size: 18px;">
                            Type Mahogany memiliki Luas Bangunan 220m² dengan spesifikasi 3 lantai. Type Mahogany
                            berjumlah
                            4 unit. Dan Keistimewaan Type Mahogany memiliki Connected Garden yang terhubung langsung
                            dengan
                            Clubhouse CASA ASRAYA
                        </p>
                    </div>
                </div>
                <div class="col-7"
                    style="background-image: url('img/mahogany/mahogany-interior-0.jpg'); background-size: cover;">
                </div>
            </div>
            <div class="row" {{-- secondary color --}} style="background-color: white; font-size: 18px;!important">
                <div class="col-lg-7 col-sm-12 col-md-7">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                        style="padding-top: 22vh;">
                        <div class="carousel-inner">
                            @foreach ($data['slide'] as $i => $item)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <center><img class="w-100 lazy" src="{{ $item }}">
                                </center>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="color:red"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12" style="background-color: #ad8e79; padding:0px">
                    <div class="align-items-center justify-content-center"
                        style="padding-top: 8vh;padding-bottom: 8vh;">
                        <h2 class="" style="padding-right: 40px;padding-left: 40px;color: whitesmoke;">
                            Fasilitas</h2>
                        <div style="padding-right: 40px;padding-left: 40px;">
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <tbody>
                                    <tr>
                                        <td width="10%">
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
                                                <img src="img/reduce/icons/dinner-table.png" class="icx"
                                                    alt="">
                                            </div>
                                        </td>
                                        <td>
                                            1 Dining Room
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-4px me-3">
                                                <img src="img/reduce/icons/kitchen-table.png" class="icx"
                                                    alt="">
                                            </div>
                                        </td>
                                        <td>
                                            1 Kitchen
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-4px me-3">
                                                <img src="img/reduce/icons/car-in-garage.png" class="icx"
                                                    alt="">
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
                                                <img src="img/reduce/icons/livingroom.png" class="icx"
                                                    alt="">
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
                                                <img src="img/reduce/icons/private-garage.png" class="icx"
                                                    alt="">
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
                </div>
            </div>

            <div class="site-block-retro d-block d-md-flex">
                <h1 class="mb-4">Lantai Dasar</h1>
            </div>
            <div class="row" {{-- style="background-color: grey" --}}>
                <div class="col-sm-12 col-md-12 col-lg-4" style="padding: 0px">
                    <img class="image-fluid w-100 lazy" src="img/mahogany/LT1 MAHOGANY.png">
                    <h3 style="color:rgba(0,38,28,1)">1st Level</h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4" style="padding: 0px">
                    <img class="image-fluid w-100 lazy" src="img/mahogany/LT2 MAHOGANY.png">
                    <h3 style="color:rgba(0,38,28,1)">2nd Level</h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4" style="padding: 0px">
                    <img class="image-fluid w-100 lazy" src="img/mahogany/LT3 MAHOGANY.png">
                    <h3 style="color:rgba(0,38,28,1)">Upper Level</h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                    <img class="image-fluid w-100 lazy" src="/img/sitemap.jpg" style="width: 100%; height: auto;">
                    <h3 style="color:rgba(0,38,28,1)">Site Map</h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
                    <br>
                    <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
                        class="btn btn-primary btn-block" target="_blank">
                        <span class="icon-whatsapp" style="color:white"></span>&nbsp;
                        Book Now</a>
                    <br>
                </div>
            </div>

        </div>
    </div>
    {{-- @include('templates/units') --}}
    {{-- @include('templates/igFeeds') --}}
    </div>

    @include('templates/footer')
</body>

</html>