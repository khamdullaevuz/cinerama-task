@extends('adminlte::page')

@section('title', 'Movies - Cinerama')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Movies</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" href="{{route('movies.create')}}" class="btn btn-success">Create</a>
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
                        <th scope="col">Is free</th>
                        <th scope="col">Year</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <th scope="row">
                                {{ ($movies->currentpage() - 1) * $movies->perpage() + ($loop->index + 1) }}
                            </th>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->is_free ? 'Yes' : 'No' }}</td>
                            <td>{{ $movie->year }}</td>
                            <td>{{ $movie->status ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $movie->created_at }}</td>
                            <td><a href="{{ route('movies.show', $movie) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('movies.edit', $movie) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                </form></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nothing found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <br>
            {{ $movies->links() }}
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        e.preventDefault();
        let $form = $(this).closest('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete these records? This process cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                $form.submit();
            }
        })
    });
</script>
@endsection
