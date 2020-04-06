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
}
