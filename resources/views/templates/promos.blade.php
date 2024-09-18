<div id="promo" class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-6 mx-auto">
                <h2 class="mb-5">Promo</h2>
                {{-- <marquee class="mb-5" width="300" scrollamount="300" scoredelay="300" direction="">Promos</marquee> --}}
            </div>
        </div>
        <div class="row">
            @foreach ($promos as $item)
                <div class="col-4 col-sm-4 col-md-4" style="padding: 0px">
                    <a target="_blank" class="unit-7"><img src="{{ $item }}" class="image-responsive w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
