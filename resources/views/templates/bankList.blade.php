<style>
    .mid {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row mid">
            <div class="site-section-heading text-center w-border col-md-12 mx-auto">
                <h2 class="mb-5">Supported by Bank</h2>
            </div>
            @foreach ($banks as $item)
                <div class="col-12 text-center">
                    <img src="{{ $item }}" class="w-100 lazy">
                </div>
            @endforeach
        </div>
    </div>
</div>
