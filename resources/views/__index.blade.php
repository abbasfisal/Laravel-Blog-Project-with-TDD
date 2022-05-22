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
        @foreach($posts as $post)
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
                <a href="{{route('single.post.guest',[$post->id,$post->slug])}}" class="btn btn-outline-success">read more...</a>
            </div>
        @endforeach
        {{$posts->links()}}
    </div>
</div>
</body>
</html>
