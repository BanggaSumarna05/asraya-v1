<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/head')
</head>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover overlay" style="background-image:url({{ $header['img'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="mb-4">{{ $header['header'] }}</h1>
                    <p class="mb-5">
                        <i><q>{{ $header['location'] }}</q></i>
                        {{-- <br>
                        <br>
                        <br>
                        <br>
                        Member Of
                        <br>
                        <img class="image" src="{{ $header['low'] }}" style="max-width: 32%"> --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div id="harmony" class="site-section" style="margin: 0px;padding: 0px">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Vision</h2>
                        </div>
                    </center>
                    <p class="rapih">
                        Kami berdedikasi untuk menciptakan tempat tinggal yang tenang, di mana ketenangan dan kenyamanan
                        terjalin untuk meningkatkan pengalaman kedamaian rumah.
                    </p>
                </div>
                <div class="col-12">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Mission</h2>
                        </div>
                    </center>
                    <p class="rapih">
                    <ul>
                        <li>
                            Mengintegrasikan ketenangan dari hutan kota ke dalam ruang kota yang semarak, menyelaraskan
                            alam dengan kehidupan modern.
                        </li>
                        <li>
                            Memprioritaskan nilai tambah, komitmen, dan keunggulan tanpa henti untuk mendapatkan
                            kepercayaan dari pelanggan dan mitra.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="harmony" class="site-section" style="margin: 0px;padding: 0px">
        <br>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Harmony</h2>
                            <br>
                            <b>Humanity. Authenticity. Respect. Mastery. Openness. NoveltY.</b>
                            <br><br>
                        </div>
                    </center>
                    <p class="rapih">
                        Dengan menjunjung tinggi nilai inti HARMONI, Casa Asraya dapat memantapkan dirinya sebagai
                        perusahaan properti yang berkomitmen untuk menciptakan ruang yang tidak hanya memenuhi kebutuhan
                        praktis tetapi juga memperkaya kehidupan individu dan masyarakat dengan mengedepankan
                        keselarasan dalam semua aspek operasi dan pengembangannya, di mana orang merasa dihargai,
                        didukung, dan menginspirasi.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Humanity
                    </h4>
                    <p class="rapih">
                        Memprioritaskan kesejahteraan semua individu dengan mengakui pentingnya ketenangan dan
                        keterkaitan antara manusia dan alam.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Authenticity
                    </h4>
                    <p class="rapih">
                        Berusaha untuk menjadi unik dan orisinil dalam semua aspek produk bisnis kami.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Respect
                    </h4>
                    <p class="rapih">
                        Komitmen terhadap keadilan, pertimbangan, dan memberikan nilai tambah bagi semua pemangku
                        kepentingan
                        membangun dan memelihara hubungan yang harmonis.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Mastery
                    </h4>
                    <p class="rapih">
                        Mengejar keunggulan dan peningkatan berkelanjutan, berjuang untuk mencapai standar tertinggi
                        keahlian dan profesionalisme.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Openness
                    </h4>
                    <p class="rapih">
                        Mengedepankan transparansi, komunikasi, dan kolaborasi di dalam
                        dalam organisasi dan dengan mitra eksternal.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        NoveltY
                    </h4>
                    <p class="rapih">
                        Merangkul inovasi, kreativitas, dan eksplorasi ide dan solusi baru
                        untuk
                        mengatasi tantangan dan peluang dalam dinamika pasar.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    @include('templates/footer')
</body>

</html>
