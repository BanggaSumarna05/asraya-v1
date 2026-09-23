<?php

namespace App\Http\Controllers;

use App\Mail\MailVisit;
use App\Mail\MailVisitClient;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\BankPartner;
use App\Models\HeroSlider;
use App\Models\IgFeed;
use App\Models\Facility;
use App\Models\Management;
use App\Models\ConstructionProgress;
use App\Models\Faq;
use App\Models\GalleryImage;

class FrontController extends Controller
{
    private $keywords;

    // Fallback statis jika DB kosong
    public $promos = [
        'img/promos/promo1.jpg',
        'img/promos/promo2.jpg',
        'img/promos/promo3.jpg'
    ];

    public function __construct()
    {
        $this->keywords = [
            "Rumah mewah di Pekanbaru",
            "perumahan pekanbaru murah",
            "kredit perumahan pekanbaru",
            "perumahan pekanbaru type 45",
            "Hunian nyaman di Pekanbaru",
            "Lagi cari rumah cluster terbaik di Pekanbaru tahun 2025?",
            "perumahan di pekanbaru panam",
            "Properti modern Pekanbaru",
            "perumahan di pekanbaru kota",
            "perumahan pekanbaru 2022",
            "perumahan di pekanbaru",
            "perumahan pekanbaru type 36",
            "properti pekanbaru",
            "perumahan pekanbaru panam",
            "global property pekanbaru",
            "agen properti pekanbaru",
            "perumahan subsidi pekanbaru",
            "perumahan elit di pekanbaru",
            "Perumahan elit Pekanbaru",
            "jual rumah pribadi di pekanbaru",
            "Rumah asri di Pekanbaru",
            "rumah pekanbaru dijual",
            "rumah di pekanbaru",
            "rumah di pekanbaru kota",
            "Kompleks perumahan Pekanbaru",
            "Perumahan hijau Pekanbaru",
            "Hunian ramah lingkungan Pekanbaru",
            "Rumah minimalis Pekanbaru",
            "Properti strategis Pekanbaru",
            "Rumah idaman Pekanbaru",
            "Perumahan nyaman Pekanbaru",
            "Rumah premium Pekanbaru",
            "Properti keluarga Pekanbaru",
            "Perumahan modern Pekanbaru",
            "Hunian eksklusif Pekanbaru",
            "Properti nyaman Pekanbaru",
            "Rumah eksklusif Pekanbaru",
            "Hunian hijau Pekanbaru",
            "Rumah aman Pekanbaru",
            "Properti elit Pekanbaru",
            "Perumahan asri Pekanbaru",
            "Rumah keluarga Pekanbaru",
            "Properti hijau Pekanbaru",
            "Perumahan premium Pekanbaru",
            "Hunian strategis Pekanbaru",
            "Properti ramah lingkungan Pekanbaru",
            "Rumah hijau Pekanbaru",
            "Perumahan eksklusif Pekanbaru",
            "Hunian premium Pekanbaru",
            "Properti minimalis Pekanbaru",
            "Rumah strategis Pekanbaru",
            "Perumahan ramah lingkungan Pekanbaru",
            "Hunian aman Pekanbaru",
            "Properti asri Pekanbaru",
            "Rumah luas Pekanbaru",
            "Perumahan minimalis Pekanbaru",
            "Hunian modern Pekanbaru",
            "Properti aman Pekanbaru",
            "Rumah berkualitas Pekanbaru",
            "Perumahan strategis Pekanbaru",
            "Hunian nyaman Pekanbaru",
            "Properti modern dan asri Pekanbaru",
            "Rumah hijau dan asri Pekanbaru",
            "Perumahan elit dan nyaman Pekanbaru",
            "Hunian hijau dan nyaman Pekanbaru",
            "Properti premium dan asri Pekanbaru",
            "Rumah nyaman dan aman Pekanbaru",
            "Perumahan strategis dan asri Pekanbaru",
            "Hunian eksklusif dan asri Pekanbaru",
            "Properti modern dan nyaman Pekanbaru",
            "Rumah hijau dan aman Pekanbaru",
            "Perumahan elit dan hijau Pekanbaru",
            "Hunian hijau dan strategis Pekanbaru",
            "Properti strategis dan nyaman Pekanbaru",
            "Rumah minimalis dan asri Pekanbaru",
            "Perumahan premium dan nyaman Pekanbaru",
            "Hunian modern dan strategis Pekanbaru",
            "Properti eksklusif dan nyaman Pekanbaru",
            "Rumah hijau dan strategis Pekanbaru",
            "Perumahan minimalis dan hijau Pekanbaru",
            "Hunian strategis dan nyaman Pekanbaru",
            "Properti elit dan hijau Pekanbaru",
            "Rumah hijau dan nyaman Pekanbaru",
            "Perumahan modern dan hijau Pekanbaru",
            "Hunian minimalis dan strategis Pekanbaru",
            "Properti premium dan nyaman Pekanbaru",
            "Rumah hijau dan nyaman Pekanbaru",
            "Perumahan elit dan strategis Pekanbaru",
            "Hunian modern dan hijau Pekanbaru",
            "Properti strategis dan hijau Pekanbaru",
            "Rumah minimalis dan strategis Pekanbaru",
            "Perumahan eksklusif dan hijau Pekanbaru",
            "Hunian premium dan strategis Pekanbaru",
            "Properti elit dan nyaman Pekanbaru",
            "Rumah hijau dan strategis Pekanbaru",
            "Perumahan modern dan strategis Pekanbaru",
            "Hunian minimalis dan hijau Pekanbaru",
            "Properti strategis dan hijau Pekanbaru",
            "Rumah hijau dan strategis Pekanbaru",
            "Perumahan eksklusif dan nyaman Pekanbaru",
            "Hunian premium dan hijau Pekanbaru",
            "Properti elit dan strategis Pekanbaru",
            "Rumah hijau dan nyaman Pekanbaru",
            "Perumahan modern dan hijau Pekanbaru",
            "Hunian minimalis dan hijau Pekanbaru",
            "Properti strategis dan hijau Pekanbaru",
            "Rumah hijau dan strategis Pekanbaru",
            "Perumahan eksklusif dan hijau Pekanbaru",
            "Hunian premium dan strategis Pekanbaru",
            "Properti elit dan nyaman Pekanbaru",
            "Perumahan mewah Riau",
            "Hunian nyaman Riau",
            "Rumah modern Riau",
            "Properti asri Riau",
            "Rumah di alam Riau",
            "Komplek perumahan Riau",
            "Perumahan eksklusif Riau",
            "Rumah aman Riau",
            "Properti keluarga Riau",
            "Perumahan strategis Riau",
            "Rumah asri di Riau",
            "Perumahan elit Riau",
            "Hunian ramah lingkungan Riau",
            "Perumahan hijau Riau",
            "Perumahan alam Riau",
            "Properti premium Riau",
            "Rumah minimalis Riau",
            "Perumahan nuansa alam Riau",
            "Perumahan aman Riau",
            "Rumah berkualitas Riau",
            "Perumahan nyaman Riau",
            "Rumah modern minimalis Riau",
            "Perumahan luas Riau",
            "Hunian premium Riau",
            "Properti modern Riau",
            "Rumah eksklusif Riau",
            "Rumah idaman Riau",
            "Perumahan nyaman dan asri Riau",
            "Rumah nyaman di Riau",
            "Properti elit Riau",
            "Hunian eksklusif Riau",
            "Perumahan hijau dan asri Riau",
            "Rumah keluarga Riau",
            "Properti strategis Riau",
            "Rumah alam Riau",
            "Hunian elit Riau",
            "Perumahan mewah dan asri Riau",
            "Rumah dengan nuansa alam Riau",
            "Properti hijau Riau",
            "Hunian modern Riau",
            "Perumahan asri dan aman Riau",
            "Rumah eksklusif di alam Riau",
            "Properti nyaman Riau",
            "Perumahan asri di Riau",
            "Rumah premium di Riau",
            "Hunian nyaman dan asri Riau",
            "Properti idaman Riau",
            "Perumahan strategis dan asri Riau",
            "Rumah minimalis modern Riau",
            "Properti alam Riau",
            "Perumahan elit dan asri Riau",
            "Rumah ramah lingkungan Riau",
            "Hunian hijau Riau",
            "Perumahan berkualitas Riau",
            "Rumah hijau dan asri Riau",
            "Properti aman Riau",
            "Perumahan minimalis Riau",
            "Rumah elit di Riau",
            "Hunian hijau dan asri Riau",
            "Properti mewah Riau",
            "Rumah nyaman di alam Riau",
            "Perumahan nyaman dan hijau Riau",
            "Properti eksklusif Riau",
            "Rumah strategis Riau",
            "Perumahan hijau di Riau",
            "Rumah modern dan asri Riau",
            "Properti premium dan asri Riau",
            "Hunian strategis Riau",
            "Perumahan keluarga Riau",
            "Rumah nyaman dan aman Riau",
            "Properti elit dan asri Riau",
            "Perumahan minimalis dan asri Riau",
            "Rumah hijau di Riau",
            "Hunian premium dan asri Riau",
            "Perumahan eksklusif dan asri Riau",
            "Rumah modern dan nyaman Riau",
            "Properti aman dan asri Riau",
            "Perumahan berkualitas dan asri Riau",
            "Rumah elit dan nyaman Riau",
            "Hunian hijau dan nyaman Riau",
            "Perumahan minimalis dan hijau Riau",
            "Properti hijau dan asri Riau",
            "Rumah strategis dan asri Riau",
            "Hunian mewah dan asri Riau",
            "Perumahan hijau dan nyaman Riau",
            "Properti eksklusif dan asri Riau",
            "Rumah minimalis dan nyaman Riau",
            "Perumahan elit dan nyaman Riau",
            "Properti strategis dan asri Riau",
            "Rumah modern dan hijau Riau",
            "Hunian hijau dan aman Riau",
            "Perumahan berkualitas dan nyaman Riau",
            "Properti elit dan nyaman Riau",
            "Rumah hijau dan nyaman Riau",
            "Hunian strategis dan hijau Riau",
            "Perumahan minimalis dan hijau Riau",
            "Properti modern dan asri Riau",
            "Rumah hijau dan strategis Riau",
            "Hunian eksklusif dan nyaman Riau",
            "Perumahan premium dan hijau Riau",
            "asraya riau",
            "Casa Asraya",
            "Atelier Riri asraya townhouse",
            "Pekanbaru asraya",
            "LIVING HARMONY IN NATURE",
            "Lokasi strategis riau",
            "Properti idaman pekanbaru riau",
            "Nilai investasi tinggi",
            "Premium cluster",
            "Rumah lokasi strategis",
            "Cicilan ringan",
            "Fasilitas berlimpah",
            "Kemudahan akses & transportasi",
            "Kawasan asri",
            "Perumahan elit dengan banyak fasilitas",
            "Perumahan elit di pekanbaru",
            "Perumahan fasilitas menarik",
            "Perumahan lingkungan bersih",
            "Investasi property",
            "Perumahan konsep unik",
            "Smart home",
            'perumahan dengan club house',
            'Casa Asraya',
            'perumahan club house modern',
            'perumahan club house',
            'perumahan club house mewah',
            'asraya',
            'pt casa asraya properti',
            'perumahan club house murah',
            'mahogany residence',
            'casa asraya',
            'asraya residence',
            'asraya co living',
            'asraya coliving',
            'casa asraya properti',
            'atelier asraya',
            'living in harmony',
            'the living harmony',
            'club house',
            'clubhouse perumahan',
            'club house view kota',
            'perumahan club house eksklusif',
            'pilihan perumahan club house',
            'benefit memiliki club house',
            'apa itu club house perumahan',
            'club house adalah',
            'clubhouse real estate',
            'perumahan modern dengan clubhouse',
            'club house mewah di pekanbaru',
            'property gym',
            'gym property',
            'perumahan modern',
            'perumahan pekanbaru',
            'perumahan di pekanbaru kota',
            'perumahan di pekanbaru',
            'perumahan cendana pekanbaru',
            'perumahan cendana asri',
            'cendana asri',
            'pesona property group pekanbaru',
            'pesona riau',
            'cluster pekanbaru',
            'rumah eksklusif di pekanbaru',
            'jual rumah pekanbaru',
            'developer perumahan pekanbaru',
            'rumah cluster modern',
            'jual rumah dengan clubhouse',
            'brandgang',
            'brandgang adalah',
            'brandgang artinya',
            'brand gang',
            'wajib ditanyakan ke pengembang sebelum beli rumah',
            'jalan dwikora pekanbaru',
            'smp al azhar pekanbaru',
            'smpn 33 pekanbaru',
            'smpn 36 pekanbaru',
            'smpn 40 pekanbaru',
            'smp global pekanbaru',
            'sma al azhar 18',
            'rs pmc pekanbaru',
            'ranca asri lakeside',
            'tempat yoga terdekat',
            'yoga',
            'alamat rumah saya sekarang',
            'alamat rumah saya sekarang buka sekarang',
            'jual batu koral putih terdekat',
            'jual batu putih taman terdekat'
        ];

        // Promo Banners
        $dbPromos = \App\Models\PromoBanner::where('is_active', true)->orderBy('order', 'asc')->get();
        if ($dbPromos->count() > 0) {
            $this->promos = $dbPromos->map(function ($banner) {
                return (object)[
                    'image' => '/storage/' . $banner->image,
                    'link'  => $banner->link ?? '#'
                ];
            })->toArray();
        } else {
            $this->promos = array_map(function($p) {
                return (object)[
                    'image' => asset($p),
                    'link'  => '#'
                ];
            }, $this->promos);
        }
    }

