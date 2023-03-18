<?php

namespace App\Services\Api;

use App\Http\Resources\MovieResource;
use App\Interfaces\Api\MovieRepositoryInterface;
use Illuminate\Http\Request;

class MovieService
{
    public function __construct(protected MovieRepositoryInterface $movieRepository)
    {
    }

    public function index(array $options)
    {
        $movies = $this->movieRepository->index($options);

        return MovieResource::collection($movies);
    }

    public function show($id)
    {
        return $this->movieRepository->show($id);
    }
}
