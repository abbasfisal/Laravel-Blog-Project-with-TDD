@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Your Post Lists</h4>

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
            <table class="table table-light table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col" class="text-center">opt</th>
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
                            <a href="{{route('edit.post.writer',$post->id)}}" class="btn btn-info">edit</a>
                            <a href="#" class="btn btn-info">delete</a>
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
