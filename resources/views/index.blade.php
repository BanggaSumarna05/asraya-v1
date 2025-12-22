<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    .facility-wrapper {
        position: relative;
        z-index: 2;
        padding-top: 15%;
    }

    .facility-item {
        text-align: center;
        color: #fff;
    }

    .facility-icon {
        width: 70px;
        height: 70px;
        /* background: #2f4f2f; */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-size: 26px;
        transition: 0.3s ease;
    }

    .facility-icon i {
        color: #fff;
    }

    .facility-text {
        font-size: 13px;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .facility-item:hover .facility-icon {
        background: transparent;
        transform: translateY(-3px);
    }

    .site-blocks-cover.video-bg {
        position: relative;
        overflow: hidden;
        height: 100vh;
        min-height: 500px;
        display: flex;
        align-items: center;
    }

    .site-blocks-cover.video-bg video {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        object-fit: cover;
        filter: brightness(2);
    }

    .site-blocks-cover.video-bg .container {
        position: relative;
        z-index: 2;
    }

    .video-wrap {
        float: left;
        width: 100%;
        max-width: 420px;
        /* ukuran maksimal video */
        aspect-ratio: 16 / 9;
        margin: 24px;
        border-radius: 8px;
        object-fit: cover;
    }

    /* Responsive breakpoint */
    @media (max-width: 768px) {
        .video-wrap {
            float: none;
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100%;
            width: 100%;
        }
    }

    .side-text-overlay {
        position: absolute;
        right: -10vh;
        top: 40%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.85) 35%, rgba(255, 255, 255, 1) 100%);
        padding: 30px 60px 30px 40px;
        text-align: right;
        color: #333;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }
