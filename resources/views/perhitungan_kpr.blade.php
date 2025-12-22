<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* General Styles */
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

        /* Video Background */
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

        /* Video Wrapper */
        .video-wrap {
            float: left;
            width: 100%;
            max-width: 420px;
            aspect-ratio: 16 / 9;
            margin: 24px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Side Text Overlay */
        .side-text-overlay {
            position: absolute;
            right: -10vh;
            top: 40%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.85) 35%,
                    rgba(255, 255, 255, 1) 100%);
            padding: 30px 60px 30px 40px;
            text-align: right;
            color: #333;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .side-text-overlay h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin: 0;
            letter-spacing: 2px;
        }

        .side-text-overlay p {
            margin: 0;
            font-size: 1.2rem;
            letter-spacing: 1px;
            color: #00261c;
        }

        /* Carousel Styles */
        .carousel-item {
            height: 100vh;
        }

        .carousel-item img {
            object-fit: cover;
        }

        .carousel-caption {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-end;
            height: 100%;
            padding: 3rem;
        }

        .carousel-caption h3 a,
        .carousel-caption h4 a {
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* KPR Form Styles */
        #about .col-md-6:first-child img {
            object-fit: cover;
        }

        #about .btn-dark {
            background-color: #00261c;
            border: none;
            font-weight: 500;
            letter-spacing: 1px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .video-wrap {
                float: none;
                display: block;
                margin: 0 auto 20px auto;
                max-width: 100%;
                width: 100%;
            }

            .carousel-caption {
                padding: 1.5rem;
            }

            .side-text-overlay {
                position: relative;
                right: 0;
                top: 0;
                background: rgba(255, 255, 255, 0.9);
                padding: 20px;
                text-align: center;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .side-text-overlay h2 {
                font-size: 1.8rem;
            }

            .side-text-overlay p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .facility-wrapper {
                padding-top: 25%;
            }

            .carousel-caption h3,
            .carousel-caption h4 {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover">
        <div
            id="homeCarousel"
            class="carousel slide"
            data-ride="carousel"
            data-interval="5000">
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
                <div class="carousel-item active">
                    <img
                        class="d-block w-100 h-100"
                        src="new/assets/img/F11.jpg"
                        alt="First slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>CASA ASRAYA</h2>
                            <p>AUTHENTICALLY LIVING</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="new/assets/img/cover-clubhouse.jpg"
                        alt="Second slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>CLUB HOUSE</h2>
                            <p>EXCLUSIVE FACILITIES</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="img/cendana/F10.jpg"
                        alt="Third slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>CENDANA</h2>
                            <p>at CASA ASRAYA</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="img/mahogany/mahogany-interior-0.jpg"
                        alt="Fourth slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>MAHOGANY</h2>
                            <p>at CASA ASRAYA</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/gal8.webp"
                        alt="Fifth slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>BRANDGANG</h2>
                            <p>at CASA ASRAYA</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/gal4.webp"
                        alt="Sixth slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>GREEN ENVIRONMENT</h2>
                            <p>NATURE & COMFORT</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/F6.jpg"
                        alt="Seventh slide" />
                    <div class="carousel-caption">
                        <div class="side-text-overlay">
                            <h2>CASA ASRAYA</h2>
                            <p>AUTHENTICALLY LIVING</p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> Chat via Whatsapp
                            </a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white">
                                <i class="fas fa-phone"></i> +628 1399 9980 66
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
            <a
                class="carousel-control-prev"
                href="#homeCarousel"
                role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="carousel-control-next"
                href="#homeCarousel"
                role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container-fluid p-0" id="home">
        <div id="about" class="lazy-bg">
            <div class="row m-0">
                <div class="col-md-6 p-0" style="min-height: 100vh;">
                    <img
                        src="img/gallery1/F7.jpg"
                        class="img-fluid w-100 h-100"
                        alt="Simulasi KPR" />
                </div>
                <div class="col-md-6 d-flex align-items-center bg-light">
                    <div class="w-100 p-5">
                        <div class="card shadow-none border-0 bg-transparent">
                            <div class="card-body p-0">
                                <h2
                                    class="text-left mb-4"
                                    style="font-family: 'Playfair Display', serif; color: #00261c">
                                    Simulasi Cicilan KPR
                                </h2>
                                <form id="kprForm" class="small">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-sm-12 mb-3">
                                            <label class="form-label">Harga Properti (Rp)</label>
                                            <input
                                                type="text"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="propertyPrice"
                                                placeholder="Contoh: 1.500.000.000"
                                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                                required />
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 mb-3">
                                            <label class="form-label">Uang Muka / DP (Rp)</label>
                                            <input
                                                type="text"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="downPayment"
                                                placeholder="Contoh: 1.000.000.000"
                                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                                required />
                                        </div>

                                        <div class="col-12 col-md-12 col-sm-12 mb-3">
                                            <label class="form-label">Suku Bunga per Tahun</label>
                                            <input
                                                type="number"
                                                step="0.01"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="interestRate"
                                                placeholder="Contoh: 5.5 (dalam %)"
                                                required />
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 mb-3">
                                            <label class="form-label">Jangka Waktu (Tahun)</label>
                                            <input
                                                type="number"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="loanTerm"
                                                placeholder="Contoh: 20"
                                                required />
                                        </div>
                                    </div>
                                    <button
                                        type="button"
                                        class="btn btn-dark w-100 mt-4 py-3 shadow-sm"
                                        onclick="calculateKPR()">
                                        Hitung Estimasi Cicilan
                                    </button>
                                </form>

                                <div
                                    id="kprResult"
                                    class="mt-5 p-4 text-center d-none"
                                    style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                                    <p class="text-muted mb-1">Estimasi Cicilan Per Bulan</p>
                                    <h2
                                        id="monthlyInstallment"
                                        style="color: #00261c; font-weight: bold; font-family: 'Playfair Display', serif;">
                                    </h2>
                                    <p class="small text-muted mb-0 mt-2">
                                        *Perhitungan ini merupakan estimasi. Suku bunga dapat
                                        berubah sewaktu-waktu sesuai kebijakan bank.
                                    </p>
                                </div>
                                <div class="mt-5 text-center">
                                    <h4 class="mb-5">Supported Bank</h4>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('templates/footer')

    <script>
        function calculateKPR() {
            const price = parseInt(document.getElementById("propertyPrice").value.replace(/\./g, '')) || 0;
            const dp = parseInt(document.getElementById("downPayment").value.replace(/\./g, '')) || 0;
            const annualRate = parseFloat(document.getElementById("interestRate").value) || 0;
            const years = parseInt(document.getElementById("loanTerm").value) || 0;

            if (!price || !dp || !annualRate || !years || price <= dp) {
                alert(
                    "Mohon masukkan data yang valid. Harga properti harus lebih besar dari DP, yaitu: " + dp
                );
                return;
            }

            const principal = price - dp;
            const monthlyRate = annualRate / 100 / 12;
            const numberOfPayments = years * 12;

            const x = Math.pow(1 + monthlyRate, numberOfPayments);
            const monthly = (principal * x * monthlyRate) / (x - 1);

            if (isFinite(monthly)) {
                const formatter = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                });

                document.getElementById("monthlyInstallment").innerText =
                    formatter.format(monthly);
                document.getElementById("kprResult").classList.remove("d-none");
                document
                    .getElementById("kprResult")
                    .scrollIntoView({
                        behavior: "smooth",
                        block: "nearest"
                    });
            }
        }
    </script>
</body>

</html>