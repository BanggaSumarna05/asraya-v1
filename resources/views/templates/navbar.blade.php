{{-- Outfit Font --}}
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    #siteNav *,
    #mobileMenu * {
        box-sizing: border-box;
    }

    #siteNav .nav-pill,
    #siteNav .nav-actions,
    #siteNav .nav-brand,
    #mobileMenu .mobile-menu-top,
    #mobileMenu .mobile-wa-link {
        display: flex;
        align-items: center;
    }

    #siteNav .nav-pill {
        justify-content: space-between;
        margin-left: auto;
        margin-right: auto;
    }

    #siteNav .nav-brand {
        flex-shrink: 0;
    }
    /* Dropdown: hidden by default, visible on hover */
    #siteNav .nav-item {
        position: relative;
        display: flex;
        align-items: center;
    }

    #siteNav .nav-dropdown {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-6px);
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        /* padding-top creates invisible bridge so mouse can move to dropdown */
        padding-top: 12px;
        transition: opacity 0.25s ease, transform 0.25s ease, visibility 0s linear 0.15s;
        min-width: 200px;
        z-index: 9100;
    }

    #siteNav .nav-item:hover .nav-dropdown {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
        transition-delay: 0s;
    }

    /* Dropdown inner container with better padding for easier control */
    #siteNav .nav-dropdown > div {
        padding: 12px 0 !important;
    }

    #siteNav .nav-dropdown a {
        margin: 0 8px !important;
        padding: 12px 16px !important;
    }
    /* Mobile submenu */
    #mobileMenu .mob-sub { display: none; }
    #mobileMenu .mob-sub.open { display: block; }
    /* Scroll state */
    #siteNav.scrolled .nav-pill {
        background: rgba(20, 43, 34, 0.95) !important;
        border-color: rgba(255,255,255,0.1) !important;
        box-shadow: 0 20px 40px rgba(0,0,0,0.18);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    /* === Responsive: Desktop nav & hamburger === */
    #nav-desktop-menu { display: none; }
    #nav-desktop-cta  { display: none; }
    #nav-hamburger    { display: flex; }

    @media (min-width: 1100px) {
        #nav-desktop-menu { display: flex; }
        #nav-desktop-cta  { display: flex; }
        #nav-hamburger    { display: none !important; }
    }
</style>

