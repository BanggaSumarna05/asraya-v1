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

class FrontController extends Controller
{

    private $keywords;

    public function __construct()
    {
        $this->keywords = [
            "Rumah mewah di Pekanbaru",
            "Hunian nyaman di Pekanbaru",
            "Properti modern Pekanbaru",
            "Perumahan elit Pekanbaru",
            "Rumah asri di Pekanbaru",
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
            "Pesona hutan asraya",
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
            "Investasi property Balikpapan",
            "Perumahan konsep unik",
            "Smart home Balikpapan",
        ];
    }

    public function seo()
    {
        SEOTools::setTitle('Asraya Property - Pesona Hutan Asraya');
        SEOTools::setDescription('PESONA HUTAN ASRAYA, properti idaman oleh developer berpengalaman. nilai investasi tinggi, lokasi strategis. Cicilan ringan dan bonus berlimpah.');
        SEOTools::opengraph()->setUrl('https://asrayaproperty.com/');
        SEOTools::setCanonical('https://asrayaproperty.com/');
        SEOTools::jsonLd()->addImage('https://www.asrayaproperty.com/new/assets/img/asraya.png');
        SEOMeta::addKeyword($this->keywords);
    }

    public $units = [
        [
            'name' => 'MAHOGANY',
            'cover' => 'new/assets/img/F7.jpg',
            'link' => 'mahogany',

        ],
        [
            'name' => 'CENDANA',
            'cover' => 'img/cendana/F10.jpg',
            'link' => 'cendana',
        ],
        [
            'name' => 'INTERIOR',
            'cover' => 'img/reduce/F8.jpg',
            'link' => '',
        ]
    ];

    public $banks = [
        'img/reduce/bank/fit.png',
    ];

    public $igs = [
        '/img/ig/office 1.jpg',
        '/img/ig/milestone1.jpg',
        '/img/ig/milestone2.jpg',
        '/img/ig/last1.jpg',
    ];

    public $galleries = [
        '/img/gallery/gal1.jpg',
    ];

    public $promos = [
        'img/promos/promo1.jpg',
        'img/promos/promo2.jpg',
        'img/promos/promo3.jpg'
    ];

    public $progress1 = [
        // kedepannya akan dibuat banyak row, dari timestamp progress
        'mei2024',
        'img/progress/11.jpg',
        'img/progress/12.jpg',
        'img/progress/13.jpg',
        'img/progress/14.jpg',
        'apr2024',
        'img/progress/april/april1.jpg',
        'img/progress/april/april2.jpg',
        'img/progress/april/april3.jpg',
        'img/progress/april/april4.jpg',
        'mar2024',
        'img/progress/maret/maret1.jpg',
        'img/progress/maret/maret2.jpg',
        'img/progress/maret/maret3.jpg',
        'img/progress/maret/maret4.jpg',
        'feb2024',
        'img/progress/1.jpg',
        'img/progress/2.jpg',
        'img/progress/3.jpg',
        'img/progress/8.jpg',
    ];

