<?php

namespace App\Repositories;

use App\DTO\MovieDTO;
use App\Models\Movie;
use App\Repositories\Contract\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function __construct(protected Movie $model)
    {}

    public function all(array $options)
    {
        return $this->model->orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data, array $genres, array $countries): void
    {
        $movie = $this->model->create($data);

        $movie->genres()->attach($genres);
        $movie->countries()->attach($countries);
        $movie->save();
    }

    public function update(array $data, int $id, array $genres, array $countries): void
    {
        $movie = $this->model->find($id);
        $movie->update($data);

        $movie->genres()->sync($genres);
        $movie->countries()->sync($countries);
        $movie->save();
    }

    public function destroy(int $id): void
    {
        $this->model->destroy($id);
    }

    public function get(int $id)
    {
        return $this->model->with('genres', 'countries')->findOrFail($id);
    }
}
