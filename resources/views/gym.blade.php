<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/head')
    <style>
        .carousel-control-next,
        .carousel-control-prev

        /*, .carousel-indicators */
            {
            filter: invert(100%);
        }
    </style>
</head>

<body style="font-family: 'Archivo'">
    @include('templates/navbar')
    <div class="site-blocks-cover overlay" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="mb-4">{{ $data['name'] }}</h1>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <p class="rapih">
            Asraya Property menawarkan fasilitas gym yang dirancang untuk memenuhi kebutuhan kebugaran penghuni.
            Gym ini merupakan bagian dari komitmen Asraya Property dalam menciptakan hunian yang nyaman dan membawa berkah dalam kehidupan, sesuai dengan arti "āśraya" dalam bahasa Sanskerta yang berarti dasar, sumber, bantuan, perlindungan, atau tempat berlindung.
        </p>
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <video src="/vids/gym1.mp4" alt=""
                    style="max-width: 100%; max-height: 70%;" autoplay loop muted controls volume="0.5"></video>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <video src="/vids/gym2.mp4" alt=""
                    style="max-width: 100%; max-height: 70%;" autoplay loop muted controls volume="0.5"></video>
            </div>
        </div>
    </div>
    @include('templates/footer')
</body>

</html>