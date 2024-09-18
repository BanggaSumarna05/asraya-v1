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

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover overlay" style="background-image:url({{ $data['cover'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="home">
        <div class="container py-4 " data-aos="fade-up">
            <center>
                <h1 class="mb-4 w-border">
                    {{ $data['name'] }}
                </h1>
            </center>
            <p class="rapih">
                Welcome to Dr Synd Slim & Beauty Clinic, where transformation meets rejuvenation. Our clinic is your
                premier destination for comprehensive beauty and wellness solutions, tailored to meet your individual
                needs.
                <br><br>
                At Dr Synd Slim & Beauty Clinic, we understand that looking and feeling your best go hand in hand. Our
                team of skilled professionals is dedicated to helping you achieve your aesthetic goals with precision
                and care.
                <br><br>
                Whether you're seeking to sculpt your body, refresh your skin, or enhance your features, our range of
                advanced treatments and therapies are designed to deliver exceptional results. From non-invasive
                procedures to state-of-the-art technologies, we offer a wide array of options to address your concerns
                and enhance your natural beauty.<br>
            </p>
            <br>
            {{-- dr synd --}}
            <div>
                <div class="site-section-heading w-border col-md-12 mx-auto">
                    <h2 class="mb-5">Dr. Syndy Taurisia</h2>
                    <div class="row">
                        <div class="col-4 col-md-4 col-lg-4">
                            <div class="image" style="background-image:url('img/drSynd/drSynd.jpg')"></div>
                            <img class="w-100 card-rounded" src="img/drSynd/drSynd.jpg" alt="">
                        </div>
                        <div class="col-8 col-md-8 col-lg-8">
                            <p class="rapih">
                                Dr. Syndy Taurisia is a dedicated medical professional with a passion for holistic
                                healthcare
                                and aesthetic medicine. Born in Pekanbaru, her journey in the medical field began with a
                                strong
                                commitment to serving others and promoting wellness. <br><br>
                                Driven by her passion for aesthetics and the desire to help individuals look and feel
                                their
                                best, Dr. Taurisia pursued further certification in medical aesthetics in 2015. Her
                                dedication
                                to mastering the latest techniques and advancements in aesthetic medicine led her to
                                excel in
                                this field, earning her recognition among peers and patients alike.<br><br>

                                Dr. Taurisia's commitment to providing comprehensive care and achieving optimal results
                                has led
                                her to various professional experiences. Most recently, she has been specializing in
                                acupuncture
                                and acupressure at KEPPTI Bekasi, where she has applied her expertise to help patients
                                achieve
                                balance and alleviate various health concerns.<br><br>

                                Additionally, Dr. Taurisia has contributed her skills and knowledge to the field of
                                medical
                                aesthetics as part of the team at Lembaga Estetika Medik Jakarta. Here, she has had the
                                opportunity to refine her craft and offer personalized aesthetic solutions to her
                                clients,
                                helping them enhance their natural beauty and boost their confidence.<br><br>

                                With a strong foundation in general medicine, specialized training in acupuncture and
                                medical
                                aesthetics, and a genuine dedication to patient care, Dr. Syndy Taurisia continues to
                                make a
                                positive impact on the lives of her patients, empowering them to lead healthier, happier
                                lives.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            {{-- pic --}}
            <div>
                <br><br>
                <div class="site-section-heading text-center w-border col-md-8 mx-auto">
                    <h2 class="mb-5">OUR WORK</h2>
                    <p class="rapih">
                        Our experienced clinicians will work closely with you to develop a personalized treatment plan
                        that
                        aligns with your goals and aspirations. Whether you're interested in body contouring, facial
                        rejuvenation, or holistic wellness, we're here to guide you every step of the way.
                    </p>
                </div>
                <div class="row">
                    @foreach ($pics as $item)
                        <div class="col-4 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <a href="" class="unit-9">
                                <div class="image" style="background-image:url({{ $item }})"></div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- @include('templates/units')
        @include('templates/facilities')
        @include('templates/igFeeds') --}}
    </div>
    @include('templates/footer')
</body>

</html>
