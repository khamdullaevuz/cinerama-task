<?php

namespace App\Repositories\Api;

use App\QueryFilter\MovieFilter;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Repositories\Contract\Api\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function __construct(protected Movie $model){
    }

    public function index(array $options): MovieCollection
    {
        $movie = $this->model->query();
        $movies = (new MovieFilter($movie, $options))->apply()->paginate($options['items'] ?? 10);
        return new MovieCollection($movies);
    }

    public function show($id): MovieResource
    {
        $movie = $this->model->with('countries', 'genres')->findOrFail($id);

        return new MovieResource($movie);
    }
}
