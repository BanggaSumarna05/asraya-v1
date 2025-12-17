<link rel="icon" href="https://www.asrayaproperty.com/old/assets/img/asraya.png">
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> --}}
{{-- <link href="https://fonts.cdnfonts.com/css/archivo" rel="stylesheet"> --}}

{{--  --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:wght@400;600;700&display=swap"
    rel="stylesheet">
{{--  --}}

<link rel="stylesheet" href="/fonts/icomoon/style.css">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/magnific-popup.css">
<link rel="stylesheet" href="/css/jquery-ui.css">
<link rel="stylesheet" href="/css/owl.carousel.min.css">
<link rel="stylesheet" href="/css/owl.theme.default.min.css">
<link rel="stylesheet" href="/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="/css/mediaelementplayer.css">
<link rel="stylesheet" href="/css/animate.css">
<link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="/css/fl-bigmug-line.css">
<link rel="stylesheet" href="/css/aos.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/custom.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
{{-- additional 19 mei 2025 --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

{{-- gallery --}}
<style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .gallery a {
        flex: 1 1 calc(33.333% - 10px);
        box-sizing: border-box;
    }

    .gallery img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .gallery img:hover {
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .gallery a {
            flex: 1 1 calc(50% - 10px);
        }
    }

    @media (max-width: 480px) {
        .gallery a {
            flex: 1 1 100%;
        }
    }
</style>

{{-- lazylaoad --}}
<style>
    .lazy-bg {
        /* background-size: cover;
        background-position: center; */
    }

    .sprite {
        background-image: url('path-to-sprite.png');
        background-repeat: no-repeat;
    }

    .icon1 {
        width: 50px;
        height: 50px;
        background-position: 0 0;
    }

    .icon2 {
        width: 50px;
        height: 50px;
        background-position: -50px 0;
    }
</style>

{{-- FAB --}}
<style>
    .fab-left {
        position: fixed;
        margin: 0px;
        bottom: 15px;
        left: 20px;
        top: 78%;
        z-index: 1000;
        width: auto;
        height: auto;
        /* border-radius: 50%; */
        max-height: 500vh !important;
        max-width: 500vh !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 44px;
        transition: all 0.3s ease-in-out;

    }

    .fab-left:hover {
        transform: scale(1.1);
    }


    .fab-right {
        position: fixed;
        bottom: 20px;
        right: 20px;
        top: 70%;
        z-index: 1000;
        width: auto;
        height: auto;
        max-height: 500vh !important;
        max-width: 500vh !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); */
        transition: all 0.3s ease-in-out;

    }

    .fab-right:hover {
        transform: scale(1.1);
    }

    .bounce {
        animation: bounce 4s ease infinite;
    }

    html,
    body {
        overflow-x: hidden;
    }

    /* buat navbar */
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
        min-width: 477px;
        min-height: 150px;
    }

    .mobile-menu-close {
        background: none;
        border: none;
        color: white;
        font-size: 42px;
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
        font-size: 20px !important;
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
        font-size: 20px !important;
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
