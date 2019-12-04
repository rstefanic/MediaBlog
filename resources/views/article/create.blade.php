@extends('layouts.app')

@section('title', 'Add/Edit Article')

@section('content')
<div class="container">
    <form action="/article" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>Add New Article</h2>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                    <input id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" value="{{ old('title') ?? (isset($article) ? $article->title : '') }}" 
                        required 
                        autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="summary" class="col-md-4 col-form-label">{{ __('Summary') }}</label>
                    <input id="summary" 
                        type="text" 
                        class="form-control @error('summary') is-invalid @enderror" 
                        name="summary" value="{{ old('summary') ?? (isset($article) ? $article->summary : '') }}" 
                        required 
                        autocomplete="summary" autofocus>

                    @error('summary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label">{{ __('Body') }}</label>
                    <textarea id="body"
                        class="form-control @error('body') is-invalid @enderror" 
                        name="body"
                        rows="20"
                        required 
                        autocomplete="body" autofocus
                    >{{ old('body') ?? (isset($article) ? $article->body : "") }}</textarea>

                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-around">
                    <preview-article></preview-article>
                    <button onClick="window.open('https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet', 'Markdown Cheatsheet', 'width=800,height=600'); return false;" type="button" class="btn btn-info">Markdown Cheatsheet</button>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row">
                    <tag></tag>
                </div>

                <div class="row pt-4">
                    <button class="btn btn-success">Add New Article</button>
                </div>

            <div>
        </div> 
    </form>
</div>
@endsection
