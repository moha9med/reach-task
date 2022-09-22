<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Advertising\Advertiser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class AdvertiserTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_advertiser()
    {
        Advertiser::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/advertiser');
        $response->assertStatus(200);
    }

    public function test_get_single_advertiser()
    {
        $advertiser = Advertiser::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/advertiser/' . $advertiser->id);
        $response->assertStatus(200);
    }

    public function test_store_advertiser()
    {
        $name = $this->faker->name();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->postJson('/api/advertiser', [
                'name' => $name,
            ]);
        $this->assertDatabaseHas('advertisers', [
            'name' => $name,
        ]);
        $response->assertStatus(200);
    }

    public function test_update_advertiser()
    {
        $name = $this->faker->name();
        $advertiser = Advertiser::factory()
            ->state(['name' => $name])
            ->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->putJson('/api/advertiser/' . $advertiser->id, [
                'name' => $this->faker->name(),
            ]);

        $response->assertStatus(200);
    }

    public function test_delete_advertiser()
    {
        $name = $this->faker->name();
        $advertiser = Advertiser::factory()
            ->state(['name' => $name])
            ->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->delete('/api/advertiser/' . $advertiser->id);
        $response->assertStatus(200);
    }
}
