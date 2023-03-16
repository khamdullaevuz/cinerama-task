<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;

class MovieService
{
    public function __construct(protected MovieRepositoryInterface $movieRepository)
    {
    }

    public function all(array $options)
    {
        return $this->movieRepository->all($options);
    }

    public function destroy(string $id): void
    {
        $this->movieRepository->destroy($id);
    }

    public function get(string $id)
    {
        return $this->movieRepository->get($id);
    }
}
