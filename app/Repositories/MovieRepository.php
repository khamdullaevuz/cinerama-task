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

    public function store(array $data): void
    {
        $title = $data['title'];
        $slug = Str::slug($title);
        $year = $data['year'];

        if(!empty($data['is_free'])) {
            $is_free = 1;
        }else{
            $is_free = 0;
        }

        $description = $data['description'];

        $poster = $data['poster']->store('images', 'public');

        $genres = $data['genres'];
        $countries = $data['countries'];

        $movie = Movie::create([
            'title' => $title,
            'poster' => $poster,
            'slug' => $slug,
            'year' => $year,
            'is_free' => $is_free,
            'description' => $description,
        ]);

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
