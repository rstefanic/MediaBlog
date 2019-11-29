@extends('layouts.app')

@section('title', $article->title)

@section('content')
<view-article
    title="{{ $article->title }}"
    summary="{{ $article->summary }}"
    author="{{ $article->user->name }}"
    main_img="{{ $article->articleHeroImage() }}"
    body="{{ $body }}"
></view-article>

<div class="container py-4">
    <div class="card author-info">
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
