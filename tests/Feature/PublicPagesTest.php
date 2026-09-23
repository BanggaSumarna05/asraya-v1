<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    /**
     * Test all primary public routes return HTTP 200 OK.
     *
     * @dataProvider publicRoutesProvider
     */
    public function test_public_routes_return_successful_response(string $uri): void
    {
        $response = $this->get($uri);
        $response->assertStatus(200);
    }

    public function publicRoutesProvider(): array
    {
        return [
            ['/'],
            ['/new'],
            ['/featured-house'],
            ['/history'],
            ['/fasilitas'],
            ['/unit-unggulan'],
            ['/mahogany'],
            ['/cendana'],
            ['/gaharu'],
            ['/clubhouse'],
            ['/brandgang'],
            ['/vision-n-mission'],
            ['/gym'],
            ['/swimming-pool'],
            ['/clinic'],
            ['/taman-kota'],
            ['/frequently-asked-questions'],
            ['/faq'],
            ['/progress-pembangunan'],
            ['/simulasi-kpr'],
            ['/galeri'],
            ['/ebrochure'],
            ['/eprofile'],
            ['/blog'],
        ];
    }
}
