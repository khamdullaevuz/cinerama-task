@extends('adminlte::page')

@section('title', 'Show movie')

@section('content_header')
    <div class="p-1 flex-grow-1">
        <h1 class="m-0 text-dark">Show movie</h1>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{$movie->poster}}" alt="{{$movie->title}}" class="card-img-top">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p><b>Title</b>: {{$movie->title}}</p>
                    <p><b>Description</b>: {{$movie->description}}</p>
                    <p><b>Countries</b>: {{implode(', ', $movie->countries()->pluck('name')->toArray())}}</p>
                    <p><b>Genres</b>: {{implode(', ', $movie->genres()->pluck('name')->toArray())}}</p>
                    <p><b>Year</b>: {{$movie->year}}</p>
                    <p><b>Status</b>: {{$movie->status ? 'Active' : 'Inactive'}}</p>
                    <p><b>Is free</b>: {{$movie->is_free ? 'Yes' : 'No'}}</p>
                </div>
            </div>
        </div>
    </div>
@stop
