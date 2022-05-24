@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto rounded-3 shadow">
            <br>
            <h4>Your Post Lists</h4>

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

            @if(!empty(session('update-fail')))
                <div class="alert alert-danger">
                    <b>{{session('update-fail')}}</b>
                </div>
            @endif
            @if(!empty(session('update-succ')))
                <div class="alert alert-success">
                    <b>{{session('update-succ')}}</b>
                </div>
            @endif

            @if(!empty(session('delete-succ')))
                <div class="alert alert-warning">
                    <b>{{session('delete-succ')}}</b>
                </div>
            @endif
            <table class="table table-light table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col" class="text-center">comments</th>
                    <th scope="col" class="text-center">edit</th>
                    <th scope="col" class="text-center">delete</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($posts as $post)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td class="text-center">
                            <a href="{{route('comment.post.writer',$post->id)}}"
                                class="badge badge-pill ">

                            <span class="  link-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path
                                                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                            {{$post->comments()->count()}}
                            </span>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('edit.post.writer',$post->id)}}" class="btn btn-warning">edit</a>
                        </td>
                        <td class="text-center ">
                            <form method="post" action="{{route('delete.post.writer',$post->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>

                            </form>
                        </td>

                    </tr>
                    @php($i++)
                @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>

@endsection
