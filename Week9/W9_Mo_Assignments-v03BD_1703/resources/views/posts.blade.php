<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
@include('layouts.app')


<div class="container" style="background-color: mediumpurple">
    <a href="{{ url('/create_post')}}">
        <button type="button" class="btn btn-primary btn-lg float-right"
                style="border-radius: 45px">Add Post
        </button>
    </a>
    <div class="row">
        <!--<div class="col-sm-2" style="background-color: #005cbf; height: 100vh;">-->

        <!--</div>-->
        <div class="col-sm-8">
            <div class="container">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <div class="well jumbotron">
                            {{--TODO figure out how to acesss images in storage/app/avatars--}}
                            <img src="{{ URL::to('/storage/posts')}}/{{ $post->image }}"
                                 alt="whatever"
                                 class="float-left card-img-top">
                            <span class="text-primary"
                                  style="font-size: 22px">{{$post->title}}</span><br>
                            <span>{{$post->description}}</span>
                        </div>
                    @endforeach

                @else
                    <p>No Posts Found</p>
                @endif

                <div class="col-sm-4" style="background-color: #0c5460;">

                </div>

            </div>
        </div>

</body>
</html>