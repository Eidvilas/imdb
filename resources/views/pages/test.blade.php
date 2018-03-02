@extends('layouts.app')

@section('content')
    <h1>List of Movies</h1>
    @if(count($movies) > 0)
        @foreach($movies as $movie)
            <div class="container well col-md-3">
                <div class="row">
                    <div class="col-md-9">
                        <h3><a href="/movie/{{$movie['id']}}">{{$movie['name']}}</a></h3>
                        <p>{{$movie['year']}}</p>
                    </div>
                    <div class="col-md-1" style="position: relative; height: 80px;">
                        <div style="position: absolute; bottom: 0;">
                            <p>Rating:</p>
                        </div>

                    </div>
                    <div class="col-md-1">
                        <h1>{{$movie['rating']}}</h1>
                    </div>
                    @if(!Auth::guest())
                        <div class="col-md-1">
                            <a href="/movie/{{$movie['id']}}/edit" class="btn btn-default btn-block">Edit</a>
                            {!!Form::open(['action'=> ['MovieController@destroy', $movie['id']] , 'method' => 'DELETE' ])  !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-default btn-block'])!!}
                            {!!Form::close() !!}
                        </div>
                    @endif
                </div>

            </div>
        @endforeach
        {{$movies->links()}}
    @endif

@endsection

