<?php

namespace App\Interfaces;
interface CountryRepositoryInterface
{
    public function all(array $options);

    public function store(array $data): void;

    public function update(array $data, int $id): void;

    public function destroy(int $id): void;

    public function get(int $id);
}
