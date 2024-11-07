<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('templates/navbar')
    <style>
        .accordion-button:not(.collapsed) {
            color: #FFF !important;
            background-color: rgb(159, 145, 124) !important;
        }



        .accordion-button:link,
        .accordion-button:visited,
        .accordion-button:hover,
        .accordion-button:active {
            background-color: rgb(159, 145, 124) !important;
            color: #FFF !important;
            text-decoration: none !important;
            border: hidden !important;
            border-color: #FFF !important;
            box-shadow: 0px !important;


        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #FFF !important;
            outline: 0;
            box-shadow: 0 0 0 .25rem #FFF !important;
        }

        a {
            text-decoration: none;
        }

        a:hover,
        a:focus {
            text-decoration: underline;
        }
    </style>
    {{-- content below --}}
    <div class="container" style="margin-top: 12vh;">
        <br><br><br><br>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <h1 class="mb-4">
                    Pertanyaan Umum</h1>
            </div>
        </div>
    </div>
    <div class="site-section" id="home">
        <div class="container" data-aos="fade-up">
            <center>
                <nav class="nav nav-pills nav-fill" style="margin:4vh;">
                    <a class="active" data-toggle="tab" href="#menu1" style="padding: 3vh; ">
                        <h3>Pertanyaan Umum</h3>
                    </a>
                    <a class="" data-toggle="tab" href="#menu2" style="padding: 3vh; ">
                        <h3>Tentang Spesifikasi</h3>
                    </a>
                    <a class="" data-toggle="tab" href="#menu3" style="padding: 3vh; ">
                        <h3>Fasilitas Kami</h3>
                    </a>
                    <a class="" data-toggle="tab" href="#menu4" style="padding: 3vh; ">
                        <h3>Cara Pembelian</h3>
                    </a>
                </nav>
            </center>
            <hr>
            <div class="tab-content">
                <div id="menu1" class="tab-pane active">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($generals as $i => $item)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-1-{{ $i }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{ $item['question'] }}
                                    </button>
                                </h4>
                                <div id="flush-1-{{ $i }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                    style="background-color: whitesmoke">
                                    <div class="accordion-body">
                                        <div class="container" style="padding: 14px; font-size: 18px;">
                                            <p class="rapih">{{ $item['answer'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($specs as $i => $item)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-2-{{ $i }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{ $item['question'] }}
                                    </button>
                                    </h2>
                                    <div id="flush-2-{{ $i }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="background-color: whitesmoke">
                                        <div class="accordion-body">
                                            <div class="container" style="padding: 14px; font-size: 18px;">
                                                <p class="rapih">{{ $item['answer'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($facs as $i => $item)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-3-{{ $i }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{ $item['question'] }}
                                    </button>
                                    </h2>
                                    <div id="flush-3-{{ $i }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="background-color: whitesmoke">
                                        <div class="accordion-body">
                                            <div class="container" style="padding: 14px; font-size: 18px;">
                                                <p class="rapih">{{ $item['answer'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($buys as $i => $item)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-4-{{ $i }}"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ $item['question'] }}
                                    </button>
                                    </h2>
                                    <div id="flush-4-{{ $i }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="background-color: whitesmoke">
                                        <div class="accordion-body">
                                            <div class="container" style="padding: 14px; font-size: 18px;">
                                                <p class="rapih">{{ $item['answer'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
    {{-- @include('templates/units')
    @include('templates/facilities')
    @include('templates/galery')
    @include('templates/progress')
    @include('templates/bankList')
    @include('templates/igFeeds') --}}
    @include('templates/footer')
</body>

</html>
