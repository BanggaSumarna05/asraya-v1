<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>Simulasi KPR - Casa Asraya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .kpr-input {
            width: 100%; padding: 14px 18px;
            font-family: 'Outfit', sans-serif; font-size: 15px; color: #1a3a2e;
            background: #f5f1ea; border: 1.5px solid #e8e4de; border-radius: 0.9rem;
            outline: none; transition: border-color 0.25s, box-shadow 0.25s;
        }
        .kpr-input:focus {
            border-color: #1a3a2e; box-shadow: 0 0 0 3px rgba(26,58,46,0.1);
        }
        .kpr-label {
            font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600;
            letter-spacing: 0.07em; text-transform: uppercase; color: #888;
            margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;
        }
        input[type="range"].kpr-range {
            -webkit-appearance: none; width: 100%; height: 6px;
            border-radius: 3px; background: #e8e4de; outline: none;
        }
        input[type="range"].kpr-range::-webkit-slider-thumb {
            -webkit-appearance: none; width: 20px; height: 20px;
            border-radius: 50%; background: #1a3a2e; cursor: pointer;
            transition: background 0.2s;
        }
        input[type="range"].kpr-range::-webkit-slider-thumb:hover { background: #D4622A; }

        .result-card {
            background: #fff; border-radius: 2rem; border: 1px solid #e8e4de;
            padding: clamp(24px, 4vw, 36px); box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            margin-bottom: 20px;
        }
        .result-table { width: 100%; border-collapse: separate; border-spacing: 0 8px; }
        .result-row td {
            padding: 14px 18px; background: #f5f1ea; font-family: 'Outfit', sans-serif;
        }
        .result-row td:first-child { border-radius: 0.8rem 0 0 0.8rem; font-size: 13.5px; color: #555; }
        .result-row td:last-child { border-radius: 0 0.8rem 0.8rem 0; font-size: 15px; font-weight: 600; color: #1a3a2e; text-align: right; }

        /* Bank Program Cards */
        .bank-program-card {
            background: #fff; border: 1px solid #e8e4de; border-radius: 1.5rem;
            padding: 20px; transition: all 0.3s ease; height: 100%;
            display: flex; flex-direction: column; justify-content: space-between;
        }
        .bank-program-card:hover {
            transform: translateY(-4px); box-shadow: 0 12px 30px rgba(26,58,46,0.08); border-color: #1a3a2e;
        }

        /* FAQ Accordion */
        .faq-item {
            background: #fff; border: 1px solid #e8e4de; border-radius: 1.2rem;
            margin-bottom: 12px; overflow: hidden; transition: border-color 0.2s;
        }
        .faq-header {
            padding: 20px 24px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;
            font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 15px; color: #1a3a2e;
        }
        .faq-body {
            padding: 0 24px 20px; font-size: 14px; color: #666; line-height: 1.7; display: none;
        }

        .logo-track {
            display: flex; width: max-content;
            animation: scrollLogos 40s linear infinite;
        }
        .logo-track:hover { animation-play-state: paused; }
        @keyframes scrollLogos {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .logo-item { padding: 0 28px; flex-shrink: 0; }
        .logo-item img { height: 38px; filter: grayscale(100%); opacity: 0.5; transition: all 0.3s; }
        .logo-item:hover img { filter: grayscale(0%); opacity: 1; }

        .health-bar-bg {
            width: 100%; height: 8px; background: #e8e4de; border-radius: 4px; overflow: hidden; margin: 10px 0;
        }
        .health-bar-fill {
            height: 100%; width: 0%; transition: width 0.5s ease, background 0.5s ease;
        }

        @media (max-width: 768px) {
            .kpr-input { padding: 12px 14px; font-size: 14px; }
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO --}}
    <section style="background:#1a3a2e; padding:clamp(80px,18vw,140px) clamp(16px,4vw,48px) 80px; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:720px;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Kalkulator KPR</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 16px;">
                Simulasi Cicilan<br>KPR Rumah
            </h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:520px; margin:0;">
                Hitung estimasi cicilan bulanan, rincian pembayaran pertama, dan analisis kesehatan finansial Anda dengan kalkulator interaktif.
            </p>
        </div>
    </section>

    {{-- CALCULATOR --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div class="row g-4 align-items-start">

                {{-- Form Input --}}
                <div class="col-lg-5">
                    <div style="background:#fff; border-radius:2.5rem; border:1px solid #e8e4de; padding:clamp(24px,4vw,40px); box-shadow:0 8px 30px rgba(0,0,0,0.04);">
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 8px;">Isi Rencana KPR</p>
                        <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.2rem,2vw,1.6rem); font-weight:400; color:#1a3a2e; margin:0 0 28px;">Form Simulasi KPR</h2>

                        <div style="display:flex; flex-direction:column; gap:20px;">
                            <div>
                                <label class="kpr-label">Harga Properti (Rp)</label>
                                <input type="text" class="kpr-input" id="propertyPrice" inputmode="numeric" autocomplete="off"
                                       value="1.200.000.000" placeholder="Contoh: 1.200.000.000"
                                       oninput="handlePriceInput(this)">
                            </div>

                            <div>
                                <label class="kpr-label">
                                    <span>Uang Muka / DP</span>
                                    <span id="dpPercentLabel" style="color:#1a3a2e;font-weight:700;">20%</span>
                                </label>
                                <div style="display:flex; gap:10px;">
                                    <input type="text" class="kpr-input" id="downPayment" inputmode="numeric" autocomplete="off"
                                           value="240.000.000" placeholder="Contoh: 240.000.000" style="flex:1;"
                                           oninput="handleDpInput(this)">
                                    <div style="width:90px; position:relative;">
                                        <input type="number" class="kpr-input" id="dpPercent" min="0" max="90" value="20"
                                               style="padding-right:24px; text-align:center;" oninput="handleDpPercentInput(this)">
                                        <span style="position:absolute; right:12px; top:50%; transform:translateY(-50%); font-size:13px; color:#888;">%</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="kpr-label">
                                    <span>Jangka Waktu (Tenor)</span>
                                    <span id="loanTermDisplay" style="color:#1a3a2e;font-weight:700;">15 Tahun</span>
                                </label>
                                <input type="range" class="kpr-range" id="loanTerm"
                                       min="1" max="30" value="15"
                                       oninput="calculateKPR()">
                                <div style="display:flex;justify-content:space-between;margin-top:6px;">
                                    <span style="font-size:11px;color:#aaa;">1 Tahun</span>
                                    <span style="font-size:11px;color:#aaa;">15 Thn</span>
                                    <span style="font-size:11px;color:#aaa;">30 Tahun</span>
                                </div>
                            </div>

                            <div>
                                <label class="kpr-label">Suku Bunga per Tahun (%)</label>
                                <input type="number" step="0.1" min="0" max="25" class="kpr-input" id="interestRate"
                                       placeholder="Contoh: 5.5" value="5.5" oninput="calculateKPR()">
                            </div>

                            <div>
                                <label class="kpr-label">
                                    <span>Penghasilan Bulanan (Rp)</span>
                                    <span style="font-weight:400;color:#bbb;text-transform:none;">(Opsional)</span>
                                </label>
                                <input type="text" class="kpr-input" id="monthlyIncome" inputmode="numeric" autocomplete="off"
                                       placeholder="Contoh: 25.000.000" value="25.000.000"
                                       oninput="handleIncomeInput(this)">
                            </div>

                            <p id="kprError" style="display:none;margin:0;color:#b42318;font-family:'Outfit',sans-serif;font-size:13px;line-height:1.5;"></p>

                            <button type="button" onclick="calculateKPR()"
                                    style="width:100%; padding:15px; font-family:'Outfit',sans-serif; font-size:12px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:#fff; background:#1a3a2e; border:none; border-radius:9999px; cursor:pointer; transition:background 0.25s;"
                                    onmouseover="this.style.background='#D4622A'"
                                    onmouseout="this.style.background='#1a3a2e'">
                                Hitung Simulasi
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Result Column --}}
                <div class="col-lg-7">

                    {{-- Main Highlight Result --}}
                    <div class="result-card" style="background:#1a3a2e; color:#fff; position:relative; overflow:hidden;">
                        <div style="position:absolute; right:-20px; bottom:-20px; opacity:0.06; font-size:160px; font-weight:900; line-height:1; color:#fff; pointer-events:none;">KPR</div>
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 8px;">Estimasi Angsuran</p>
                        <div style="display:flex; justify-content:space-between; align-items:baseline; flex-wrap:wrap; gap:10px; margin-bottom:16px;">
                            <div>
                                <h3 id="mainMonthlyPayment" style="font-family:'Outfit',sans-serif; font-size:clamp(1.8rem,4vw,2.8rem); font-weight:600; color:#fff; margin:0; line-height:1.1;">Rp 0</h3>
                                <p style="font-size:13px; color:rgba(255,255,255,0.65); margin:4px 0 0;">Angsuran per bulan (Masa Promo Fixed)</p>
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap:12px; background:rgba(255,255,255,0.06); border-radius:1.2rem; padding:16px; margin-top:20px; border:1px solid rgba(255,255,255,0.1);">
                            <div>
                                <p style="font-size:10px; text-transform:uppercase; color:rgba(255,255,255,0.6); margin:0 0 4px; letter-spacing:0.05em;">Plafon Pinjaman</p>
                                <p id="mainPrincipal" style="font-size:15px; font-weight:600; color:#fff; margin:0;">Rp 0</p>
                            </div>
                            <div>
                                <p style="font-size:10px; text-transform:uppercase; color:rgba(255,255,255,0.6); margin:0 0 4px; letter-spacing:0.05em;">Uang Muka (DP)</p>
                                <p id="mainDp" style="font-size:15px; font-weight:600; color:#fff; margin:0;">Rp 0</p>
                            </div>
                            <div>
                                <p style="font-size:10px; text-transform:uppercase; color:rgba(255,255,255,0.6); margin:0 0 4px; letter-spacing:0.05em;">Estimasi Pembayaran Ke-1</p>
                                <p id="mainFirstPayment" style="font-size:15px; font-weight:600; color:#D4622A; margin:0;">Rp 0</p>
                            </div>
                        </div>
                    </div>

                    {{-- Financial Health Indicator --}}
                    <div id="healthCard" class="result-card">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                            <p style="font-size:10px; font-weight:600; letter-spacing:0.2em; text-transform:uppercase; color:#D4622A; margin:0;">Analisis Kelayakan Finansial</p>
                            <span id="healthBadge" style="font-size:11px; font-weight:700; border-radius:9999px; padding:4px 12px; text-transform:uppercase;">-</span>
                        </div>
                        <h4 id="healthRatioText" style="font-family:'Outfit',sans-serif; font-size:16px; font-weight:500; color:#1a3a2e; margin:0 0 6px;">Rasio Angsuran: -</h4>
                        <div class="health-bar-bg">
                            <div id="healthBarFill" class="health-bar-fill"></div>
                        </div>
                        <p id="healthDesc" style="font-size:13px; color:#666; line-height:1.6; margin:6px 0 0;"></p>
                    </div>

                    {{-- Detail Breakdown Tables --}}
                    <div class="result-card">
                        <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 8px;">Rincian Perhitungan</p>
                        <h4 style="font-family:'Outfit',sans-serif; font-size:16px; font-weight:500; color:#1a3a2e; margin:0 0 16px;">Estimasi Pembayaran Pertama & Total Pinjaman</h4>

                        <table class="result-table" id="resultTable"></table>

                        <div style="background:#f5f1ea; border-radius:1.2rem; padding:16px 20px; margin-top:16px;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                <span style="font-size:13px; color:#666;">Proyeksi Total Bunga</span>
                                <span id="totalInterestVal" style="font-size:14px; font-weight:600; color:#1a3a2e;">Rp 0</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <span style="font-size:13px; color:#666;">Total Pembayaran (Pokok + Bunga)</span>
                                <span id="totalPaidVal" style="font-size:14px; font-weight:600; color:#1a3a2e;">Rp 0</span>
                            </div>
                        </div>
                        <p style="font-size:11px; color:#aaa; margin:14px 0 0; line-height:1.5;">
                            *Estimasi ini bersifat simulasi. Perhitungan akhir dapat menyesuaikan kebijakan dan suku bunga masing-masing bank mitra.
                        </p>
                    </div>

                    {{-- CTA Box --}}
                    <div style="background:#1a3a2e; border-radius:2rem; padding:24px 28px; text-align:center; display:flex; flex-direction:column; align-items:center; gap:12px;">
                        <p style="font-size:13px; color:rgba(255,255,255,0.85); margin:0; max-width:420px;">
                            Ingin mendapatkan bantuan proses KPR dan penawaran suku bunga spesial dari bank mitra Casa Asraya?
                        </p>
                        <a href="https://wa.me/6281399998066?text=Halo%20saya%20ingin%20konsultasi%20KPR%20Casa%20Asraya"
                           target="_blank"
                           style="display:inline-flex;align-items:center;gap:10px;font-family:'Outfit',sans-serif;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;color:#1a3a2e;background:#fff;border-radius:9999px;padding:12px 28px;transition:all 0.25s;"
                           onmouseover="this.style.background='#D4622A';this.style.color='#fff';"
                           onmouseout="this.style.background='#fff';this.style.color='#1a3a2e';">
                            Konsultasi KPR via WhatsApp <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:10px;"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM KPR BANK MITRA --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0;">
            <div style="text-align:center; max-width:600px; margin:0 auto 48px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 10px;">Mitra Perbankan</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:400; color:#1a3a2e; margin:0 0 12px;">Pilihan Program KPR Bank</h2>
                <p style="font-size:14px; color:#666; margin:0; line-height:1.7;">Estimasi angsuran di berbagai pilihan bank mitra resmi Casa Asraya.</p>
            </div>

            <div class="row g-4" id="bankProgramGrid">
                {{-- Bank cards rendered by JavaScript dynamically based on calculator values --}}
            </div>
        </div>
    </section>

    {{-- KPR BANKS LOGO MARQUEE --}}
    <section style="background:#f5f1ea; padding:50px 0; border-top:1px solid #e8e4de; border-bottom:1px solid #e8e4de;">
        <div class="container" style="padding-left:clamp(16px,4vw,48px);padding-right:clamp(16px,4vw,48px);">
            <p style="font-size:11px;font-weight:600;letter-spacing:0.25em;text-transform:uppercase;color:#aaa;text-align:center;margin:0 0 28px;">Mitra Resmi Bank KPR</p>
        </div>
        <div style="overflow:hidden; position:relative;">
            <div class="logo-track">
                @php
                $banks = [
                    ['src' => asset('img/bank/bca-bank-logo-png_seeklogo-232742.png'),    'alt' => 'BCA'],
                    ['src' => asset('img/bank/bank-mandiri-logo-png_seeklogo-16290.png'), 'alt' => 'Bank Mandiri'],
                    ['src' => asset('img/bank/bank-bri-logo-png_seeklogo-355613.png'),    'alt' => 'BRI'],
                    ['src' => asset('img/bank/bank-bni-logo-png_seeklogo-355606.png'),    'alt' => 'BNI'],
                    ['src' => asset('img/bank/cimb-bank-logo-png_seeklogo-30387.png'),    'alt' => 'CIMB Niaga'],
                    ['src' => asset('img/bank/BTN.jpg'),                                  'alt' => 'BTN'],
                    ['src' => asset('img/bank/Logo-ocbc.webp'),                           'alt' => 'OCBC'],
                ];
                $loopBanks = array_merge($banks, $banks, $banks, $banks);
                @endphp
                @foreach($loopBanks as $b)
                <div class="logo-item"><img src="{{ $b['src'] }}" alt="{{ $b['alt'] }}"></div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section style="background:#fff; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0;padding-right:0; max-width:800px;">
            <div style="text-align:center; margin-bottom:40px;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 10px;">Informasi KPR</p>
                <h2 style="font-family:'Outfit',sans-serif; font-size:clamp(1.5rem,3vw,2.2rem); font-weight:400; color:#1a3a2e; margin:0;">Pertanyaan Seputar KPR</h2>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>Bagaimana cara menentukan batas aman cicilan KPR saya?</span>
                    <i class="fa-solid fa-chevron-down" style="font-size:12px; transition:transform 0.3s;"></i>
                </div>
                <div class="faq-body">
                    Batas aman umum rasio angsuran KPR adalah maksimal 30% hingga 35% dari total penghasilan bersih bulanan Anda. Hal ini untuk memastikan Anda tetap memiliki dana yang cukup untuk pengeluaran rutin harian, tabungan, dan dana darurat.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>Mengapa angsuran aktual bank bisa berbeda dengan simulasi?</span>
                    <i class="fa-solid fa-chevron-down" style="font-size:12px; transition:transform 0.3s;"></i>
                </div>
                <div class="faq-body">
                    Perbedaan hasil simulasi dengan rincian bank biasanya dipengaruhi oleh ketentuan promo bunga khusus, biaya provisi, admin, asuransi jiwa &amp; kebakaran, serta pembulatan skala amortisasi dari masing-masing pihak perbankan.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>Apa bedanya masa bunga Fixed dan Floating?</span>
                    <i class="fa-solid fa-chevron-down" style="font-size:12px; transition:transform 0.3s;"></i>
                </div>
                <div class="faq-body">
                    Bunga Fixed (Tetap) adalah masa di mana besaran bunga dan cicilan Anda tidak berubah selama periode tertentu (misal 1-5 tahun pertama). Bunga Floating (Mengambang) berlaku setelah masa fixed berakhir, di mana besaran bunga mengikuti acuan suku bunga Bank Indonesia (BI Rate).
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>Dokumen apa saja yang diperlukan untuk pengajuan KPR?</span>
                    <i class="fa-solid fa-chevron-down" style="font-size:12px; transition:transform 0.3s;"></i>
                </div>
                <div class="faq-body">
                    Dokumen utama melingkupi KTP (pemohon &amp; pasangan), Kartu Keluarga, NPWP, Slip Gaji 3 bulan terakhir / Surat Keterangan Usaha, serta Rekening Koran 3 bulan terakhir. Tim Sales Casa Asraya siap membantu pemberkasan Anda hingga disetujui bank.
                </div>
            </div>
        </div>
    </section>

    @include('templates/footer')

    <script>
        const bankPartners = [
            { name: 'Bank BCA', rate: 4.5, promo: 'Fixed 3 Tahun', logo: "{{ asset('img/bank/bca-bank-logo-png_seeklogo-232742.png') }}" },
            { name: 'Bank Mandiri', rate: 4.75, promo: 'Fixed 3 Tahun', logo: "{{ asset('img/bank/bank-mandiri-logo-png_seeklogo-16290.png') }}" },
            { name: 'Bank BRI', rate: 4.65, promo: 'Fixed 2 Tahun', logo: "{{ asset('img/bank/bank-bri-logo-png_seeklogo-355613.png') }}" },
            { name: 'Bank BNI', rate: 4.85, promo: 'Fixed 3 Tahun', logo: "{{ asset('img/bank/bank-bni-logo-png_seeklogo-355606.png') }}" },
            { name: 'CIMB Niaga', rate: 5.0, promo: 'Fixed 5 Tahun', logo: "{{ asset('img/bank/cimb-bank-logo-png_seeklogo-30387.png') }}" },
            { name: 'Bank BTN', rate: 4.5, promo: 'Fixed 1 Tahun', logo: "{{ asset('img/bank/BTN.jpg') }}" },
        ];

        const rupiahFormatter = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });

        function formatRupiahStr(num) {
            return rupiahFormatter.format(num);
        }

        function getRupiahValue(id) {
            return Number(document.getElementById(id).value.replace(/\D/g, "")) || 0;
        }

        function setInputValueRupiah(id, val) {
            document.getElementById(id).value = val > 0 ? val.toLocaleString('id-ID') : '';
        }

        function handlePriceInput(input) {
            const price = Number(input.value.replace(/\D/g, '')) || 0;
            input.value = price > 0 ? price.toLocaleString('id-ID') : '';
            const percent = Number(document.getElementById('dpPercent').value) || 20;
            const dpVal = Math.round((price * percent) / 100);
            setInputValueRupiah('downPayment', dpVal);
            calculateKPR();
        }

        function handleDpInput(input) {
            const dp = Number(input.value.replace(/\D/g, '')) || 0;
            input.value = dp > 0 ? dp.toLocaleString('id-ID') : '';
            const price = getRupiahValue('propertyPrice');
            if (price > 0) {
                const percent = Math.min(90, Math.max(0, ((dp / price) * 100))).toFixed(1);
                document.getElementById('dpPercent').value = percent;
                document.getElementById('dpPercentLabel').textContent = percent + '%';
            }
            calculateKPR();
        }

        function handleDpPercentInput(input) {
            let percent = Number(input.value) || 0;
            if (percent > 90) { percent = 90; input.value = 90; }
            if (percent < 0) { percent = 0; input.value = 0; }
            document.getElementById('dpPercentLabel').textContent = percent + '%';
            const price = getRupiahValue('propertyPrice');
            if (price > 0) {
                const dpVal = Math.round((price * percent) / 100);
                setInputValueRupiah('downPayment', dpVal);
            }
            calculateKPR();
        }

        function handleIncomeInput(input) {
            const val = Number(input.value.replace(/\D/g, '')) || 0;
            input.value = val > 0 ? val.toLocaleString('id-ID') : '';
            calculateKPR();
        }

        function showKprError(message) {
            const errorBox = document.getElementById("kprError");
            errorBox.textContent = message;
            errorBox.style.display = "block";
        }

        function clearKprError() {
            const errorBox = document.getElementById("kprError");
            errorBox.textContent = "";
            errorBox.style.display = "none";
        }

        function calculateMonthlyPayment(principal, annualRate, months) {
            if (annualRate <= 0) return principal / months;
            const monthlyRate = annualRate / 100 / 12;
            const multiplier = Math.pow(1 + monthlyRate, months);
            return (principal * multiplier * monthlyRate) / (multiplier - 1);
        }

        function toggleFaq(header) {
            const body = header.nextElementSibling;
            const icon = header.querySelector('i');
            if (body.style.display === 'block') {
                body.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                body.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        function updateBankCards(principal, years) {
            const container = document.getElementById('bankProgramGrid');
            if (!container) return;

            const months = years * 12;
            container.innerHTML = bankPartners.map(bank => {
                const monthly = calculateMonthlyPayment(principal, bank.rate, months);
                return `
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="bank-program-card">
                            <div>
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                                    <img src="${bank.logo}" alt="${bank.name}" style="height:28px; max-width:100px; object-fit:contain;">
                                    <span style="font-size:10px; font-weight:700; color:#D4622A; background:rgba(212,98,42,0.08); border-radius:9999px; padding:4px 10px; text-transform:uppercase;">${bank.promo}</span>
                                </div>
                                <p style="font-size:12px; color:#888; margin:0 0 4px;">Suku Bunga Promo</p>
                                <p style="font-size:18px; font-weight:600; color:#1a3a2e; margin:0 0 12px;">${bank.rate.toFixed(2)}% <span style="font-size:12px; font-weight:400; color:#888;">/ tahun</span></p>
                            </div>
                            <div style="border-top:1px dashed #e8e4de; padding-top:14px; margin-top:10px;">
                                <p style="font-size:11px; color:#888; margin:0 0 2px;">Estimasi Angsuran</p>
                                <p style="font-size:16px; font-weight:700; color:#1a3a2e; margin:0;">${formatRupiahStr(monthly)} <span style="font-size:11px; font-weight:400; color:#888;">/ bln</span></p>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function calculateKPR() {
            clearKprError();

            const price = getRupiahValue("propertyPrice");
            const dp = getRupiahValue("downPayment");
            const rate = Number(document.getElementById("interestRate").value.replace(",", ".")) || 0;
            const years = Number(document.getElementById("loanTerm").value) || 15;
            document.getElementById("loanTermDisplay").textContent = years + " Tahun";

            if (price <= 0) {
                showKprError("Harga properti wajib diisi.");
                return;
            }

            if (dp >= price) {
                showKprError("DP harus lebih kecil dari harga properti.");
                return;
            }

            const principal = price - dp;
            const months = years * 12;
            const monthlyPayment = calculateMonthlyPayment(principal, rate, months);

            // Biaya tambahan estimasi (Notaris, Provisi, Admin, Asuransi ~ 3.5%)
            const estOtherCosts = Math.round(principal * 0.035);
            const firstPayment = dp + monthlyPayment + estOtherCosts;

            // Totals
            const totalPaid = monthlyPayment * months;
            const totalInterest = Math.max(0, totalPaid - principal);

            // Update Header Card
            document.getElementById("mainMonthlyPayment").textContent = formatRupiahStr(monthlyPayment);
            document.getElementById("mainPrincipal").textContent = formatRupiahStr(principal);
            document.getElementById("mainDp").textContent = formatRupiahStr(dp);
            document.getElementById("mainFirstPayment").textContent = formatRupiahStr(firstPayment);

            // Update Detail Table
            const dpPct = ((dp / price) * 100).toFixed(1).replace(".", ",");
            const rows = [
                ["Harga Properti", formatRupiahStr(price)],
                [`Uang Muka / DP (${dpPct}%)`, formatRupiahStr(dp)],
                ["Plafon Pinjaman KPR", formatRupiahStr(principal)],
                ["Jangka Waktu (Tenor)", `${years} Tahun (${months} Bulan)`],
                ["Angsuran Bulan Ke-1", formatRupiahStr(monthlyPayment)],
                ["Estimasi Biaya Bank &amp; Notaris (~3,5%)", formatRupiahStr(estOtherCosts)],
                ["Estimasi Total Pembayaran Pertama", formatRupiahStr(firstPayment)],
            ];

            document.getElementById("resultTable").innerHTML = rows
                .map(([label, val]) => `<tr class="result-row"><td>${label}</td><td>${val}</td></tr>`)
                .join("");

            document.getElementById("totalInterestVal").textContent = formatRupiahStr(totalInterest);
            document.getElementById("totalPaidVal").textContent = formatRupiahStr(totalPaid);

            // Update Financial Health Indicator
            const income = getRupiahValue("monthlyIncome");
            const healthCard = document.getElementById("healthCard");
            const healthBadge = document.getElementById("healthBadge");
            const healthRatioText = document.getElementById("healthRatioText");
            const healthBarFill = document.getElementById("healthBarFill");
            const healthDesc = document.getElementById("healthDesc");

            if (income > 0) {
                healthCard.style.display = "block";
                const ratio = ((monthlyPayment / income) * 100);
                const ratioFormatted = ratio.toFixed(1).replace(".", ",");
                healthRatioText.textContent = `Rasio Angsuran: ${ratioFormatted}% dari Penghasilan`;

                const fillPct = Math.min(100, Math.max(5, ratio));
                healthBarFill.style.width = fillPct + "%";

                if (ratio <= 30) {
                    healthBadge.textContent = "Sangat Sehat";
                    healthBadge.style.cssText = "color:#166534; background:#dcfce7;";
                    healthBarFill.style.background = "#22c55e";
                    healthDesc.textContent = "Angsuran Anda sangat ideal (≤ 30% dari pendapatan). Anda memiliki keuangan yang stabil untuk memenuhi kebutuhan harian dan dana darurat.";
                } else if (ratio <= 40) {
                    healthBadge.textContent = "Sehat";
                    healthBadge.style.cssText = "color:#854d0e; background:#fef9c3;";
                    healthBarFill.style.background = "#eab308";
                    healthDesc.textContent = "Angsuran dalam kondisi aman (30%–40% pendapatan). Anggaran masih mencukupi untuk kebutuhan pokok lainnya.";
                } else if (ratio <= 50) {
                    healthBadge.textContent = "Perlu Perhatian";
                    healthBadge.style.cssText = "color:#9a3412; background:#ffedd5;";
                    healthBarFill.style.background = "#f97316";
                    healthDesc.textContent = "Angsuran menyita hingga 50% pendapatan Anda. Pertimbangkan untuk memperbesar DP atau memperpanjang tenor kredit.";
                } else {
                    healthBadge.textContent = "Risiko Tinggi";
                    healthBadge.style.cssText = "color:#991b1b; background:#fee2e2;";
                    healthBarFill.style.background = "#ef4444";
                    healthDesc.textContent = "Angsuran melebihi 50% dari pendapatan bulanan. Disarankan menambah besaran DP atau memilih unit rumah dengan kisaran harga lebih sesuai.";
                }
            } else {
                healthCard.style.display = "none";
            }

            // Update Bank Program Cards
            updateBankCards(principal, years);
        }

        // Run calculation on load
        document.addEventListener('DOMContentLoaded', () => {
            calculateKPR();
        });
    </script>
</body>
</html>