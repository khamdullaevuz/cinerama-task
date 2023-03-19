<?php

namespace App\Repositories\Contract;

interface MovieRepositoryInterface
{
    public function all(array $options);

    public function store(array $data, array $genres, array $countries): void;

    public function update(array $data, int $id): void;

    public function destroy(int $id): void;

    public function get(int $id);
}
