<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Technology;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_tecnology = new Technology();

            $new_tecnology->name = $faker->sentence(2);
            $new_tecnology->slug = Str::slug($new_tecnology->name, '-');

            $new_tecnology->save();
        }
    }
}
