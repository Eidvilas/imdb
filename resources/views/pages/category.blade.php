@extends('layouts.app')

@section('content')
    <a href="/categories" class="btn btn-default">Go back</a>
    @if(count($category) > 0)
        <h1>{{$category['name']}}</h1>
        <p>{{$category['description']}}</p>
        <ul class="list-group">
            @foreach($movies as $movie)
                <li class="list-group-item">
                            <div class="container">
                                <div class="row">

                                        <div class="col-md-2"><a href="/movie/{{$movie['id']}}"><h3>{{$movie['name']}}</h3></a></div>
                                        <div class="col-md-2 center-block"><h3>({{$movie['year']}})</h3></div>

                                </div>
                            </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

