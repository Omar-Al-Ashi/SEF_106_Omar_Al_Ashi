@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center" style="background-color: #C1F0F6">
        <h1>Blog Using Laravel</h1>
        <p>This is a blog created using laravel by Omar :)</p>
        <p>
            <a class="btn btn-primary btn-lg"
               href="{{url("/login")}}"
              role="button">Login</a>
            <a class="btn btn-success btn-lg"
               href="{{url("/register")}}"
               role="button">Register
            </a>
        </p>
    </div>
@endsection