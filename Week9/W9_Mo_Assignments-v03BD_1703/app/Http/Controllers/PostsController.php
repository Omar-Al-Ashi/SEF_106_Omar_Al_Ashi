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

    function create_post(){
        return view('create_post');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        //Create post
        $post = new Posts;
        $post->title = $request->input("title");
        $post->description = $request->input("body");
        $post->image = $request->input("image");
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect(url("/posts"))->with('success', 'Post Created');
    }
}
