@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Writer Lists</h4>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col" class="text-center">opt</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($writers as $writer)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$writer->name}}</td>
                        <td>{{$writer->email}}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-info">Edit</a>
                            <a href="{{route('posts.writer.admin',$writer->id)}}" class="btn btn-info">show Posts</a>
                        </td>
                    </tr>
                    @php($i++)
                @endforeach


                </tbody>
            </table>
            {{$writers->links()}}


        </div>
    </div>
@endsection
