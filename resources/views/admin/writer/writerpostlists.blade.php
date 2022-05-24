@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11  m-auto ">
            <h4>
                <span class="alert-primary">{{$writer->name}}</span>
                All Posts
            </h4>
            <br>

            <a href="{{route('dashboard.admin')}}"
               class="link text-decoration-none link-warning border rounded-3 p-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Back
            </a>
            <br>
            <br>
            <div class="row mb-2">
                @foreach($paginate=$writer->posts()->paginate(2) as $post)
                    <div class="col-md-6">
                        <div
                            class="row g-0  rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">
                                    {{\Illuminate\Support\Str::limit($post->slug,40,'...')}}
                                </strong>
                                <h3 class="mb-0">{{Str::limit($post->title,20, ' ...')}}</h3>
                                <div class="mb-1 text-muted">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-calendar-day" viewBox="0 0 16 16">
  <path
      d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z"/>
  <path
      d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
                                    {{$post->created_at->diffForHumans()}}
                                    </span>
                                    |
                                    <span class=" rounded-3 link-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path
                                                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                        {{$post->comments()->count()}}
                                    </span>
                                </div>
                                <p class="card-text mb-auto">
                                    {{\Illuminate\Support\Str::limit($post->body,60,'...')}}.</p>
                                <br>


                                <a href="{{route('single.post.guest',[$post->id , $post->slug])}}"
                                   class=" text-decoration-none btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                    Continue reading
                                </a>

                            </div>
                            <div class="col-auto m-auto d-none d-lg-block">
                                <img src="{{$post->cover}}"
                                     class="rounded-3"
                                     width="200" height="200" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{$paginate->links()}}
        </div>
    </div>




@endsection
