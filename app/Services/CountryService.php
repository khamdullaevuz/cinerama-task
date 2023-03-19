<?php

namespace App\Services;

use App\DTO\CountryDTO;
use App\Repositories\Contract\CountryRepositoryInterface;

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
        $country = CountryDTO::toArray($validated);
        $this->countryRepository->store($country);
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
