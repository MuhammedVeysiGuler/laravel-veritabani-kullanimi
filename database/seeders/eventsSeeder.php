<?php

namespace Database\Seeders;

use App\Models\events;
use App\Models\news;
use Faker\Generator;
use Illuminate\Database\Seeder;

class eventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        events::truncate();
        for($i=0;$i<100;$i++) {
            news::create([
                'title' => $faker->title,
                'content' => $faker->sentence(2),
                'slug' => $faker->sentence(2),
                'img_path' => $faker->sentence(2),
                'is_deleted' => rand(0, 1)
            ]);
        }
    }
}
