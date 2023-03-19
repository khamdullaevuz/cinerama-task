<?php

namespace App\Repositories\Api;

use App\Filters\MovieFilter;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Repositories\Contract\Api\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function __construct(protected Movie $model){
    }

    public function index(array $options)
    {
        $movie = $this->model->query();
        $movies = (new MovieFilter($movie, $options))->apply()->get();
        return $movies;
    }

    public function show($id)
    {
        $movie = $this->model->with('countries', 'genres')->findOrFail($id);

        return new MovieResource($movie);
    }
}
