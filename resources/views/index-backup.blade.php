<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express Node.js & Flask Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>CASA ASRAYA</title>
    <meta charset="utf-8" />`
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express Node.js & Flask Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="https://fonts.cdnfonts.com/css/archivo" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.cdnfonts.com/css/archivo" rel="stylesheet">
    <!--end::Global Stylesheets Bundle-->

    <style>
        .html {
            font-family: 'Archivo', sans-serif !important;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 104%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #00261C;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px whitesmoke;
            border-radius: 8px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #00261C;
            border-radius: 8px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #00261C;
        }

        .bg-overlay {
            background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7));
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            color: #fff;
            height: 28rem;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled"
    style="background-color: #F4F4F4!important;font-family: 'Archivo', sans-serif;">
    <!-- <div id="loading" class="row gy-0 gx-10">
        <center>
            <img id="loading-image" src="assets/img//loading.png" alt="Loading..." />
        </center>
    </div> -->
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex flex-grow-1 flex-stack">
                        <!--begin::Header Logo-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Heaeder menu toggle-->
                            <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                                id="kt_header_menu_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Heaeder menu toggle-->
                            <a href="#">
                                <img alt="Logo" src="assets/img/asraya.png" class="theme-dark-show h-50px h-lg-50px" />
                            </a>
                        </div>
                        <!--end::Header Logo-->
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-center flex-shrink-0">
                            <!--begin::Search-->
                            <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-250px"
                                data-kt-search-keypress="true" data-kt-search-min-length="2"
                                data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg"
                                data-kt-menu-trigger="auto" data-kt-menu-permanent="true"
                                data-kt-menu-placement="bottom-end">

                            </div>
                            <!--end::User -->
                            <!--begin::Sidebar Toggler-->
                            <!--end::Sidebar Toggler-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                    <!--begin::Separator-->
                    <div class="separator"></div>
                    <!--end::Separator-->
                    <!--begin::Container-->
                    <div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100"
                        id="kt_header_nav">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true"
                            data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                            data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle"
                            data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-state-primary menu-title-gray-800 menu-arrow-gray-400 align-items-stretch flex-grow-1 my-5 my-lg-0 px-2 px-lg-0 fw-semibold fs-6"
                                id="#kt_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link py-3">
                                        <span class="menu-title" style="color:#FE5000">HOME</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link py-3">
                                        <span class="menu-title">ABOUT US</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link py-3">
                                        <span class="menu-title">LIMITED UNIT</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <a href="assets/ebrochure/asraya.pdf" target="_blank" type="button"
                                        class="btn btn-xs"><u>E-Brochure</u></a>
                                </div>
                                <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <a href="https://wa.me/6281365395151?text=I'm%20interested%20in%20your%20property%20for%20sale"
                                        target="_blank" type="button" class="btn btn-xs"
                                        style="background-color: #00261C!important;color: white">Book NOW !!</a>
                                </div>


                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar py-5" style="margin-top:-54px!important">
                    <div id="kt_toolbar_container">
                        <div id="kt_carousel_2_carousel" class="carousel carousel-custom slide pointer-event"
                            data-bs-ride="carousel" data-bs-interval="2200">
                            <!--begin::Carousel-->
                            <div class="carousel-inner pt-8">
                                <!--begin::Item-->
                                <div class="carousel-item active">
                                    <div class="">
                                        <center>
                                            <!--begin::Image-->
                                            <img class="img-fluid" src="assets/img//landing1.jpg" alt="">
                                            <!--end::Image-->
                                        </center>
                                    </div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="">
                                        <center>
                                            <!--begin::Image-->
                                            <img class="img-fluid" src="assets/img//landing2.jpg" alt="">
                                            <!--end::Image-->
                                        </center>
                                    </div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="">
                                        <center>
                                            <!--begin::Image-->
                                            <img class="img-fluid" src="assets/img//landing3.jpg" alt="">
                                            <!--end::Image-->
                                        </center>
                                    </div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="">
                                        <center>
                                            <!--begin::Image-->
                                            <img class="img-fluid" src="assets/img//landing4.jpg" alt="">
                                            <!--end::Image-->
                                        </center>
                                    </div>
                                </div>
                                <!--end::Item-->
                            </div>
                        </div>
                        <!--end::Carousel-->
                    </div>
                </div>
                <div class="toolbar py-5 py-lg-5" id="toolbarX"
                    style="background-color: #00261C!important;min-height: 720px!important">
                    <div class="row gx-5 gx-xl-10" style="width: 100%">
                        <div class="col-sm-6 mb-5 mb-xl-10" style="border-right: 2px solid #C77850;">
                            XX
                        </div>
                        <div class="col-sm-6 mb-5 mb-xl-10">
                            <img alt="Logo" src="assets/img//asraya2.png" class="theme-dark-show h-70px h-lg-70px" />
                            <br>
                            <br>
                            <div style="color:#C77850;">
                                Āśraya (Sanskrit: आश्रय)
                            </div>
                            <br><br>
                            <p style="color:#C77850; font-style: normal;font-family: 'Archivo'!important;"> variously
                                means :
                                base, source, assistance, shelter, protection, refuge,
                                dependence, having recourse to or depending on. <br>
                                In terms of Hindu philosophy, the living entity or Jiva
                                is āśraya, and Brahman or the Supreme Being, the
                                Godhead, is viśaya, the supreme objective, the goal
                                of lif e Bhagav ata Pur ana (VII.x.6).</p>
                        </div>
                    </div>
                </div>
                <div class="toolbar py-5 py-lg-5" id="kt_toolbar" style="background-color: #F4F4F4">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl py-5">
                        <div class="row gy-0 gx-10">
                            <div class="col-xl-12">
                                <div class="mb-10">
                                    <center>
                                        <h2>Pesona Hutan</h2>
                                    </center>
                                    <br>
                                    <center>
                                        <p>
                                            A delightful piece of city forest and authentic trees, nestled among the
                                            modern style of new premium home is coming to town.
                                            <br><br>
                                            basic forest within tropical gardens, alongside a swimming pool and lush of
                                            trees, Pesona hutan Asraya is an oasis of amazing peace and tranquility – a
                                            secret hideaway disturbed only by the twitter of birdsong. A delightful
                                            piece of forgotten forest in the city and authentic village life, yet feels
                                            far removed from the madding crowd.
                                            <br><br>
                                            Pesona hutan Asraya landscape, designed in the form of a labyrinth, is the
                                            legacy of the late renowned landscape architect – mas Riri (Atelier riri)
                                            This unique structure and outdoor- indoor allows guests to wander off and
                                            explore the ultimate privacy and serenity of the house.
                                        </p>
                                    </center>

                                    <br>
                                </div>
                            </div>
                            <!--begin::Col-->
                            <div class="col-xl-12">
                                <!--begin::General Widget 1-->
                                <div class="mb-10">
                                    <!--begin::Tabs-->
                                    <ul class="nav row mb-10">
                                        <li class="nav-item col-12 col-lg mb-5 mb-lg-0">
                                            <p style="text-align: justify; font-size: 15px;">
                                                Modern housing has come a long way in terms of design, functionality,
                                                and
                                                sustainability. With advances in technology and a greater focus on
                                                environmental
                                                responsibility, architects and builders are now creating homes that not
                                                only
                                                look
                                                sleek and contemporary but also prioritize energy efficiency and
                                                eco-friendliness.
                                                From smart home systems that allow residents to control their
                                                environment
                                                with
                                                ease,
                                                to the use of sustainable building materials and the integration of
                                                green
                                                spaces,
                                                modern housing is transforming the way we live and interact with our
                                                surroundings.
                                                Whether you're looking for a minimalist apartment in the heart of the
                                                city
                                                or a
                                                sprawling suburban home with all the latest amenities, modern housing
                                                has
                                                something
                                                to offer for everyone.
                                            </p>
                                        </li>
                                        <li class="nav-item col-12 col-lg mb-5 mb-lg-0">
                                            <iframe width="100%" height="300" frameborder="0" scrolling="no"
                                                marginheight="0" marginwidth="0"
                                                src="https://www.youtube.com/embed/7ZgzMKr43z8?autoplay=1"
                                                allow='autoplay; encrypted-media' frameborder="0" allowfullscreen>
                                            </iframe>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Container-->
                </div>
                <div id="kt_content_container_1" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <img alt="img" class="rounded w-100" src="assets/img//pak-ooz.jpg">
                </div>
                <div id="kt_content_container_1" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <img alt="img" class="rounded w-100" src="assets/img//arsitek.jpg">
                </div>
                <br><br>
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <div class="content flex-row-fluid" id="kt_content">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 22px;">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F11.png'); padding-top: 13%;">
                                    <div class="row text-center">
                                        <h1 style="color: white">
                                            Pesona Hutan by <u>Asraya</u></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F3.png'); padding-top: 30%;">
                                    <div class="row text-center">
                                        <h1 style="color: white">
                                            Club House</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F5.png'); padding-top: 30%;">
                                    <div class="row text-center">
                                        <h1 style="color: white">Club House</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3" style="padding: 10px!important">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F1.png'); padding-top: 30%;">
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 10px!important">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F2.png'); padding-top: 30%;">
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 10px!important">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F3.png'); padding-top: 30%;">
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 10px!important">
                                <div class="container bg-overlay rounded"
                                    style="background-image: url('assets/img//F6.png'); padding-top: 30%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Row-->
                        <br><br>
                        <div class="row gy-0 gx-10">
                            <div class="col-xl-12">
                                <div class="row">
                                    <h2>Mahogany</h2>
                                </div>
                                <h1 style="color:#FE5000">___________</h1>
                                <div class="tab-content" style="background-color: white">
                                    <div class="tab-pane active" id="kt_general_widget_1_1">
                                        <!--begin::Tables Widget 2-->
                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border-gray-300 rounded min-w-700px p-7"
                                                    style="min-height: 5rem;">
                                                    <div class="overlay me-2">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-400px"
                                                                src="assets/img//F4.png">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <div class="overlay me-2">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-450px"
                                                                src="assets/img//F7.png">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <div class="overlay me-2">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-450px"
                                                                src="assets/img//F9.png">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="col-xl-12">
                                <h2>Cendana</h2>
                                <h1 style="color:#00261C">___________</h1>
                                <div class="tab-content" style="background-color: white">
                                    <div class="tab-pane active" id="kt_general_widget_1_2">
                                        <!--begin::Tables Widget 2-->
                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center rounded min-w-700px p-7"
                                                    style="min-height: 5rem;">
                                                    <div class="overlay me-2">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-450px"
                                                                src="assets/img//F10.png">
                                                        </div>
                                                        <!--end::Image-->

                                                    </div>
                                                    <div class="overlay me-2">

                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-450px"
                                                                src="assets/img//F1.png">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <div class="overlay me-2">

                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-450px"
                                                                src="assets/img//F6.png">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                            </div>
                            <div style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                                <!--begin::Card body-->
                                <div class="card-body p-lg-20">
                                    <!--begin::Tabs wrapper-->
                                    <div class="d-flex flex-center mb-5 mb-lg-15">
                                        <!--begin::Tabs-->
                                        <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active"
                                                    href="#" data-bs-toggle="tab"
                                                    data-bs-target="#kt_landing_projects_latest">Our Progress</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6"
                                                    href="#" data-bs-toggle="tab"
                                                    data-bs-target="#kt_landing_projects_web_design">Our Unit</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6"
                                                    href="#" data-bs-toggle="tab"
                                                    data-bs-target="#kt_landing_projects_mobile_apps">Our
                                                    Documentation</a>
                                            </li>
                                        </ul>
                                        <!--end::Tabs-->
                                    </div>
                                    <!--end::Tabs wrapper-->
                                    <!--begin::Tabs content-->
                                    <div class="tab-content">
                                        <!--begin::Tab pane-->
                                        <div class="tab-pane fade show active" id="kt_landing_projects_latest">
                                            <!--begin::Row-->
                                            <div class="row g-10">
                                                <!--begin::Col-->

                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <div class="row g-2 mb-2">
                                                        @for ($i = 1; $i <= 26; $i++) <div class="col-lg-4"> <a
                                                                class="d-block card-rounded overla"
                                                                data-fslightbox="lightbox-projects"
                                                                href="assets/img//progress/p ({{ $i }}).jpg">
                                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                                    style="background-image:url('assets/img//progress/p ({{ $i }}).jpg')">
                                                                </div>
                                                            </a>
                                                    </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_landing_projects_web_design">
                                        <!--begin::Row-->
                                        <div class="row g-10">
                                            <!--begin::Col-->

                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <!--begin::Row-->
                                                <div class="row g-2 mb-2">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <a class="d-block card-rounded overlay"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/img//square1-01.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                                style="background-image:url('assets/img//square1-01.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!--begin::Item-->
                                                        <a class="d-block card-rounded overla"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/img//square1-02.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                                style="background-image:url('assets/img//square1-02.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Item-->
                                                        <a class="d-block card-rounded overlay"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/img//square1-03.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                                style="background-image:url('assets/img//square1-03.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Item-->
                                                        <a class="d-block card-rounded overlay"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/img//square1-04.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                                style="background-image:url('assets/img//square1-04.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
                                        <!--begin::Row-->
                                        <div class="row g-2 mb-2">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/img//square1-01.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                        style="background-image:url('assets/img//square1-01.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overla"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/img//square1-02.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                        style="background-image:url('assets/img//square1-02.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/img//square1-03.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                        style="background-image:url('assets/img//square1-03.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/img//square1-04.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-350px"
                                                        style="background-image:url('assets/img//square1-04.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_landing_projects_development">
                                        <!--begin::Row-->
                                        <div class="row g-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay h-lg-100"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/media/stock/600x600/img-15.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                        style="background-image:url('assets/media/stock/600x600/img-15.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Row-->
                                                <div class="row g-10 mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Item-->
                                                        <a class="d-block card-rounded overlay"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/media/stock/600x600/img-22.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                                style="background-image:url('assets/media/stock/600x600/img-22.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Item-->
                                                        <a class="d-block card-rounded overlay"
                                                            data-fslightbox="lightbox-projects"
                                                            href="assets/media/stock/600x600/img-21.jpg">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                                style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
                                                            </div>
                                                            <!--end::Image-->
                                                        </a>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="assets/media/stock/600x400/img-14.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('assets/media/stock/600x600/img-14.jpg')">
                                                    </div>
                                                    <!--end::Image-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tabs content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card mb-10" style="background-color: #f4f4f4">
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <center>
                                            <p class="fs-5 text-muted fw-semibold">
                                                <b>Find your dream home with our wide range of affordable
                                                    housing options.</b>
                                            </p>
                                            <br>
                                            <a href="assets/ebrochure/asraya.pdf" target="_blank" type="button"
                                                class="btn btn-xs"><u>E-Brochure</u></a>
                                            <a href="https://wa.me/6281365395151?text=I'm%20interested%20in%20your%20property%20for%20sale"
                                                target="_blank" type="button" class="btn btn-xs"
                                                style="background-color: #00261C!important;color: white">Book
                                                NOW !!</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 1-->
                    </div>
                    <!--end::Col-->
                    <div class="toolbar py-5" style="margin-top:-54px!important">
                        <div id="kt_toolbar_container">
                            <center>
                                <!--begin::Image-->
                                <img class="img-fluid" src="assets/img//MAPS for web-02.jpg" alt="">
                                <!--end::Image-->
                            </center>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

            </div>
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer" style="background-color: #082B2E!important;">
                <!--begin::Container-->
                <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div style="float: right">
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary"
                            style="color:white!important">sales@asrayaproperty.com</a>
                    </div>
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1" style="color:white!important">2023&copy;</span>
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary"
                            style="color:white!important">CASA
                            ASRAYA PROPERTY</a>
                    </div>

                    <!--end::Copyright-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true" style="background-color: #C77850!important">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop--
    <!--begin::Javascript-->
    <script>
        jQuery(document).ready(function ($) {
            $('.video-selector iframe')[0].contentWindow.postMessage(
                '{"event":"command","func":"playVideo","args":""}', '*');
        });
    </script>
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>