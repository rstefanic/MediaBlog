{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--        <title>Laravel</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

{{--        <!-- Styles -->--}}
{{--        <style>--}}
{{--            html, body {--}}
{{--                background-color: #fff;--}}
{{--                color: #636b6f;--}}
{{--                font-family: 'Nunito', sans-serif;--}}
{{--                font-weight: 200;--}}
{{--                height: 100vh;--}}
{{--                margin: 0;--}}
{{--            }--}}

{{--            .full-height {--}}
{{--                height: 100vh;--}}
{{--            }--}}
{{--            .position-ref {--}}
{{--                position: relative;--}}
{{--            }--}}

{{--            .top-right {--}}
{{--                position: absolute;--}}
{{--                right: 10px;--}}
{{--                top: 18px;--}}
{{--            }--}}

{{--            .content {--}}
{{--                text-align: center;--}}
{{--            }--}}

{{--            .links > a {--}}
{{--                color: #636b6f;--}}
{{--                padding: 0 25px;--}}
{{--                font-size: 13px;--}}
{{--                font-weight: 600;--}}
{{--                letter-spacing: .1rem;--}}
{{--                text-decoration: none;--}}
{{--                text-transform: uppercase;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body>--}}
@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
{{--        <div class="top-right links">--}}
{{--            <a href="{{ url('/') }}">Home</a>--}}
{{--            <a href="{{ url('/donate') }}">Donate</a>--}}
{{--            <a href="{{ url('/about') }}">About</a>--}}
{{--            @auth--}}
{{--                <a href="/profile/{{ Auth::user()->username }}">Profile</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('register') }}">Register</a>--}}
{{--                <a href="{{ route('login') }}">Login</a>--}}
{{--            @endauth--}}
{{--        </div>--}}

        <div class="content">
            <div class="title">
                Media In Focus
            </div>

            <div class="row article-container d-flex align-items-center">
                @foreach($articles as $article)
                    <written-article
                        article_title="{{ $article->title }}"
                        article_img="{{ $article->articleHeroImage() }}"
                        author="{{ $article->user->name }}"
                        summary="{{ $article->summary }}"
                        slug="/article/{{ $article->slug }}"
                    ></written-article>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
{{--    </body>--}}
{{--</html>--}}
