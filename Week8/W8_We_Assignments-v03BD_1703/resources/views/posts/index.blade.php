@extends("layouts.app")
@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <a href="{{url("/posts/". $post->id)}}">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->body}}</p>
                </a>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found</p>
    @endif
@endsection