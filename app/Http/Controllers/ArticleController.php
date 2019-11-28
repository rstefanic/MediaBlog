<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use Illuminate\Http\Request;
use Parsedown;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        $featured_article = $articles->first();
        $articles = $articles->where('id', '!=', $featured_article->id);

        return view('article.index', [
            'featured_article' => $featured_article,
            'articles' => $articles
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'unique:article', 'max:255'],
            'summary' => 'required',
            'body' => 'required',
            'image' => ['required', 'image']
        ]);

        // TODO: Verify body as being valid, and safe Markdown
        $image_path = request("image")->store('/uploads', 'public');

        //Replace spaces with '-'; strip special characters
        $slug = preg_replace('/[[:space:]]+/', '-', $data['title']);
        $slug = preg_replace('/[^A-Za-z0-9-]/', "", $slug);
        $slug = strtolower($slug);

        // Article::create takes an array of data in order to
        // create a new article, but request()->validate()
        // already returns an array of our data! So we can
        // just pass the array in to create()!
        // Article::create($data);

        auth()->user()->articles()->create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'body' => $data['body'],
            'image' => $image_path,
            'slug' => $slug
        ]);

        return redirect('/profile/' . auth()->user()->username);
    }

    public function show($article)
    {
        $article = Article::where('slug', '=', $article)->firstOrFail();

        $current_user = auth()->user();

        // TODO: Check to make sure the text passed to parsedown is safe
        $parsedown = new Parsedown();
        $body = $parsedown->text($article->body);

        $comments = $article->comments();
        $comments = $comments->with('user')->get();

        return view('article.show', [
            'article' => $article,
            'body' => $body,
            'current_user' => $current_user,
            'comments' => $comments
        ]);
    }

    public function edit($article)
    {
        $full_article = Article::where('slug', '=', $article)->firstOrFail();
        $this->authorize('update', $full_article); 
        return view('article.create', [
            'article' => $full_article
        ]);
    }
}