</style>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover">
        <div id="homeCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
                <li data-target="#homeCarousel" data-slide-to="3"></li>
                <li data-target="#homeCarousel" data-slide-to="4"></li>
                <li data-target="#homeCarousel" data-slide-to="5"></li>
                <li data-target="#homeCarousel" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="new/assets/img/F11.jpg" alt="First slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">CASA ASRAYA</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">AUTHENTICALLY LIVING</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="new/assets/img/cover-clubhouse.jpg" alt="Second slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">CLUB HOUSE</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">EXCLUSIVE FACILITIES</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="img/cendana/F10.jpg" alt="Third slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">CENDANA</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">at CASA ASRAYA</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="img/mahogany/mahogany-interior-0.jpg" alt="Fourth slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">MAHOGANY</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">at CASA ASRAYA</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="img/gallery1/gal8.webp" alt="Fifth slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">BRANDGANG</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">at CASA ASRAYA</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="img/gallery1/gal4.webp" alt="Sixth slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">GREEN ENVIRONMENT</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">NATURE & COMFORT</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh;">
                    <img class="d-block w-100 h-100" src="img/gallery1/F6.jpg" alt="Seventh slide" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin: 0; letter-spacing: 2px;">CASA ASRAYA</h2>
                            <p style="margin: 0; font-size: 1.2rem; letter-spacing: 1px; color: #00261c;">AUTHENTICALLY LIVING</p>
                        </div>
                        <h3><a href="https://wa.me/6281399998066" class="text-white" target="_blank" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a></h3>
                        <h4><a href="tel:6281399998066" class="text-white" style="text-decoration: none; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"><i class="fas fa-phone"></i> +628 1399 9980 66</a></h4>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="site-section container" id="home">
        <div class="row mb-2">
            <div class="col-md-12">
                <center>
                    <h2 class="mb-5"><i>
                            HUNIAN
                            PREMIUM DI TENGAH KOTA RIAU PEKANBARU</i></h2>
                </center>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <iframe
                    src="https://www.youtube.com/embed/ntQcdtnWgds?si=y0dyMfkvTF9QyfHD&autoplay=1&mute=1&loop=1&playlist=ntQcdtnWgds"
                    title="ASRAYA PROPERTY - LIVING HARMONY IN NATURE" frameborder="0"
                    allow="autoplay; encrypted-media;" muted class="video-wrap" allowfullscreen></iframe>
                <p class="rapih" style="font-size: 17.2px;">
                    <b>CASA ASRAYA</b> menghadirkan perumahan premium yang mengutamakan desain modern dengan sentuhan
                    alam,
                    menggabungkan suasana hutan tropis di tengah hiruk-pikuk kota.
                    Kami memberikan perumahan yang sejuk dan nyaman, dengan keseimbangan
                    antara
                    kenyamanan alam dan kemudahan akses ke pusat kehidupan perkotaan.
                    <br><br>
                    Kami selalu berkomitmen untuk menghadirkan inovasi dalam setiap desain yang dirancang dengan
                    seksama serta menggunakan
                    material berkualitas tinggi yang menjamin daya tahan dan keindahan hunian. Dengan demikian,
                    properti ini menjadi pilihan utama bagi mereka yang menginginkan pengalaman hidup yang penuh
                    keindahan
                    dan ketenangan, di tengah dinamika kota Riau.
                </p>
            </div>
        </div>

        <div id="about" class="site-section p-4 lazy-bg">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                        <h2 class="mb-5">Our Management</h2>
                    </div>
                </div>
                <div id="managementCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active item-align-center">
                            <div class="row">
                                <div class="col-6 col-sm-12 col-md-6 col-lg-6">
                                    <div class="mt-1"><img src="img/reduce/Pak andika rev.png" alt="Andhika Permana"
                                            class="img-fluid lazy"></div>
                                </div>
                                <div class="col-6 col-sm-12 col-md-6 col-lg-6">
                                    <div class="mt-1"><img src="img/reduce/Pak ooz rev.png" alt="O'ozaro Larosa"
                                            class="img-fluid lazy"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="map" class="site-section p-4 lazy-bg" data-aos="fade-up">
            <center>
                <div class="site-section-heading text-center w-border">
                    <h2>Our Location</h2>
                </div>
            </center>
            <div class="row gx-9 h-100">
                <div class="col-6 col-sm-12 col-md-6">
                    <div class="overlay p-2">
                        <div class="d-flex flex-row-reverse py-4 video-wrap">
                            <a href="https://maps.app.goo.gl/SAUiNRp6t8WuwxfX9" class="btn-clear"
                                target="_blank"><img class="w-100 card-rounded lazy"
                                    src="img/maps-02.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-12 col-md-6">
                    <p class="rapih" style="font-size: 17.2px;">
                        Kami mempersembahkan perumahan terbaik di Riau, menawarkan lokasi
                        yang eksklusif dan dekat dengan kota. Properti yang dirancang oleh arsitek <i>Atelier
                            Riri</i>,
                        memiliki fasilitas terbaik, tata letak yang luas, dan pemandangan yang memukau.
                        <br>
                        Lokasi terdekat dari CASA ASRAYA:
                    <ul class="pt-10" style="font-size: 17.2px;">
                        <li>
                            15 Menit ke Bandara Internasional Syarif Kasim II
                        </li>
                        <li>
                            10 Menit ke Rumah Sakit Awal Bros
                        </li>
                        <li>
                            10 Menit ke Mall Pekanbaru
                        </li>
                        <li>10 Menit ke HS Soeman Library</li>
                        <li>10 Menit ke Central Business District</li>
                        <li>
                            3 Menit ke Kantor Polisi Daerah
                        </li>
                    </ul>
                    </p>
                    <br>
                    <center>
                        <strong style="font-size: 17.2px;"> Pindai barcode untuk<br> melihat petunjuk arah di Google Maps.</strong>
                        <br>
                        <img src="img/qr_map.png" alt="Location" class="card-rounded lazy" style="width: 200px; height: 200px;">
                        <br>
                    </center>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <div class="site-section-heading text-center w-border">
                <h2 class="mb-5">Supported Bank</h2>
            </div>
            <div class="overflow-hidden position-relative">
                <style>
                    @keyframes scroll {
                        0% {
                            transform: translateX(0);
                        }

                        100% {
                            transform: translateX(-50%);
                        }
                    }

                    .logo-track {
                        display: flex;
                        width: max-content;
                        animation: scroll 100s linear infinite;
                    }

                    .logo-track:hover {
                        animation-play-state: paused;
                    }

                    .logo-item {
                        padding: 0 30px;
                        flex-shrink: 0;
                    }

                    .logo-item img {
                        height: 40px;
                        filter: grayscale(100%);
                        opacity: 0.6;
                        transition: all 0.3s ease;
                    }

                    .logo-item:hover img {
                        filter: grayscale(0%);
                        opacity: 1;
                    }
                </style>
                <div class="logo-track">
                    @php
                    $baseLogos = [
                    ['src' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQD55a8Qe28T83fYzjQYN1OynHljfAcP0Fy1Q&s', 'alt' => 'Bank Central Asia'],
                    ['src' => 'https://www.bankmandiri.co.id/documents/20143/44881086/ag-branding-logo-1.png/842d8cf8-b7fb-3014-9620-21f0f88d8377?t=1623309819034', 'alt' => 'Bank Mandiri'],
                    ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Bank_BRI_2000.svg/1207px-Bank_BRI_2000.svg.png', 'alt' => 'Bank Rakyat Indonesia'],
                    ['src' => 'https://upload.wikimedia.org/wikipedia/commons/3/38/CIMB_Niaga_logo.svg', 'alt' => 'CIMB Niaga'],
                    ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Bank_Negara_Indonesia_logo_%282004%29.svg/1280px-Bank_Negara_Indonesia_logo_%282004%29.svg.png', 'alt' => 'Bank Negara Indonesia'],
                    ];
                    $loopLogos = [];
                    // Create a large enough set (12 repetitions for safety creates a very long strip)
                    for ($i = 0; $i < 12; $i++) {
                        $loopLogos=array_merge($loopLogos, $baseLogos);
                        }
                        @endphp
                        @foreach($loopLogos as $logo)
                        <div class="logo-item">
                        <img src="{{ $logo['src'] }}" alt="{{ $logo['alt'] }}">
                </div>
                @endforeach
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 text-center">
                        <div class="site-section-heading text-center w-border">
                            <h2>Ahli Pemasaran Kami</h2>
                        </div>
                    </div>
                </div>
                <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial text-center p-4">
                                        <img src="https://media.licdn.com/dms/image/v2/C4D03AQFsVE_BNwbEtQ/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1654252880090?e=1767830400&v=beta&t=2Z8AwYhIdT0nP0TTM3Kuie_s3kfC_DsA7yUf9U3gBXI" alt="Mustafa Dzul Akmal" class="img-fluid rounded-circle mx-auto mb-4"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                        <blockquote class="blockquote">
                                            <footer class="text-primary">
                                                Dzul Akmal
                                                <br> <span class="text-muted">(+62) 81399998066</span>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial text-center p-4">
                                        <img src="https://media.licdn.com/dms/image/v2/D5603AQFdOpUSVvKr_Q/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1722926692950?e=1767830400&v=beta&t=sLtTq4kdBpeuCIXf_hw_LAit3HxgoJTcr4KDpAt3KFk" alt="Linda" class="img-fluid rounded-circle mx-auto mb-4" style="width: 120px; height: 120px; object-fit: cover;">
                                        <blockquote class="blockquote">
                                            <footer class="text-primary">
                                                Linda
                                                <br> <span class="text-muted">(+62) 81276365418</span>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                        <span style="color: #00261c; font-size: 2rem;">&leftarrow;</span>
                    </a>
                    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                        <span style="color: #00261c; font-size: 2rem;">&RightArrow;</span>
                    </a>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="promoCarouselPopup" tabindex="-1" role="dialog" aria-labelledby="promoCarouselPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promoCarouselPopupLabel">Promo KPR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div id="promoImageCarousel" class="carousel slide" data-ride="carousel" data-interval="1400">
                        <ol class="carousel-indicators">
                            <li data-target="#promoImageCarousel" data-slide-to="0" class="active">BCA</li>
                            <li data-target="#promoImageCarousel" data-slide-to="1"></li>
                            <li data-target="#promoImageCarousel" data-slide-to="2"></li>
                            <li data-target="#promoImageCarousel" data-slide-to="3"></li>
                            <li data-target="#promoImageCarousel" data-slide-to="4"></li>
                            <li data-target="#promoImageCarousel" data-slide-to="5"></li>
                            <li data-target="#promoImageCarousel" data-slide-to="6"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/promo_bca.jpg" class="d-block w-100" alt="Promo Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="img/promo_mandiri.jpg" class="d-block w-100" alt="Promo Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="img/promo_cimb.jpg" class="d-block w-100" alt="Promo Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="img/promo_bri.jpg" class="d-block w-100" alt="Promo Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="img/promo_bni.webp" class="d-block w-100" alt="Promo Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="img/promo_btn.jpg" class="d-block w-100" alt="Promo Slide 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#promoImageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#promoImageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('templates/footer')
</body>

</html>