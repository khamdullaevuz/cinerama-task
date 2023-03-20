<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Genre;
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
        Movie::factory()->count(100)->create();

        $movies = Movie::with('genres', 'countries')->get();

        foreach ($movies as $movie) {
            $movie->genres()->attach(Genre::inRandomOrder()->limit(3)->get());
            $movie->countries()->attach(Country::inRandomOrder()->limit(2)->get());
            $movie->save();
        }
    }
}
