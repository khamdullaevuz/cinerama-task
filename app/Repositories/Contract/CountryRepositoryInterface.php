<?php

namespace App\Repositories\Contract;
interface CountryRepositoryInterface
{
    public function all(array $options);

    public function store(array $data): void;

    public function update(array $data, int $id): void;

    public function destroy(int $id): void;
}