    public function seo($title = null)
    {
        SEOTools::setTitle('Casa Asraya - ' . $title);
        SEOTools::setDescription(
            'Casa Asraya adalah perumahan di riau dibuat dengan developer terpercaya yang menawarkan hunian modern dan asri, dengan lokasi strategis, fasilitas lengkap, dan bernilai investasi tinggi.'
        );
        SEOTools::opengraph()->setUrl('https://asrayaproperty.com/');
        SEOTools::setCanonical('https://asrayaproperty.com/');
        SEOTools::jsonLd()->addImage('https://www.asrayaproperty.com/new/assets/img/asraya.png');
        SEOMeta::addKeyword($this->keywords);
    }

    /** Ambil bank dari DB, fallback ke array statis */
    private function getBanks(): array
    {
        $db = BankPartner::where('is_active', true)->orderBy('order')->get();
        if ($db->count() > 0) {
            return $db->map(function($b) {
                $logo = $b->logo;
                $logoUrl = (str_starts_with($logo, 'img/') || str_starts_with($logo, '/img/') || str_starts_with($logo, 'http') || str_starts_with($logo, 'storage/') || str_starts_with($logo, '/storage/')) ? $logo : 'storage/' . $logo;
                return ['name' => $b->name, 'logo' => $logoUrl];
            })->toArray();
        }
        return [
            ['name' => 'BCA',       'logo' => 'img/bank/bca-bank-logo-png_seeklogo-232742.png'],
            ['name' => 'BRI',       'logo' => 'img/bank/bank-bri-logo-png_seeklogo-355613.png'],
            ['name' => 'BNI',       'logo' => 'img/bank/bank-bni-logo-png_seeklogo-355606.png'],
            ['name' => 'Mandiri',   'logo' => 'img/bank/bank-mandiri-logo-png_seeklogo-16290.png'],
            ['name' => 'BTN',       'logo' => 'img/bank/2560px-Bank_BTN_logo.svg.png'],
            ['name' => 'BSI',       'logo' => 'img/bank/Bank_Syariah_Indonesia.svg.png'],
            ['name' => 'CIMB Niaga','logo' => 'img/bank/logo-cimb-niaga.png'],
            ['name' => 'Maybank',   'logo' => 'img/bank/maybank1.png'],
            ['name' => 'OCBC',      'logo' => 'img/bank/Logo-ocbc.webp'],
        ];
    }

