<?php

/**
 * @see https://github.com/artesaos/seotools
 */

// Master Keyword Strategy: Combination of Brand, High-Intent, and Niche terminologies.
$keywords = [
    // Brand Identity
    "Casa Asraya",
    "Casa Asraya Pekanbaru",
    "Asraya Property",
    "Asraya Townhouse",

    // High Intent (Transactional)
    "Rumah mewah Pekanbaru",
    "Jual rumah Pekanbaru",
    "Perumahan elit Pekanbaru",
    "Townhouse Pekanbaru",
    "Cluster eksklusif Pekanbaru",

    // Architectural & Lifestyle (Niche)
    "Rumah desain arsitek Pekanbaru",
    "Atelier Riri Pekanbaru",
    "Modern tropical house Pekanbaru",
    "Smart home Pekanbaru",
    "Eco-green living Pekanbaru",

    // Location & Value
    "Rumah dekat Bandara SKA",
    "Properti dekat Mall SKA",
    "Investasi properti Riau",
    "Hunian bebas banjir Pekanbaru",
];

// Content Optimization:
// Meta Description (< 160 chars): Focused on CTR (Click Through Rate) for Google Search.
$metaDescription = "Casa Asraya: Hunian mewah di Pekanbaru dengan konsep 'Living Harmony in Nature'. Desain modern oleh Atelier Riri, fasilitas premium, dan lokasi strategis.";

// OpenGraph Description (Social Media): Richer storytelling for Facebook/WhatsApp/LinkedIn.
$ogDescription = "Casa Asraya menghadirkan perumahan premium yang mengutamakan desain modern dengan sentuhan alam. Tempat di mana keindahan desain bertemu kedamaian hutan, menciptakan hunian yang menjadi perlindungan nyaman dan membawa ketenangan. Didesain oleh Atelier Riri.";

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Casa Asraya - Living Harmony in Nature", // Optimized Title with Tagline
            'titleBefore'  => false,
            'description'  => $metaDescription,
            'separator'    => ' | ',
            'keywords'     => $keywords,
            'canonical'    => 'full',
            'robots'       => 'index, follow',
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => "Casa Asraya - Premium Townhouse Pekanbaru", // Specific OG Title for engagement
            'description' => $ogDescription,
            'url'         => null,
            'type'        => "website",
            'site_name'   => "Casa Asraya Property",
            'images'      => ["https://asrayaproperty.com/new/assets/img/cover-clubhouse-1.jpg"], // HTTPS Secured
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image', // Maximizes real estate in Twitter feed
            'site'        => '@casaasraya',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => "Casa Asraya - Living Harmony in Nature",
            'description' => $metaDescription,
            'url'         => 'full',
            'type'        => 'RealEstateAgent', // More specific Schema.org type than 'WebSite'
            'images'      => ["https://asrayaproperty.com/new/assets/img/cover-clubhouse-1.jpg"],
        ],
    ],
];
