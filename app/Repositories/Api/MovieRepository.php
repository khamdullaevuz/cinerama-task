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
        $page = $options['page'] ?? 1;
        $limit = $options['limit'] ?? 10;
        $sort = $options['sort'] ?? 'id';
        $order = $options['order'] ?? 'asc';
        $filter = $options['filter'] ?? null;

        $movies = Movie::query();

        if ($search) {
            if(array_key_exists('id', $search)){
                $movies->where('id', 'like', '%' . $search['id'] . '%');
            }

            if(array_key_exists('slug', $search)){
                $movies->where('slug', 'like', '%' . $search['slug'] . '%');
            }
        }

        if ($filter) {
            if(array_key_exists('start_year', $filter) && array_key_exists('end_year', $filter)) {
                $start_year = $filter['start_year'];
                $end_year = $filter['end_year'];

                $movies->whereBetween('year', [$start_year, $end_year]);
            }

            if(array_key_exists('is_free', $filter))
            {
                $movies->where('is_free', (bool) $filter['is_free']);
            }

            if(array_key_exists('status', $filter))
            {
                $movies->where('status', (bool) $filter['status']);
            }
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
