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

    public function index(Request $request)
    {
        return $this->movieRepository->index($request);
    }

    public function show($id)
    {
        return $this->movieRepository->show($id);
    }
}
