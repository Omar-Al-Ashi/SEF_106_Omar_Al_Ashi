<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
@include('layouts.app')


<div class="container" >
    <div class="row" >
        <!--<div class="col-sm-2" style="background-color: #005cbf; height: 100vh;">-->

        <!--</div>-->
        <div class="col-sm-8" style="background-color: #6f42c1;">
            <div class="container">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                <div class="well jumbotron">
                    {{--TODO figure out how to acesss images in storage/app/avatars--}}
                    <img src="{{ URL::to('/storage/avatars')}}/{{ $post->image }}.png"
                         alt="whatever"
                         class="float-left card-img-top">
                    <span class="text-primary" style="font-size: 22px">{{$post->title}}</span><br>
                    <span>{{$post->description}}</span>
                </div>
                    @endforeach

                @else
                    <p>No Posts Found</p>
                @endif
                {{--<div class="well jumbotron">--}}
                    {{--<img src="https://scontent-mrs1-1.cdninstagram.com/vp/653731d7215bcf738006b35b4f8179e7/5BFE8F5C/t51.2885-19/s150x150/19428812_1946634268909094_4244701150546231296_a.jpg"--}}
                         {{--alt="whatever"--}}
                         {{--class="float-left card-img-top">--}}
                    {{--<span class="text-primary" style="font-size: 22px">This is the title</span><br>--}}
                    {{--<span>This is the captions</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@if(count($posts) > 0)--}}
            {{--@foreach($posts as $post)--}}
                {{--<div class="well">--}}
                    {{--<a href="{{url("/posts/". $post->id)}}">--}}
                        {{--<h3>{{$post->title}}</h3>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            {{--{{$posts->links()}}--}}
        {{--@else--}}
            {{--<p>No Posts Found</p>--}}
        {{--@endif--}}
        <div class="col-sm-4" style="background-color: #0c5460;">

        </div>

    </div>
</div>

</body>
</html>