    /** Ambil hero sliders dari DB, fallback ke array statis */
    private function getSliders(): array
    {
        $db = HeroSlider::where('is_active', true)->orderBy('order')->get();
        if ($db->count() > 0) {
            return $db->map(function($s) {
                $img = $s->image;
                return (str_starts_with($img, 'img/') || str_starts_with($img, '/img/') || str_starts_with($img, 'http') || str_starts_with($img, 'storage/') || str_starts_with($img, '/storage/')) ? $img : 'storage/' . $img;
            })->toArray();
        }
        return [
            'img/reduce/slider/F2.jpg',
            'img/reduce/slider/F3.jpg',
            'img/reduce/slider/F5.jpg',
            'img/reduce/slider/F6.jpg',
            'img/reduce/slider/F10.jpg',
        ];
    }

    /** Ambil IG feeds dari DB, fallback ke array statis */
    private function getIgs(): array
    {
        $db = IgFeed::where('is_active', true)->orderBy('order')->get();
        if ($db->count() > 0) {
            return $db->map(function($ig) {
                $img = $ig->image;
                return (str_starts_with($img, 'img/') || str_starts_with($img, '/img/') || str_starts_with($img, 'http') || str_starts_with($img, 'storage/') || str_starts_with($img, '/storage/')) ? $img : 'storage/' . $img;
            })->toArray();
        }
        return [
            '/img/ig/office 1.jpg',
            '/img/ig/milestone1.jpg',
            '/img/ig/milestone2.jpg',
            '/img/ig/last1.jpg',
        ];
    }

