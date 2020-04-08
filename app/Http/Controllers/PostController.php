<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function create(){


        return view('post.create');
    }
    public function pManyToMany(){
        //$post = Post::first();
        //$post->tags()->create(['name'=>'first tag']);
        $tag = Tag::findOrFail(1);
        dd($tag->posts);
    }
    public function pipeline(){

        $posts = Post::allPost();
        
       return view('post.pipeline', compact('posts'));
    }
}
