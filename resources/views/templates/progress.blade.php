<div class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-6 mx-auto">
                <h2 class="mb-5">Our Progress</h2>
            </div>
        </div>
        <div class="gallery" style="margin: 2vh;">
            <div class="row portfolio-container aos-init aos-animate" style="">
                @foreach ($progress as $i => $item)
                    <div class="col-12 col-md-4 col-lg-4" style="padding: 10px;">
                        <h4>&nbsp;&nbsp;{{ $i }}</h4>
                        <div class="row" style="border: 2px solid rgb(0, 38, 28); margin: 10px;">
                            @foreach ($item as $img)
                                <div class="col-6 col-md-6 col-lg-6"
                                    style="
                                padding-bottom: 10px;
                                padding-top: 10px;
                                padding-left: 10px;
                                padding-right: 10px;
                            ">
                                    <div class="portfolio-content h-100 w-100">
                                        <a href="{{ $img }}" data-fancybox="gallery"
                                            data-caption="Progress - {{ $i }}" class="image-container">
                                            <img class="image-fluid lazy" src="{{ $img }}"
                                                alt="Progress - {{ $i }}" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
