@extends('adminlte::page')

@section('title', 'Countries - Cinerama')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Countries</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" href="{{route('countries.create')}}" class="btn btn-success">Create</a>
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
                    @forelse ($countries as $country)
                        <tr>
                            <th scope="row">
                                {{ ($countries->currentpage() - 1) * $countries->perpage() + ($loop->index + 1) }}
                            </th>
                            <td>{{ $country->name }}</td>
                            <td>
                                <a href="{{ route('countries.edit', $country) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('countries.destroy', $country) }}" method="POST" class="d-inline">
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
            {{ $countries->links() }}
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
