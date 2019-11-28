
@extends('layouts.app')

@section('content')
<div class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $article->articleHeroImage() }}');">
    <div class="hero-text">
        <h1>
            {{ $article->title }}
        </h1>
        <h3>{{ $article->summary }}</h3>
        <h5>By: {{ $article->user->name }} </h5>
    </div>
</div>

<div class="container py-4">
    <div id="article-body">
        <article-body body="{{ $body }}"></article-body>
    </div>

    <div class="card author-info mt-5">
        <div class="card-header d-flex justify-content-between">
            <h2>Author</h2>
            @can('update', $article)
                <a href="/article/{{ $article->slug }}/edit" class="btn btn-primary">Edit This Post</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <a href="/profile/{{ $article->user->username }}">
                            <img class="rounded-circle w-100" src="{{ $article->user->profileImage() }}" alt="Image of the Author">
                        </a>
                    </div>
                <div>
                    <h3><a href="/profile/{{ $article->user->username }}">{{ $article->user->username }}</a></h3>
                    <div class="bio pt-3">
                        {{ $article->user->bio }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card comments-section mt-5">
        <div class="card-header"><h2>Comments</h2></div>
            <div class="card-body">
                @auth
                    <new-comment
                        article-id="{{ $article->id }}"
                        profile_picture="{{ $current_user->profileImage() }}"
                        username="{{ $current_user->username }}"
                    ></new-comment>
                @endauth

                @foreach($comments as $comment)
                    <hr>
                    <comment
                        username="{{ $comment->user->username }}"
                        profile_picture="{{ $comment->user->profileImage() }}"
                        date="{{ $comment->created_at }}"
                        comment="{{ $comment->comment }}"
                    ></comment>
                @endforeach
            </div>
    </div>
</div>
@endsection
