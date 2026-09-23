{{-- Font Awesome for social icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
{{-- Social Links - Plantique Capsule Style --}}
<div style="background: #f5f1ea; padding: 32px 0; border-top: 1px solid #e8e4de;" data-aos="fade">
    <div class="container">
        <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
            <a href="https://www.instagram.com/stories/pesonahutanasraya/" target="_blank"
               style="display: inline-flex; align-items: center; gap: 8px; border: 1px solid #dcd7ce; border-radius: 9999px; background: #fff; color: #0c1a12; padding: 10px 24px; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.2s; box-shadow: 0 2px 8px rgba(0,0,0,0.02);"
               onmouseover="this.style.background='#0c1a12'; this.style.color='#fff'; this.style.borderColor='#0c1a12'"
               onmouseout="this.style.background='#fff'; this.style.color='#0c1a12'; this.style.borderColor='#dcd7ce'">
                <i class="fab fa-instagram" style="font-size:13px;"></i> Instagram
            </a>
            <a href="https://www.youtube.com/@PesonaHutanAsraya" target="_blank"
               style="display: inline-flex; align-items: center; gap: 8px; border: 1px solid #dcd7ce; border-radius: 9999px; background: #fff; color: #0c1a12; padding: 10px 24px; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.2s; box-shadow: 0 2px 8px rgba(0,0,0,0.02);"
               onmouseover="this.style.background='#0c1a12'; this.style.color='#fff'; this.style.borderColor='#0c1a12'"
               onmouseout="this.style.background='#fff'; this.style.color='#0c1a12'; this.style.borderColor='#dcd7ce'">
                <i class="fab fa-youtube" style="font-size:13px;"></i> YouTube
            </a>
            <a href="https://wa.me/6281399998066?text=I'm%20interested%20in%20your%20property%20for%20sale" target="_blank"
               style="display: inline-flex; align-items: center; gap: 8px; border: 1px solid #dcd7ce; border-radius: 9999px; background: #fff; color: #0c1a12; padding: 10px 24px; font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.2s; box-shadow: 0 2px 8px rgba(0,0,0,0.02);"
               onmouseover="this.style.background='#0c1a12'; this.style.color='#fff'; this.style.borderColor='#0c1a12'"
               onmouseout="this.style.background='#fff'; this.style.color='#0c1a12'; this.style.borderColor='#dcd7ce'">
                <i class="fab fa-whatsapp" style="font-size:13px;"></i> WhatsApp
            </a>
        </div>
    </div>
</div>

{{-- Main Footer --}}
<footer class="site-footer" style="background: #0c1a12; padding: 80px 0 40px; border-top: 1px solid rgba(245,242,234,0.05);">
    <div class="container px-3 px-md-4">
        <div class="row">
            {{-- About --}}
            <div class="col-lg-6 col-sm-12 mb-5 mb-lg-0">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #D4622A; margin-bottom: 24px;">About Asraya</h3>
                <p style="font-family: 'Outfit', sans-serif; font-size: 13px; color: rgba(245,242,234,0.65); line-height: 1.8; max-width: 460px; margin: 0;">
                    Āśraya (Sanskrit: आश्रय)
                    arti mendalam dari "āśraya" adalah perlindungan, naungan, tempat berlindung, dan
                    keterikatan dengan kenyamanan dan keamanan. Dalam filosofi Hindu, entitas
                    yang memiliki kehidupan / Jiva disebut āśraya. PT Casa Asraya Properti menciptakan
                    hunian yang menjadi perlindungan yang nyaman dan membawa ketenangan bagi penghuni di dalamnya.
                </p>
            </div>
            
            {{-- Sitemap --}}
            <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #D4622A; margin-bottom: 24px;">Sitemap</h3>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Outfit', sans-serif; font-size: 13px;">
                    <li style="margin-bottom: 12px;"><a href="{{ Route::is('index') ? '#home' : route('index') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Halaman Utama</a></li>
                    <li style="margin-bottom: 12px;"><span style="color: rgba(245,242,234,0.4);">Unit Unggulan</span>
                        <ul style="list-style: none; padding-left: 12px; margin-top: 8px;">
                            <li style="margin-bottom: 8px;"><a href="{{ route('gaharu') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Gaharu Prime</a></li>
                            <li style="margin-bottom: 8px;"><a href="{{ route('mahogany') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Mahogany</a></li>
                            <li style="margin-bottom: 8px;"><a href="{{ route('cendana') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Cendana</a></li>
                        </ul>
                    </li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('fasilitas') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Fasilitas</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('faq') }}" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">Pertanyaan Umum</a></li>
                    <li style="margin-bottom: 12px;"><a href="assets/ebrochure/asraya.pdf" target="_blank" style="color: rgba(245,242,234,0.8); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='rgba(245,242,234,0.8)'">E-Brochure</a></li>
                    <li><a href="https://wa.me/6281399998066?text=I'm%20interested%20in%20your%20property%20for%20sale" target="_blank" style="color: #D4622A; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;">Book Now &rarr;</a></li>
                </ul>
            </div>
            
            {{-- Location --}}
            <div class="col-lg-3 col-sm-6">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #D4622A; margin-bottom: 24px;">Our Location</h3>
                <p style="font-family: 'Outfit', sans-serif; font-size: 13px; color: rgba(245,242,234,0.8); line-height: 1.6; margin-bottom: 20px;">
                    <a href="https://maps.app.goo.gl/fW3q54PnRM8DQ3dB8" target="_blank" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#D4622A'" onmouseout="this.style.color='inherit'">
                        <strong style="color: #fff; font-weight: 600;">PESONA HUTAN BY ASRAYA</strong><br>
                        Jl. Dwikora I No.16, Suka Maju, Kec. Sail, Kota Pekanbaru, Riau 28115
                    </a>
                </p>
                <div style="border-radius: 2rem; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 10px 30px rgba(0,0,0,0.15); position: relative;">
                    <img src="{{ asset('img/maps-02.png') }}" alt="Lokasi Pesona Hutan Asraya"
                         style="width:100%; height:160px; object-fit:cover; display:block; background: #fff;">
                    <a href="https://maps.app.goo.gl/fW3q54PnRM8DQ3dB8" target="_blank"
                       style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(12,26,18,0.0);transition:background 0.2s;"
                       onmouseover="this.style.background='rgba(12,26,18,0.35)'"
                       onmouseout="this.style.background='rgba(12,26,18,0)'">
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Copyright --}}
        <div class="row mt-5 pt-4" style="border-top: 1px solid rgba(245,242,234,0.05);">
            <div class="col-12 text-center">
                <p style="font-family: 'Outfit', sans-serif; font-size: 11px; color: rgba(245,242,234,0.35); margin: 0; letter-spacing: 0.05em;">
                    Copyright &copy; <script>document.write((new Date).getFullYear())</script> All rights reserved | <span style="color: rgba(245,242,234,0.55); font-weight: 500;">CASA ASRAYA PROPERTY</span>
                </p>
            </div>
        </div>
    </div>
