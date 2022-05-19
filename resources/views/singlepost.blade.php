<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
<div class="row">

    <div class="col-lg-11 m-auto ">

        <div class="card-body border rounded-3 mt-3">
            <div>
                    <span class="badge bg-info">
                    {{$post->created_at->diffForHumans()}}
                    </span> <b>|</b> writer:
                <span class="badge bg-primary">
                    {{$post->writer->name}}
                    </span>
            </div>
            <br>
            <img src="{{$post->cover}}"
                 class="rounded-2"
                 width="100" height="100" alt="">
            <br>
            {{$post->title}}<br>
            <p>
                {!! $post->body !!}
            </p><br>
            @foreach($post->tags as $tag)

                <a href="#" class="btn btn-outline-info">{{$tag->title}}</a>
            @endforeach
        </div>
        <br>
        {{--show comments--}}
        <div class="col-lg-10 border rounded-4 m-auto">
            <h5>Comments</h5>
            @if(!empty($post->comments))
                @foreach($post->comments as $comment)
                <div class="col-lg-8 border m-auto mt-4 rounded-2">
                    <span class="badge bg-info">
                        {{$comment->user->name}}
                    </span>
                    <b>
                        {{$comment->text}}
                    </b>
                </div>
                @endforeach
            @endif
        </div>

    </div>
</div>
</body>
</html>
