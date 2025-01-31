<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="font-family: 'Archivo'">
    @include('templates/navbar')
    <div class="site-blocks-cover overlay lazy-bg" style="background-image:url({{ $header['img'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 style="font-family: 'Archivo'; font-size: 50px">{{ $header['header'] }}</h1>
                    <p class="mb-5">
                        <i>{{ $header['location'] }}</i>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="home">
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
                        Kami menghadirkan perumahan premium yang mengutamakan desain modern dengan sentuhan alam, kami
                        menciptakan hunian yang menggabungkan suasana hutan tropis di tengah hiruk-pikuk kota. Pesona
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

    <div id="about" class="site-section p-4 lazy-bg" {{-- style="background-image:url(img/reduce/bg-01.png);
    background-position: center;
  background-size: cover;" --}}>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                    <h2 class="mb-5">Our Collaboration</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-4"><img src="img/reduce/oozaro.png" alt="Image"
                            class="w-60 mx-auto img-fluid lazy"></div>
                </div>
                <div class="col-md-9">
                    <div style="padding: 60px">
                        <h2 class="font-weight-light"><b>O'ozaro B. Larosa</b></h2>
                        <p><u>Managing Director</u></p>
                        <div class="text-center bg-white">
                            <div class="text-black">
                                <p class="rapih">
                                    Oozaro B. Larosa, Managing Director PT Casa Asraya Properti, membawa pengalaman
                                    profesional yang luas dan mendalam dalam industri konstruksi, teknik, dan
                                    pengembangan proyek berskala internasional. Lulusan Teknik Sipil dari Institut
                                    Teknologi Bandung ini memulai kariernya sebagai Civil Engineer pada tahun 2007
                                    sebelum kemudian meniti karier di berbagai sektor strategis.
                                    <br><br>
                                    Sebagai seorang pemimpin dengan visi dan kompetensi tinggi, Oozaro pernah menjabat
                                    di posisi penting di sektor pertambangan, konstruksi oil & gas, dan juga beberapa
                                    proyek pembangunan pabrik yang tersebar di Asia dan timur tengah.
                                    <br><br>
                                    Karirnya berkembang di bidang pengembangan bisnis, dengan pengalaman multidimensi
                                    yang ia
                                    miliki memberikan wawasan yang sangat relevan dalam menghadirkan Pesona Hutan
                                    Asraya, proyek perumahan premium dengan konsep hutan di tengah kota Pekanbaru.
                                    Dengan dedikasi dan visi inovatif, Oozaro memimpin Asraya untuk memberikan solusi
                                    hunian yang tidak hanya memenuhi kebutuhan gaya hidup modern tetapi juga
                                    menghadirkan pengalaman hidup yang dekat dengan alam.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div style="padding: 60px">
                        <h2 class="font-weight-light"><b>Atelier Riri</b></h2>
                        <p><u>Architecture & Design Partner</u></p>
                        <div class="text-center bg-white">
                            <div class="text-black">
                                <p class="rapih">
                                    Atelier Riri, firma arsitektur terkemuka yang didirikan oleh Novriansyah Yakub
                                    (Riri) di Jakarta, telah membangun reputasi sebagai salah satu dari tiga arsitek
                                    terbaik di Indonesia. Sejak 2005, mereka telah menghasilkan karya-karya inovatif di
                                    bidang arsitektur, interior, lanskap, dan desain produk, dengan penekanan pada
                                    fungsi, konteks, dan keberlanjutan.
                                    <br><br>
                                    Dalam proyek perumahan premium tiga lantai, Pesona Hutan Asraya, di Pekanbaru, Riau,
                                    PT Casa Asraya Properti berkolaborasi dengan Atelier Riri untuk menghadirkan desain
                                    rumah tropis yang memadukan nuansa hutan dengan kehidupan perkotaan. Kolaborasi ini
                                    mencerminkan komitmen bersama dalam menciptakan hunian yang harmonis dengan alam,
                                    menggabungkan estetika kontemporer dengan prinsip keberlanjutan, sehingga memberikan
                                    pengalaman tinggal yang unik dan berkualitas tinggi bagi para penghuni.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-4" style="padding-top: 40px"><img src="img/reduce/riri.png" alt="Image"
                            class="w-60 mx-auto img-fluid lazy"></div>
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
                        Casa Asraya Properti mempersembahkan townhouse terbaik di Pekanbaru, menawarkan lokasi yang
                        eksklusif dan dekat dengan aktivitas kota. Properti yang dirancang oleh arsitek ternama,
                        memiliki fasilitas terbaik, tata letak yang luas, dan pemandangan yang memukau. Dengan lokasi di
                        tengah kota dan fitur premium, Pesona Hutan Asraya dapat menjangkau fasilitas-fasilitas
                        strategis untuk menyempurnakan gaya hidup yang berkualitas tinggi.
                        <br>
                        Berikut adalah lokasi-lokasi terdekat dari kawasan Pesona Hutan Asraya:
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
        style="margin-top: 8em; border:none;">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="background-color: transparent!important;">
                <div class="modal-header">
                    <h3 class="modal-title text-white">Sorotan</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <h4 class="modal-title text-white">2nd Anniversary</h4>
                                <video autoplay loop muted controls class="img-fluid" src="/vids/aniv_2.mp4"></video>
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
    @include('templates/footer')
</body>

<script type="text/javascript">
    $(document).ready(function() {
        jQuery.noConflict();
        $('#myModal').modal('show');
    });
</script>

</html>
