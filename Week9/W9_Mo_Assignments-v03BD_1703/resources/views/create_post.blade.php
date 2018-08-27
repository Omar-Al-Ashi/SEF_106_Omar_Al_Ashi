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
@endsection