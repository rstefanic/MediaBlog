@extends('layouts.app')

@section('title', 'Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <ul>
                @foreach($tags as $tag) 
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
        
@endsection