<?php

namespace App\Providers;

use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\GenreRepositoryInterface;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\Api\MovieRepositoryInterface as ApiMovieRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Repositories\GenreRepository;
use App\Repositories\MovieRepository;
use App\Repositories\Api\MovieRepository as ApiMovieRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(ApiMovieRepositoryInterface::class, ApiMovieRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
