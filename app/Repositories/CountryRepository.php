<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{

    public function all(array $options)
    {
        return Country::orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data): void
    {
        Country::create($data);
    }

    public function update(array $data, int $id): void
    {
        Country::find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Country::destroy($id);
    }

    public function get(int $id)
    {
        return Country::find($id);
    }
}
