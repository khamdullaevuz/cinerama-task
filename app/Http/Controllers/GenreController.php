<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(protected GenreService $genreService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $genres = $this->genreService->all($request->all());

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('genres.create')->with('genre', new Genre());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request): RedirectResponse
    {
        $this->genreService->store($request->validated());
        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $genre = $this->genreService->find($id);
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, string $id)
    {
        $this->genreService->update($request->validated(), $id);

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->genreService->destroy($id);
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
