<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Advertising\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class TagTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_tag()
    {
        Tag::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/tag');
        $response->assertStatus(200);
    }

    public function test_get_single_tag()
    {
        $tag = Tag::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/tag/' . $tag->id);
        $response->assertStatus(200);
    }

    public function test_store_tag()
    {
        $title = $this->faker->words(1, true);
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->postJson('/api/tag', [
                'title' => $title,
            ]);
        $this->assertDatabaseHas('tags', [
            'title' => $title,
        ]);
        $response->assertStatus(200);
    }

    public function test_update_tag()
    {
        $title = $this->faker->words(1, true);
        $tag = Tag::factory()
            ->state(['title' => $title])
            ->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->putJson('/api/tag/' . $tag->id, [
                'title' => $this->faker->words(1, true),
            ]);

        $response->assertStatus(200);
    }

    public function test_delete_tag()
    {
        $title = $this->faker->words(1,true);
        $tag = Tag::factory()
            ->state(['title' => $title])
            ->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->delete('/api/tag/' . $tag->id);
        $response->assertStatus(200);
    }
}
