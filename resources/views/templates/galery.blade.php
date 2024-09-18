<div class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-6 mx-auto">
                <h2 class="mb-2">Galleries</h2>
            </div>
        </div>
        <br>
        <div class="gallery">
            @for ($i = 1; $i < 10; $i++)
                <a href="{{ '/img/gallery/gal' . $i . '.webp' }}" data-fancybox="gallery"
                    data-caption="Gallery - {{ $i }}">
                    <img class="image lazy" src="{{ '/img/gallery/gal' . $i . '.webp' }}"
                        alt="Gallery - {{ $i }}" />
                </a>
            @endfor
        </div>
    </div>
</div>
