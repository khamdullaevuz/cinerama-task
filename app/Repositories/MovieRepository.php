<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MovieRepository implements MovieRepositoryInterface
{
    public function all(array $options)
    {
        return Movie::orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data, array $genres, array $countries): void
    {
        $movie = Movie::create($data);

        $movie->genres()->attach($genres);
        $movie->countries()->attach($countries);
        $movie->save();
    }

    public function update(array $data, int $id): void
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): void
    {
        Movie::destroy($id);
    }

    public function get(int $id)
    {
        return Movie::with('genres', 'countries')->findOrFail($id);
    }
}
