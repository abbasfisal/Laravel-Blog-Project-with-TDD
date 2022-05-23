<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Themes Industry">
    <!-- description -->
    <meta name="description"
          content="Product is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and HTML5 template with 14 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords"
          content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, faq">
    <!-- Page Title -->
    <title>Blog</title>
    <link rel="stylesheet" href="{{asset('blog/css/jquery.fancybox.min.css')}}">
    <!-- Favicon -->
    <link rel="icon" href="../blog/img/favicon.ico">
    <!-- Bundle -->
    <link rel="stylesheet" href="{{asset('blog/css/bundle.min.css')}}">
    <!-- Plugin Css -->

    <link rel="stylesheet" href="{{asset('blog/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/mejs-controls.svg')}}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">

</head>

<body data-spy=" " data-target=".navbar" data-offset="150">

<!--  PRELOADER  -->
<div class="loader-area">
    <div class='loader'>
        <div class='one'></div>
        <div class='two'></div>
        <div class='three'></div>
    </div>
</div>

<!--<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>-->

<!-- START NAVBAR SECTION -->
<header>

    <nav id="my-nav" class="navbar navbar-expand-lg navbar-light rounded-bar fixed-navbar">
        <div class="row w-100 m-0">
            <div class="col-3 p-0 mt-3 mt-md-4">
                <ul class="navbar-icons">
                    <li class="navbar_list"><i class="lab la-facebook-f"></i></li>
                    <li class="navbar_list"><i class="lab la-twitter"></i></li>
                    <li class="navbar_list"><i class="lab la-linkedin-in"></i></li>
                </ul>
            </div>

            <div class="col-6">
                <div class="logo ml-auto mr-auto width-logo text-center mt-2 mt-md-3">
                    <a href="{{route('index.guest')}}">
                        <img src="{{asset('blog/images/logo.png')}}" alt="Logo Img"></a>
                </div>
            </div>

            <div class="col-3 p-0 text-right">
                <div class="menu-btn mt-3 mt-md-4">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

    </nav>

    <div class="outer-wrapper">
        <div class="overlay1">

            <a class="close-outerwindow"><i class="las la-times"></i></a>

            <nav class="navbar-1 w-100">

                <div class="row text-center">

                    <div class="col-12">
                        <div class="logo-img text-center">
                            <a href="#">
                                <img src="{{asset('blog/images/logo.png')}}" alt="Logo Img"></a>
                        </div>
                        <ul class="navbar-nav mt-5 text-center small-nav">
                            <li class="nav-item"><a class="nav-link active" href="{{route('index.guest')}}">Home</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Top Stories</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Blogs</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                            @auth()
                                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                            @endauth
                            @guest()
                                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            @endguest

                        </ul>
                        <ul class="footer_ul text-center mt-3 margin-top">
                            <li class="footer_list"><i class="lab la-facebook-f"></i></li>
                            <li class="footer_list"><i class="lab la-twitter"></i></li>
                            <li class="footer_list"><i class="lab la-google-plus"></i></li>
                            <li class="footer_list"><i class="lab la-linkedin-in"></i></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>

</header>

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
                                <h5><a href="{{route('register')}}" class="badge-pill badge-warning">Register</a></h5>
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

<!-- JavaScript -->
<script src="{{asset('blog/js/bundle.min.js')}}"></script>

<!-- Plugin Js -->
<script src="{{asset('blog/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('blog/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('blog/js/jquery.cubeportfolio.min.js')}}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{asset('blog/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('blog/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- custom script -->
<script src="{{asset('blog/js/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('blog/js/wow.min.js')}}"></script>
<script src="{{asset('blog/js/script.js')}}"></script>

</body>
</html>
