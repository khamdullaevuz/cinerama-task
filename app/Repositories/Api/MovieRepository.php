<?php

namespace App\Repositories\Api;

use App\Http\Resources\MovieResource;
use App\Interfaces\Api\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieRepository implements MovieRepositoryInterface
{

    public function index(Request $request)
    {
        $movies = Movie::with('countries', 'genres')->paginate($request->get('per_page', 10));

        return MovieResource::collection($movies);
    }

    public function show($id)
    {
        $movie = Movie::with('countries', 'genres')->findOrFail($id);

        return new MovieResource($movie);
    }
}
