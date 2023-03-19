<?php

namespace App\Services;

use App\Repositories\Contract\GenreRepositoryInterface;

class GenreService
{
    public function __construct(protected GenreRepositoryInterface $genreRepository)
    {
    }

    public function all(array $options)
    {
        return $this->genreRepository->all($options);
    }

    public function store(array $validated): void
    {
        $this->genreRepository->store($validated);
    }

    public function destroy(string $id): void
    {
        $this->genreRepository->destroy($id);
    }

    public function find(string $id)
    {
        return $this->genreRepository->get($id);
    }

    public function update(mixed $validated, string $id)
    {
        $this->genreRepository->update($validated, $id);
    }

}
