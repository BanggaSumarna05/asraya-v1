<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<style>
    .facility-wrapper {
        position: relative;
        z-index: 2;
        padding-top: 15%;
    }

    .facility-item {
        text-align: center;
        color: #fff;
    }

    .facility-icon {
        width: 70px;
        height: 70px;
        /* background: #2f4f2f; */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-size: 26px;
        transition: 0.3s ease;
    }

    .facility-icon i {
        color: #fff;
    }

    .facility-text {
        font-size: 13px;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .facility-item:hover .facility-icon {
        background: transparent;
        transform: translateY(-3px);
    }

    .site-blocks-cover.video-bg {
        position: relative;
        overflow: hidden;
        height: 100vh;
        min-height: 500px;
        display: flex;
        align-items: center;
    }

    .site-blocks-cover.video-bg video {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        object-fit: cover;
        filter: brightness(2);
    }

    .site-blocks-cover.video-bg .container {
        position: relative;
        z-index: 2;
    }

    .video-wrap {
        float: left;
        width: 100%;
        max-width: 350px;
        /* ukuran maksimal video */
        aspect-ratio: 16 / 9;
        margin: 0 20px 20px 0;
        border-radius: 8px;
        object-fit: cover;
    }

    /* Responsive breakpoint */
    @media (max-width: 768px) {
        .video-wrap {
            float: none;
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100%;
            width: 100%;
        }
    }

    /* =========================================
   CASA ASRAYA – VECTOR LEAF BACKGROUND (ONLINE SVG)
========================================= */

    .asraya-leaf-section {
        position: relative;
        overflow: hidden;
        background-color: #00261C;
    }

    /* layer daun kiri */
    .asraya-leaf-section::before {
        content: "";
        position: absolute;
        top: -120px;
        left: -140px;
        width: 520px;
        height: 520px;
        background-image: url("https://freepngimg.com/thumb/leaf/69278-euclidean-leaf,vector-vector-leaf-png-free-photo.png");
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.4;
        transform: rotate(-18deg);
        z-index: 1;
    }

    /* layer daun kanan */
    .asraya-leaf-section::after {
        content: "";
        position: absolute;
        bottom: -140px;
        right: -160px;
        width: 560px;
        height: 560px;
        background-image: url("https://freepngimg.com/thumb/leaf/69278-euclidean-leaf,vector-vector-leaf-png-free-photo.png");
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.6;
        transform: rotate(22deg);
        z-index: 1;
    }

    /* daun tambahan atas */
    .asraya-leaf-top {
        position: absolute;
        top: -80px;
        right: 18%;
        width: 640px;
        height: 640px;
        background-image: url("https://freepngimg.com/thumb/leaf/69278-euclidean-leaf,vector-vector-leaf-png-free-photo.png");
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.6;
        transform: rotate(-90deg);
        z-index: 1;
    }

    /* daun tambahan bawah */
    .asraya-leaf-bottom {
        position: absolute;
        bottom: -60px;
        left: 22%;
        width: 740px;
        height: 740px;
        background-image: url("https://freepngimg.com/thumb/leaf/69278-euclidean-leaf,vector-vector-leaf-png-free-photo.png");
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.4;
        transform: rotate(12deg);
        z-index: 1;
    }

    /* konten di atas daun */
    .asraya-leaf-section .container {
        position: relative;
        z-index: 2;
    }

    /* mobile: kurangi daun */
    @media (max-width: 768px) {

        .asraya-leaf-top,
        .asraya-leaf-bottom {
            display: none;
        }
    }
</style>

<body style="font-family: 'Archivo'!important">
    @include('templates/navbar')
    <div class="site-blocks-cover video-bg overlay lazy-bg" data-aos="fade" style="background-image: url('new/assets/img/F11.jpg')">
        {{-- <video autoplay loop muted playsinline style="filter:none;" id="heroVideo" class="h-100">
            <source src="#" type="video/mp4" id="videoSource">
            Your browser does not support the video tag.
        </video> --}}
    </div>


    {{-- SECTION : WELCOME ASRAYA --}}
    <section class="py-5 asraya-leaf-section" style="color:white">
        <div class="asraya-leaf-top"></div>
        <div class="asraya-leaf-bottom"></div>

        <div class="container">
            <h4 class="text-uppercase mb-3" style="letter-spacing:3px;">
                <center>Welcome to CASA ASRAYA</center>
            </h4>

            <p class="mx-auto" style="max-width:820px; font-size:20px; color:whitesmoke; letter-spacing:0.6px">
                <strong>CASA ASRAYA</strong> menghadirkan perumahan premium yang mengutamakan desain modern dengan
                sentuhan alam. Kami menciptakan hunian yang menyatu dengan suasana hutan Riau serta
                memberikan pengalaman hidup yang nyaman, sejuk, dan tenang di tengah kota.
            </p>

            <p class="mx-auto" style="max-width:820px; font-size:20px; color:whitesmoke; letter-spacing:0.6px">
                Didirikan sejak tahun <strong>2022</strong>, <strong>CASA ASRAYA</strong> berkomitmen untuk menghadirkan
                kualitas hunian premium, mulai dari perencanaan arsitektur oleh
                <strong>Atelier Riri</strong>, pemilihan material berkualitas tinggi, hingga
                tata ruang yang fungsional.
            </p>
        </div>
    </section>



    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h4 class="text-uppercase" style="letter-spacing:3px;">A Joint Venture By</h4>
            </div>

            <div class="row justify-content-center">
                {{-- AZURE GROUP --}}
                <div class="col-sm-12 col-lg-5 mb-4">
                    <div class="text-center mb-3">
                        <img src="/img/ag.png" alt="Azure Group" style="height:90px;">
                    </div>
                    {{-- <p style="font-size:18px; color:black;">
                        <strong>AZURE GROUP</strong> is the main venture partner of <strong>CASA ARAYA</strong>,
                        focusing on
                        strategic property development & project management.
                    </p>
                    <ul style="font-size:18px; color:black; padding-left:18px;letter-spacing:0.6px">
                        <li>Core venture and project initiator</li>
                        <li>Specialized in residential & mixed-use development</li>
                        <li>Strong focus on sustainable growth</li>
                        <li>Integrated planning</li>
                    </ul> --}}
                </div>

                {{-- ASRAYA DEVELOPMENT --}}
                <div class="col-sm-12 col-lg-5 mb-4">
                    <div class="text-center mb-3">
                        <img src="/img/asraya-2.png" alt="Asraya" style="height:90px;">
                    </div>
                    {{-- <p style="font-size:18px; color:black;letter-spacing:0.6px">
                        <strong>CASA ASRAYA</strong> is a prestigious address in one of the biggest economic
                        centres in Sumatera.
                        We present premium residential spaces that prioritize modern design with natural elements,
                        creating homes that blend
                        tropical forest atmosphere amidst the bustling city. We are committed to delivering innovation
                        in every carefully designed space
                        using high-quality materials that guarantee durability and beauty, offering a perfect balance
                        between natural comfort and accessibility
                        to urban life centers.
                    </p>
                    <ul style="font-size:18px; color: black; padding-left:18px;">
                        <li>Property development & branding</li>
                        <li>Community-oriented planning</li>
                        <li>Quality construction standards</li>
                        <li>Long-term livability focus</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>

    @include('templates/footer')
</body>
<script type="text/javascript">
    $(document).ready(function() {

        var video = document.getElementById('heroVideo');
        var source = document.getElementById('videoSource');
        if (window.innerWidth <= 1080) {
            source.src = "/vids/motion-mobilev2.mp4";
            video.style.objectFit = "cover";
            video.style.width = "100vw";
            video.style.height = "100vh";
            // alert('mobile');
        } else {
            source.src = "/vids/Motion-Mainv2.mp4";
            // alert('full');
        }
        video.load();
        jQuery.noConflict();
    });
</script>

</html>
