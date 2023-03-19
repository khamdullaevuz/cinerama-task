<?php

namespace App\DTO;

class GenreDTO
{
    public static function toArray(array $data): array
    {
        return [
            'name' => $data['name']
        ];
    }
}
