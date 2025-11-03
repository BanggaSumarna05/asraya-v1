<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates/meta')
    @include('templates/head')
    <style>
        .carousel-control-next,
        .carousel-control-prev {
            filter: invert(100%);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<style>
    /* Navbar background fixed green, no gradient */
    .site-navbar {
        background: rgba(0, 38, 28, 1) !important;
        /* Tailwind green-500 */
        background-image: none !important;
        /* box-shadow: 0 2px 4px rgba(0,0,0,0.04); */
    }
</style>

<body style="font-family: 'Archivo'">
    @include('templates/navbar')
    <section class="overlay lazy-bg pt-10">
        <div class="">
            @php
                $galeries = $data['galeries'];
                $chunks = array_chunk($galeries, 3);
            @endphp

            <!-- Lightbox Modal -->
            <div id="lightbox-modal"
                class="fixed inset-0 z-50 hidden bg-black bg-opacity-20 flex items-center justify-center">
                <div class="relative max-w-3xl w-full">
                    <button id="lightbox-close" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                    <img id="lightbox-image" src="" alt=""
                        class="w-full max-h-[80vh] object-contain rounded shadow-lg">
                    <div class="flex justify-between mt-4">
                        <button id="lightbox-prev"
                            class="text-white px-4 py-2 bg-gray-700 rounded hover:bg-green-500">&larr; Prev</button>
                        <button id="lightbox-next"
                            class="text-white px-4 py-2 bg-gray-700 rounded hover:bg-green-500">Next &rarr;</button>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const images = Array.from(document.querySelectorAll('.gallery-image'));
                    const modal = document.getElementById('lightbox-modal');
                    const modalImg = document.getElementById('lightbox-image');
                    const closeBtn = document.getElementById('lightbox-close');
                    const prevBtn = document.getElementById('lightbox-prev');
                    const nextBtn = document.getElementById('lightbox-next');
                    let currentIndex = 0;

                    function showModal(index) {
                        currentIndex = index;
                        modalImg.src = images[currentIndex].dataset.src;
                        modalImg.alt = images[currentIndex].alt;
                        modal.classList.remove('hidden');
                    }

                    images.forEach((img, idx) => {
                        img.addEventListener('click', () => showModal(idx));
                    });

                    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) modal.classList.add('hidden');
                    });

                    prevBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex - 1 + images.length) % images.length;
                        modalImg.src = images[currentIndex].dataset.src;
                        modalImg.alt = images[currentIndex].alt;
                    });

                    nextBtn.addEventListener('click', () => {
                        currentIndex = (currentIndex + 1) % images.length;
                        modalImg.src = images[currentIndex].dataset.src;
                        modalImg.alt = images[currentIndex].alt;
                    });

                    document.addEventListener('keydown', (e) => {
                        if (modal.classList.contains('hidden')) return;
                        if (e.key === 'ArrowLeft') prevBtn.click();
                        if (e.key === 'ArrowRight') nextBtn.click();
                        if (e.key === 'Escape') closeBtn.click();
                    });
                });
            </script>
            <div class="space-y-8">
                @foreach ($chunks as $i => $chunk)
                    <div class="flex flex-col md:flex-row {{ $i % 2 == 0 ? '' : 'md:flex-row-reverse' }}"
                        style="margin-bottom: 0px;">
                        @if (count($chunk) == 3)
                            <div class="flex-1 flex flex-col ">
                                <div class="group relative overflow-hidden shadow-lg flex-1">
                                    <img src="{{ $chunk[0]['gambar'] }}"
                                        class="w-full h-full object-cover transition-transform duration-300 gallery-image"
                                        data-src="{{ $chunk[0]['gambar'] }}" data-index="{{ $i * 3 }}">
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col ">
                                <div class="group relative overflow-hidden shadow-lg flex-1 ">
                                    <img src="{{ $chunk[1]['gambar'] }}"
                                        class="w-full h-full object-contain transition-transform duration-300 gallery-image"
                                        data-src="{{ $chunk[1]['gambar'] }}" data-index="{{ $i * 3 + 1 }}">
                                </div>
                                <div class="group relative overflow-hidden shadow-lg flex-1">
                                    <img src="{{ $chunk[2]['gambar'] }}"
                                        class="w-full h-full object-contain transition-transform duration-300 gallery-image"
                                        data-src="{{ $chunk[2]['gambar'] }}" data-index="{{ $i * 3 + 2 }}">
                                </div>
                            </div>
                        @else
                            @foreach ($chunk as $j => $item)
                                <div class="flex-1 group relative overflow-hidden shadow-lg">
                                    <img src="{{ $item['gambar'] }}"
                                        class="w-full h-full object-cover transition-transform duration-300 gallery-image"
                                        data-src="{{ $item['gambar'] }}" data-index="{{ $i * 3 + $j }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('templates/footer')
</body>

</html>
