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
            {{-- fuck this shit, RUBIKON --}}
            <div class="space-y-8 pt-50 pb-20 md:px-10 lg:px-10">
                <h1>Gallery</h1s>
                    <div class="row g-4">
                        @foreach ($data['galeries'] as $item)
                        <div class="col-3 col-md-3 col-lg-3 col-sm-6">
                            <div class="relative">
                                <div
                                    class="skeleton animate-pulse bg-gray-300 dark:bg-gray-700 w-full h-48 rounded shadow-lg m-2">
                                </div>
                                @if (preg_match('/\.mp4($|\?)/i', $item['gambar']))
                                <video src="{{ $item['gambar'] }}" data-src="{{ $item['gambar'] }}"
                                    class="w-full h-48 object-cover shadow-lg cursor-pointer m-2 opacity-0 transition-opacity duration-300"
                                    controls preload="metadata" playsinline
                                    onloadeddata="this.previousElementSibling.classList.add('hidden'); this.classList.remove('opacity-0');"
                                    onerror="this.previousElementSibling.classList.remove('hidden'); this.classList.add('hidden');">
                                    Your browser does not support the video tag.
                                </video>
                                @else
                                <img src="{{ $item['gambar'] }}" alt="Gallery Image" data-src="{{ $item['gambar'] }}"
                                    class="gallery-image w-full h-80 object-cover shadow-lg cursor-pointer m-2 opacity-0 transition-opacity duration-300"
                                    loading="lazy"
                                    onload="this.previousElementSibling.classList.add('hidden'); this.classList.remove('opacity-0');"
                                    onerror="this.previousElementSibling.classList.remove('hidden'); this.classList.add('hidden');">
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </section>
    @include('templates/footer')
</body>

</html>