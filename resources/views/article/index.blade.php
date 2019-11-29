@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="content">
    @if($featured_article->count() > 0)
    <div class="home-hero-image" style="background-image: url({{ $featured_article->articleHeroImage() }});">
        <div class="home-hero-text">
            <h1>{{ $featured_article-> title }}</h1>
            <p class="home-hero-summary">{{ $featured_article->summary }}</p>
            <p class="home-hero-author">{{ $featured_article->user->name }}</p>
            <a class="btn btn-info" href="{{ $featured_article->buildFullPath() }}">Read More</a>
        </div>
    </div>
    @endif

    <div class="row article-container d-flex align-items-center">
        @foreach($articles as $article)
            <article-card
                article_title="{{ $article->title }}"
                article_img="{{ $article->articleHeroImage() }}"
                author="{{ $article->user->name }}"
                summary="{{ $article->summary }}"
                slug="{{ $article->buildFullPath() }}"
            ></article-card>
        @endforeach
    </div>
</div>
@endsection
