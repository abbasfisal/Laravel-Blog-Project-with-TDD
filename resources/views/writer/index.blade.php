@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h3>Writer Dashboard</h3>
            <h5 class="">Hi {{\Illuminate\Support\Facades\Auth::user()->name}} , welcome!</h5>
            <br>
            <div class="col-lg-6 rounded-3  m-auto shadow p-5 ">
                <div class="d-grid">
                    <a href="{{route('new.post.writer')}}" class="btn btn-primary ">create new Post</a>
                </div>
                <br>
                <div class="d-grid">
                    <a href="{{route('list.post.writer')}}" class="btn btn-primary ">Your Post List</a>
                </div>
            </div>
        </div>
    </div>

@endsection
