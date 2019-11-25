<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Article $article)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment_text = request()->json('comment');

        // TODO: maybe wrap this in a try/catch to make it
        // easier to notify the user when an error as occurred
        $comment = new Comment();
        $comment->fill(['comment' => $comment_text]);
        $comment->user()->associate(auth()->user());
        $comment->article()->associate($article);
        $comment->save();

        // TODO: Fix what is returned to the front end
        return $comment_text;
    }
}
