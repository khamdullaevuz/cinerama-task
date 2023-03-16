<?php

namespace App\Services;

use App\Interfaces\CountryRepositoryInterface;

class CountryService
{
    public function __construct(protected CountryRepositoryInterface $countryRepository)
    {
    }

    public function all(array $options)
    {
        return $this->countryRepository->all($options);
    }

    public function store(array $validated): void
    {
        $this->countryRepository->store($validated);
    }

    public function destroy(string $id): void
    {
        $this->countryRepository->destroy($id);
    }

    public function update(mixed $validated, string $id): void
    {
        $this->countryRepository->update($validated, $id);
    }

    public function find(string $id)
    {
        return $this->countryRepository->get($id);
    }
}
