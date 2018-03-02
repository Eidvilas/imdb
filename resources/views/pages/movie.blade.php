@extends('layouts.app')

@section('content')
    <a href="/movies" class="btn btn-default">Go back</a>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>{{$movie['name']}}</h1>
                <h3>{{$movie['year']}}</h3>
            </div>
            <div class="col-md-2">
                <p>Rating:</p>
                <h1>{{$movie['rating']}}</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{$movie['description']}}
                    <hr>
                    <h3>Movie actors:</h3>
                    <ul>
                        @foreach($movie->actors as $filmas)
                            <li><a href="/actor/{{$filmas['id']}}" >{{$filmas['name']}}</a></li>
                        @endforeach
                    </ul>
            </div>
            <div class="col-md-4">
                @if (count($image)>0)
                    <div class="bxslider">
                        @foreach($image as $img)
                            <div><img src="/storage/images/{{$img['filename']}}"></div>
                        @endforeach
                    </div>
                @else
                    <img style= "100%" src="/storage/images/noimage.jpg">
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.bxslider').bxSlider({
                mode: 'fade',
                captions: true,
                slideWidth: 400,
                adaptiveHeight: true,
            });
        });
    </script>
@endsection



