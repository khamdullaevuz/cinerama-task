<?php

namespace App\DTO;

use Illuminate\Support\Str;

class MovieDTO
{
    public static function toArray(array $data): array
    {
        return [
            'title' => $data['title'],
            'poster' => self::uploadImage($data['poster']),
            'slug' => Str::slug($data['title']),
            'year' => $data['year'],
            'is_free' => !empty($data['is_free']),
            'description' => $data['description'],
        ];
    }

    private static function uploadImage($image)
    {
        return $image->store('images', 'public');
    }
}
