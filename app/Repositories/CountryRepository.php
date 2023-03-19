<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Contract\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function __construct(protected Country $model)
    {
    }

    public function all(array $options)
    {
        return $this->model->orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data): void
    {
        $this->model->create($data);
    }

    public function update(array $data, int $id): void
    {
        $this->model->find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        $this->model->destroy($id);
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }
}
