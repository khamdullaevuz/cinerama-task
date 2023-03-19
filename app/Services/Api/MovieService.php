<?php

namespace App\Services\Api;

use App\Http\Resources\MovieResource;
use App\Repositories\Contract\Api\MovieRepositoryInterface;

class MovieService
{
    public function __construct(protected MovieRepositoryInterface $movieRepository)
    {
    }

    public function index(array $options)
    {
        return $this->movieRepository->index($options);
    }

    public function show($id)
    {
        return $this->movieRepository->show($id);
    }
}
