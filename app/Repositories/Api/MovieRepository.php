<?php

namespace App\Repositories\Api;

use App\Http\Resources\MovieResource;
use App\Interfaces\Api\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieRepository implements MovieRepositoryInterface
{

    public function index(array $options)
    {
        $search = $options['search'] ?? null;
        $searchBy = $options['search_by'] ?? 'slug';
        $page = $options['page'] ?? 1;
        $limit = $options['limit'] ?? 10;
        $sort = $options['sort'] ?? 'id';
        $order = $options['order'] ?? 'asc';
        $filter = $options['filter'] ?? null;

        $movies = Movie::query();

        if ($search) {
            $movies->where($searchBy, 'like', '%' . $search . '%');
        }

        if ($filter) {
            $start_year = $filter['start_year'];
            $end_year = $filter['end_year'];

            $movies->whereBetween('year', [$start_year, $end_year]);
        }

        $movies->orderBy($sort, $order);

        return $movies->paginate($limit, ['*'], 'page', $page);
    }

    public function show($id)
    {
        $movie = Movie::with('countries', 'genres')->findOrFail($id);

        return new MovieResource($movie);
    }
}
