@extends('layouts.app')

@section('content')
    <h1>List of Actors</h1>
    @if(count($actors) > 0)
        @foreach($actors as $actor)
            <div class="container well">
                <div class="row">
                    <div class="col-md-11">
                        <h3><a href="/actor/{{$actor['id']}}">{{$actor['name']}}</a></h3>
                    </div>
                    @if(!Auth::guest())
                    <div class="col-md-1">

                            <a href="/actor/{{$actor['id']}}/edit" class="btn btn-default btn-block">Edit</a>
                            {!!Form::open(['action'=> ['ActorsController@destroy', $actor['id']] , 'method' => 'DELETE' ])  !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-default btn-block'])!!}
                            {!!Form::close() !!}

                    </div>
                    @endif
                </div>
            </div>
        @endforeach
        {{$actors->links()}}
    @endif

@endsection

