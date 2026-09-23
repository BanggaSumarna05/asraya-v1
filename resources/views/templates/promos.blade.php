@php
    $originalPromos = is_array($promos) ? $promos : iterator_to_array($promos);
@endphp

<!-- Swiper 11 CSS & JS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<section id="promo" class="promo-section-dark">
    <!-- Continuous Running Text Marquee Strip -->
    <div class="promo-text-marquee">
        <div class="promo-text-track">
            @for ($m = 0; $m < 3; $m++)
            <span>Special Offers</span>
            <span>&middot;</span>
            <span>Promo Terbatas</span>
            <span>&middot;</span>
            <span>Casa Asraya Pekanbaru</span>
            <span>&middot;</span>
            <span>Living Harmony In Nature</span>
            <span>&middot;</span>
            <span>Hunian Premium</span>
            <span>&middot;</span>
            <span>Dapatkan Penawaran Terbaik</span>
            <span>&middot;</span>
            @endfor
        </div>
    </div>

    <div class="container px-3 px-md-4">
        <!-- 21st.dev Outer Card Container Frame -->
        <div class="card-carousel-frame">
            <div class="card-carousel-inner">
                
                <!-- Badge (Sparkles + Special Offers) -->
                <div class="card-carousel-badge">
                    <span>Special Offers</span>
                </div>

                <!-- Header Title Section -->
                <div class="card-carousel-header">
                    <h3 class="card-carousel-title">Promo Menarik</h3>
                    <p class="card-carousel-sub">Penawaran terbatas Casa Asraya Pekanbaru.</p>
                </div>

                <!-- Swiper 3D Coverflow Container -->
                <div class="swiper card-carousel-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($originalPromos as $index => $item)
                            @php
                                $imgUrl = is_object($item) ? $item->image : (is_array($item) ? ($item['image'] ?? '') : $item);
                            @endphp
                            <div class="swiper-slide">
                                <div class="slide-card-box" data-toggle="modal" data-target="#promoModal{{ $index }}">
                                    <img src="{{ $imgUrl }}" alt="Promo Casa Asraya" class="slide-card-img" />
                                    <div class="slide-card-hover-overlay">
                                        <span class="slide-claim-badge">Lihat Detail ↗</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Duplicate slides if promo count is small for seamless 3D loop -->
                        @if(count($originalPromos) > 0 && count($originalPromos) < 6)
                            @foreach ($originalPromos as $index => $item)
                                @php
                                    $imgUrl = is_object($item) ? $item->image : (is_array($item) ? ($item['image'] ?? '') : $item);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="slide-card-box" data-toggle="modal" data-target="#promoModal{{ $index }}">
                                        <img src="{{ $imgUrl }}" alt="Promo Casa Asraya" class="slide-card-img" />
                                        <div class="slide-card-hover-overlay">
                                            <span class="slide-claim-badge">Lihat Detail ↗</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Pagination Dots -->
                    <div class="swiper-pagination"></div>

                    <!-- Navigation Arrows -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modals untuk Detail Promo -->
    @foreach ($originalPromos as $index => $item)
        @php
            $imgUrl = is_object($item) ? $item->image : (is_array($item) ? ($item['image'] ?? '') : $item);
            $linkUrl = is_object($item) ? ($item->link ?? '#') : (is_array($item) ? ($item['link'] ?? '#') : '#');
        @endphp
        <div class="modal fade" id="promoModal{{ $index }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content style-dark-modal">
                    <div class="modal-body p-0 position-relative" style="border-radius: 1.75rem; overflow: hidden; background: #1a3a2e; border: 1px solid rgba(255,255,255,0.2);">
                        <button type="button" class="close promo-modal-close" data-dismiss="modal" aria-label="Close" 
                                style="top: 15px; right: 15px; background: rgba(0,0,0,0.6); color: #fff; border-radius: 50%; width: 38px; height: 38px; opacity: 1; z-index: 10; border: 1px solid rgba(255,255,255,0.2); font-size: 22px; line-height: 1; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(8px);">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                        <img src="{{ $imgUrl }}" alt="Promo Detail" style="width: 100%; height: auto; display: block;">
                        
                        @if(!empty($linkUrl) && $linkUrl !== '#')
                        <div style="padding: 24px; text-align: center; background: #11261d; border-top: 1px solid rgba(255,255,255,0.1);">
                            <a href="{{ $linkUrl }}" target="_blank" class="btn-claim-promo"
                               style="display: inline-flex; align-items: center; gap: 8px; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: #D4622A; color: #fff; padding: 14px 36px; border-radius: 9999px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 6px 20px rgba(212,98,42,0.3);"
                               onmouseover="this.style.background='#fff'; this.style.color='#1a3a2e'" 
                               onmouseout="this.style.background='#D4622A'; this.style.color='#fff'">
                                Klaim Promo Ini ↗
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>

<style>
/* ── Section & Forest Green Theme ── */
.promo-section-dark {
    background: #0f261d;
    padding: 60px 0 90px;
    position: relative;
    overflow: hidden;
    color: #ffffff;
}

