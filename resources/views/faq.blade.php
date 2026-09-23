<!DOCTYPE html>
<html lang="id">
<head>
    @include('templates/meta')
    @include('templates/head')
    <title>FAQ - Casa Asraya</title>
    <style>
        .faq-tab-nav {
            display: flex; flex-wrap: wrap; gap: 8px;
            background: #fff; border: 1px solid #e8e4de;
            border-radius: 9999px; padding: 6px;
            width: fit-content; margin: 0 auto 48px;
        }
        @media (max-width: 576px) {
            .faq-tab-nav {
                border-radius: 1.5rem;
                width: 100%;
                justify-content: center;
            }
            .faq-tab-btn {
                font-size: 10px;
                padding: 8px 14px;
            }
        }
        .faq-tab-btn {
            font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 600;
            letter-spacing: 0.07em; text-transform: uppercase;
            color: #666; background: transparent;
            border: none; border-radius: 9999px;
            padding: 10px 22px; cursor: pointer;
            transition: background 0.25s, color 0.25s;
            white-space: nowrap;
        }
        .faq-tab-btn.active {
            background: #1a3a2e; color: #fff;
        }
        .faq-tab-pane { display: none; }
        .faq-tab-pane.active { display: block; }

        .faq-item {
            background: #fff; border: 1px solid #e8e4de;
            border-radius: 1.5rem; margin-bottom: 12px;
            overflow: hidden; transition: box-shadow 0.25s;
        }
        .faq-item:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
        .faq-question {
            display: flex; justify-content: space-between; align-items: center;
            padding: 22px 28px; cursor: pointer; gap: 16px;
        }
        @media (max-width: 576px) {
            .faq-question { padding: 16px 20px; }
            .faq-answer  { padding: 0 20px; }
        }
        .faq-question span {
            font-family: 'Outfit', sans-serif; font-size: 15px; font-weight: 500;
            color: #1a3a2e; line-height: 1.5; flex: 1;
        }
        .faq-icon {
            width: 32px; height: 32px; border-radius: 50%;
            background: #f5f1ea; display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; transition: background 0.25s, transform 0.3s;
            font-size: 18px; color: #1a3a2e; font-weight: 300;
        }
        .faq-item.open .faq-icon {
            background: #1a3a2e; color: #fff; transform: rotate(45deg);
        }
        .faq-answer {
            max-height: 0; overflow: hidden;
            transition: max-height 0.35s ease, padding 0.3s;
            padding: 0 28px;
        }
        .faq-answer p {
            font-family: 'Outfit', sans-serif; font-size: 14.5px;
            color: #666; line-height: 1.85; margin: 0;
            padding-bottom: 24px;
        }
        .faq-item.open .faq-answer {
            max-height: 600px;
        }
    </style>
</head>

