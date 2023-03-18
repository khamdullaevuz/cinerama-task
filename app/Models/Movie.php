<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'slug', 'description', 'poster', 'year', 'is_free'
    ];

    protected $casts = [
      'is_free' => 'boolean',
      'status' => 'boolean',
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movies_genres');
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'movies_countries');
    }

    public function poster(): Attribute
    {
        $pattern = "/http[s]?:\/\/(.*?)/";
        return Attribute::make(
            get: fn (string $value) => preg_match($pattern, $value) ? $value : asset('storage/' . $value),
        );
    }

}
