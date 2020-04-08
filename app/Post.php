<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    protected $guarded = [];

    public static function allPost(){
        return $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class
            ])
            ->thenReturn()
            ->get();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }
    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
