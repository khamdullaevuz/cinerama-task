<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieCreateRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Country;
use App\Models\Genre;
use App\Services\MovieService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(protected MovieService $movieService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $movies = $this->movieService->all($request->all());

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('movies.create')
            ->with('genres', Genre::get(['name', 'id']))
            ->with('countries', Country::get(['name', 'id']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieCreateRequest $request): RedirectResponse
    {
        $this->movieService->store($request->validated());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('movies.show', ['movie' => $this->movieService->get($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('movies.edit')
            ->with('movie', $this->movieService->get($id))
            ->with('genres', Genre::get(['name', 'id']))
            ->with('countries', Country::get(['name', 'id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, string $id)
    {
        $this->movieService->update($request->validated(), $id);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->movieService->destroy($id);

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }
}
