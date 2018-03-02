@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit a movie</h1>
        <hr>
        <a href="/admin" class="btn btn-default">Go back</a>
        <hr>
        {!! Form::open(['action' => ['MovieController@update', $movie['id']], 'method' => 'PUT', 'enctype' =>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Movie Title')}}
            {{Form::text('name', $movie['name'], ['class'=>'form-control', 'place-holder' =>'Movie title'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Select Movie Category: ')}}
            {{Form::select('category', $category)}}
            &nbsp
            &nbsp
            {{Form::label('year', 'Year: ')}}
            {{Form::selectRange('year', 2018, 1950)}}
        </div>
        <div class="form-group">
            {{Form::label('actors', 'Choose movie actor or actors from a list: ')}}
            <select class="js-example-basic-multiple" name="actor_id[]" multiple="multiple">
                @foreach($actor as $aktorius)
                    <option value={{$aktorius['id']}}>{{$aktorius['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $movie['description'], ['class'=>'form-control', 'place-holder' =>'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('photo', 'Photo upload')}}
            <input type="file" name="image">
        </div>
        <div class="form-group">
            {{Form::label('remove', 'Photo remove')}}
            <div class="jumbotron">
                <div class="row">
                    @foreach($image as $img)
                    <div class="col-md-4">
                        <img style="max-width: 100%; height: auto;" src="/storage/images/{{$img['filename']}}">
                        <input type="checkbox" name="image_id[]" value="{{$img['id']}}"><br>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        {{Form::submit('Submit', ['class'=>"btn btn-default"])}}
        {!! Form::close() !!}
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