{{-- ============ HEADER ============ --}}
<header id="siteNav" style="position:fixed;top:16px;left:0;width:100%;z-index:9000;padding:0 16px;transition:none;">

    {{-- Desktop Island Capsule --}}
    <div class="nav-pill"
         style="max-width:1200px;height:56px;background:transparent;border:1px solid transparent;border-radius:9999px;padding:0 20px;transition:background 0.4s ease,box-shadow 0.4s ease,border-color 0.4s ease;flex-wrap:nowrap;overflow:visible;">

        {{-- Logo --}}
        <a href="{{ route('index') }}" class="nav-brand">
            <img src="/img/asraya-2.png" alt="Asraya" style="height:32px;width:auto;display:block;">
        </a>

        {{-- Desktop Nav (hidden on mobile) --}}
        <nav id="nav-desktop-menu" style="align-items:center;gap:0px;flex-wrap:nowrap;flex-shrink:1;min-width:0;">
            <a href="{{ Route::is('index') ? '#home' : route('index') }}"
               style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;border-radius:9999px;text-decoration:none;transition:color 0.2s;">Home</a>

            {{-- Hunian --}}
            <div class="nav-item">
                <span style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;border-radius:9999px;cursor:pointer;display:block;">Hunian &#9662;</span>
                <div class="nav-dropdown">
                    <div style="background:rgba(15,33,26,0.98);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:8px 0;box-shadow:0 16px 40px rgba(0,0,0,0.3);">
                        <a href="{{ route('unitUnggulan') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:#D4622A;padding:10px 20px 6px;text-decoration:none;">Unit</a>
                        <a href="{{ route('gaharu') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Gaharu Prime</a>
                        <a href="{{ route('mahogany') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Mahogany</a>
                        <a href="{{ route('cendana') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Cendana</a>
                        <div style="height:1px;background:rgba(255,255,255,0.06);margin:8px 16px;"></div>
                        <a href="{{ route('simulasi-kpr') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Simulasi KPR</a>
                    </div>
                </div>
            </div>

            {{-- Fasilitas --}}
            <div class="nav-item">
                <span style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;border-radius:9999px;cursor:pointer;display:block;">Fasilitas &#9662;</span>
                <div class="nav-dropdown">
                    <div style="background:rgba(15,33,26,0.98);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:8px 0;box-shadow:0 16px 40px rgba(0,0,0,0.3);">
                        <a href="{{ route('fasilitas') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:#D4622A;padding:10px 20px 6px;text-decoration:none;">Semua Fasilitas</a>
                        <a href="{{ route('clubhouse') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Club House</a>
                        <a href="{{ route('gym') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Gym</a>
                        <a href="{{ route('brandgang') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Brandgang</a>
                        <a href="{{ route('swimming-pool') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Swimming Pool</a>
                    </div>
                </div>
            </div>

            {{-- Tentang --}}
            <div class="nav-item">
                <span style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;cursor:pointer;display:block;">Tentang &#9662;</span>
                <div class="nav-dropdown">
                    <div style="background:rgba(15,33,26,0.98);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:8px 0;box-shadow:0 16px 40px rgba(0,0,0,0.3);">
                        <a href="{{ route('visimisi') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Visi & Misi</a>
                        <a href="{{ route('history') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Sejarah</a>
                        <a href="{{ route('galeri') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Galeri</a>
                    </div>
                </div>
            </div>

            {{-- Informasi --}}
            <div class="nav-item">
                <span style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;cursor:pointer;display:block;">Informasi &#9662;</span>
                <div class="nav-dropdown">
                    <div style="background:rgba(15,33,26,0.98);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:8px 0;box-shadow:0 16px 40px rgba(0,0,0,0.3);">
                        <a href="{{ route('blog.index') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Berita & Artikel</a>
                        <a href="{{ route('faq') }}" style="display:block;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">Pertanyaan Umum</a>
                    </div>
                </div>
            </div>

            {{-- Unduh --}}
            <div class="nav-item">
                <span style="font-family:'Outfit',sans-serif;font-size:12px;color:rgba(255,255,255,0.8);padding:7px 10px;cursor:pointer;display:block;">Unduh &#9662;</span>
                <div class="nav-dropdown">
                    <div style="background:rgba(15,33,26,0.98);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:8px 0;box-shadow:0 16px 40px rgba(0,0,0,0.3);min-width:180px;">
                        <a href="{{ asset('assets/ebrochure/asraya-brosur.pdf') }}" target="_blank" style="display:flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">
                            <span style="font-size:10px;opacity:0.5;">&#8595;</span> E-Brochure
                        </a>
                        <a href="{{ asset('assets/ebrochure/asraya-profile.pdf') }}" target="_blank" style="display:flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">
                            <span style="font-size:10px;opacity:0.5;">&#8595;</span> E-Profile
                        </a>
                        <a href="{{ asset('assets/ebrochure/site_plan_asraya_property.png') }}" target="_blank" style="display:flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">
                            <span style="font-size:10px;opacity:0.5;">&#8595;</span> Site Plan
                        </a>
                        <div style="height:1px;background:rgba(255,255,255,0.06);margin:8px 16px;"></div>
                        <a href="https://linktr.ee/casaasraya" target="_blank" style="display:flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:13px;color:rgba(255,255,255,0.75);padding:8px 20px;text-decoration:none;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.color='rgba(255,255,255,0.75)';this.style.background='transparent'">
                            <span style="font-size:10px;opacity:0.5;">&#8599;</span> Linktree
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Right CTA + Hamburger --}}
        <div class="nav-actions" style="gap:6px;flex-shrink:0;flex-wrap:nowrap;">
            {{-- Desktop CTA buttons --}}
            <div id="nav-desktop-cta" style="align-items:center;gap:6px;flex-wrap:nowrap;">
                <a href="{{ route('faq') }}"
                   style="font-family:'Outfit',sans-serif;font-size:12px;font-weight:500;color:rgba(255,255,255,0.85);border:1px solid rgba(255,255,255,0.2);border-radius:9999px;padding:7px 14px;text-decoration:none;transition:all 0.2s;white-space:nowrap;"
                   onmouseover="this.style.background='rgba(255,255,255,0.08)';this.style.borderColor='rgba(255,255,255,0.4)'"
                   onmouseout="this.style.background='transparent';this.style.borderColor='rgba(255,255,255,0.2)'">
                    FAQ
                </a>
                <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
                   target="_blank"
                   style="font-family:'Outfit',sans-serif;font-size:12px;font-weight:600;color:#1a3a2e;background:#fff;border-radius:9999px;padding:7px 16px;text-decoration:none;transition:all 0.2s;white-space:nowrap;"
                   onmouseover="this.style.background='#D4622A';this.style.color='#fff'"
                   onmouseout="this.style.background='#fff';this.style.color='#1a3a2e'">
                    Get Started
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="nav-hamburger"
                    aria-label="Buka menu navigasi"
                    style="width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;transition:background 0.2s;padding:0;"
                    onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.15)'"
                    onclick="openMobileMenu()">
                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0" width="18" height="2" rx="1" fill="white"/>
                    <rect y="6" width="18" height="2" rx="1" fill="white"/>
                    <rect y="12" width="18" height="2" rx="1" fill="white"/>
                </svg>
            </button>
        </div>
    </div>
</header>

