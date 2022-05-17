@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h3>Writer Dashboard</h3>
            <br>
            <div class="col-lg-9  m-auto">
                <a href="{{route('new.post.writer')}}" class="btn btn-info " >create new Post</a>
            </div>
        </div>
    </div>

@endsection
