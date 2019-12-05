@extends('layouts.app')

@section('title', 'Tags')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <ul>
                @foreach($tags as $tag) 
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-4">
            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                <h2>New Tag</h2>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing mt-3']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection