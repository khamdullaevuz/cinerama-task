<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Services\Api\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(protected MovieService $movieService)
    {
    }

    public function index(Request $request)
    {
        return $this->movieService->index($request->toArray());
    }

    public function show($id)
    {
        return $this->movieService->show($id);
    }
}
