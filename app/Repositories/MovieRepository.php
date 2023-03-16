<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MovieRepository implements MovieRepositoryInterface
{
    public function all(array $options)
    {
        return Movie::paginate(10);
    }

    public function store(array $data): void
    {
        // TODO: Implement store() method.
    }

    public function update(array $data, int $id): void
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): void
    {
        Movie::destroy($id);
    }

    public function get(int $id)
    {
        return Movie::with('genres', 'countries')->findOrFail($id);
    }
}
