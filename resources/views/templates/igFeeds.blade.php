<div class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="site-section-heading text-center w-border col-md-6 mx-auto">
                <h2 class="mb-5">INSTAGRAM Feeds</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($igs as $item)
                <div class="col-3 col-md-3" style="padding: 0px">
                    <a href="https://www.instagram.com/pesonahutanasraya/" target="_blank" class="unit-9"><img
                            src="{{ $item }}" class="image-responsive w-100 lazy">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-row-reverse py-4">
            <a href="https://www.instagram.com/pesonahutanasraya/" class="btn btn-primary btn-sm px-4 py-3"
                target="_blank" rel="noopener noreferrer">
                See More >></a>
        </div>
    </div>
</div>