</footer>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "RealEstateAgent",
        "name": "Asraya Property",
        "url": "https://www.asrayaproperty.com",
        "logo": "https://www.asrayaproperty.com/old/assets/img/asraya.png",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Dwikora I No.16, Suka Maju, Kec. Sail",
            "addressLocality": "Kota Pekanbaru",
            "addressRegion": "Riau",
            "postalCode": "Riau",
            "addressCountry": "ID"
        }
    }
</script>
{{-- lazyload --}}
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-bg"));
        if ("IntersectionObserver" in window) {
            let lazyBackgroundObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.backgroundImage = entry.target.dataset.bg;
                        entry.target.classList.remove("lazy-bg");
                        lazyBackgroundObserver.unobserve(entry.target);
                    }
                });
            });
            lazyBackgrounds.forEach(function(lazyBackground) {
                lazyBackgroundObserver.observe(lazyBackground);
            });
        } else {
            // Fallback for older browsers
            let lazyLoad = function() {
                lazyBackgrounds.forEach(function(lazyBackground) {
                    if (lazyBackground.getBoundingClientRect().top < window.innerHeight &&
                        lazyBackground.getBoundingClientRect().bottom > 0 && getComputedStyle(
                            lazyBackground).display !== "none") {
                        lazyBackground.style.backgroundImage = lazyBackground.dataset.bg;
                        lazyBackground.classList.remove("lazy-bg");
                    }
                });
            };
            document.addEventListener("scroll", lazyLoad);
            window.addEventListener("resize", lazyLoad);
            window.addEventListener("orientationchange", lazyLoad);
        }
    });
</script>
<script src="/js/jquery-3.3.1.min.js"></script>
{{-- <script src="js/jquery-migrate-3.0.1.min.js"></script> --}}
{{-- <script src="js/jquery-ui.js"></script> --}}
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
{{-- <script src="js/mediaelement-and-player.min.js"></script> --}}
{{-- <script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script> --}}
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/circleaudioplayer.js"></script>
<script src="/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<!-- Tawk.to Script with window.onload -->
<script type="text/javascript">
    window.onload = function() {
        // Only show promo modal if the element exists (only on homepage)
        var promoEl = document.getElementById('promoCarouselPopup');
        if (promoEl) {
            var promoCarouselModal = new bootstrap.Modal(promoEl);
            promoCarouselModal.show();
        }
        // Tawk.to Live Chat
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6846413cefcd3b190fc04309/1it96tlbq';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s1.onload = function() {
                if (window.Tawk_API && window.Tawk_API.onLoaded) {
                    window.Tawk_API.onLoaded();
                }
            };
            s0.parentNode.insertBefore(s1, s0);
        })();
    };
</script>

{{-- Lenis Smooth Scroll --}}
<script src="https://unpkg.com/lenis@1.1.14/dist/lenis.min.js"></script>
<script>
    const lenis = new Lenis()

    function raf(time) {
        lenis.raf(time)
        requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)
</script>

{{-- GSAP Scroll Animations --}}
<script src="/new/assets/js/gsap-scroll-animations.js" defer></script>

{{-- Image Trail disabled --}}
