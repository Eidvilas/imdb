@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h1>Admin area</h1>
                        <div>
                        <a href="/movie/create" class="btn btn-default btn-xs" style="padding:0px 10px"><h3>Add a movie</h3></a>
                        <a href="/actor/create" class="btn btn-default btn-xs" style="padding:0px 10px"><h3>Add an actor</h3></a>
                        </div>
                        <br>
                        <div>
                            {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
                            <div class="form-group">
                            {{Form::label('name', 'New Category')}}
                            {{Form::text('name')}}
                            </div>
                            <div class="form-group">
                            {{Form::label('description', 'Category Desctiprion')}}
                            {{Form::text('description')}}
                            </div>
                            <div class="form-group">
                            {{Form::submit('Submit', ['class'=>"btn btn-default"])}}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    <h3>List of categories</h3>
                        <ul>
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-2"><a href="/categorie/{{$category['id']}}"><h3>{{$category['name']}}</h3></a></div>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>

                    <h3>List of movies you added</h3>
                    @if(count($movies)>0)
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($movies as $movie)
                                <tr>
                                     <td>{{$movie['name']}}</td>
                                     <td><a href="/movie/{{$movie['id']}}/edit" class="btn btn-default">Edit</a></td>
                                     <td>
                                         {!!Form::open(['action'=> ['MovieController@destroy', $movie['id']] , 'method' => 'DELETE' ])  !!}
                                         {!! Form::submit('Delete', ['class'=>'btn btn-default'])!!}
                                         {!!Form::close() !!}
                                     </td>
                                 </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You haven't added any movies yet</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
