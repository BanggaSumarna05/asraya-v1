<header id="header" class="header">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between site-navbar"
        style="
        background: linear-gradient(to bottom, rgba(0,38,28,1), rgba(0,38,28,0));

        @media (max-width: 791px) {
            background: #00261c !important;
        }
        top: 0px;
        margin-top: 0px!important;
        padding-top: 0px!important;
        position: relative;
        z-index: 1000;">
        <div style="padding-left: 7%;padding-right:7%; width: 100%">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="mb-0"><a href="{{ route('index') }}" class="text-white h2 mb-0">
                            <img class="w-50 mx-auto img-fluid" style="margin: 2vh" src="/img/asraya-2.png"
                                alt="" srcset=""></a>
                    </h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3 float-right">
                        <a href="#" class="site-menu-toggle js-menu-toggle text-white" id="mobile-menu-toggle">
                            <span class="icon-menu h3" style="font-size: 64px!important;"></span>
                        </a>
                    </div>
                    <nav class="site-navigation text-right text-md-right d-none d-lg-block" role="navigation">
                        <ul class="site-menu js-clone-nav">
                            <li class="active"><a href="{{ Route::is('index') ? '#home' : route('index') }}">Halaman
                                    Utama</a></li>
                            <li class="has-children">
                                <a>Unit Unggulan</a>
                                <ul class="dropdown">
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
                            <li class="has-children">
                                <a>Informasi</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('faq') }}">Pertanyaan Umum</a></li>
                                    <li><a href="{{ route('blog.index') }}">Berita & Artikel</a></li>
                                    <li><a href="{{ route('history') }}">History</a></li>
                                    <li><a href="{{ route('simulasi-kpr') }}">Simulasi Kpr</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Profil Kami</a>
                                <ul class="dropdown">
                                    <li><a href="assets/ebrochure/asraya-22092025.pdf" target="_blank">E-Brochure</a>
                                    </li>
                                    <li><a href="assets/ebrochure/asraya-profile.pdf" target="_blank">E-Profile</a></li>
                                    <li><a href="assets/ebrochure/site_plan_asraya_property.pdf" target="_blank">Site
                                            Plan Available</a></li>
                                    <li><a href="https://linktr.ee/casasraya" target="_blank">Linktree</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('galeri') }}">Galeri</a></li>
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

    <!-- Menu Mobile Full Screen -->
    <div id="mobile-menu-overlay" class="mobile-menu-overlay">
        <div class="mobile-menu-container">
            <div class="mobile-menu-header">
                <a href="{{ route('index') }}" class="text-white">
                    <center>
                        <img class="mobile-logo" src="/img/asraya-2.png" alt="Asraya">
                    </center>
                </a>
                <button class="mobile-menu-close" id="mobile-menu-close">
                    <span class="icon-close h3" style="font-size: 64px!important;"></span>
                </button>
            </div>

            <nav class="mobile-navigation">
                <ul class="mobile-menu-list">
                    <li><a href="{{ Route::is('index') ? '#home' : route('index') }}" class="mobile-menu-item">Halaman
                            Utama</a></li>

                    <li class="mobile-menu-item has-submenu">
                        <span class="submenu-toggle">Unit Unggulan</span>
                        <ul class="mobile-submenu">
                            <li><a href="{{ route('mahogany') }}">Mahogany</a></li>
                            <li><a href="{{ route('cendana') }}">Cendana</a></li>
                        </ul>
                    </li>

                    <li class="mobile-menu-item has-submenu">
                        <span class="submenu-toggle">Fasilitas</span>
                        <ul class="mobile-submenu">
                            <li><a href="{{ route('clubhouse') }}">Club House</a></li>
                            <li><a href="{{ route('gym') }}">Gym</a></li>
                            <li><a href="{{ route('brandgang') }}">Brandgang</a></li>
                            <li><a href="{{ route('swimming-pool') }}">Swimming Pool</a></li>
                            <li><a href="{{ route('tamanKota') }}">Taman Kota</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('visimisi') }}" class="mobile-menu-item">Visi & Misi</a></li>

                    <li class="mobile-menu-item has-submenu">
                        <span class="submenu-toggle">Informasi</span>
                        <ul class="mobile-submenu">
                            <li><a href="{{ route('faq') }}">Pertanyaan Umum</a></li>
                            <li><a href="{{ route('blog.index') }}">Berita & Artikel</a></li>
                            <li><a href="{{ route('history') }}">History</a></li>
                        </ul>
                    </li>

                    <li class="mobile-menu-item has-submenu">
                        <span class="submenu-toggle">Profil Kami</span>
                        <ul class="mobile-submenu">
                            <li><a href="assets/ebrochure/asraya-22092025.pdf" target="_blank">E-Brochure</a></li>
                            <li><a href="assets/ebrochure/asraya-profile.pdf" target="_blank">E-Profile</a></li>
                            <li><a href="assets/ebrochure/site_plan_asraya_property.pdf" target="_blank">Site Plan
                                    Available</a></li>
                            <li><a href="https://linktr.ee/casasraya" target="_blank">Linktree</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('galeri') }}" class="mobile-menu-item">Galeri</a></li>

                    <li class="mobile-menu-item has-submenu">
                        <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
                            target="_blank" class="mobile-menu-link">
                            <span class="mobile-menu-item">Whatsapp Kami</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<style>
    /* Styling untuk Mobile Menu */
    .mobile-menu-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 38, 28, 0.95);
        z-index: 9999;
        overflow-y: auto;
    }

    .mobile-menu-container {
        padding: 20px;
        color: white;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 20px;
    }

    .mobile-logo {
        width: 150px;
        height: auto;
    }

    .mobile-menu-close {
        background: none;
        border: none;
        color: white;
        font-size: 30px;
        cursor: pointer;
    }

    .mobile-menu-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-menu-item {
        padding: 15px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: block;
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

    .mobile-menu-link {
        color: white;
        text-decoration: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .has-submenu {
        position: relative;
    }

    .submenu-toggle {
        color: white;
        font-size: 20px;
        cursor: pointer;
    }

    .mobile-submenu {
        display: none;
        list-style: none;
        padding-left: 20px;
        margin-top: 10px;
    }

    .mobile-submenu li {
        padding: 10px 0;
    }

    .mobile-submenu a {
        color: #ddd;
        text-decoration: none;
        font-size: 14px;
    }

    .whatsapp-item {
        background: #25D366;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center;
    }

    .whatsapp-item a {
        color: white !important;
        font-weight: bold;
    }

    /* Pastikan menu desktop tidak muncul di mobile */
    @media (max-width: 991px) {
        .site-navigation {
            display: none !important;
        }

        #mobile-menu-toggle {
            display: inline-block !important;
        }
    }

    @media (min-width: 992px) {
        .mobile-menu-overlay {
            display: none !important;
        }

        #mobile-menu-toggle {
            display: none !important;
        }
    }
</style>

<script>
    // JavaScript untuk mengontrol mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const menuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu-overlay');
        const submenuToggles = document.querySelectorAll('.submenu-toggle');

        // Buka mobile menu
        if (menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                mobileMenu.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Mencegah scroll background
            });
        }

        // Tutup mobile menu
        if (menuClose) {
            menuClose.addEventListener('click', function(e) {
                e.preventDefault();
                mobileMenu.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
        }

        // Tutup mobile menu ketika klik di luar konten
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                mobileMenu.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });

        // Toggle submenu
        submenuToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const submenu = this.parentElement.querySelector('.mobile-submenu');
                if (submenu.style.display === 'block') {
                    submenu.style.display = 'none';
                    // this.textContent = '';
                } else {
                    submenu.style.display = 'block';
                    // this.textContent = '-';
                }
            });
        });

        // Tutup semua submenu ketika menu dibuka
        menuToggle.addEventListener('click', function() {
            document.querySelectorAll('.mobile-submenu').forEach(submenu => {
                submenu.style.display = 'none';
            });
            document.querySelectorAll('.submenu-toggle').forEach(toggle => {
                if (!toggle.textContent.includes('▼')) {
                    toggle.textContent += ' ▼';
                }
            });
        });
    });
</script>