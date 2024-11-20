<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
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
                        Pesona Hutan Asraya adalah proyek properti premium yang dirancang untuk memenuhi kebutuhan pasar
                        high-end, dimana desain modern bertemu dengan keanggunan dunia properti eksklusif. Kami dengan
                        bangga mempersembahkan hunian yang menonjolkan kualitas pada setiap detailnya, mencerminkan
                        komitmen kami terhadap inovasi dan keunggulan. Desain yang elegan berpadu harmonis dengan bahan
                        berkualitas tinggi dan pengerjaan yang penuh ketelitian.
                        <br>
                        Pesona Hutan Asraya menghadirkan keseimbangan sempurna antara kenyamanan modern dan ketenangan
                        alam yang menenangkan. Setiap elemen di sini dirancang dengan penuh perhatian untuk menciptakan
                        kehidupan yang harmonis, memberikan pengalaman tinggal yang meningkatkan kualitas hidup
                        penghuninya

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
                                    Dengan bangga, kami memperkenalkan Bapak O’ozaro B. Larosa, lulusan Institut
                                    Teknologi Bandung yang kini menjabat sebagai Managing Director di PT Casa Asraya
                                    Properti. Berbekal semangat yang tinggi, ketelitian, serta pengalaman luas dalam
                                    memimpin tim, beliau mampu mengarahkan perusahaan menuju perbaikan dan pertumbuhan
                                    yang signifikan. Dukungan tim manajemen dan staf profesional semakin memperkuat
                                    dedikasi beliau dalam memperluas ekspansi pasar global.
                                    <br>
                                    Sejak 2007, Bapak O’ozaro Larosa telah berkiprah di industri teknik, pertambangan,
                                    dan perusahaan EPC di Asia Tenggara dan Timur Tengah, menjadikannya salah satu ahli
                                    terkemuka kami dalam bisnis internasional.

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
                                    Atelier Riri adalah firma arsitektur dan desain yang didirikan oleh Novriansyah
                                    Yakub, atau yang lebih dikenal dengan nama Riri, di Jakarta. Firma ini berkembang
                                    dari visi dan prinsip yang dipegang teguh oleh Riri sejak memulai karirnya di dunia
                                    arsitektur pada tahun 2005.
                                    <br>
                                    Seiring berjalannya waktu, Atelier Riri semakin
                                    berkembang dengan memperluas keahlian dan layanannya, meliputi arsitektur, desain
                                    interior, arsitektur lanskap, dan desain produk.
                                    Atelier Riri menjadi simbol komitmen terhadap kreativitas dan inovasi, mencerminkan
                                    dedikasi Riri dalam memperkaya setiap ruang dengan menghadirkan konsep-konsep
                                    imajinatif yang segar dan penuh inspirasi.

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
    <div id="maps" class="site-section" style="margin: 0px;padding: 0px">
        <div class="container" data-aos="fade-up">
            <center>
                <div class="site-section-heading text-center w-border">
                    <h2>Our Location</h2>
                </div>
            </center>
            <div class="row gx-9 h-100">
                <div class="col-sm-6 mb-10 mb-sm-0">
                    <div class="overlay p-2">
                        <img class="w-100 card-rounded lazy" src="old/assets/img/maps-02.png" alt="">
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
                        Casa Asraya Properti dengan bangga mempersembahkan blok real estat istimewa di Pekanbaru,
                        menawarkan pengalaman hidup mewah yang eksklusif. Dirancang dengan fasilitas kelas atas dan tata
                        letak yang luas, properti ini menjadi pilihan ideal bagi mereka yang menginginkan kemewahan
                        dalam setiap aspek kehidupan. Dengan lokasi yang sangat strategis, Casa Asraya Properti
                        menyediakan hunian yang menggabungkan keindahan, kenyamanan, dan kualitas hidup terbaik di
                        Pekanbaru.
                        <br><br>
                        Berikut adalah lokasi-lokasi terdekat dari kawasan Pesona Hutan Asraya: 
                    </p>
                    <ul>
                        <li>15 Menit ke Bandara Internasional Syarif Kasim II</li>
                        <li>10 Menit ke Rumah Sakit Awal Bros</li>
                        <li>10 Menit ke Mall Pekanbaru</li>
                        <li>10 Menit ke HS Soeman Library</li>
                        <li>10 Menit ke Central Business District</li>
                        <li>3 Menit ke Kantor Polisi Daerah</li>
                    </ul>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
    @include('templates/footer')
</body>

</html>
