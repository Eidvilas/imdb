@extends('layouts.app')

@section('content')
    <a href="/actors" class="btn btn-default">Go back</a>
    <h1>{{$actor['name']}}</h1>
    <p>{{$actor['birthday']}}</p>
    <p>
        @if($actor['deathday'])
            {{$actor['deathday']}}
        @endif
    </p>

    @if($actor)
        <div class="container">
            <div class="row">
                <div class="col-md-8 jumbotron">
                    @if(count($actor->movies)>0)
                        <h3>Actor's Movies:</h3>
                        <ul>
                            @foreach($actor->movies as $aktorius)
                                <li><a href="/movie/{{$aktorius['id']}}" >{{$aktorius['name']}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <h3>Actor has no movies listed</h3>
                    @endif
                </div>
                <div class="col-md-4">
                    @if (count($image)>0)
                        <div class="bxslider">
                            @foreach($image as $img)
                                <div><img style= "100%" src="/storage/images/{{$img['filename']}}"></div>
                            @endforeach
                        </div>
                    @else
                        <img style= "100%" src="/storage/images/noimage.jpg">
                    @endif
                </div>
            </div>
        </div>
    @endif
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

