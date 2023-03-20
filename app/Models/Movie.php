<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'slug', 'description', 'poster', 'year', 'is_free', 'status'
    ];

    protected $casts = [
      'is_free' => 'boolean',
      'status' => 'boolean',
    ];

    protected $appends = [
       'poster_url'
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movies_genres');
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'movies_countries');
    }

    public function getPosterUrlAttribute(): string
    {
        $pattern = "/http[s]?:\/\/(.*?)/";
        return preg_match($pattern, $this->poster) ? $this->poster : asset('storage/' . $this->poster);
    }
}
