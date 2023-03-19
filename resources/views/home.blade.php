@extends('adminlte::page')

@section('title', 'Cinerama')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="small-box bg-gradient-primary">
            <div class="inner">
                <h3 class="counting" data-count="{{$movie_count}}">0</h3>
                <p>Movies</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-play"></i>
            </div>
            <a href="{{route('movies.index')}}" class="small-box-footer">See more <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-12">

        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3 class="counting" data-count="{{$country_count}}">0</h3>
                <p>Countries</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-globe"></i>
            </div>
            <a href="{{route('countries.index')}}" class="small-box-footer">See more <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">

        <div class="small-box bg-gradient-navy">
            <div class="inner">
                <h3 class="counting" data-count="{{$genre_count}}">0</h3>
                <p>Genres</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-list"></i>
            </div>
            <a href="{{route('genres.index')}}" class="small-box-footer">See more <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script>
        $('.counting').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },
                {
                    duration: 500,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
        });
    </script>
@endsection
