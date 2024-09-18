<div class="site-wrap">
    <div class="site-navbar navbar sticky-top navbar-light mt-4"
        style="background-color: rgba(10,10,10,0.75);top: 0px;margin-top: 0px!important;padding-top: 0px!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="mb-0"><a href="{{ route('index') }}" class="text-white h2 mb-0">
                            <img class="w-50 mx-auto img-fluid" src="img/asraya-1.png" alt=""
                                srcset=""></a>
                    </h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                class="site-menu-toggle js-menu-toggle text-white"><span
                                    class="icon-menu h3"></span></a></div>
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="{{ Route::is('index') ? '#home' : route('index') }}">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="#">Featured House</a>
                                <ul class="dropdown">
                                    {{-- <li><a href="{{ route('mahogany') }}">Site Map & Schedule</a></li> --}}
                                    <li><a href="{{ route('mahogany') }}">Mahogany</a></li>
                                    <li><a href="{{ route('cendana') }}">Cendana</a></li>

                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Facilities</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('clubhouse') }}">Club House</a></li>
                                    <li><a href="{{ route('gym') }}">Gymastic</a></li>
                                    <li><a href="{{ route('brandgang') }}">Brandgang</a></li>
                                    <li><a href="{{ route('swimming-pool') }}">Swimming Pool</a></li>
                                    <li><a href="{{ route('tamanKota') }}">Taman Kota</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('visimisi') }}">Vision & Mission</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li class="has-children">
                                <a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="assets/ebrochure/asraya.pdf" target="_blank">E-Brochure</a></li>
                                    <li><a href="assets/ebrochure/asraya-profile.pdf" target="_blank">E-Profile</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="https://wa.me/6281399998066?text=I'm%20interested%20in%20your%20property%20for%20sale"
                                    target="_blank"><span class="icon-whatsapp" style="color:lime"></span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3"><span class="icon-close2 js-menu-toggle"></span></div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
