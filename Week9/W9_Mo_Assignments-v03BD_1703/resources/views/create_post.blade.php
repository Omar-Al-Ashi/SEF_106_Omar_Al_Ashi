@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Create Post</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', "Title")}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('description', "Description")}}
            {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

    

    {{--<div class="row justify-content-center">--}}

        {{--Avatar--}}
        {{--<div class="profile-header-container">--}}
            {{--<div class="profile-header-img text-center">--}}
                {{--<img class="rounded-circle" height="100" width="100" src="{{ URL::to('/storage/posts')}}/{{ $posts->image}}" />--}}
                {{--<!-- badge -->--}}
                {{--<div class="rank-label-container">--}}
                    {{--<span class="label label-default rank-label">{{$posts->image}}</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--<div class="row justify-content-center">--}}
        {{--<form action="/Week9/W9_Mo_Assignments-v03BD_1703/public/profile" method="post" enctype="multipart/form-data">--}}
            {{--@csrf--}}
            {{--<div class="form-group">--}}
                {{--<input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">--}}
                {{--<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
        {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection