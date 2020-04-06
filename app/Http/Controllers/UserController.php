<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::findOrFail(1);
//         $user->phone()->create(['name' => 'super name']);
//        dd($user->phone->id);

    }
    public function oneToMany(){
        $user = User::findOrFail(1);
//        dd($user->posts);
        $post = Post::findOrFail(1);
        dd($post->user);
    }
    public function manyToMany(){
        $user = User::findOrFail(1);
        dd($user->roles()->get());
    }
    public function pOneToOne(){
//        $user = User::findOrFail(1);
//        $user->image()->create(['name'=>'first user image']);
        $post = Post::findOrFail(1);
        $post->image()->create(['name'=>'post image yay']);
    }
    public function pOneToMany(){
        $user = User::first();
        $user->comments()->create(['name' => 'awsome name from user one more time'] );
    }
}
