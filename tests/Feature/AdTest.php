<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Advertising\Ad;
use App\Models\Advertising\Advertiser;
use App\Models\Advertising\Category;
use App\Models\Advertising\Tag;
use App\Notifications\AdNotification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;

class AdTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_ads()
    {
        Ad::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/ad');
        $response->assertStatus(200);
    }

    public function test_get_single_ad()
    {
        $ad = Ad::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/ad/' . $ad->id);
        $response->assertStatus(200);
    }

    public function test_store_ad()
    {
        $categories = Category::factory()->create();
        $advertisers = Advertiser::factory()->create();

        $title = $this->faker->words(1, true);
        $description = $this->faker->words(4, true) . ' description';
        $type = $this->faker->randomElement(['free', 'paid']);
        $start_date = $this->faker->unique()->dateTimeBetween($startDate = 'now', $endDate = '15 days')->format('Y-m-d');
        $category_id = $categories->id;
        $advertiser_id = $advertisers->id;
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->postJson('/api/ad', [
                'title' => $title,
                'description' => $description,
                'type' => $type,
                'start_date' => $start_date,
                'category_id' => $category_id,
                'advertiser_id' => $advertiser_id,
            ]);
        $this->assertDatabaseHas('ads', [
            'title' => $title,
            'description' => $description,
            'type' => $type,
            'start_date' => $start_date,
            'category_id' => $category_id,
            'advertiser_id' => $advertiser_id,
        ]);
        $response->assertStatus(200);
    }

    public function test_update_ad()
    {
        $title = $this->faker->words(1, true);
        $ad = Ad::factory()
            ->state(['title' => $title])
            ->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->putJson('/api/ad/' . $ad->id, [
                'title' => $this->faker->words(1, true),
            ]);

        $response->assertStatus(200);
    }

    public function test_delete_ad()
    {
        $title = $this->faker->words(1, true);
        $ad = Ad::factory()
            ->state(['title' => $title])
            ->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->delete('/api/ad/' . $ad->id);
        $response->assertStatus(200);
    }

    public function test_ad_tag_relation()
    {

        $tag = Tag::factory()->create();
        $ad = Ad::factory()->create();
        $ad->tags()->sync($tag);
        $this->assertDatabaseHas('ad_tag', [
            'ad_id' => $ad->id,
            'tag_id' => $tag->id
        ]);
    }

}
