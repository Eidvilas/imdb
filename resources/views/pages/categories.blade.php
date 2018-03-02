@extends('layouts.app')

@section('content')
    <h1>Movies Categories</h1>
    @if(count($categories) > 0)
        @foreach($categories as $category)
            <a href="/categorie/{{$category['id']}}" class="btn btn-default btn-xs" style="padding:0px 10px"><h3>{{$category['name']}}</h3></a>
        @endforeach
    @endif
@endsection