/* ── Running Text Marquee Strip ── */
.promo-text-marquee {
    background: rgba(212, 98, 42, 0.15);
    border-top: 1px solid rgba(212, 98, 42, 0.3);
    border-bottom: 1px solid rgba(212, 98, 42, 0.3);
    padding: 12px 0;
    overflow: hidden;
    white-space: nowrap;
    margin-bottom: 45px;
}

.promo-text-track {
    display: inline-flex;
    gap: 40px;
    animation: promoTextMarquee 35s linear infinite;
    font-family: 'Outfit', monospace;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: #D4622A;
}

@keyframes promoTextMarquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* ── 21st.dev Container Frame ── */
.card-carousel-frame {
    max-width: 1080px;
    margin: 0 auto;
    border-radius: 28px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    padding: 8px;
    background: rgba(255, 255, 255, 0.04);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
}

@media (min-width: 768px) {
    .card-carousel-frame {
        border-radius: 44px 44px 28px 28px;
    }
}

.card-carousel-inner {
    position: relative;
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    background: linear-gradient(180deg, #1a3a2e 0%, #11261d 100%);
    padding: 40px 24px 30px;
    backdrop-filter: blur(12px);
}

@media (min-width: 768px) {
    .card-carousel-inner {
        border-radius: 40px 40px 20px 20px;
        padding: 48px 36px 36px;
    }
}

/* ── Badge Pill ── */
.card-carousel-badge {
    position: absolute;
    top: 24px;
    left: 24px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Outfit', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 14px;
    padding: 6px 14px;
    backdrop-filter: blur(8px);
}

.sparkles-icon {
    color: #D4622A;
    fill: rgba(212, 98, 42, 0.2);
}

/* ── Header Titles ── */
.card-carousel-header {
    text-align: center;
    padding-top: 28px;
    padding-bottom: 24px;
}

.card-carousel-title {
    font-family: 'Outfit', system-ui, sans-serif;
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 700;
    color: #ffffff;
    letter-spacing: -0.02em;
    margin: 0 0 8px;
    opacity: 0.95;
}

.card-carousel-sub {
    font-family: 'Outfit', system-ui, sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
}

/* ── Swiper 3D Coverflow ── */
.card-carousel-swiper {
    width: 100%;
    padding-top: 10px;
    padding-bottom: 55px !important;
}

.card-carousel-swiper .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 310px;
    transition: transform 0.3s ease;
}

@media (max-width: 575px) {
    .card-carousel-swiper .swiper-slide {
        width: 260px;
    }
}

.slide-card-box {
    position: relative;
    border-radius: 1.5rem;
    overflow: hidden;
    background: #1a3a2e;
    border: 1px solid rgba(255, 255, 255, 0.15);
    aspect-ratio: 1 / 1;
    cursor: pointer;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
}

.slide-card-box:hover {
    border-color: rgba(212, 98, 42, 0.8);
    box-shadow: 0 20px 45px rgba(212, 98, 42, 0.3);
}

.slide-card-img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 1.25rem;
    transition: transform 0.4s ease;
}

.slide-card-box:hover .slide-card-img {
    transform: scale(1.05);
}

.slide-card-hover-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, transparent 60%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 20px;
}

.slide-card-box:hover .slide-card-hover-overlay {
    opacity: 1;
}

.slide-claim-badge {
    font-family: 'Outfit', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #fff;
    background: #D4622A;
    padding: 8px 20px;
    border-radius: 9999px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4);
}

/* Hide default Swiper 3d shadows for ultra clean look */
.swiper-3d .swiper-slide-shadow-left,
.swiper-3d .swiper-slide-shadow-right {
    background-image: none !important;
}

/* Swiper Pagination & Navigation Custom Styling */
.card-carousel-swiper .swiper-pagination-bullet {
    background: rgba(255, 255, 255, 0.3);
    opacity: 1;
    transition: all 0.3s ease;
}

.card-carousel-swiper .swiper-pagination-bullet-active {
    background: #D4622A !important;
    width: 22px;
    border-radius: 6px;
}

.card-carousel-swiper .swiper-button-next,
.card-carousel-swiper .swiper-button-prev {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    backdrop-filter: blur(8px);
    transition: all 0.3s ease;
}

.card-carousel-swiper .swiper-button-next:after,
.card-carousel-swiper .swiper-button-prev:after {
    font-size: 16px;
    font-weight: bold;
}

.card-carousel-swiper .swiper-button-next:hover,
.card-carousel-swiper .swiper-button-prev:hover {
    background: #D4622A;
    border-color: #D4622A;
    color: #ffffff;
}

@media (max-width: 767px) {
    .card-carousel-swiper .swiper-button-next,
    .card-carousel-swiper .swiper-button-prev {
        display: none;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let initSwiper = setInterval(function() {
        if (typeof Swiper !== 'undefined') {
            clearInterval(initSwiper);
            new Swiper('.card-carousel-swiper', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                loop: true,
                slidesPerView: 'auto',
                spaceBetween: 30,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 2.5,
                    slideShadows: false,
                },
                pagination: {
                    el: '.card-carousel-swiper .swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.card-carousel-swiper .swiper-button-next',
                    prevEl: '.card-carousel-swiper .swiper-button-prev',
                },
            });
        }
    }, 100);

    setTimeout(function() { clearInterval(initSwiper); }, 6000);
});
</script>
