@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h3>Writer Dashboard</h3>
            <h5>Hi {{\Illuminate\Support\Facades\Auth::user()->name}} , welcome!</h5>
            <br>
            <div class="col-lg-9  m-auto">
                <a href="{{route('new.post.writer')}}" class="btn btn-info " >create new Post</a>
                <a href="{{route('list.post.writer')}}" class="btn btn-info " >Your Post List</a>

            </div>
        </div>
    </div>

@endsection
