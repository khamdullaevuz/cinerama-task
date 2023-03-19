<?php

namespace App\Services;

use App\DTO\MovieDTO;
use App\Repositories\Contract\MovieRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        Storage::disk('public')->delete($this->get($id)->poster);
        $this->movieRepository->destroy($id);
    }

    public function get(string $id)
    {
        return $this->movieRepository->get($id);
    }

    public function store(array $data): void
    {
        $movie = MovieDTO::toArray($data);

        $genres = $data['genres'];
        $countries = $data['countries'];

        $this->movieRepository->store($movie, $genres, $countries);
    }
}
