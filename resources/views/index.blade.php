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
                        Dimana kehidupan yang luar biasa bertemu dengan desain kontemporer dalam dunia real estat dan
                        properti unggulan. Kami bangga menciptakan sebuah dunia di mana keunggulan hadir di setiap
                        detail rumit dari properti kami. Komitmen kami terhadap inovasi dan kualitas tercermin melalui
                        desain avant-garde kami dan pemilihan material berkualitas tinggi yang dirancang dengan sangat
                        teliti.
                        <br>
                        Lebih dari sekadar mendefinisikan ulang real estat, kami juga merambah ke cakrawala baru. Dengan
                        bangga kami memperkenalkan proyek baru kami yang memukau dan taman hutan
                        yang luas. Bayangkan sebuah hunian yang memadukan kemewahan dan keanggunan, mencerminkan
                        tingkat kecanggihan dan keindahan yang sama dengan keajaiban properti real estat kami.
                        {{-- <br><br>
                        Casa Asraya berdiri sebagai bukti dari pengalaman gaya hidup holistik, di mana keunggulan
                        arsitektur berpadu dengan keramahan yang tiada banding. Bergabunglah dengan kami dalam
                        perjalanan kemewahan, inovasi, dan peluang tanpa batas ini. --}}
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
                                    Tim manajemen profesional dan karyawan dengan bangga mempersembahkan Bapak O’ozaro
                                    Larosa, lulusan Institut Teknologi Bandung, yang kini menjabat sebagai Managing
                                    Director di salah satu anak perusahaan kami, PT Casa Asraya Properti.
                                    </br>
                                    Seorang profesional dengan semangat tinggi untuk keunggulan dan pengalaman dalam
                                    membuka pasar global di bidang teknik, pertambangan, dan perusahaan EPC di Asia
                                    Tenggara & Timur Tengah sejak 2007, Bapak O’ozaro Larosa telah menjadi salah satu
                                    pakar bisnis luar negeri andalan kami.

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
                                    Atelier Riri adalah firma desain dan arsitektur yang didirikan oleh Novriansyah
                                    Yakub, yang juga dikenal sebagai Riri, di Jakarta. Firma ini merupakan representasi
                                    dari perkembangan visi dan prinsip yang dipegang teguh oleh Riri sejak ia memulai
                                    karirnya di bidang arsitektur pada tahun 2005. Seiring berjalannya waktu, Atelier
                                    Riri terus berkembang dan memperluas keahliannya, menghasilkan karya-karya di bidang
                                    arsitektur, desain interior, arsitektur lanskap, dan desain produk. Firma ini
                                    mencerminkan komitmen terhadap kreativitas dan inovasi, yang menggambarkan dedikasi
                                    Riri dalam memperkaya ruang dan mewujudkan konsep-konsep imajinatif.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-4"
                    style="padding-top: 40px"><img src="img/reduce/riri.png" alt="Image"
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
                        Casa Asraya Properti mempersembahkan rencana blok real estate yang luar biasa di Pekanbaru,
                        menawarkan pengalaman hidup mewah dan eksklusif. Properti yang dirancang dengan cermat ini
                        memiliki fasilitas kelas atas, tata letak yang luas, dan pemandangan yang memukau, menjadikannya
                        pilihan sempurna bagi mereka yang mencari kemewahan dalam gaya hidup mereka. Dengan lokasi
                        strategis dan fitur premium, Casa Asraya Properti mendefinisikan ulang gaya hidup kelas atas di
                        Pekanbaru.
                        <br><br>
                        Berikut 5 lokasi terjangkau di Pesona Hutan Asraya :
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
    {{-- @include('templates/units') --}}
    {{-- @include('templates/facilities') --}}
    {{-- @include('templates/progress') --}}
    {{-- @include('templates/galery')
    @include('templates/bankList')
    @include('templates/igFeeds') --}}
    @include('templates/footer')
</body>

</html>
