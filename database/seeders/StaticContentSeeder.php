<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankPartner;
use App\Models\HeroSlider;
use App\Models\IgFeed;
use App\Models\Facility;
use App\Models\Management;
use App\Models\ConstructionProgress;
use App\Models\ProgressImage;
use App\Models\Faq;
use App\Models\GalleryImage;

class StaticContentSeeder extends Seeder
{
    public function run()
    {
        // =============================================
        // 1. BANK PARTNERS
        // =============================================
        $banks = [
            ['name' => 'BCA',       'logo' => 'img/bank/bca-bank-logo-png_seeklogo-232742.png',      'order' => 1],
            ['name' => 'BRI',       'logo' => 'img/bank/bank-bri-logo-png_seeklogo-355613.png',      'order' => 2],
            ['name' => 'BNI',       'logo' => 'img/bank/bank-bni-logo-png_seeklogo-355606.png',      'order' => 3],
            ['name' => 'Mandiri',   'logo' => 'img/bank/bank-mandiri-logo-png_seeklogo-16290.png',   'order' => 4],
            ['name' => 'BTN',       'logo' => 'img/bank/2560px-Bank_BTN_logo.svg.png',               'order' => 5],
            ['name' => 'BSI',       'logo' => 'img/bank/Bank_Syariah_Indonesia.svg.png',             'order' => 6],
            ['name' => 'CIMB Niaga','logo' => 'img/bank/logo-cimb-niaga.png',                        'order' => 7],
            ['name' => 'Maybank',   'logo' => 'img/bank/maybank1.png',                               'order' => 8],
            ['name' => 'OCBC',      'logo' => 'img/bank/Logo-ocbc.webp',                             'order' => 9],
        ];
        foreach ($banks as $bank) {
            BankPartner::firstOrCreate(['name' => $bank['name']], array_merge($bank, ['is_active' => true]));
        }

        // =============================================
        // 2. HERO SLIDERS
        // =============================================
        $sliders = [
            'img/reduce/slider/F2.jpg',
            'img/reduce/slider/F3.jpg',
            'img/reduce/slider/F5.jpg',
            'img/reduce/slider/F6.jpg',
            'img/reduce/slider/F10.jpg',
        ];
        foreach ($sliders as $i => $image) {
            HeroSlider::firstOrCreate(['image' => $image], [
                'image'     => $image,
                'caption'   => null,
                'order'     => $i + 1,
                'is_active' => true,
            ]);
        }

        // =============================================
        // 3. IG FEEDS
        // =============================================
        $igs = [
            '/img/ig/office 1.jpg',
            '/img/ig/milestone1.jpg',
            '/img/ig/milestone2.jpg',
            '/img/ig/last1.jpg',
        ];
        foreach ($igs as $i => $image) {
            IgFeed::firstOrCreate(['image' => $image], [
                'image'     => $image,
                'order'     => $i + 1,
                'is_active' => true,
            ]);
        }

        // =============================================
        // 4. FACILITIES
        // =============================================
        $facilities = [
            ['title' => 'Club House',    'slug' => 'clubhouse',      'cover' => 'new/assets/img/clubhouse1.jpg',    'order' => 1],
            ['title' => 'Gymnastic',     'slug' => 'gym',            'cover' => 'new/assets/img/gym1.jpg',          'order' => 2],
            ['title' => 'Swimming Pool', 'slug' => 'swimming-pool',  'cover' => 'new/assets/img/spool.jpg',         'order' => 3],
            ['title' => 'Brandgang',     'slug' => 'brandgang',      'cover' => 'new/assets/img/brandgag-crop.jpg', 'order' => 4],
            ['title' => 'Taman',         'slug' => 'tamanKota',      'cover' => 'new/assets/img/taman1.jpg',        'order' => 5],
        ];
        foreach ($facilities as $facility) {
            Facility::firstOrCreate(['slug' => $facility['slug']], array_merge($facility, [
                'description' => null,
                'is_active'   => true,
            ]));
        }

        // =============================================
        // 5. MANAGEMENTS
        // =============================================
        Management::firstOrCreate(['name' => "O'zaro B. Larosa"], [
            'name'         => "O'zaro B. Larosa",
            'position'     => 'Managing Director',
            'photo'        => 'img/reduce/management-01.webp',
            'bio'          => "Tim manajemen profesional dan karyawan dengan bangga mempersembahkan Bapak O'ozaro Larosa, lulusan Institut Teknologi Bandung, yang kini menjabat sebagai Managing Director di salah satu anak perusahaan kami, PT Casa Asraya Properti.\r\nSeorang profesional dengan semangat tinggi untuk keunggulan dan pengalaman dalam membuka pasar global di bidang teknik, pertambangan, dan perusahaan EPC di Asia Tenggara & Timur Tengah sejak 2007.",
            'url_ref'      => null,
            'url_ref_text' => null,
            'order'        => 1,
            'is_active'    => true,
        ]);
        Management::firstOrCreate(['name' => 'Atelier Riri'], [
            'name'         => 'Atelier Riri',
            'position'     => 'Architecture & Design Partner',
            'photo'        => 'img/reduce/management-02.png',
            'bio'          => 'Atelier Riri adalah firma desain dan arsitektur yang didirikan oleh Novriansyah Yakub (Riri) di Jakarta. Firma ini merupakan perluasan gagasan dari apa yang Riri yakini dan lakukan sejak memulai debut arsitekturnya pada tahun 2005. Hingga kini, firma tersebut terus berkembang dengan karya di bidang arsitektur, interior, lanskap, dan desain produk.',
            'url_ref'      => 'https://atelierriri.com/asraya-townhouse/',
            'url_ref_text' => 'More Information',
            'order'        => 2,
            'is_active'    => true,
        ]);

        // =============================================
        // 6. CONSTRUCTION PROGRESS
        // =============================================
        $progressData = [
            ['period' => 'September 2024', 'order' => 1, 'images' => [
                'img/progress/sept24/sept1.jpg',
                'img/progress/sept24/sept2.jpg',
                'img/progress/sept24/sept3.jpg',
                'img/progress/sept24/sept4.jpg',
            ]],
            ['period' => 'August 2024', 'order' => 2, 'images' => [
                'img/progress/agus2024/agus (1).jpg',
                'img/progress/agus2024/agus (2).jpg',
                'img/progress/agus2024/agus (3).jpg',
                'img/progress/agus2024/agus (4).jpg',
            ]],
            ['period' => 'Juli 2024', 'order' => 3, 'images' => [
                'img/progress/juli2024/juli1.jpg',
                'img/progress/juli2024/juli2.jpg',
                'img/progress/juli2024/juli3.jpg',
            ]],
            ['period' => 'Juni 2024', 'order' => 4, 'images' => [
                'img/progress/juni2024/jun2.jpg',
                'img/progress/juni2024/jun5.jpg',
                'img/progress/juni2024/jun7.jpg',
                'img/progress/juni2024/jun8.jpg',
            ]],
            ['period' => 'Mei 2024', 'order' => 5, 'images' => [
                'img/progress/11.jpg',
                'img/progress/12.jpg',
                'img/progress/13.jpg',
                'img/progress/14.jpg',
            ]],
            ['period' => 'April 2024', 'order' => 6, 'images' => [
                'img/progress/april/april1.jpg',
                'img/progress/april/april2.jpg',
                'img/progress/april/april3.jpg',
                'img/progress/april/april4.jpg',
            ]],
            ['period' => 'Maret 2024', 'order' => 7, 'images' => [
                'img/progress/maret/maret1.jpg',
                'img/progress/maret/maret2.jpg',
                'img/progress/maret/maret3.jpg',
                'img/progress/maret/maret4.jpg',
            ]],
        ];

        foreach ($progressData as $data) {
            $progress = ConstructionProgress::firstOrCreate(
                ['period' => $data['period']],
                ['order' => $data['order'], 'is_active' => true]
            );
            foreach ($data['images'] as $j => $imgPath) {
                ProgressImage::firstOrCreate(
                    ['construction_progress_id' => $progress->id, 'image' => $imgPath],
                    ['order' => $j + 1]
                );
            }
        }

        // =============================================
        // 7. FAQS
        // =============================================
        $faqData = [
            // GENERAL
            ['category' => 'general', 'order' => 1,  'question' => 'Apakah konsep yang ditawarkan oleh Casa Asraya?', 'answer' => 'Casa Asraya adalah hunian pertama di kota Pekanbaru yang menggunakan konsep hutan kota, dengan sentuhan design dari arsitek Atelier Riri yang mempunyai fasilitas lengkap diantaranya Clubhouse, Swimming Pool, Yoga Club, Gym & Resto and Lounge.'],
            ['category' => 'general', 'order' => 2,  'question' => 'Kapan proyek Casa Asraya dimulai?', 'answer' => 'Proyek ini dilaksanakan dari bulan Mei 2023'],
            ['category' => 'general', 'order' => 3,  'question' => 'Apakah developer sudah mempunyai izin-izin yang dibutuhkan?', 'answer' => 'Semua syarat perizinan pembangunan yang diperlukan sudah dimiliki oleh developer untuk dapat menyelesaikan Pembangunan unit Casa Asraya.'],
            ['category' => 'general', 'order' => 4,  'question' => 'Sudah berapa lama perusahaan Anda berkecimpung dalam bisnis real estate?', 'answer' => 'PT Casa Asraya Property berdiri pada tahun 2023, dan Pekanbaru menjadi project developer pertama kami.'],
            ['category' => 'general', 'order' => 5,  'question' => 'Apakah anda memiliki model tampilan unit untuk dilihat sebelum Pembangunan dimulai?', 'answer' => 'Kami menyediakan display Maket, 3D Design & Clubhouse di kantor Marketing Gallery.'],
            ['category' => 'general', 'order' => 6,  'question' => 'Apakah ada opsi untuk custom atau perubahan desain bangunan?', 'answer' => 'Untuk menjaga kualitas bangunan dan kerapihan area hunian dibolehkan untuk menambah atau merubah design minor bangunan kecuali tampak depan dan tidak merubah bentuk asli Casa Asraya.'],
            ['category' => 'general', 'order' => 7,  'question' => 'Apakah saya bisa melakukan inspeksi terhadap unit yang akan saya beli?', 'answer' => 'Calon customer diperbolehkan untuk bisa melakukan inspeksi progress Pembangunan unit.'],
            ['category' => 'general', 'order' => 8,  'question' => 'Bagaimana saya bisa memantau perkembangan proyek?', 'answer' => 'Perkembangan progress proyek kami akan selalu kami update berkala melalui social media dan website kami.'],
            ['category' => 'general', 'order' => 9,  'question' => 'Bagaimana untuk cara pembayaran listrik di unit yang akan kami tempati?', 'answer' => 'Untuk setiap unit menggunakan sistem token, yang juga dapat dibayarkan melalui fitur Mobile Banking/ Internet Banking.'],

            // SPECS
            ['category' => 'specs', 'order' => 1, 'question' => 'Berapakah luas bangunan dari unit Casa Asraya?', 'answer' => 'Untuk Type Mahogany ukuran luas bangunan adalah 220 M²; Untuk Type Cendana luas bangunan adalah 138 M².'],
            ['category' => 'specs', 'order' => 2, 'question' => 'Bagaimana spesifikasi bangunan untuk sisi interior maupun eksterior unit Casa Asraya?', 'answer' => 'Untuk dinding menggunakan bata ringan, finishing lantai menggunakan granit 60x60, finishing cat interior dan eksterior menggunakan Mowilex.'],
            ['category' => 'specs', 'order' => 3, 'question' => 'Untuk sumber air yang digunakan setiap unit Casa Asraya menggunakan Pam atau Sumur Bor?', 'answer' => 'Untuk setiap unit Pesona Hutan menggunakan sumur bor.'],
            ['category' => 'specs', 'order' => 4, 'question' => 'Berapa kapasitas parkir mobil di setiap unit Casa Asraya?', 'answer' => 'Untuk type Mahogany tersedia 1 garasi dan 1 Carport dengan kapasitas 4 mobil, Dan untuk type Cendana tersedia 1 carport dengan kapasitas 2 mobil.'],
            ['category' => 'specs', 'order' => 5, 'question' => 'Jenis atap apa yang digunakan untuk unit Casa Asraya?', 'answer' => 'Untuk semua unit menggunakan atap Bitumen (Merk Onduline) dan struktur baja ringan.'],
            ['category' => 'specs', 'order' => 6, 'question' => 'Jenis bahan pondasi apakah yang digunakan?', 'answer' => 'Untuk pondasi yang digunakan pada semua unit adalah Mini Pile.'],
            ['category' => 'specs', 'order' => 7, 'question' => 'Berapa daya listrik yang digunakan?', 'answer' => 'Untuk semua unit Casa Asraya menggunakan daya listrik 3500 Watt dengan sistem token di semua unit.'],
            ['category' => 'specs', 'order' => 8, 'question' => 'Type lantai apa yang digunakan?', 'answer' => 'Untuk lantai menggunakan jenis Granite tile. Area Utama: Niro Granite 60x60. Area Toilet: Wisma Sehati 60x60. Area Kamar: SPC Yellow Creek Oak.'],
            ['category' => 'specs', 'order' => 9, 'question' => 'Ada berapa unit type Mahogany & Type Cendana?', 'answer' => 'Untuk type Mahogany tersedia sebanyak 8 Unit dan Untuk type Cendana tersedia sebanyak 25 Unit.'],

            // FACILITY
            ['category' => 'facility', 'order' => 1, 'question' => 'Bagaimanakah sistem keamanan di lingkungan Casa Asraya?', 'answer' => 'Cluster Casa Asraya mempunyai fasilitas One Gate System, fasilitas CCTV di lingkungan area komplek dan terdapat Security yang berjaga 24 Jam.'],
            ['category' => 'facility', 'order' => 2, 'question' => 'Apa sajakah fasilitas Clubhouse yang ditawarkan?', 'answer' => 'Pesona Hutan mempunyai Clubhouse yang memiliki fasilitas Gym, Swimming Pool, Resto and Café.'],
            ['category' => 'facility', 'order' => 3, 'question' => 'Bagaimana dengan infrastruktur di sekitar Kawasan Casa Asraya?', 'answer' => 'Casa Asraya mempunyai lokasi strategis yang memiliki akses dekat menuju berbagai sekolah, mall, dan rumah sakit di Pekanbaru.'],
            ['category' => 'facility', 'order' => 4, 'question' => 'Apakah ada fasilitas umum yang berada di area Casa Asraya?', 'answer' => 'Untuk fasilitas umum di Casa Asraya terdapat Clubhouse (Swimming Pool, Gym, Yoga Club, Resto & Lounge), Brandgang dan Taman Kota.'],
            ['category' => 'facility', 'order' => 5, 'question' => 'Brand / Jenis toilet apa yang digunakan dalam unit Casa Asraya?', 'answer' => 'Semua unit Casa Asraya menggunakan produk toilet dari Toto.'],
            ['category' => 'facility', 'order' => 6, 'question' => 'Apakah akan ada bonus yang didapatkan dari pembelian unit Casa Asraya?', 'answer' => 'Untuk setiap pembelian unit Casa Asraya sudah mendapatkan free Canopy untuk carport, Layanan CCTV 24 jam dan water heater Solahart dengan kapasitas 100 L.'],
            ['category' => 'facility', 'order' => 7, 'question' => 'Apakah fasilitas umum seperti Gojek, Grab, Shopee Food bisa masuk ke area Casa Asraya?', 'answer' => 'Semua fasilitas umum seperti Gojek, Grab, Shopee Food, J&T dan lainnya bisa masuk area Casa Asraya dengan prosedur keamanan security Casa Asraya.'],
            ['category' => 'facility', 'order' => 8, 'question' => 'Bagaimana kualitas air di area lingkungan Casa Asraya?', 'answer' => 'Kualitas air di seluruh area unit Casa Asraya memiliki kualitas yang baik (jernih dan tidak berbau).'],
            ['category' => 'facility', 'order' => 9, 'question' => 'Bagaimana spesifikasi jalan yang digunakan di area Casa Asraya?', 'answer' => 'Untuk spesifikasi jalan yang digunakan di area Casa Asraya menggunakan Paving Block.'],
            ['category' => 'facility', 'order' => 10, 'question' => 'Jenis pohon apa saja yang ditanam di area Casa Asraya?', 'answer' => 'Pohon yang ditanam di seluruh area Casa Asraya menggunakan Pohon Pulai dan Pohon Trembesi.'],
            ['category' => 'facility', 'order' => 11, 'question' => 'Berapakah kapasitas water heater yang digunakan dalam setiap unit?', 'answer' => 'Untuk setiap unit Casa Asraya menggunakan water heater Solahart dengan kapasitas 100L.'],

            // PURCHASE
            ['category' => 'purchase', 'order' => 1, 'question' => 'Berapa lama proses dari akad untuk bisa dilakukan proses handover?', 'answer' => 'Untuk proses handover membutuhkan waktu kurang lebih 8-9 bulan.'],
            ['category' => 'purchase', 'order' => 2, 'question' => 'Apa garansi yang kami dapatkan dari transaksi pembelian unit?', 'answer' => 'Setelah akad berjalan, konsumen akan mendapatkan garansi 90 hari sejak ditandatangani form BAST 1 sampai dengan BAST 2.'],
            ['category' => 'purchase', 'order' => 3, 'question' => 'Bagaimanakah untuk skema pembayarannya?', 'answer' => 'Untuk skema pembayaran terdapat Cash keras, Cash bertahap dan program KPR Bank Mandiri, Bank BTN, Permata Bank, Maybank, CIMB Niaga & BSI.'],
            ['category' => 'purchase', 'order' => 4, 'question' => 'Bagaimana cara untuk membeli properti?', 'answer' => 'Untuk detil skema pembelian, dapat ditanyakan melalui nomor perwakilan marketing yang tertera di brosur kami, dan dapat langsung datang ke Marketing Gallery kami di Jl. Dwikora No. 16, Kec. Sail-Pekanbaru.'],
            ['category' => 'purchase', 'order' => 5, 'question' => 'Berapa rata-rata DP yang dibayarkan, dan berapakah cicilan per-bulan?', 'answer' => 'Untuk DP dibayarkan dimulai dari 20% dari harga jual unit, dan untuk cicilan per bulan dengan rata-rata Rp 11jutaan/bulan.'],
            ['category' => 'purchase', 'order' => 6, 'question' => 'Biaya apa sajakah yang dikeluarkan ketika pembelian unit?', 'answer' => "Biaya-biaya yang akan ditanggung oleh pembeli, antara lain:\n• Biaya BPHTB\n• Biaya notaris\n• Biaya provisi\n• Biaya PPN"],
            ['category' => 'purchase', 'order' => 7, 'question' => 'Apakah booking fee bisa dikembalikan jika ada pembatalan pembelian unit?', 'answer' => 'Booking fee tidak dapat dikembalikan.'],
            ['category' => 'purchase', 'order' => 8, 'question' => 'Dokumen apa saja yang harus dipersiapkan dalam proses pembelian unit Casa Asraya?', 'answer' => "Document yang dibutuhkan:\n1. Bagi Karyawan: KTP, KK, Surat Nikah, NPWP, Slip Gaji 3 Bulan, Surat Keterangan Kerja, Fotokopi Rekening Tabungan, Pas Foto 3x4\n2. Bagi Wiraswasta: KTP, KK, Surat Nikah, SIUP, TDP, NPWP, Laporan Perusahaan 2 Tahun, Akta Pendirian Perusahaan, Pas Foto 3x4"],
        ];

        foreach ($faqData as $faq) {
            Faq::firstOrCreate(
                ['category' => $faq['category'], 'question' => $faq['question']],
                array_merge($faq, ['is_active' => true])
            );
        }

        // =============================================
        // 8. GALLERY IMAGES (dari $curatedPaths di FrontController)
        // =============================================
        $galleries = [
            ['image' => '/img/terbaru/IND01755.webp', 'category' => 'lifestyle', 'order' => 1],
            ['image' => '/img/terbaru/IND01769.webp', 'category' => 'lifestyle', 'order' => 2],
            ['image' => '/img/terbaru/IND01809.webp', 'category' => 'lifestyle', 'order' => 3],
            ['image' => '/img/terbaru/IND01830.webp', 'category' => 'lifestyle', 'order' => 4],
            ['image' => '/img/terbaru/IND01870.webp', 'category' => 'lifestyle', 'order' => 5],
            ['image' => '/img/terbaru/IND01912.webp', 'category' => 'lifestyle', 'order' => 6],
            ['image' => '/img/terbaru/IND02304.webp', 'category' => 'exterior',  'order' => 7],
            ['image' => '/img/terbaru/IND02338.webp', 'category' => 'exterior',  'order' => 8],
            ['image' => '/img/terbaru/IND02492.webp', 'category' => 'exterior',  'order' => 9],
            ['image' => '/img/terbaru/IND04813.webp', 'category' => 'exterior',  'order' => 10],
            ['image' => '/img/terbaru/IND02101.webp', 'category' => 'interior',  'order' => 11],
            ['image' => '/img/terbaru/IND02395.webp', 'category' => 'interior',  'order' => 12],
            ['image' => '/img/terbaru/IND02420.webp', 'category' => 'interior',  'order' => 13],
            ['image' => '/img/terbaru/IND05044.webp', 'category' => 'interior',  'order' => 14],
            ['image' => '/img/terbaru/IND05480.webp', 'category' => 'interior',  'order' => 15],
            ['image' => '/img/terbaru/IND05643.webp', 'category' => 'interior',  'order' => 16],
            ['image' => '/img/gallery1/gal2.webp',    'category' => 'render',    'order' => 17],
            ['image' => '/img/gallery1/gal5.webp',    'category' => 'render',    'order' => 18],
            ['image' => '/img/gallery1/gal8.webp',    'category' => 'render',    'order' => 19],
            ['image' => '/img/gallery1/gal10.webp',   'category' => 'render',    'order' => 20],
            ['image' => '/img/gallery1/F1.jpg',        'category' => 'render',    'order' => 21],
            ['image' => '/img/gallery1/F2.jpg',        'category' => 'render',    'order' => 22],
            ['image' => '/img/gallery1/F10.jpg',       'category' => 'render',    'order' => 23],
        ];

        foreach ($galleries as $gallery) {
            GalleryImage::firstOrCreate(
                ['image' => $gallery['image']],
                array_merge($gallery, ['is_active' => true])
            );
        }

        $this->command->info('✅ Semua konten statis berhasil dimasukkan ke database!');
    }
}
