<?php

namespace App\Repositories;

use App\Interfaces\GenreRepositoryInterface;
use App\Models\Genre;

class GenreRepository implements GenreRepositoryInterface
{

    public function all(array $options)
    {
        return Genre::orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data): void
    {
        Genre::create($data);
    }

    public function update(array $data, int $id): void
    {
        Genre::find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Genre::destroy($id);
    }

    public function get(int $id)
    {
        return Genre::find($id);
    }
}
