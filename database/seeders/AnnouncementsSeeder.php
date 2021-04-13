<?php

namespace Database\Seeders;

use App\Models\announcements;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        announcements::truncate();
        for($i=0;$i<100;$i++){
            announcements::create([
                'title' => $faker->title,
                'content'=>$faker->sentence(2),
                'slug' => $faker->sentence(2),
                'img_path' =>$faker->sentence(2),

            ]);
        }
    }
}
