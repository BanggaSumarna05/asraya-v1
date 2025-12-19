<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta') @include('templates/head')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
</style>

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
                <div class="carousel-item active" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="new/assets/img/F11.jpg"
                        alt="First slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                CASA ASRAYA
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                AUTHENTICALLY LIVING
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="new/assets/img/cover-clubhouse.jpg"
                        alt="Second slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                CLUB HOUSE
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                EXCLUSIVE FACILITIES
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="img/cendana/F10.jpg"
                        alt="Third slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                CENDANA
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                at CASA ASRAYA
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="img/mahogany/mahogany-interior-0.jpg"
                        alt="Fourth slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                MAHOGANY
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                at CASA ASRAYA
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/gal8.webp"
                        alt="Fifth slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                BRANDGANG
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                at CASA ASRAYA
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/gal4.webp"
                        alt="Sixth slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                GREEN ENVIRONMENT
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                NATURE & COMFORT
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
                        </h4>
                    </div>
                </div>
                <div class="carousel-item" style="height: 100vh">
                    <img
                        class="d-block w-100 h-100"
                        src="img/gallery1/F6.jpg"
                        alt="Seventh slide"
                        style="object-fit: cover" />
                    <div
                        class="carousel-caption d-flex flex-column justify-content-end align-items-end h-100 p-3">
                        <div class="side-text-overlay">
                            <h2
                                style="
                    font-family: 'Playfair Display', serif;
                    font-size: 2.5rem;
                    margin: 0;
                    letter-spacing: 2px;
                  ">
                                CASA ASRAYA
                            </h2>
                            <p
                                style="
                    margin: 0;
                    font-size: 1.2rem;
                    letter-spacing: 1px;
                    color: #00261c;
                  ">
                                AUTHENTICALLY LIVING
                            </p>
                        </div>
                        <h3>
                            <a
                                href="https://wa.me/6281399998066"
                                class="text-white"
                                target="_blank"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fab fa-whatsapp"></i> Chat via Whatsapp</a>
                        </h3>
                        <h4>
                            <a
                                href="tel:6281399998066"
                                class="text-white"
                                style="
                    text-decoration: none;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                  "><i class="fas fa-phone"></i> +628 1399 9980 66</a>
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
                        alt="Simulasi KPR"
                        style="object-fit: cover;" />
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
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Harga Properti (Rp)</label>
                                            <input
                                                type="text"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="propertyPrice"
                                                placeholder="Contoh: 1.500.000.000"
                                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                                required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Uang Muka / DP (Rp)</label>
                                            <input
                                                type="text"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="downPayment"
                                                placeholder="Contoh: 1.000.000.000"
                                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Suku Bunga per Tahun</label>
                                            <input
                                                type="text"
                                                step="0.01"
                                                class="form-control form-control-lg bg-white border-0 shadow-sm"
                                                id="interestRate"
                                                placeholder="Contoh: 5.5 (dalam %)"
                                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                                required />
                                        </div>
                                        <div class="col-md-6 mb-3">
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
                                        onclick="calculateKPR()"
                                        style="
                          background-color: #00261c;
                          border: none;
                          font-weight: 500;
                          letter-spacing: 1px;
                        ">
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
                                        style="
                          color: #00261c;
                          font-weight: bold;
                          font-family: 'Playfair Display', serif;
                        "></h2>
                                    <p class="small text-muted mb-0 mt-2">
                                        *Perhitungan ini merupakan estimasi. Suku bunga dapat
                                        berubah sewaktu-waktu sesuai kebijakan bank.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function calculateKPR() {
                    const price = parseInt(document.getElementById("propertyPrice").value.replace(/\./g, '')) || 0;
                    const dp = parseInt(document.getElementById("downPayment").value.replace(/\./g, '')) || 0;
                    const annualRate = parseFloat(document.getElementById("interestRate").value.replace(/\./g, '')) || 0;
                    const years = parseInt(document.getElementById("loanTerm").value) || 0;

                    if (!price || !dp || !annualRate || !years || price <= dp) {
                        alert(
                            "Mohon masukkan data yang valid. Harga properti harus lebih besar dari DP."
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
        </div>
    </div>

    @include('templates/footer')
</body>

</html>