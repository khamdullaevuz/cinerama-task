<?php

namespace App\Providers;

use App\Repositories\Api\MovieRepository as ApiMovieRepository;
use App\Repositories\Contract\Api\MovieRepositoryInterface as ApiMovieRepositoryInterface;
use App\Repositories\Contract\CountryRepositoryInterface;
use App\Repositories\Contract\GenreRepositoryInterface;
use App\Repositories\Contract\MovieRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Repositories\GenreRepository;
use App\Repositories\MovieRepository;
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
