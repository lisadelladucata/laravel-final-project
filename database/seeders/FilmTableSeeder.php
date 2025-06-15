<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film; 
use Faker\Generator as Faker;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++) {
            $newFilm = new Film();

            $newFilm->title = $faker->sentence();
            $newFilm->author = $faker->name();
            $newFilm->genre_id = rand(1,6);
            $newFilm->description = $faker->paragraph(12);

            $newFilm->save();

        }
    }
}
