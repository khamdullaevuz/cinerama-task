<?php

namespace App\Services;

use App\DTO\GenreDTO;
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
        $genre = GenreDTO::toArray($validated);
        $this->genreRepository->store($genre);
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
