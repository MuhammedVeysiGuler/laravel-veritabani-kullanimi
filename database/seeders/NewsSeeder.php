<?php

namespace Database\Seeders;

use App\Models\announcements;
use App\Models\news;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        news::truncate();
        for($i=0;$i<100;$i++){
            news::create([
                'title' => $faker->title,
                'content'=>$faker->sentence(2),
                'slug' => $faker->sentence(2),
                'img_path' =>$faker->sentence(2),
                'is_deleted' => rand(0,1)
            ]);
        }
    }
}