    /** Ambil fasilitas dari DB, fallback ke array statis */
    private function getFacilities(): array
    {
        $db = Facility::where('is_active', true)->orderBy('order')->get();
        if ($db->count() > 0) {
            return $db->map(function($f) {
                $cover = $f->cover;
                $coverUrl = (str_starts_with($cover, 'new/') || str_starts_with($cover, 'img/') || str_starts_with($cover, '/img/') || str_starts_with($cover, 'http') || str_starts_with($cover, 'storage/') || str_starts_with($cover, '/storage/')) ? $cover : 'storage/' . $cover;
                return [
                    'title' => $f->title,
                    'link'  => $f->slug,
                    'cover' => $coverUrl,
                    'text'  => $f->description ?? '',
                ];
            })->toArray();
        }
        return [
            ['title' => 'Club House',    'link' => 'clubhouse',     'cover' => 'new/assets/img/clubhouse1.jpg',    'text' => ''],
            ['title' => 'Gymnastic',     'link' => 'gym',           'cover' => 'new/assets/img/gym1.jpg',          'text' => ''],
            ['title' => 'Swimming Pool', 'link' => 'swimming-pool', 'cover' => 'new/assets/img/spool.jpg',         'text' => ''],
            ['title' => 'Brandgang',     'link' => 'brandgang',     'cover' => 'new/assets/img/brandgag-crop.jpg', 'text' => ''],
            ['title' => 'Taman',         'link' => 'tamanKota',     'cover' => 'new/assets/img/taman1.jpg',        'text' => ''],
        ];
    }

