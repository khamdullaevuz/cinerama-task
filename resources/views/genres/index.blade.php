@extends('adminlte::page')

@section('title', 'Genres - Cinerama')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Genres</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" href="{{route('genres.create')}}" class="btn btn-success">Create</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <p>Results</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($genres as $genre)
                        <tr>
                            <th scope="row">
                                {{ ($genres->currentpage() - 1) * $genres->perpage() + ($loop->index + 1) }}
                            </th>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a href="{{ route('genres.edit', $genre) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                </form></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nothing found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <br>
            {{ $genres->links() }}
        </div>
    </div>
@stop
