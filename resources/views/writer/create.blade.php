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
        <div class="col-lg-10 border m-auto">
            <h3>Create new Post</h3>

            <form action="{{route('store.post.writer')}}" method="post">

                @method('post')
                @csrf

                {{--Title--}}
                <br>
                <div class="form-group col-lg-9 m-auto">
                    <label for="title">Title</label>
                    <input type="text"
                           value="{{old('title')}}this is my first title writing"
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
                           value="{{old('slug')}}this-is-my-first-title-writing"
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
                               value="http://blog.test/storage/photos/2/stream.jpg"
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
                        {{old('body')}}
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque harum illo neque, nulla odio possimus sed veniam. Atque consectetur cumque, distinctio enim est eum fugit laudantium quae quia, quod, sed.
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
                    <select class="js-example-basic-multiple-cat @error("categories") is-invalid @enderror form-control"
                            name="categories[]" multiple="multiple">
                        @foreach($categories as $cat   )
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
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
                        <option value="AL" selected>Alabama</option>
                        <option value="WY" selected>Wyoming</option>
                    </select>
                    <br>
                    @error('tags')
                    <span class="" style="color: red" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-info">Create New</button>
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
