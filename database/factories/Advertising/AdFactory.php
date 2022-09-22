<?php

namespace Database\Factories\Advertising;

use App\Models\Advertising\Advertiser;
use App\Models\Advertising\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertising\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->words(4, true) . ' description',
            'type' => $this->faker->randomElement(['free', 'paid']),
            'start_date' => $this->faker->unique()->dateTimeBetween($startDate = 'now', $endDate = '15 days')->format('Y-m-d'),
            'category_id' => Category::all()->random()->id,
            'advertiser_id' => Advertiser::all()->random()->id,
        ];
    }
}
