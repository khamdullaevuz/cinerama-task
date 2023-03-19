<?php

namespace App\DTO;

class CountryDTO
{
    public static function toArray(array $data): array
    {
        return [
            'name' => $data['name']
        ];
    }
}