    /** Ambil manajemen dari DB, fallback ke array statis */
    private function getManagements(): array
    {
        $db = Management::where('is_active', true)->orderBy('order')->get();
        if ($db->count() > 0) {
            return $db->map(function($m) {
                $photo = $m->photo;
                $photoUrl = (str_starts_with($photo, 'img/') || str_starts_with($photo, '/img/') || str_starts_with($photo, 'http') || str_starts_with($photo, 'storage/') || str_starts_with($photo, '/storage/')) ? $photo : 'storage/' . $photo;
                return [
                    'img'     => $photoUrl,
                    'name'    => $m->name,
                    'pos'     => $m->position,
                    'text'    => $m->bio ?? '',
                    'ref'     => $m->url_ref,
                    'refText' => $m->url_ref_text,
                ];
            })->toArray();
        }
        return [
            [
                'img'  => 'img/reduce/management-01.webp',
                'name' => "O'zaro B. Larosa",
                'pos'  => 'Managing Director',
                'text' => "Tim manajemen profesional dan karyawan dengan bangga mempersembahkan Bapak O'ozaro Larosa, lulusan Institut Teknologi Bandung.",
            ],
            [
                'img'     => 'img/reduce/management-02.png',
                'name'    => 'Atelier Riri',
                'pos'     => 'Architecture & Design Partner',
                'text'    => 'Atelier Riri adalah firma desain dan arsitektur yang didirikan oleh Novriansyah Yakub (Riri) di Jakarta.',
                'ref'     => 'https://atelierriri.com/asraya-townhouse/',
                'refText' => 'More Information',
            ],
        ];
    }

    /** Ambil unit rumah */
    private function getUnits(): array
    {
        return [
            [
                'name'        => 'GAHARU',
                'cover'       => 'img/gaharu/hero.PNG',
                'link'        => 'gaharu',
                'description' => 'Hunian modern 2 lantai seluas 115m² di atas lahan 92m², dilengkapi 3 Kamar Tidur, 2 Kamar Mandi, Balkon, Backyard, dan Carport 2 Mobil. Harga mulai Rp1,2 Miliar dengan Promo Diskon Rp50 Juta.',
            ],
            [
                'name'        => 'MAHOGANY',
                'cover'       => 'new/assets/img/F7.jpg',
                'link'        => 'mahogany',
                'description' => 'Hunian premium seluas 220m² di atas lahan 157m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 4 Kamar Mandi, Smart Home, Garasi dan Carport.',
            ],
            [
                'name'        => 'CENDANA',
                'cover'       => 'img/cendana/F10.jpg',
                'link'        => 'cendana',
                'description' => 'Hunian eksklusif seluas 138m² di atas lahan 90m², dilengkapi 3 Master Bedroom, 1 Kamar ART, 5 Kamar Mandi, Smart Home, dan Carport.',
            ],
        ];
    }

    public function index(Request $request)
    {
        $header = [
            'header'   => 'Casa Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img'      => 'new/assets/img/F11.jpg',
            'low'      => 'new/assets/img/aa.png'
        ];

        $this->seo('Halaman Utama');
        $collection = $this->buildProgressPaginator();

        $dbGallery = GalleryImage::where('is_active', true)->orderBy('order')->take(6)->get();
        if ($dbGallery->count() > 0) {
            $homeGalleries = $dbGallery->map(function($g) {
                $img = $g->image;
                $url = (str_starts_with($img, 'img/') || str_starts_with($img, '/img/') || str_starts_with($img, 'http') || str_starts_with($img, 'storage/') || str_starts_with($img, '/storage/')) ? $img : 'storage/' . $img;
                return [
                    'img'   => $url,
                    'tag'   => ucfirst($g->category ?? 'Gallery'),
                    'title' => $g->caption ?? basename($g->image),
                ];
            })->toArray();
        } else {
            $homeGalleries = [
                ['img' => 'img/reduce/F1.jpg',  'tag' => 'Susana sekitar',   'title' => 'Fasad Hunian Modern'],
                ['img' => 'img/reduce/F5.jpg',  'tag' => 'Fasilitas',  'title' => 'Clubhouse'],
                ['img' => 'img/reduce/F8.jpg',  'tag' => 'Interior',    'title' => 'Ruang Tamu Elegan'],
                ['img' => 'new/assets/img/taman1.jpg',  'tag' => 'Taman',       'title' => 'Taman Hijau Asri'],
                ['img' => 'img/reduce/F7.jpg',  'tag' => 'Eksterior',   'title' => 'Eksterior Rumah'],
                ['img' => 'img/cendana/new/cendana (46).jpg',  'tag' => 'Keluarga',  'title' => 'Ruang Keluarga'],
            ];
        }

        return view('index')
            ->with([
                'managements' => $this->getManagements(),
                'header'      => $header,
                'sliders'     => $this->getSliders(),
                'units'       => $this->getUnits(),
                'banks'       => $this->getBanks(),
                'igs'         => $this->getIgs(),
                'promos'      => $this->promos,
                'progress'    => $collection,
                'facilities'  => $this->getFacilities(),
                'galleryItems'=> $homeGalleries,
            ]);
    }

