<?php

namespace Database\Seeders;

use App\Models\Advertising\Ad;
use App\Models\Advertising\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::factory(10)->create();

        $tags = Tag::all();
        Ad::all()->each(function ($ad) use ($tags) {
            $ad->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
