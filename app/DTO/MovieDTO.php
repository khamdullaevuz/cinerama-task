<?php

namespace App\DTO;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieDTO
{
    public static function toArray(array $data): array
    {
        $object = [
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'year' => $data['year'],
            'is_free' => !empty($data['is_free']),
            'description' => $data['description'],
        ];

        if(!empty($data['poster']))
        {
            $object['poster'] = self::uploadImage($data['poster']);
        }

        return $object;
    }

    private static function uploadImage($image)
    {
        if(Storage::exists($image)) {
            Storage::delete($image);
        }
        return $image->store('images', 'public');
    }
}
