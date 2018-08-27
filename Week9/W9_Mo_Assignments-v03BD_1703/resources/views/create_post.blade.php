@extends('layouts.app')


@section('content')
    <div class="container">
        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('caption', 'Caption:') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}

        <div class="form-group">
            {{ Form::file('image')}}
        </div>

        {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}

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