    public function ebrochure()
    {
        $path = public_path('assets/ebrochure/asraya-brosur.pdf');
        if (file_exists($path)) {
            return response()->file($path);
        }
        abort(404);
    }

    public function eprofile()
    {
        $path = public_path('assets/ebrochure/asraya-profile.pdf');
        if (file_exists($path)) {
            return response()->file($path);
        }
        abort(404);
    }

    public function mahogany()
    {
        $data = [];
        $data['cover'] = 'img/mahogany/mahogany-siang.jpg';
        $data['name']  = 'MAHOGANY';

        $data['slide'] = [
            'img/mahogany/mahogany-siang.jpg',
            'img/mahogany/mahogany-malam.jpg',
            'img/mahogany/F7.jpg',
            'img/mahogany/floor side.jpg',
            'img/mahogany/floor.jpg',
        ];

        $data['slideRender'] = [
            'img/mahogany/new/mahogany-f.png',
            'img/mahogany/new/mahogany-r.png',
            'img/mahogany/new/mahogany-b.png',
            'img/mahogany/new/mahogany-l.png',
        ];

        $data['floors'] = 'img/mahogany/Denah_Mahogany.jpg';
        $this->seo('Unit Mahogany');
        return view('mahogany')->with([
            'data'   => $data,
            'units'  => $this->getUnits(),
            'banks'  => $this->getBanks(),
            'igs'    => $this->getIgs(),
            'promos' => $this->promos,
        ]);
    }

    public function cendana()
    {
        $data = [];
        $data['cover'] = 'img/cendana/cendana-siang.jpg';
        $data['name']  = 'CENDANA';

        $data['slide'] = [
            'img/cendana/cendana-siang.jpg',
            'img/cendana/cendana-malam.jpg',
            'img/cendana/cendana-interior.jpg',
            'img/cendana/f10-1.jpg',
            'img/cendana/cendana-units (1).jpeg',
            'img/cendana/cendana-units (2).jpeg',
            'img/cendana/cendana-units (3).jpeg',
        ];

        $data['slideRender'] = [
            'img/cendana/cendana-f.png',
            'img/cendana/cendana-r.png',
            'img/cendana/cendana-b.png',
            'img/cendana/cendana-l.png',
        ];

        $data['floors'] = 'img/cendana/Denah Cendana.jpg';
        $this->seo('Unit Cendana');

        $data['galeries'] = [];
        $selected = [1, 3, 7, 14, 15, 17, 21, 31, 42, 43, 45, 46];
        foreach ($selected as $value) {
            array_push($data['galeries'], '/img/cendana/new/cendana (' . $value . ').jpg');
        }

        return view('cendana')->with([
            'data'   => $data,
            'units'  => $this->getUnits(),
            'banks'  => $this->getBanks(),
            'igs'    => $this->getIgs(),
            'promos' => $this->promos,
        ]);
    }

    public function gaharu()
    {
        $data = [];
        $data['cover'] = 'img/gaharu/hero.PNG';
        $data['name']  = 'GAHARU PRIME';

        $data['slide'] = [
            'img/gaharu/hero.PNG',
        ];

        $this->seo('Unit Gaharu Prime');

        return view('gaharu')->with([
            'data'   => $data,
            'units'  => $this->getUnits(),
            'banks'  => $this->getBanks(),
            'igs'    => $this->getIgs(),
            'promos' => $this->promos,
        ]);
    }

    public function clubhouse()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/cover-clubhouse.jpg';
        $data['name']  = 'CLUBHOUSE';
        $data['slide'] = [];
        array_push($data['slide'], 'img/cendana/Denah Cendana.jpg');
        array_push($data['slide'], 'img/cendana/FLOOR SIDE.png');
        array_push($data['slide'], 'img/cendana/FLOOR.jpg');

        $this->seo('Clubhouse');

