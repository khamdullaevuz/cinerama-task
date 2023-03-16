@extends('adminlte::page')

@section('title', 'Add country')

@section('content_header')
    <h1 class="m-0 text-dark">Add country</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('countries.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" aria-describedby="nameHelp">
                            @error('name')
                            <small id="nameHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
