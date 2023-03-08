<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_project = new Project();

            $new_project->title = $faker->sentence(3); //crea una frase di tre parole
            $new_project->content = $faker->text(200);
            $new_project->slug = Str::slug($new_project->title, '-'); //crea lo slug partendo dal title mettendo i trattini al posto dello spazio e tutto minuscolo

            $new_project->save();
        }
    }
}
