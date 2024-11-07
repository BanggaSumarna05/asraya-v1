<header id="header" class="header" {{-- style="background-color: red" --}}>
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between site-navbar"
        style="
        background: linear-gradient(to bottom, rgba(0,38,28,1), rgba(0,38,28,0));top: 0px;margin-top: 0px!important;padding-top: 0px!important;"
        >
        <div style="padding-left: 7%;padding-right:7%">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="mb-0"><a href="{{ route('index') }}" class="text-white h2 mb-0">
                            <img class="w-50 mx-auto img-fluid" style="margin: 2vh" src="img/asraya-2.png"
                                alt="" srcset=""></a>
                    </h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                class="site-menu-toggle js-menu-toggle text-white"><span
                                    class="icon-menu h3"></span></a></div>
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="{{ Route::is('index') ? '#home' : route('index') }}">Halaman
                                    Utama</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('unitUnggulan') }}">Unit Unggulan</a>
                                <ul class="dropdown">
                                    {{-- <li><a href="{{ route('mahogany') }}">Site Map & Schedule</a></li> --}}
                                    <li><a href="{{ route('mahogany') }}">Mahogany</a></li>
                                    <li><a href="{{ route('cendana') }}">Cendana</a></li>

                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('fasilitas') }}">Fasilitas</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('clubhouse') }}">Club House</a></li>
                                    <li><a href="{{ route('gym') }}">Gym</a></li>
                                    <li><a href="{{ route('brandgang') }}">Brandgang</a></li>
                                    <li><a href="{{ route('swimming-pool') }}">Swimming Pool</a></li>
                                    <li><a href="{{ route('tamanKota') }}">Taman Kota</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('visimisi') }}">Visi & Misi</a></li>
                            <li><a href="{{ route('faq') }}">Pertanyaan Umum</a></li>
                            <li class="has-children">
                                <a href="#">Profil Kami</a>
                                <ul class="dropdown">
                                    <li><a href="assets/ebrochure/asraya.pdf" target="_blank">E-Brochure</a></li>
                                    <li><a href="assets/ebrochure/asraya-profile.pdf" target="_blank">E-Profile</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
                                    target="_blank"><span class="icon-whatsapp" style="color:lime"></span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
