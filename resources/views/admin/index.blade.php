@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto ">

            <h5>admin dashbord</h5>

            <div class="col-lg-5 m-auto border">
                <a href="{{route('new.writer.admin')}}" class="btn btn-info">Create New Writer</a>
                <br>
                <br>
                <a href="{{route('new.category.admin')}}" class="btn btn-info">Create New Category</a>
                <a href="{{route('list.category.admin')}}" class="btn btn-info">Category Lists</a>
            </div>
        </div>
    </div>
@endsection
