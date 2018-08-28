<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\posts;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function returnView(){
        return view('posts');
    }

    public function index()
    {
//        $posts = Post::all();
        $posts = posts::orderBy("created_at", "desc")->paginate(100);
        return view("posts")->with('posts', $posts);
    }

    function create_post(){
        return view('create_post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
        ]);

        $user = Auth::user();

        $post_name = $user->id . '_post' . time() . '.' . request()->image->getClientOriginalExtension();

        $request->image->storeAs('public/posts', $post_name);

        //Create post
        $post = new posts;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $post_name;
        $post->user_id = auth()->user()->id;

        $post->save();
        $posts = posts::orderBy("created_at", "desc")->paginate(100);
        return view("posts")->with('posts', $posts)->with('success', 'Post Created');


//        return view('posts')->with('success', 'Post Created');
//        return redirect(url("/posts"))->with('success', 'Post Created');
    }
}
