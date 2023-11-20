<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_cannot_see_quotes_without_auth(): void
    {
        $response = $this->get('/api/quotes');

        $response->assertStatus(401);
    }

    public function test_can_get_quotes(): void
    {
        //set the auth header
        $response = $this->get('/api/quotes', [
            'Authorization' => '' . env('API_TOKEN'),
        ]);

        $response->assertStatus(200);

        $this->assertIsArray($response->json());

        $this->assertCount(5, $response->json()['data']);

        $this->assertArrayHasKey('data', $response->json());

        $this->assertArrayHasKey('quote', $response->json()['data'][0]);
    }
}
