<?php

namespace App\Interfaces\Api;

use App\Http\Resources\MovieResource;
use Illuminate\Http\Request;

interface MovieRepositoryInterface
{
    public function index(Request $request);

    public function show($id);
}
