<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    protected $table = "article";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); //->where('article_id', $this->id);
    }

    public function articleHeroImage()
    {
        return '/storage/' . $this->image;
    }
}
