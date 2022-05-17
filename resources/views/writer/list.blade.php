@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Your Post Lists</h4>
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
                                <a href="#" class="btn btn-info">edit</a>
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
