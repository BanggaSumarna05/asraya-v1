<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/head')
</head>

<body>
    @include('templates/navbar')
    <div class="site-blocks-cover overlay" style="background-image:url({{ $header['img'] }})" data-aos="fade"
        data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="mb-4">{{ $header['header'] }}</h1>
                    <p class="mb-5">
                        <i><q>{{ $header['location'] }}</q></i>
                        {{-- <br>
                        <br>
                        <br>
                        <br>
                        Member Of
                        <br>
                        <img class="image" src="{{ $header['low'] }}" style="max-width: 32%"> --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div id="harmony" class="site-section" style="margin: 0px;padding: 0px">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-6">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Vision</h2>
                        </div>
                    </center>
                    <p class="rapih">
                        We are dedicated to crafting
                        sanctuaries of serene living,
                        where tranquility and comfort
                        intertwine to elevate the
                        human experience.
                    </p>
                </div>
                <div class="col-6">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Mission</h2>
                        </div>
                    </center>
                    <p class="rapih">
                    <ul>
                        <li>Integrate tranquility from city
                            forests into vibrant urban
                            spaces, harmonizing nature
                            with modern living.
                        </li>
                        <li>Prioritize added value,
                            commitment, and relentless
                            excellence to earn trust from
                            customers and partners.</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="harmony" class="site-section" style="margin: 0px;padding: 0px">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div class="site-section-heading text-center w-border">
                            <h2>Harmony</h2>
                            <br>
                            <b>Humanity. Authenticity. Respect. Mastery. Openness. NoveltY.</b>
                            <br><br>
                        </div>
                    </center>
                    <p class="rapih">
                        By upholding the core value of HARMONY,
                        Casa Asraya can establish itself as a
                        property company committed to creating
                        spaces that not only meet practical needs
                        but also enrich the lives
                        of
                        individuals and
                        communities by promoting harmony in all
                        aspects of its operations and developmentswhere people feel valued, supported,
                        and
                        inspired.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Humanity
                    </h4>
                    <p class="rapih">Prioritizing the well-being of all individuals by recognizing the importance of
                        tranquility and the interconnectedness between humans and nature.</p>
                </div>
                <div class="col-6">
                    <h4>
                        Authenticity
                    </h4>
                    <p class="rapih">
                        Striving to be unique and original in all of our product aspects of the business.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Respect
                    </h4>
                    <p class="rapih">
                        Commitment to fairness, consideration, and providing added value for all stakeholders
                        to build and maintain a harmonical relationships.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Mastery
                    </h4>
                    <p class="rapih">
                        Pursuing excellence and continuous improvement, striving for the highest standards of
                        expertise and professionalism.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        Openness
                    </h4>
                    <p class="rapih">
                        Incorporating transparency, communication, and collaboration within the
                        organization and with external partners.
                    </p>
                </div>
                <div class="col-6">
                    <h4>
                        NoveltY
                    </h4>
                    <p class="rapih">Embracing innovation, creativity, and the exploration of new ideas and solutions
                        to
                        address challenges and opportunity in market dynamics.</p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    @include('templates/footer')
</body>

</html>
