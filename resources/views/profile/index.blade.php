@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body row">
                    <div class="col-3 p-5">
                        <img class="rounded-circle" src="{{ $user->profileImage() }}" alt="{{ $user->username }}'s Profile Picture" style="max-height: 100px;" />
                    </div>
                    <div class="col-9 pt-5 pl-5">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h3>{{ $user->username }}</h3>
                            @can('update', $user)
                                <a href="/article/create">Add Article</a>
                            @endcan
                        </div>
                        @can('update', $user)
                            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                        @endcan
                        <div class="d-flex">
                            <div class="pr-3"><strong>{{ $user->articles->count() }}</strong>
                                @if ($user->articles->count() === 1)
                                    article
                                @else
                                    articles
                                @endif
                            </div>
                            <div class="pr-3"><strong>{{ $comment_count }}</strong> comments</div>
                        </div>
                        <div>Member since <strong>{{ $created_on }}</strong></div>
                    </div>
                </div>

                <div class="card-body profile-bio">
                    <p>{{ $user->bio ?? "I have not written a bio yet!" }}</p>
                </div>

                @if ($user->articles->count() > 0)
                    <div class="card-body">
                        <h2>Recent Articles</h2>
                        <div class="row">
                            @foreach($user->articles as $article)
                                <div class="col-sm-12 mt-4 article-wrapper">
                                    <a href="/article/{{ $article->slug }}">
                                        <img src="/storage/{{ $article->image }}" class="article-img w-100" style="" />
                                        <div class="title-overlay">
                                            <div class="title-text">
                                                <h1>{{ $article->title }}</h1>
                                                <h5>{{ $article->summary }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
