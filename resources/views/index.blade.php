<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
</head>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover overlay lazy-bg" style="background-image:url({{ $header['img'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="">{{ $header['header'] }}</h1>
                    <p class="mb-5">
                        <i>{{ $header['location'] }}</i>
                        {{-- <br>
                        <br>
                        <br>
                        <br>
                        Member Of
                        <br>
                        <img class="image lazy" src="{{ $header['low'] }}" style="max-width: 32%"> --}}
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
                        <h2 class="mb-5">A PRESTIGIOUS ADDRESS
                            IN THE ONE OF THE BIGGEST ECONOMIC CENTRE IN SUMATERA</h2>
                    </center>
                </div>
                <div class="col-md-7">
                    <div class="video-container">
                        <iframe width="610" height="100%"
                            src="https://www.youtube.com/embed/ntQcdtnWgds?si=y0dyMfkvTF9QyfHD?autoplay=1"
                            title="ASRAYA PROPERTY - LIVING HARMONY IN NATURE" frameborder="0"
                            allow="autoplay; encrypted-media;" referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-5 text-center mb-5 w-border mx-auto" style="padding-top: 12px">
                    <p class="rapih">
                        Di mana kehidupan yang luar biasa bertemu dengan desain kontemporer dalam dunia real estat dan
                        properti unggulan. Kami bangga menciptakan sebuah dunia di mana keunggulan hadir di setiap
                        detail rumit dari properti kami. Komitmen kami terhadap inovasi dan kualitas tercermin melalui
                        desain avant-garde kami dan pemilihan material berkualitas tinggi yang dirancang dengan sangat
                        teliti.
                        <br><br>
                        Lebih dari sekadar mendefinisikan ulang real estat, kami juga merambah ke cakrawala baru. Dengan
                        bangga kami memperkenalkan proyek baru kami—sebuah bisnis hotel yang memukau dan taman hutan
                        yang luas. Bayangkan sebuah penginapan yang memadukan kemewahan dan keanggunan, mencerminkan
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

    <div id="about" class="site-section p-4 lazy-bg"
        style="background-image:url(img/reduce/bg-01.png);
    background-position: center;
  background-size: cover;">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                    <h2 class="mb-5">Our Collaboration</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($managements as $item)
                    <div class="col-md-6">
                        <div class="text-center bg-white">
                            <div class="mb-4 lazy-bg"><img src="{{ $item['img'] }}" alt="Image"
                                    class="w-50 mx-auto img-fluid rounded-circle lazy"></div>
                            <div class="text-black">
                                <h2 class="font-weight-light h5"><b>{{ $item['name'] }}</b></h2>
                                <p><u>{{ $item['pos'] }}</u></p>
                                <p class="font-italic rapih">{!! html_entity_decode($item['text']) !!}</p>
                                @if (!empty($item['ref']))
                                    <div class="d-flex flex-row-reverse">
                                        <a href="{{ $item['ref'] }}" class="btn btn-primary btn-sm px-4 py-3"
                                            target="_blank" rel="noopener noreferrer">
                                            {{ $item['refText'] }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    </p>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
    @include('templates/units')
    @include('templates/facilities')
    {{-- @include('templates/progress') --}}
    @include('templates/galery')
    @include('templates/bankList')
    @include('templates/igFeeds')
    @include('templates/footer')
</body>

</html>
