@extends("layouts.app")
@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <a href="{{url("/posts/$post->id/edit")}}" class="btn btn-default">
        <button class="btn btn-default">Edit</button>
    </a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    <br>
    <a href="{{url("/posts")}}"><button class="btn btn-dark">Go Back</button> </a>

@endsection