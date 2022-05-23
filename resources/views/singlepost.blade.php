@extends('layouts.user')
@section('content')
    <div id="page_content">


        <section id="search">
            <div class="container">
                <div class="row pt-lg-5">

                    <div class="col-sm-12 col-ms-8 col-lg-8">
                        <img src="{{$post->cover}}" alt="">
                        <br>
                        <br>
                        <h3>{{\Illuminate\Support\Str::upper($post->title)}}</h3>
                        <div class="text_minimal pt-0">
                            {!! $post->body !!}
                        </div>

                        <div class="written">
                            <div class="written_outerbox mt-5 display">
                                <div class="written_text">
                                    <p class="date text-black">WRITTEN BY</p>
                                    {{--writer--}}
                                    <a href="{{route('get.post.writer' ,$post->writer_id)}}">
                                        <h1 class="main_written text-black">{{$post->writer->name}}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="comment">


                            {{--show comments --}}

                            <div class="comment_write pt-5">
                                <h5>Comments</h5>
                                @if(!empty($post->comments))
                                    @foreach($post->comments as $comment)
                                        @if($comment->show)
                                            <div class="icon_comment">
                                                {{--<i class="far fa-user user_icon"></i>--}}
                                                <div class="icon_text">
                                                    <b class="badge bg-info">{{$comment->user->name}}</b>
                                                    <p class="date margin_days text-black">{{$comment->created_at->diffForHumans()}}</p>
                                                    <p class="sub-heading mt-1">
                                                        {{$comment->text}}
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- {{$comment->user->name}}
                                             {{$comment->text}}--}}
                                        @endif
                                    @endforeach
                                @endif


                            </div>
                            {{-- add comments form --}}
                            @guest()
                                <div class="divider"></div>
                                <div class="display mt-3 comment_text text-center">
                                    <h5><a href="{{route('login')}}" class="badge-pill badge-warning">Login</a></h5>
                                    &nbsp;<div class="verticle_line margin bg-black"></div>&nbsp;
                                    <h5><a href="{{route('register')}}" class="badge-pill badge-warning">Register</a>
                                    </h5>
                                    <h3>to Write a comment</h3>
                                </div>
                            @endguest
                            @auth()
                                <h1 class="comment_text text-black mt-6 mb-5">Write a comment</h1>
                            @endauth
                            <div class="row">
                                @auth()
                                    <div class="col-lg-9  m-auto mt-5">
                                        <h4 class="badge bg-success">add comment</h4>
                                        <form action="{{route('add.comment.user' ,$post->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <div class="form-group  m-auto">
                                                <textarea type="text"
                                                          class="form-control @error('text') is-invalid @enderror"
                                                          id="text"
                                                          name="text"
                                                          placeholder="Enter your comment">{{old('text')}}</textarea>
                                                @error('text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <br>
                                                @error('post_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <button
                                                    class="btn btn-large btn-primary padding_button w-100"
                                                    id="submit_btn"
                                                    type="submit">add a comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endauth
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-4 order-2 order-md-1 margin_small">

                        <section id="topics">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 pr-0 pl-0">
                                        <div class="topic_outerbox mt-4">
                                            <h2>Categories</h2>
                                            <div class="inner-box">
                                                <div class="tag_text">
                                                    @foreach($post->categories as $cat)
                                                        <span>
                                                    <a href="{{route('get.categories.post',$cat->id)}}"
                                                       class="badge badge-pill">{{$cat->slug}}</a>
                                                    </span>
                                                    @endforeach
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="popular_post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="outer_popular mt-4">
                                            <h2 class="text-black">Popular Post</h2>
                                            <div class="outer mt-4 display">
                                                <div class="popular_image">
                                                    <a href="detail-blog.html">
                                                        <img src="{{$post->cover}}" alt="popular image"></a>
                                                </div>
                                                <div class="text_post">
                                                    <p class="main"> Minimal Post...</p>
                                                    <p class="date">August 13, 2019 by</p><span>Mark Edison</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="tags">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 pr-0 pl-0">
                                        <div class="outer_tag mt-4">
                                            <h2 class="main_tag">Tags</h2>
                                            <div class="inner_tag">
                                                <div class="tag_text">
                                                    @foreach($post->tags as $tag)
                                                        <span>
                                                    <a href="{{route('get.tags.post',$tag->id)}}"
                                                       class="badge badge-pill">{{$tag->slug}}</a>
                                                    </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <!--  START FOOTER SECTION  -->
        <section id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <ul class="footer_ul">
                            <li class="footer_list"><i class="lab la-facebook-f"></i></li>
                            <li class="footer_list"><i class="lab la-twitter"></i></li>
                            <li class="footer_list"><i class="lab la-google-plus"></i></li>
                            <li class="footer_list"><i class="lab la-linkedin-in"></i></li>
                            <li class="footer_list"><i class="lab la-instagram"></i></li>
                            <li class="footer_list"><i class="las la-envelope"></i></li>
                        </ul>
                        <p class="info footer_text"><i class="far fa-copyright"></i>2020 MegaOne. Made with love by
                            themesindustry</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
