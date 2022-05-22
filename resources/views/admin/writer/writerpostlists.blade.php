@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11  m-auto ">
            <h4>
                <span class="alert-primary">{{$writer->name}}</span>
                All Posts
            </h4>
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
                                <div class="mb-1 text-muted">{{$post->created_at->diffForHumans()}}</div>
                                <p class="card-text mb-auto">
                                    {{\Illuminate\Support\Str::limit($post->body,60,'...')}}.</p>
                                <a href="#" class="stretched-link">

                                    Continue reading</a>
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