<body style="background:#f5f1ea; font-family:'Outfit',system-ui,sans-serif;">
    @include('templates/navbar')

    {{-- HERO BANNER --}}
    <section style="background:#1a3a2e; padding:140px clamp(16px,4vw,48px) 80px; text-align:center; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('{{ asset('img/reduce/F1.jpg') }}') center/cover; opacity:0.12;"></div>
        <div style="position:relative;z-index:2; max-width:680px; margin:0 auto;">
            <p style="font-family:'Outfit',monospace; font-size:10px; font-weight:600; letter-spacing:0.28em; text-transform:uppercase; color:#D4622A; margin:0 0 16px;">Bantuan</p>
            <h1 style="font-family:'Outfit',sans-serif; font-size:clamp(2rem,4vw,3.2rem); font-weight:300; color:#fff; line-height:1.15; letter-spacing:-0.02em; margin:0 0 20px;">
                Pertanyaan yang<br>Sering Ditanyakan
            </h1>
            <p style="font-size:14px; color:rgba(255,255,255,0.65); line-height:1.8; max-width:440px; margin:0 auto;">
                Temukan jawaban atas pertanyaan Anda seputar Casa Asraya.
            </p>
        </div>
    </section>

    {{-- FAQ CONTENT --}}
    <section style="background:#f5f1ea; padding:80px clamp(16px,4vw,48px);">
        <div class="container" style="padding-left:0; padding-right:0; max-width:820px;">

            {{-- Tab Nav --}}
            <div class="faq-tab-nav">
                <button class="faq-tab-btn active" onclick="switchTab('general', this)">Pertanyaan Umum</button>
                <button class="faq-tab-btn" onclick="switchTab('specs', this)">Spesifikasi</button>
                <button class="faq-tab-btn" onclick="switchTab('facilities', this)">Fasilitas</button>
                <button class="faq-tab-btn" onclick="switchTab('purchase', this)">Cara Pembelian</button>
            </div>

            {{-- Tab: Pertanyaan Umum --}}
            <div class="faq-tab-pane active" id="tab-general">
                @foreach ($generals as $i => $item)
                <div class="faq-item" id="faq-g-{{ $i }}">
                    <div class="faq-question" onclick="toggleFaq('faq-g-{{ $i }}')">
                        <span>{{ $item['question'] }}</span>
                        <div class="faq-icon">+</div>
                    </div>
                    <div class="faq-answer"><p>{{ $item['answer'] }}</p></div>
                </div>
                @endforeach
            </div>

            {{-- Tab: Spesifikasi --}}
            <div class="faq-tab-pane" id="tab-specs">
                @foreach ($specs as $i => $item)
                <div class="faq-item" id="faq-s-{{ $i }}">
                    <div class="faq-question" onclick="toggleFaq('faq-s-{{ $i }}')">
                        <span>{{ $item['question'] }}</span>
                        <div class="faq-icon">+</div>
                    </div>
                    <div class="faq-answer"><p>{{ $item['answer'] }}</p></div>
                </div>
                @endforeach
            </div>

            {{-- Tab: Fasilitas --}}
            <div class="faq-tab-pane" id="tab-facilities">
                @foreach ($facs as $i => $item)
                <div class="faq-item" id="faq-f-{{ $i }}">
                    <div class="faq-question" onclick="toggleFaq('faq-f-{{ $i }}')">
                        <span>{{ $item['question'] }}</span>
                        <div class="faq-icon">+</div>
                    </div>
                    <div class="faq-answer"><p>{{ $item['answer'] }}</p></div>
                </div>
                @endforeach
            </div>

            {{-- Tab: Cara Pembelian --}}
            <div class="faq-tab-pane" id="tab-purchase">
                @foreach ($buys as $i => $item)
                <div class="faq-item" id="faq-b-{{ $i }}">
                    <div class="faq-question" onclick="toggleFaq('faq-b-{{ $i }}')">
                        <span>{{ $item['question'] }}</span>
                        <div class="faq-icon">+</div>
                    </div>
                    <div class="faq-answer"><p>{{ $item['answer'] }}</p></div>
                </div>
                @endforeach
            </div>

            {{-- CTA --}}
            <div style="text-align:center; margin-top:56px; padding:clamp(24px,5vw,40px); background:#fff; border-radius:2.5rem; border:1px solid #e8e4de;">
                <p style="font-size:10px; font-weight:600; letter-spacing:0.25em; text-transform:uppercase; color:#D4622A; margin:0 0 12px;">Masih Ada Pertanyaan?</p>
                <h3 style="font-family:'Outfit',sans-serif; font-size:clamp(1.2rem,2.5vw,1.6rem); font-weight:400; color:#1a3a2e; margin:0 0 20px;">Hubungi tim kami langsung via WhatsApp</h3>
                <a href="https://wa.me/6281319999806?text=Halo%20Casa%20Asraya%2C%20saya%20ingin%20bertanya..."
                   target="_blank"
                   style="display:inline-flex; align-items:center; gap:10px;
                          font-family:'Outfit',sans-serif; font-size:11px; font-weight:600;
                          letter-spacing:0.08em; text-transform:uppercase; text-decoration:none;
                          color:#fff; background:#1a3a2e; border-radius:9999px; padding:14px 32px;
                          transition:background 0.25s;"
                   onmouseover="this.style.background='#D4622A'"
                   onmouseout="this.style.background='#1a3a2e'">
                    Chat WhatsApp
                    <span style="display:inline-flex;align-items:center;justify-content:center;width:22px;height:22px;border-radius:50%;background:rgba(255,255,255,0.15);font-size:12px;">↗</span>
                </a>
            </div>
        </div>
    </section>

    @include('templates/footer')

    <script>
        function switchTab(name, btn) {
            document.querySelectorAll('.faq-tab-pane').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.faq-tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('tab-' + name).classList.add('active');
            btn.classList.add('active');
        }
        function toggleFaq(id) {
            const el = document.getElementById(id);
            const isOpen = el.classList.contains('open');
            // close all in same tab
            el.closest('.faq-tab-pane').querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
            if (!isOpen) el.classList.add('open');
        }
    </script>
</body>
</html>
