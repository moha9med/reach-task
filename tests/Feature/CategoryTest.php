<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Advertising\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class CategoryTest extends TestCase
{
    use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_category()
    {
        Category::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/category');
        $response->assertStatus(200);
    }

    public function test_get_single_category()
    {
        $category = Category::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->get('/api/category/' . $category->id);
        $response->assertStatus(200);
    }

    public function test_store_category()
    {
        $title = $this->faker->words(1, true);
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->postJson('/api/category', [
                'title' => $title,
            ]);
        $this->assertDatabaseHas('categories', [
            'title' => $title,
        ]);
        $response->assertStatus(200);
    }

    public function test_update_category()
    {
        $title = $this->faker->words(1, true);
        $category = Category::factory()
            ->state(['title' => $title])
            ->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->putJson('/api/category/' . $category->id, [
                'title' => $this->faker->words(1, true),
            ]);

        $response->assertStatus(200);
    }

    public function test_delete_category()
    {
        $title = $this->faker->words(1,true);
        $category = Category::factory()
            ->state(['title' => $title])
            ->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])
            ->delete('/api/category/' . $category->id);
        $response->assertStatus(200);
    }
}