        return view('clubhouse')->with([
            'data'   => $data,
            'units'  => $this->getUnits(),
            'banks'  => $this->getBanks(),
            'igs'    => $this->getIgs(),
            'promos' => $this->promos,
        ]);
    }

    public function brandgang()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/brandgag-crop.jpg';
        $data['name']  = 'BRANDGANG';
        $data['slide'] = [];
        array_push($data['slide'], 'img/cendana/Denah Cendana.jpg');
        array_push($data['slide'], 'img/cendana/FLOOR SIDE.png');
        array_push($data['slide'], 'img/cendana/FLOOR.jpg');

        $this->seo('Brandgang');

        return view('brandgang')->with([
            'data'       => $data,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
        ]);
    }

    public function visi()
    {
        $header = [
            'header'   => 'Casa Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img'      => 'img/f6.png',
            'low'      => 'new/assets/img/aa.png'
        ];

        $this->seo('Visi & Misi');

        return view('visiMisi')->with([
            'header' => $header,
        ]);
    }

    public function gym()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/gym1.jpg';
        $data['name']  = 'Gym';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/gym1.jpg');

        $this->seo('Gym');

        return view('gym')->with([
            'data'       => $data,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
        ]);
    }

    public function spool()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/spool.jpg';
        $data['name']  = 'Swimming Pool';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/spool.jpg');

        $this->seo('Kolam Renang');

        return view('spool')->with([
            'data'       => $data,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
        ]);
    }

    public function clinic()
    {
        $data = [];
        $data['cover'] = 'img/drSynd/logo.jpg';
        $data['name']  = 'DR SYND SLIM & BEAUTY';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/spool.jpg');
        $pics = [
            'img//drSynd/rtunggu1.jpg',
            'img//drSynd/infus1.jpg',
            'img//drSynd/treat.jpg',
        ];

        $this->seo('Klinik Dr Synd');

        return view('clinic')->with([
            'data'       => $data,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
            'pics'       => $pics,
        ]);
    }

    public function tamanKota()
    {
        $data = [];
        $data['cover'] = 'img/reduce/f2c.jpg';
        $data['name']  = 'Taman';
        $data['slide'] = [];
        $pics = [
            'img//drSynd/rtunggu1.jpg',
            'img//drSynd/infus1.jpg',
            'img//drSynd/treat.jpg',
        ];

        $this->seo('Taman Kota');

        return view('taman')->with([
            'data'       => $data,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
            'pics'       => $pics,
        ]);
    }

    public function faq()
    {
        $header = [
            'header'   => 'Casa Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img'      => 'new/assets/img/F11.jpg',
            'low'      => 'new/assets/img/aa.png'
        ];

        $this->seo('Pertanyaan Umum (FAQ)');

        $generals = Faq::where('category', 'general')->where('is_active', true)->orderBy('order')->get();
        $specs    = Faq::where('category', 'specs')->where('is_active', true)->orderBy('order')->get();
        $facs     = Faq::where('category', 'facility')->where('is_active', true)->orderBy('order')->get();
        $buys     = Faq::where('category', 'purchase')->where('is_active', true)->orderBy('order')->get();

        return view('faq')->with([
            'generals'   => $generals,
            'specs'      => $specs,
            'facs'       => $facs,
            'buys'       => $buys,
            'header'     => $header,
            'units'      => $this->getUnits(),
            'banks'      => $this->getBanks(),
            'igs'        => $this->getIgs(),
            'facilities' => $this->getFacilities(),
        ]);
    }

    /** Bangun paginator progress — dipakai internal maupun halaman publik */
    private function buildProgressPaginator(int $perPage = 3): PaginationLengthAwarePaginator
    {
        $dbProgress = ConstructionProgress::where('is_active', true)
            ->orderBy('order')
            ->with(['images' => fn($q) => $q->orderBy('order')])
            ->get();

        if ($dbProgress->count() > 0) {
            $progressArray = $dbProgress->map(fn($p) => [
                'period' => $p->period,
                'images' => $p->images->pluck('image')->toArray(),
            ])->values()->toArray();
        } else {
            $progressArray = [
                ['period' => 'September 2024', 'images' => ['img/progress/sept24/sept1.jpg','img/progress/sept24/sept2.jpg','img/progress/sept24/sept3.jpg','img/progress/sept24/sept4.jpg']],
                ['period' => 'August 2024',    'images' => ['img/progress/agus2024/agus (1).jpg','img/progress/agus2024/agus (2).jpg','img/progress/agus2024/agus (3).jpg','img/progress/agus2024/agus (4).jpg']],
                ['period' => 'Juli 2024',      'images' => ['img/progress/juli2024/juli1.jpg','img/progress/juli2024/juli2.jpg','img/progress/juli2024/juli3.jpg']],
                ['period' => 'Juni 2024',      'images' => ['img/progress/juni2024/jun2.jpg','img/progress/juni2024/jun5.jpg','img/progress/juni2024/jun7.jpg','img/progress/juni2024/jun8.jpg']],
                ['period' => 'Mei 2024',       'images' => ['img/progress/11.jpg','img/progress/12.jpg','img/progress/13.jpg','img/progress/14.jpg']],
                ['period' => 'April 2024',     'images' => ['img/progress/april/april1.jpg','img/progress/april/april2.jpg','img/progress/april/april3.jpg','img/progress/april/april4.jpg']],
                ['period' => 'Maret 2024',     'images' => ['img/progress/maret/maret1.jpg','img/progress/maret/maret2.jpg','img/progress/maret/maret3.jpg','img/progress/maret/maret4.jpg']],
            ];
        }

        $collection      = collect($progressArray);
        $currentPage     = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->forPage($currentPage, $perPage);

        return new PaginationLengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => route('getProgress')]
        );
    }

    /** Route /progress-pembangunan → tampilkan halaman view */
    public function getProgress()
    {
        $this->seo('Progress Pembangunan');
        $progress = $this->buildProgressPaginator(4); // 4 periode per halaman

        // Buat photoMap untuk lightbox JS: ['Periode_Key' => ['url1','url2',...]]
        $photoMap = [];
        foreach ($progress->items() as $period) {
            $key = str_replace([' ', '/'], '_', $period['period']);
            $photoMap[$key] = array_map(function($imgPath) {
                $url = (str_starts_with($imgPath, 'img/') || str_starts_with($imgPath, '/img/')
                     || str_starts_with($imgPath, 'http') || str_starts_with($imgPath, 'storage/')
                     || str_starts_with($imgPath, '/storage/'))
                    ? $imgPath : 'storage/' . $imgPath;
                return asset($url);
            }, $period['images']);
        }

        return view('progress', compact('progress', 'photoMap'));
    }

    public function featuredHouse()
    {
        $header = [
            'header'   => 'Casa Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img'      => 'new/assets/img/F11.jpg',
            'low'      => 'new/assets/img/aa.png'
        ];

        $this->seo('Unit Unggulan');
        $collection = $this->buildProgressPaginator();
        return view('featured-house')
            ->with([
                'managements' => $this->getManagements(),
                'header'      => $header,
                'sliders'     => $this->getSliders(),
                'units'       => $this->getUnits(),
                'banks'       => $this->getBanks(),
                'igs'         => $this->getIgs(),
                'promos'      => $this->promos,
                'progress'    => $collection,
                'facilities'  => $this->getFacilities(),
            ]);
    }

    public function fasilitas()
    {
        return view('templates/facilities')->with([
            'facilities' => $this->getFacilities(),
        ]);
    }

    public function unitUnggulan()
    {
        return view('templates/units')->with([
            'units' => $this->getUnits(),
        ]);
    }

    public function galeriAll()
    {
        $selected = ['Artboard 1.png', 'Artboard 2.png', 'Artboard 3.png', 'Artboard 4.png', 'Artboard 5.png', 'Artboard 6.png', 'Artboard 7.png', 'Artboard 8.png', 'Artboard 9.png'];
        $data['galeries'] = [];
        foreach ($selected as $value) {
            array_push(
                $data['galeries'],
                [
                    'gambar' => '/img/gallery1/' . $value,
                    'judul'  => 'Cendana (' . $value . ')',
                ]
            );
        }
        $this->seo('Galeri Kami');
        return view('galeri')->with([
            'data' => $data,
        ]);
    }

    public function galeri()
    {
        $data = [];
        $data['galeries'] = [];

        $dbGallery = GalleryImage::where('is_active', true)->orderBy('order')->get();

        if ($dbGallery->count() > 0) {
            $data['galeries'] = $dbGallery->map(fn($g) => [
                'gambar' => $g->image,
                'judul'  => $g->caption ?? basename($g->image),
            ])->toArray();
        } else {
            $curatedPaths = [
                '/img/terbaru/IND01755.webp', '/img/terbaru/IND01769.webp',
                '/img/terbaru/IND01809.webp', '/img/terbaru/IND01830.webp',
                '/img/terbaru/IND01870.webp', '/img/terbaru/IND01912.webp',
                '/img/terbaru/IND02304.webp', '/img/terbaru/IND02338.webp',
                '/img/terbaru/IND02492.webp', '/img/terbaru/IND04813.webp',
                '/img/terbaru/IND02101.webp', '/img/terbaru/IND02395.webp',
                '/img/terbaru/IND02420.webp', '/img/terbaru/IND05044.webp',
                '/img/terbaru/IND05480.webp', '/img/terbaru/IND05643.webp',
                '/img/gallery1/gal2.webp', '/img/gallery1/gal5.webp',
                '/img/gallery1/gal8.webp', '/img/gallery1/gal10.webp',
                '/img/gallery1/F1.jpg', '/img/gallery1/F2.jpg', '/img/gallery1/F10.jpg',
            ];
            foreach ($curatedPaths as $path) {
                if (\Illuminate\Support\Facades\File::exists(public_path($path))) {
                    $data['galeries'][] = ['gambar' => $path, 'judul' => basename($path)];
                }
            }
        }

        $this->seo('Galeri Kami');

        return view('galeri')->with([
            'data' => $data,
        ]);
    }

    public function history()
    {
        $this->seo('Sejarah Perusahaan');
        return view('history');
    }

    public function calculator()
    {
        $this->seo('Simulasi KPR');
        return view('perhitungan_kpr');
    }
}
