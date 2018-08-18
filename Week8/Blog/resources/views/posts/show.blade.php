@extends("layouts.app")
@section('content')
    <a href="{{url("/posts")}}"><button>Go Back</button> </a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
@endsection