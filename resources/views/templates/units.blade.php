<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-8 mx-auto">
                <h2 class="mb-5">FEATURED HOUSE</h2>
                <p class="rapih">
                    Casa Asraya stands as a testament to a holistic lifestyle experience, where architectural brilliance
                    converges with unparalleled hospitality. Join us in this journey of luxury, innovation, and
                    limitless possibilities.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($units as $item)
                <div class="col-12 col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ $item['link'] }}" class="unit-9">
                        <div class="image lazy" style="background-image:url({{ $item['cover'] }})"></div>
                        <div class="unit-9-content">
                            <h2>{{ $item['name'] }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
