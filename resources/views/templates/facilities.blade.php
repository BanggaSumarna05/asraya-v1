<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-8 mx-auto">
                <h2 class="mb-5">FACILITIES</h2>
                <p class="rapih">
                    Selamat datang di PESONA HUTAN ASRAYA, di mana kehidupan mewah bertemu dengan kenyamanan dan
                    kemudahan. Terletak di jantung Riau, properti kami yang menakjubkan menawarkan pengalaman gaya hidup
                    yang tak tertandingi.
                </p>
            </div>
        </div>
        <div class="row" style="padding-top: -30px">
            @foreach ($facilities as $item)
                <div class="col-md-3 col-lg-6" data-aos="fade-up" data-aos-delay="100" style="padding-top: 30px">
                    <a href="{{ $item['link'] }}" class="unit-9">
                        {{-- <div class="image" style="background-image:url('{{ $item['cover'] }})'"></div> --}}
                        <div class="image lazy" style="background-image:url({{ $item['cover'] }})"></div>
                        <div class="unit-9-content">
                            <h2>{{ $item['title'] }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
