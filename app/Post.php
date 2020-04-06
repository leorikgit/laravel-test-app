<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

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
