<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
</head>
<style>
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
</style>

<body style="font-family: 'Archivo'">
    @include('templates/navbar')
    <div class="site-blocks-cover video-bg overlay lazy-bg" data-aos="fade">
        <video autoplay loop muted playsinline style="filter:none;" id="heroVideo">
            <source src="#" type="video/mp4" id="videoSource">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="site-section" id="home">
        <div class="" data-aos="2de">
            <div class="container" data-aos="fade-up">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <center>
                            <h2 class="mb-5"><i>
                                    A PRESTIGIOUS ADDRESS
                                    IN THE ONE OF THE BIGGEST ECONOMIC CENTRE IN SUMATERA</i></h2>
                        </center>
                    </div>
                    <div class="col-md-7">
                        <div class="video-container" style="margin-top: 6px">
                            <iframe width="610" height="100%"
                                src="https://www.youtube.com/embed/ntQcdtnWgds?si=y0dyMfkvTF9QyfHD?autoplay=1"
                                title="ASRAYA PROPERTY - LIVING HARMONY IN NATURE" frameborder="0"
                                allow="autoplay; encrypted-media;" referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-5 text-center w-border mx-auto">
                        <p class="rapih">
                            Kami menghadirkan perumahan premium yang mengutamakan desain modern dengan sentuhan alam,
                            kami
                            menciptakan hunian yang menggabungkan suasana hutan tropis di tengah hiruk-pikuk kota.
                            Pesona
                            Hutan Asraya memberikan pengalaman tinggal yang sejuk dan nyaman, dengan keseimbangan antara
                            kenyamanan alam dan kemudahan akses ke pusat kehidupan perkotaan.
                            <br>
                            Kami selalu berkomitmen untuk
                            menghadirkan inovasi dalam setiap desain yang dirancang dengan seksama serta menggunakan
                            material berkualitas tinggi yang menjamin daya tahan dan keindahan hunian. Dengan demikian,
                            properti ini menjadi pilihan utama bagi mereka yang menginginkan pengalaman hidup yang penuh
                            keindahan dan ketenangan, di tengah dinamika kota yang terus berkembang
                        </p>
                    </div>
                </div>
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
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="mt-1"><img src="img/reduce/Pak andika rev.png" alt="Andhika Permana"
                                            class="img-fluid lazy"></div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="mt-1"><img src="img/reduce/Pak ooz rev.png" alt="O'ozaro Larosa"
                                            class="img-fluid lazy"></div>
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="maps" class="site-section">
            <div class="container" data-aos="fade-up">
                <center>
                    <div class="site-section-heading text-center w-border">
                        <h2>Our Location</h2>
                    </div>
                </center>
                <div class="row gx-9 h-100">
                    <div class="col-sm-6 mb-10 mb-sm-0">
                        <div class="overlay p-2">
                            <img class="w-100 card-rounded lazy" src="/old/assets/img/maps-02.png" alt="">
                            <div class="d-flex flex-row-reverse py-4">
                                <a href="https://maps.app.goo.gl/SAUiNRp6t8WuwxfX9" class="btn btn-primary"
                                    target="_blank">See on
                                    Maps</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-10 mb-sm-0">
                        <br><br><br>
                        <p class="rapih">
                            Kami mempersembahkan townhouse terbaik di Pekanbaru, menawarkan lokasi
                            yang eksklusif dan dekat dengan kota. Properti yang dirancang oleh arsitek <i>Atelier
                                Riri</i>,
                            memiliki fasilitas terbaik, tata letak yang luas, dan pemandangan yang memukau. Dengan
                            lokasi di tengah kota dan fitur premium, Pesona Hutan Asraya dapat menjangkau
                            fasilitas-fasilitas
                            strategis untuk menyempurnakan gaya hidup yang berkualitas tinggi.
                            <br>
                            Berikut adalah lokasi-lokasi terdekat dari Pesona Hutan Asraya:
                        </p>
                        <ul>
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
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="myModal" name="myModal" role="dialog"
            style="margin-top: 3.4em; border:none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: transparent!important; border: none;">
                    <div class="modal-header">
                        <h3 class="modal-title text-white">Sorotan</h3>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <center>
                                    <h4 class="modal-title text-white">2nd Anniversary</h4>
                                    <br>
                                    <video autoplay loop muted controls class="img-fluid"
                                        src="/vids/aniv_2.mp4"></video>
                                </center>
                            </div>
                            <div class="col-md-6">
                                <center>
                                    <h4 class="modal-title text-white">Promo</h4>
                                    <br>
                                    <img src="img/promo-imlek.png" class="img-fluid" alt="Responsive image">
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates/footer')
</body>

<script type="text/javascript">
    $(document).ready(function() {

        var video = document.getElementById('heroVideo');
        var source = document.getElementById('videoSource');
        if (window.innerWidth <= 768) {
            source.src = "/vids/motion-mobile.mp4";
            video.style.objectFit = "cover";
            video.style.width = "100vw";
            video.style.height = "100vh";
            // alert('mobile');
        } else {
            source.src = "/vids/motion-main.mp4";
            // alert('full');
        }
        video.load();
        jQuery.noConflict();
    });
</script>

</html>
