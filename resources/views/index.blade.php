@extends('layouts.user')

@section('content')
    <div id="page_content">

        <!--HEADER IMAGE-->
        <section id="bg-top-stories-img" class="bg-top-stories-img">
            <div class="overlay"></div>
        </section>

        <section id="search">
            <div class="container">
                <div class="row pt-sm-5">
                    <div class="col-12 col-lg-4 order-2 order-md-1">


                        <section id="popular_post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        {{--poplular post--}}

                                    </div>
                                </div>
                            </div>
                        </section>

                        {{--tags--}}
                        <section id="tags">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 pr-0 pl-0">
                                        <div class="outer_tag mt-4">
                                            <h2 class="main_tag">Tags</h2>
                                            <div class="inner_tag">
                                                <div class="tag_text">
                                                    @foreach($tags as $tag)
                                                        <span><a href="">{{$tag['title']}}</a></span>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-8 pt-sm-4 pt-md-0 pt-lg-0 order-1 order-md-2">
                    @foreach($posts as $post)
                        <!--..................MINIMAL POST....-->
                            <div class="minimal_image mt-sm-10 mt-md-0 mt-lg-0">
                                <section class="min-post">
                                    <img src="{{$post->cover}}" alt="Blog Image">
                                </section>
                            </div>
                            <div class="text_minimal">
                                <a class="text-black" href="{{route('single.post.guest',[$post->id,$post->slug])}}">
                                    <h2>{{\Illuminate\Support\Str::upper($post->title)}}</h2>
                                </a>
                                <br>
                                <div class="display">
                                    <p class="badge-pill bg-info">{{$post->created_at->diffForHumans()}}</p>
                                    <div class="verticle_line margin_1 bg-black"></div>&nbsp;

                                    <p class="badge-pill bg-primary">
                                        {{$post->comments()->where('show',true)->count()}} comments
                                    </p>
                                    &nbsp;<div class="verticle_line margin bg-black"></div>
                                    &nbsp;<h5>
                                        <a href="{{route('get.post.writer' ,$post->writer_id)}}">
                                            {{$post->writer->name}}
                                        </a>
                                    </h5>
                                </div>
                                <p class="sub-heading text-grey">
                                    {!!\Illuminate\Support\Str::limit($post->body,400) !!}
                                </p>
                            </div>

                           <div class="divider"></div>


                    @endforeach


                    <!--..........PAGINATION..........-->
                        {{$posts->links()}}


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