{{-- ============ MOBILE OVERLAY MENU ============ --}}
<div id="mobileMenu"
     style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(255,255,255,0.98);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);overflow-y:auto;">

    {{-- Header --}}
    <div class="mobile-menu-top" style="justify-content:space-between;padding:20px 24px;border-bottom:1px solid #e8e4de;">
        <a href="{{ route('index') }}">
            <img src="/img/asraya-1.png" alt="Asraya" style="height:36px;width:auto;">
        </a>
        <button onclick="closeMobileMenu()"
                style="width:40px;height:40px;border-radius:50%;background:#f5f1ea;border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;padding:0;">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L15 15M15 1L1 15" stroke="#1a3a2e" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    {{-- Menu Items --}}
    <div style="padding:16px 24px 32px;">

        <a href="{{ Route::is('index') ? '#home' : route('index') }}" onclick="closeMobileMenu()"
           style="display:block;font-family:'Outfit',sans-serif;font-size:16px;font-weight:500;color:#1a3a2e;padding:16px 0;border-bottom:1px solid #f0ece5;text-decoration:none;">
            Home
        </a>

        {{-- Accordion items --}}
        @php
        $mobMenus = [
            'Hunian' => [
                ['Semua Unit', route('unitUnggulan')],
                ['Gaharu Signature', route('gaharu')],
                ['Mahogany', route('mahogany')],
                ['Cendana', route('cendana')],
                ['Simulasi KPR', route('simulasi-kpr')],
            ],
            'Fasilitas' => [
                ['Semua Fasilitas', route('fasilitas')],
                ['Club House', route('clubhouse')],
                ['Gym', route('gym')],
                ['Brandgang', route('brandgang')],
                ['Swimming Pool', route('swimming-pool')],
            ],
            'Tentang' => [
                ['Visi & Misi', route('visimisi')],
                ['Sejarah', route('history')],
                ['Galeri', route('galeri')],
            ],
            'Informasi' => [
                ['Berita & Artikel', route('blog.index')],
                ['Pertanyaan Umum', route('faq')],
            ],
            'Unduh' => [
                ['E-Brochure', asset('assets/ebrochure/asraya-brosur.pdf')],
                ['E-Profile', asset('assets/ebrochure/asraya-profile.pdf')],
                ['Site Plan', asset('assets/ebrochure/site_plan_asraya_property.png')],
                ['Linktree', 'https://linktr.ee/casaasraya'],
            ],
        ];
        @endphp

        @foreach($mobMenus as $label => $children)
        <div style="border-bottom:1px solid #f0ece5;">
            <button onclick="toggleSub(this)"
                    style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:16px 0;background:none;border:none;cursor:pointer;font-family:'Outfit',sans-serif;font-size:16px;font-weight:500;color:#1a3a2e;text-align:left;">
                {{ $label }}
                <svg class="sub-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="transition:transform 0.2s;flex-shrink:0;">
                    <path d="M2 5L7 10L12 5" stroke="#1a3a2e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="mob-sub" style="padding-bottom:12px;">
                <div style="background:#f8f6f2;border-radius:12px;padding:8px 0;margin-bottom:4px;">
                    @foreach($children as [$name, $href])
                    <a href="{{ $href }}" onclick="closeMobileMenu()"
                       style="display:block;font-family:'Outfit',sans-serif;font-size:14px;color:#4a6359;padding:10px 16px;text-decoration:none;">
                        {{ $name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

        {{-- WhatsApp CTA --}}
        <a href="https://wa.me/6281399998066?text=Hi%20saya%20tertarik%20dengan%20PESONA%20HUTAN%20ASRAYA"
           target="_blank"
           class="mobile-wa-link" style="justify-content:center;gap:10px;margin-top:28px;background:#1a3a2e;color:#fff;font-family:'Outfit',sans-serif;font-size:15px;font-weight:600;padding:16px 24px;border-radius:9999px;text-decoration:none;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Hubungi via WhatsApp
        </a>
    </div>
</div>

<script>
    // Scroll detection
    const siteNav = document.getElementById('siteNav');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 40) {
            siteNav.classList.add('scrolled');
        } else {
            siteNav.classList.remove('scrolled');
        }
    }, { passive: true });

    // Mobile menu
    function openMobileMenu() {
        document.getElementById('mobileMenu').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    function closeMobileMenu() {
        document.getElementById('mobileMenu').style.display = 'none';
        document.body.style.overflow = '';
    }

    // Submenu accordion
    function toggleSub(btn) {
        const sub = btn.nextElementSibling;
        const arrow = btn.querySelector('.sub-arrow');
        const isOpen = sub.classList.contains('open');
        // Close all
        document.querySelectorAll('.mob-sub').forEach(el => el.classList.remove('open'));
        document.querySelectorAll('.sub-arrow').forEach(el => el.style.transform = 'rotate(0deg)');
        if (!isOpen) {
            sub.classList.add('open');
            arrow.style.transform = 'rotate(180deg)';
        }
    }
</script>