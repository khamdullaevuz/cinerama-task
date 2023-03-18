@extends('adminlte::page')

@section('title', 'Create movie')

@section('content_header')
    <div class="p-1 flex-grow-1">
        <h1 class="m-0 text-dark">Create movie</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('movies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Title *</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title')}}" aria-describedby="titleHelp">
                        @error('title')
                        <div id="titleHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year">Year *</label>
                        <input type="text" name="year" class="form-control" id="year" placeholder="Year"
                               value="{{old('year')}}" aria-describedby="yearHelp">
                        @error('year')
                        <div id="yearHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" class="form-control" id="description" aria-describedby="descriptionHelp">{{old('description')}}</textarea>
                    @error('description')
                    <div id="descriptionHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="poster">Poster *</label>
                    <input type="file" name="poster" id="poster" class="form-control" aria-describedby="posterHelp">
                    @error('poster')
                    <div id="posterHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genres">Genres:</label>
                    <select name="genres[]" id="genres" class="form-control" multiple="multiple" aria-describedby="genresHelp">
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                    @error('genres')
                    <div id="genresHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="countries">Countries:</label>
                    <select name="countries[]" id="countries" class="form-control" multiple="multiple" aria-describedby="countriesHelp">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('countries')
                    <div id="countriesHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_free">Is free</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_free" name="is_free" @if(old('is_free')) checked @endif>
                        <label class="custom-control-label" for="is_free"></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#genres').select2({
                multiple: true,
                placeholder: 'Select genres',
            });
            $('#countries').select2({
                multiple: true,
                placeholder: 'Select countries',
            });
        });
    </script>
@endsection
