@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto ">
            <h3>Comments
            for <a href="{{route('single.post.guest',[$post[0]['id'],$post[0]['slug']])}}">{{$post[0]['title']}}</a>
            </h3>
            <a  class="btn btn-primary" href="{{route('dashboard.writer')}}">Back</a>

        @if(!empty(session('state')))
                <div class="alert alert-info">
                    <b>{{session('state')}}</b>
                </div>
            @endif
            <table class="table table-light table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">userName</th>
                    <th scope="col">text</th>
                    <th scope="col" class="text-center">approve</th>

                </tr>
                </thead>

                <tbody>
                @php($i=1)
                @foreach($post[0]['comments'] as $comment)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$comment['user']['name']}}</td>
                        <td>{{$comment['text']}}</td>
                        <td class="text-center">

                            @if($comment['show'])

                                <a href="{{route('state.comments.writer' , $comment['id'])}}">
                                <span class="badge bg-success ">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                          class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                 <path
                                     d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/></svg>
                                </span>
                                </a>
                            @else
                                <a href="{{route('state.comments.writer',$comment ['id'])}}">
                                <span class="badge bg-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/></svg>
                                </span>
                                </a>
                            @endisset
                        </td>
                    </tr>
                    @php($i++)
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection
