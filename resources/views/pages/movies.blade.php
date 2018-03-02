@extends('layouts.app')

@section('content')
    <h1>List of Movies</h1>
    @if(count($movies) > 0)
        <div class="container">
            <div class="row">
        @foreach($movies as $movie)

            <a href="/movie/{{$movie['id']}}">
                @if(isset($movie->photos->first()->filename))
                    <div class="col-md-4 well" style="background:url('/storage/images/{{$movie->photos->first()->filename}}'); background-size: cover; background-repeat: no-repeat; height: 200px; margin:0px; box-shadow: 0 0 10px black;
                            padding:0 15px 0 15px;">
                @else
                    <div class="col-md-4 well" style="background:url('https://www.samcodes.co.uk/project/geometrize-haxe-web/assets/images/xseagull.jpg.pagespeed.ic.iK66EGA15-.jpg'); background-size: cover; background-repeat: no-repeat; height: 200px; margin:0px; box-shadow: 0 0 10px black;
    padding:0 15px 0 15px;">
                @endif

                        <div class="row">
                            <div class="col">
                                &nbsp<span style="font-family: 'Acme', sans-serif, cursive; color: white; margin:0; paggind:0; background-color: black;  font-size: 30px">{{$movie['name']}}</span><br>
                                &nbsp<span style="font-family: 'Acme', sans-serif, cursive; color: white; margin:0; paggind:0; background-color: black; font-size: 25px">{{$movie['year']}}</span>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12" style="position: absolute; bottom: 10px;">
                                @if($movie['rating'])
                                    @for($i=1; $i<=$movie['rating']; $i++)
                                        <div style="float: right;">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/FA_star.svg/2000px-FA_star.svg.png" height="25">
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>
            </a>
        @endforeach
            </div>
        </div>
        {{$movies->links()}}
    @endif

@endsection