    public $progress = [
        "September 2024" => [
            "foto1" => 'img/progress/sept24/sept1.jpg',
            "foto2" => 'img/progress/sept24/sept2.jpg',
            "foto3" => 'img/progress/sept24/sept3.jpg',
            "foto4" => 'img/progress/sept24/sept4.jpg',
        ],
        "August 2024" => [
            "foto1" => 'img/progress/agus2024/agus (1).jpg',
            "foto2" => 'img/progress/agus2024/agus (2).jpg',
            "foto3" => 'img/progress/agus2024/agus (3).jpg',
            "foto4" => 'img/progress/agus2024/agus (4).jpg',
        ],
        "Juli 2024" => [
            "foto1" => 'img/progress/juli2024/juli1.jpg',
            "foto2" => 'img/progress/juli2024/juli2.jpg',
            "foto3" => 'img/progress/juli2024/juli3.jpg',
        ],
        "Juni 2024" => [
            // "foto1" => 'img/progress/juni2024/jun1.jpg',
            "foto2" => 'img/progress/juni2024/jun2.jpg',
            // "foto3" => 'img/progress/juni2024/jun3.jpg',
            // "foto4" => 'img/progress/juni2024/jun4.jpg',
            "foto5" => 'img/progress/juni2024/jun5.jpg',
            // "foto6" => 'img/progress/juni2024/jun6.jpg',
            "foto" => 'img/progress/juni2024/jun7.jpg',
            "foto8" => 'img/progress/juni2024/jun8.jpg',
        ],
        "Mei 2024" => [
            "foto1" => 'img/progress/11.jpg',
            "foto2" => 'img/progress/12.jpg',
            "foto3" => 'img/progress/13.jpg',
            "foto4" => 'img/progress/14.jpg',
        ],
        "April 2024" => [
            "foto1" => 'img/progress/april/april1.jpg',
            "foto2" => 'img/progress/april/april2.jpg',
            "foto3" => 'img/progress/april/april3.jpg',
            "foto4" => 'img/progress/april/april4.jpg',
        ],
        "Maret 2024" => [
            "foto1" => 'img/progress/maret/maret1.jpg',
            "foto2" => 'img/progress/maret/maret2.jpg',
            "foto3" => 'img/progress/maret/maret3.jpg',
            "foto4" => 'img/progress/maret/maret4.jpg',
        ],
        // "Februari 2024" => [
        //     "foto1" => 'img/progress/1.jpg',
        //     "foto2" => 'img/progress/2.jpg',
        //     "foto3" => 'img/progress/3.jpg',
        //     "foto4" => 'img/progress/8.jpg',
        // ],
    ];


    public $facilities = [
        [
            'title' => 'Club House',
            'link' => 'clubhouse',
            'cover' => 'new/assets/img/clubhouse1.jpg',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
            modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
            Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
            distinctio. Cumque?',
        ],
        [
            'title' => 'Gymnastic',
            'link' => 'gym',
            'cover' => 'new/assets/img/gym1.jpg',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
            modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
            Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
            distinctio. Cumque?',
        ],
        [
            'title' => 'Swimming Pool',
            'link' => 'swimming-pool',
            'cover' => 'new/assets/img/spool.jpg',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
            modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
            Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
            distinctio. Cumque?',
        ],
        [
            'title' => 'Brandgang',
            'link' => 'brandgang',
            'cover' => 'new/assets/img/brandgag-crop.jpg',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
            modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
            Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
            distinctio. Cumque?',
        ],
        // [
        //     'title' => 'Clinic Dr Synd',
        //     'link' => 'clinic',
        //     'cover' => 'img/facilities/klinik.jpg',
        //     'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
        //     modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
        //     Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
        //     distinctio. Cumque?',
        // ],
        [
            'title' => 'Taman Kota',
            'link' => 'taman-kota',
            'cover' => 'new/assets/img/taman1.jpg',
            'text' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla fuga repudiandae
            modi ex? Atque fugit laboriosam exercitationem. Excepturi, fugit quos.
            Blanditiis maiores eveniet voluptas quam consectetur magnam doloremque
            distinctio. Cumque?',
        ],
    ];

    public function index(Request $request)
    {
        $header = [
            'header' => 'Pesona Hutan Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img' => 'new/assets/img/F11.jpg',
            'low' => 'new/assets/img/aa.png'
        ];

        $sliders = [
            'img/reduce/slider/F2.jpg',
            'img/reduce/slider/F3.jpg',
            'img/reduce/slider/F5.jpg',
            'img/reduce/slider/F6.jpg',
            // 'new/assets/img/F7.jpg',
            'img/reduce/slider/F10.jpg',
        ];
        $managements =
            [
                [
                    'img' => 'img/reduce/management-01.webp',
                    'name' => 'O\'zaro B. Larosa',
                    'pos' => 'Managing Director',
                    'text' => '
                    Tim manajemen profesional dan karyawan dengan bangga mempersembahkan Bapak O’ozaro Larosa, lulusan Institut Teknologi Bandung, yang kini menjabat sebagai Managing Director di salah satu anak perusahaan kami, PT Casa Asraya Properti.
                    </br>
Seorang profesional dengan semangat tinggi untuk keunggulan dan pengalaman dalam membuka pasar global di bidang teknik, pertambangan, dan perusahaan EPC di Asia Tenggara & Timur Tengah sejak 2007, Bapak O’ozaro Larosa telah menjadi salah satu pakar bisnis luar negeri andalan kami.
                    ',
                ],
                [
                    'img' => 'img/reduce/management-02.png',
                    'name' => 'Atelier Riri',
                    'pos' => 'Architecture & Design Partner',
                    'text' => 'Atelier Riri adalah firma desain dan arsitektur yang didirikan oleh Novriansyah Yakub (Riri) di Jakarta. Firma ini merupakan perluasan gagasan dari apa yang Riri yakini dan lakukan sejak memulai debut arsitekturnya pada tahun 2005. Hingga kini, firma tersebut terus berkembang dengan karya di bidang arsitektur, interior, lanskap, dan desain produk.',
                    'ref' => 'https://atelierriri.com/asraya-townhouse/',
                    'refText' => 'Atelier Riri'
                ],
            ];

        $this->seo();
        $collection = $this->getProgress();
        // return $collection;
        return view('index')
            ->with([
                'managements' => $managements,
                'header' => $header,
                'sliders' => $sliders,
                // 
                'units' => $this->units,
                'banks' => $this->banks,
                'igs' => $this->igs,
                'promos' => $this->promos,
                'progress' => $collection, //$this->progress,
                'facilities' => $this->facilities,
            ]);
    }

