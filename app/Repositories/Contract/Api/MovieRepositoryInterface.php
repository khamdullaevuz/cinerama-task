<?php

namespace App\Repositories\Contract\Api;

interface MovieRepositoryInterface
{
    public function index(array $options);

    public function show($id);
}
