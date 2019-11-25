
@extends('layouts.app')

@section('content')
<div class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $image }}');">
    <div class="hero-text">
        <h1>
            {{ $title }}
        </h1>
        <h3>{{ $summary }}</h3>
        <h5>By: {{ $author }} </h5>
    </div>
</div>

<div class="container py-5">
    {!! $body !!}

    <div class="card author-info">
        <div class="card-header"><h2>Author</h2></div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <a href="/profile/{{ $author_username }}">
                            <img class="rounded-circle w-100" src="{{ $author_image }}" alt="Image of the Author">
                        </a>
                    </div>
                <div>
                    <h3><a href="/profile/{{ $author_username }}">{{ $author }}</a></h3>
                    <div class="bio pt-3">
                        {{ $bio }}
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
                        article-id="{{ $article_id }}"
                        profile_picture="{{ $user->profileImage() }}"
                        username="{{ $user->username }}"
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