    public function ebrochure()
    {
        $pdf = PDF::loadHtml(public_path('ebrochure/asraya.pdf'));
        return $pdf;
    }

    public function eprofile()
    {
        $pdf = PDF::loadHtml(public_path('ebrochure/profile.pdf'));
        return $pdf;
    }

    public function mahogany()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/F7.jpg';
        $data['name'] = 'MAHOGANY';
        $data['slide'] = [];
        array_push($data['slide'], 'img/mahogany/Denah_Mahogany.jpg');
        array_push($data['slide'], 'img/mahogany/floor.jpg');
        array_push($data['slide'], 'img/mahogany/floor side.jpg');

        $this->seo();

        return view('mahogany')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'promos' => $this->promos,
        ]);
    }

    public function cendana()
    {
        $data = [];
        $data['cover'] = 'img/cendana/F10.jpg';
        $data['name'] = 'CENDANA';
        $data['slide'] = [];
        // array_push($data['slide'], 'new/assets/img/F7.jpg');
        array_push($data['slide'], 'img/cendana/Denah Cendana.jpg');
        array_push($data['slide'], 'img/cendana/FLOOR SIDE.png');
        array_push($data['slide'], 'img/cendana/FLOOR.jpg');

        $this->seo();

        return view('cendana')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'promos' => $this->promos,
        ]);
    }

    public function clubhouse()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/cover-clubhouse.jpg';
        $data['name'] = 'CLUBHOUSE';
        $data['slide'] = [];
        // array_push($data['slide'], 'new/assets/img/F7.jpg');
        array_push($data['slide'], 'img/cendana/Denah Cendana.jpg');
        array_push($data['slide'], 'img/cendana/FLOOR SIDE.png');
        array_push($data['slide'], 'img/cendana/FLOOR.jpg');

        $this->seo();

        return view('clubhouse')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'promos' => $this->promos,
        ]);
    }

    public function brandgang()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/brandgag-crop.jpg';
        $data['name'] = 'BRANDGANG';
        $data['slide'] = [];
        array_push($data['slide'], 'img/cendana/Denah Cendana.jpg');
        array_push($data['slide'], 'img/cendana/FLOOR SIDE.png');
        array_push($data['slide'], 'img/cendana/FLOOR.jpg');

        $this->seo();

        return view('brandgang')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
        ]);
    }

    public function visi()
    {
        $header = [
            'header' => 'Pesona Hutan Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img' => 'new/assets/img/F11.jpg',
            'low' => 'new/assets/img/aa.png'
        ];

        $this->seo();

        return view('visiMisi')
            ->with([
                'header' => $header,
            ]);
    }

    public function facility()
    {
        $header = [
            'header' => 'Facilities',
            'img' => 'new/assets/img/aa.png'
        ];

        $this->seo();

        return view('facility')
            ->with([
                'header' => $header,
            ]);
    }

    public function gym()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/gym1.jpg';
        $data['name'] = 'Gymnastic';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/gym1.jpg');

        $this->seo();

        return view('gym')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
        ]);
    }

    public function spool()
    {
        $data = [];
        $data['cover'] = 'new/assets/img/spool.jpg';
        $data['name'] = 'Swimming Pool';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/spool.jpg');

        $this->seo();

        return view('spool')->with([
            'data' => $data,
            // 
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
        ]);
    }
    public function clinic()
    {
        $data = [];
        $data['cover'] = 'img/drSynd/logo.jpg';
        $data['name'] = 'DR SYND SLIM & BEAUTY';
        $data['slide'] = [];
        array_push($data['slide'], 'new/assets/img/spool.jpg');
        $pics = [
            // 'img//drSynd/drSynd.jpg',
            'img//drSynd/rtunggu1.jpg',
            'img//drSynd/infus1.jpg',
            'img//drSynd/treat.jpg',
        ];

        $this->seo();

        return view('clinic')->with([
            'data' => $data,
            //
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
            'pics' => $pics,
        ]);
    }

    public function tamanKota()
    {
        $data = [];
        $data['cover'] = 'img/reduce/f2c.jpg';
        $data['name'] = 'Taman Kota';
        $data['slide'] = [];
        // array_push($data['slide'], 'new/assets/img/spool.jpg');
        $pics = [
            // 'img//drSynd/drSynd.jpg',
            'img//drSynd/rtunggu1.jpg',
            'img//drSynd/infus1.jpg',
            'img//drSynd/treat.jpg',
        ];

        $this->seo();

        return view('taman')->with([
            'data' => $data,
            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
            'pics' => $pics,
        ]);
    }

    public function faq()
    {
        $generals = [
            [
                "question" => "Apakah konsep yang ditawarkan oleh Pesona Hutan Asraya?",
                "answer" => "Pesona Hutan Asraya adalah hunian pertama di kota Pekanbaru yang menggunakan konsep hutan kota, dengan sentuhan design dari arsitek Atelier Riri yang mempunyai fasilitas lengkap diantaranya Clubhouse, Swimming Pool, Yoga Club, Gym & Resto and Lounge."
            ],
            [
                "question" => "Kapan proyek Pesona Hutan Asraya dimulai?",
                "answer" => "Proyek ini dilaksanakan dari bulan Mei 2023"
            ],
            [
                "question" => "Apakah developer sudah mempunyai izin-izin yang dibutuhkan untuk membangun hunian ini?",
                "answer" => "Semua syarat perizinan pembangunan yang diperlukan sudah dimiliki oleh developer untuk dapat menyelesaikan Pembangunan unit Pesona Hutan Asraya."
            ],
            [
                "question" => "Sudah berapa lama perusahaan Anda berkecimpung dalam bisnis real estate?",
                "answer" => "PT Casa Asraya Property berdiri pada tahun 2023, dan Pekanbaru menjadi project developer pertama kami."
            ],
            [
                "question" => "Apakah anda memiliki model tampilan unit untuk dilihat sebelum Pembangunan dimulai?",
                "answer" => "Kami menyediakan display Maket, 3D Design & Clubhouse di kantor Marketing Gallery."
            ],
            [
                "question" => "Apakah ada opsi untuk custom atau perubahan desain bangunan dari unit yang di beli?",
                "answer" => "Untuk menjaga kualitas bangunan dan kerapihan area hunian dibolehkan untuk menambah atau merubah design minor bangunan kecuali tampak depan dan tidak merubah bentuk asli Pesona Hutan Asraya."
            ],
            [
                "question" => "Bagaimana jika kita ingin menempati unit yang sudah dibeli di tengah berjalannya proses Pembangunan Pesona Hutan Asraya?",
                "answer" => "Konsumen bisa menempati unit yang sudah dibeli meskipun proses Pembangunan sedang berjalan."
            ],
            [
                "question" => "Apakah saya bisa melakukan inspeksi terhadap unit yang akan saya beli?",
                "answer" => "Calon customer diperbolehkan untuk bisa melakukan inspeksi progress Pembangunan unit."
            ],
            [
                "question" => "Bagaimana saya bisa memantau perkembangan proyek?",
                "answer" => "Perkembangan progress proyek kami akan selalu kami update berkala melalui social media dan website kami, dan akan kami lakukan komunikasi langsung kepada anda mengenai kemajuan proyek yang terkini dan calon customer dipersilahkan untuk dapat mengunjungi area project untuk dapat melihat progress project secara langsung."
            ],
            [
                "question" => "Bagaimana untuk cara pembayaran listrik di unit yang akan kami tempati?",
                "answer" => "Untuk setiap unit menggunakan sistem token, yang juga dapat dibayarkan melalui fitur Mobile Banking/ Internet Banking."
            ]
        ];

        $specs = [
            [
                "question" => "Berapakah luas bangunan dari unit Pesona Hutan Asraya?",
                "answer" => "Untuk Type Mahogany ukuran luas bangunan adalah 220 M²; Untuk Type Cendana luas bangunan adalah 138 M²."
            ],
            [
                "question" => "Bagaimana spesifikasi bangunan untuk sisi interior maupun eksterior unit Pesona Hutan Asraya?",
                "answer" => "Untuk dinding menggunakan bata ringan, finishing lantai menggunakan granit 60x60, finishing cat interior dan eksterior menggunakan Mowilex."
            ],
            [
                "question" => "Untuk sumber air yang digunakan setiap unit Pesona Hutan Asraya menggunakan Pam atau Sumur Bor?",
                "answer" => "Untuk setiap unit Pesona Hutan menggunakan sumur bor."
            ],
            [
                "question" => "Berapa kapasitas parkir mobil di setiap unit Pesona Hutan Asraya?",
                "answer" => "Untuk type Mahogany tersedia 1 garasi dan 1 Carport dengan kapasitas 4 mobil, Dan untuk type Cendana tersedia 1 carport dengan kapasitas 2 mobil."
            ],
            [
                "question" => "Jenis atap apa yang digunakan untuk unit Pesona Hutan Asraya?",
                "answer" => "Untuk semua unit menggunakan atap Bitumen (Merk Onduline) dan struktur baja ringan."
            ],
            [
                "question" => "Jenis bahan pondasi apakah yang digunakan?",
                "answer" => "Untuk pondasi yang digunakan pada semua unit adalah Mini Pile."
            ],
            [
                "question" => "Berapa daya listrik yang digunakan?",
                "answer" => "Untuk semua unit Pesona Hutan Asraya menggunakan daya listrik 3500 Watt dengan sistem token di semua unit."
            ],
            [
                "question" => "Type lantai apa yang digunakan untuk unit Pesona Hutan Asraya di lantai 1, 2 & 3?",
                "answer" => "Untuk lantai menggunakan jenis Granite tile, dengan detail: Untuk area Utama: Niro Granite Homogenous Tile 60x60 Untuk area Toilet: Wisma Sehati - Homogenius Tile 60x60 Gravity Dark Grey Untuk area Kamar: Pakai SPC Yellow Creek Oak."
            ],
            [
                "question" => "Ada berapa unit type Mahogany & Type Cendana?",
                "answer" => "Untuk type Mahogany tersedia sebanyak 8 Unit dan Untuk type Cendana tersedia sebanyak 25 Unit."
            ]
        ];

        $facs = [
            [
                "question" => "Bagaimanakah sistem keamanan di lingkungan Pesona Hutan Asraya?",
                "answer" => "Cluster Pesona Hutan Asraya mempunyai fasilitas One Gate System, fasilitas CCTV di lingkungan area komplek dan terdapat Security yang berjaga 24 Jam."
            ],
            [
                "question" => "Apa sajakah fasilitas Clubhouse yang ditawarkan untuk unit rumah Pesona Hutan?",
                "answer" => "Pesona Hutan mempunyai Clubhouse yang memiliki fasilitas Gym, Swimming Pool, Resto and Café."
            ],
            [
                "question" => "Bagaimana dengan infrastruktur di sekitar Kawasan Pesona Hutan Asraya, seperti akses sekolah dan pusat perbelanjaan?",
                "answer" => "Pesona Hutan Asraya mempunyai lokasi strategis yang memiliki akses dekat menuju SMPN 1, SMPN 4, SMPN 13, SMP Santa Maria, SMAN 1 Pekanbaru, SMA 8 Pekanbaru, SMA 9 Pekanbaru, SMA Al-Azhar, SMA Santa Maria, Mall Pekanbaru, Mall SKA, Living World, Mall Ciputra, RSUD, RS Awal Bros, PMC, RS Zainab, RS Bhayangkara, RS Petala Bumi dan pusat distrik bisnis Sudirman."
            ],
            [
                "question" => "Bagaimana kondisi wilayah sekitar area hunian Pesona Hutan?",
                "answer" => "Wilayah sekitar Pesona Hutan sudah berkembang, Pesona Hutan Asraya dekat dengan kawasan Pendidikan terdapat 9 sekolah, dekat dengan lokasi 6 rumah sakit dan 4 Mall besar di Pekanbaru yang masing-masing lokasi hanya berjarak sekitar 15 menit dari hunian Pesona Hutan Asraya."
            ],
            [
                "question" => "Apakah ada fasilitas umum yang berada di area Pesona Hutan Asraya?",
                "answer" => "Untuk fasilitas umum di Pesona Hutan Asraya terdapat Clubhouse (Swimming Pool, Gym, Yoga Club, Resto & Lounge), Brandgang dan Taman Kota."
            ],
            [
                "question" => "Brand / Jenis toilet apa yang digunakan dalam unit Pesona Hutan Asraya?",
                "answer" => "Semua unit Pesona Hutan Asraya menggunakan produk toilet dari Toto."
            ],
            [
                "question" => "Apakah akan ada bonus yang didapatkan dari pembelian unit Pesona Hutan Asraya?",
                "answer" => "Untuk setiap pembelian unit Pesona Hutan Asraya sudah mendapatkan free Canopy untuk carport, Layanan CCTV 24 jam diarea lingkungan Pesona Hutan Asraya dan water heater Solahart dengan kapasitas 100 L di setiap unit Pesona Hutan Asraya."
            ],
            [
                "question" => "Apakah fasilitas umum seperti Gojek, Grab, Shopee Food bisa masuk ke area Pesona Hutan Asraya?",
                "answer" => "Semua fasilitas umum seperti Gojek, Grab, Shopee Food, J&T dan lainnya bisa masuk area Pesona Hutan Asraya dengan prosedur keamanan security Pesona Hutan Asraya."
            ],
            [
                "question" => "Bagaimana kualitas air di area lingkungan Pesona Hutan Asraya?",
                "answer" => "Kualitas air di seluruh area unit Pesona Hutan Asraya memiliki kualitas yang baik (jernih dan tidak berbau)."
            ],
            [
                "question" => "Bagaimana spesifikasi jalan yang digunakan di area Pesona Hutan Asraya?",
                "answer" => "Untuk spesifikasi jalan yang digunakan di area Pesona Hutan Asraya menggunakan Paving Block."
            ],
            [
                "question" => "Jenis pohon apa saja yang ditanam di area Pesona Hutan Asraya?",
                "answer" => "Pohon yang ditanam di seluruh area Pesona Hutan Asraya menggunakan Pohon Pulai dan Pohon Trembesi yang ditanam di Pesona Hutan Asraya."
            ],
            [
                "question" => "Berapakah kapasitas water heater yang digunakan dalam setiap unit?",
                "answer" => "Untuk setiap unit Pesona Hutan Asraya menggunakan water heater Solahart dengan kapasitas 100L."
            ]
        ];

        $buys = [
            [
                "question" => "Berapa lama proses dari akad untuk bisa dilakukan proses handover?",
                "answer" => "Untuk proses handover membutuhkan waktu kurang lebih 8-9 bulan."
            ],
            [
                "question" => "Apa garansi yang kami dapatkan dari transaksi pembelian unit?",
                "answer" => "Setelah akad berjalan, konsumen akan mendapatkan garansi 90 hari sejak ditandatangani form BAST 1 sampai dengan BAST 2 (Berita Acara Surat Terima Unit Rumah)."
            ],
            [
                "question" => "Bagaimanakah untuk skema pembayarannya?",
                "answer" => "Untuk skema pembayaran terdapat Cash keras, Cash bertahap dan program diantaranya terdapat KPR Bank Mandiri, Bank BTN, Permata Bank, Maybank, CIMB Niaga & BSI"
            ],
            [
                "question" => "Bagaimana cara untuk membeli properti?",
                "answer" => "Untuk detil skema pembelian, dapat ditanyakan melalui nomor perwakilan marketing yang tertera di brosur kami, dan dapat langsung datang ke Marketing Gallery kami di Jl. Dwikora No. 16, Kec. Sail-Pekanbaru."
            ],
            [
                "question" => "Bagaimana saya bisa mendapatkan informasi lebih lanjut mengenai unit yang akan dibeli?",
                "answer" => "Bapak/Ibu dapat mengunjungi ke Marketing Gallery kami yang berada di area site Pesona Hutan Asraya untuk dapat melihat progress Pembangunan kami, dan juga dapat menghubungi nomor Marketing yang tertera dalam brosur yang kami berikan."
            ],
            [
                "question" => "Apa saya bisa menjadwalkan kunjungan atau tur ke unit rumah Pesona Hutan Asraya?",
                "answer" => "Untuk jadwal kunjungan bisa menghubungi kontak marketing, dan akan kami jadwalkan secara langsung melalui kontak telepon atau WhatsApp."
            ],
            [
                "question" => "Berapa rata-rata DP yang dibayarkan, dan berapakah cicilan per-bulan yang dibayarkan?",
                "answer" => "Untuk DP dibayarkan dimulai dari 20% dari harga jual unit, dan untuk cicilan per bulan dengan rata-rata Rp 11jutaan/bulan."
            ],
            [
                "question" => "Biaya apa sajakah yang dikeluarkan ketika pembelian unit rumah Pesona Hutan Asraya?",
                "answer" => "Biaya-biaya yang akan ditanggung oleh pembeli, antara lain: \n• Biaya BPHTB\n• Biaya notaris,\n• Biaya provisi\n• Biaya PPN"
            ],
            [
                "question" => "Apakah booking fee bisa dikembalikan jika ada pembatalan pembelian unit?",
                "answer" => "Booking fee tidak dapat dikembalikan."
            ],
            [
                "question" => "Dokumen apa saja yang harus dipersiapkan dalam proses pembelian unit Pesona Hutan Asraya?",
                "answer" => "Document yang dibutuhkan: \n1. Bagi Karyawan:\n• KTP\n• KK\n• Surat Nikah (Jika pembeli sudah menikah wajib melampirkan surat nikah)\n• NPWP\n• Slip Gaji 3 Bulan\n• Surat Keterangan Kerja di Perusahaan\n• Fotokopi Rekening Tabungan (Selama 3 bulan terakhir)\n• Pas Foto 3x4\n2. Bagi Wiraswasta\n• KTP\n• KK\n• Surat Nikah (Jika pembeli sudah menikah wajib melampirkan surat nikah)\n• SIUP (Surat Izin Usaha Perorangan)\n• TDP (Tanda Daftar Perusahaan)\n• NPWP\n• Laporan Perusahaan (2 Tahun terakhir)\n• Akta Pendirian Perusahaan (Jika PT)\n• Akta Pengesahan dari Menteri Kehakiman dan Hak Asasi Manusia Surat Izin Praktek (jika Profesi)\n• Pas Foto 3x4"
            ]
        ];

        $header = [
            'header' => 'Pesona Hutan Asraya',
            'location' => 'LIVING HARMONY IN NATURE',
            'img' => 'new/assets/img/F11.jpg',
            'low' => 'new/assets/img/aa.png'
        ];

        $this->seo();

        return view('faq')->with([
            'generals' => $generals,
            'specs' => $specs,
            'facs' => $facs,
            'buys' => $buys,

            'header' => $header,

            'units' => $this->units,
            'banks' => $this->banks,
            'igs' => $this->igs,
            'facilities' => $this->facilities,
        ]);
    }

    public function getProgress()
    {

        $collection = collect($this->progress);

        // Tentukan berapa banyak item per halaman
        $perPage = 3;

        // Dapatkan halaman saat ini dari query string (?page=)
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        // Bagian dari collection yang akan ditampilkan untuk halaman saat ini
        $currentPageItems = $collection->forPage($currentPage, $perPage);

        // Buat instance paginator
        $paginatedItems = new PaginationLengthAwarePaginator(
            $currentPageItems, // Item untuk halaman saat ini
            $collection->count(), // Total items
            $perPage, // Items per halaman
            $currentPage, // Halaman saat ini
            ['path' => route('getProgress')] // URL untuk pagination links
        );
        return $paginatedItems;
    }
}
