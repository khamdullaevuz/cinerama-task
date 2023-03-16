<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::factory()->count(25)->create();

        $movies = Movie::with('genres', 'countries')->get();

        foreach ($movies as $movie) {
            $movie->genres()->attach([
                rand(1, 5),
                rand(6, 10),
                rand(11, 15),
            ]);

            $movie->countries()->attach([
                rand(1, 5),
                rand(6, 10)
            ]);
        }


    }
}
