<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
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
        $title = $data['title'];
        $slug = Str::slug($title);
        $year = $data['year'];

        if(!empty($data['is_free'])) {
            $is_free = 1;
        }else{
            $is_free = 0;
        }

        $description = $data['description'];

        $poster = $data['poster']->store('images', 'public');

        $genres = $data['genres'];
        $countries = $data['countries'];
        $data = [
            'title' => $title,
            'poster' => $poster,
            'slug' => $slug,
            'year' => $year,
            'is_free' => $is_free,
            'description' => $description,
        ];

        $this->movieRepository->store($data, $genres, $countries);
    }
}
