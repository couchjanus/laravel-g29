<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_web_roures_get(): void
    {
        $urls = [
            '/',
            'about-us',
            'contact',
            'admin'
        ];

        foreach ($urls as $url)
        {
            $response = $this->get($url);
            $response->assertStatus(200);
        }

    }
}
