@extends('layouts.app')


@section('content')
    {{--select 2 css/js--}}
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">

    {{--tinyMce js--}}
    <script src="{{asset('js/tinymce.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>

    <div class="row">
        <div class="col-lg-10  m-auto rounded-3 bg-white shadow ">
            <br>
            <h3>Edit Post</h3>
            <br>
            <a href="{{route('dashboard.writer')}}"
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
            <a class="btn btn-outline-info" target="_blank"
               href="{{route('single.post.guest',[$post->id ,$post->slug])}}">See {{$post->title}}</a>


            <form action="{{route('update.post.writer',$post->id)}}" method="post">

                @method('put')
                @csrf

                {{--Title--}}
                <br>

                <div class="form-group col-lg-9 m-auto">
                    <label for="title">Title</label>
                    <input type="text"
                           value="{{old('title')?? $post->title}}"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           placeholder="Enter Title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{--slug--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="slug">Slug</label>
                    <input type="text"
                           value="{{old('slug')??$post->slug}}"
                           class="form-control @error('slug') is-invalid @enderror"
                           id="slug"
                           name="slug"
                           placeholder="Enter Slug">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{--cover--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="cover">Image Cover</label>
                    <div class="input-group form-group col-lg-9 m-auto">
                       <span class="input-group-btn">
                         <a id="lfm" data-input="cover" data-preview="holder" class="btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                        <input id="cover" class="form-control @error('cover') is-invalid @enderror" type="text"
                               value="{{$post->cover}}"
                               name="cover">
                    </div>
                    <br>

                    @error('cover')
                    <span style="color: red" role="alert">
                             <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{--body--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="mytextarea">Description</label>
                    <textarea name="body" id="mytextarea"
                              class="@error('body') is-invalid @enderror"
                              placeholder="Enter Post Descriptions">
                        {{old('body')??$post->body}}
                    </textarea>

                    @error('body')
                    <span class="" style="color: red" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{--categories--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="categories">categories</label>
                    <select
                        id="categories"
                        class="js-example-basic-multiple-cat @error("categories") is-invalid @enderror form-control"
                        name="categories[]" multiple="multiple">

                        @php($cat_arr=[])
                        @foreach($post->categories as $pCat)
                            @php($cat_arr[$pCat->slug]=$pCat->title)
                        @endforeach

                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}"
                                {{\Illuminate\Support\Arr::has($cat_arr , $cat->slug) ? 'selected' : null}}
                            >{{$cat->title}}</option>
                        @endforeach
                    </select>

                    @error('categories')
                    <span class="" style="color: red" role="alert">
                      <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>

                {{--tags--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="tags">Tags</label>
                    <select class="js-example-basic-multiple @error("tags") is-invalid @enderror form-control"
                            name="tags[]" multiple="multiple">
                        @foreach($post->tags as $tag)
                            <option selected value="{{$tag->slug}}">
                                {{$tag->title}}
                            </option>
                            {{$tag->title}}
                        @endforeach

                    </select>

                    <br>
                    @error('tags')
                    <span class="" style="color: red" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <br>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Update Post</button>
                    </div>
                    <br>
                    <br>
                </div>

            </form>
        </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/standalone.js')}}"></script>
    <script src="{{asset('js/select2.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple-cat').select2({});
            $('.js-example-basic-multiple').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });

        });
    </script>
@endsection
