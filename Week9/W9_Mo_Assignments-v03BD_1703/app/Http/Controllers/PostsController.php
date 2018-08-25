<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;

class PostsController extends Controller
{
    function returnView(){
        return view('posts');
    }

//    function getPosts(){
//        $posts = posts::orderBy("created_at", "desc")->paginate(10);
//        return view("posts")->with('posts', $posts);
//    }

    public function index()
    {
//        $posts = Post::all();
        $posts = posts::orderBy("created_at", "desc")->paginate(10);
        return view("posts")->with('posts', $posts);
    }
}
