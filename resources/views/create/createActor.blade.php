@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Add a new actor</h1>
        <hr>
        <a href="/admin" class="btn btn-default">Go back</a>
        <hr>
        {!! Form::open(['action' => 'ActorsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Actor name')}}
            {{Form::text('name', '', ['class'=>'form-control', 'place-holder' =>'Actors name'])}}
        </div>
        <div class="form-group">
            {{Form::label('birthday', 'Actor\'s birth date: ')}}
            {{Form::date('birthday', \Carbon\Carbon::now())}}
            &nbsp
            &nbsp
            {{Form::label('deathday', 'Actor\'s death date: ')}}
            {{Form::date('deathday', \Carbon\Carbon::now())}}
        </div>
        <div class="form-group">
            {{Form::label('actors', 'Choose actor\'s movies ')}}
            <select class="js-example-basic-multiple" name="movie_id[]" multiple="multiple">
                @foreach($movie as $filmai)
                    <option value={{$filmai['id']}}>{{$filmai['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('photo', 'Photo upload')}}
            <input type="file" name="image">
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