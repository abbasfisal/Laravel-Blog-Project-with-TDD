@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto boder">

            <h5>admin dashbord</h5>

            <div class="col-lg-5 m-auto border">
                <a href="{{route('new.writer.admin')}}" class="btn btn-info">Create New Writer</a>
            </div>
        </div>
    </div>
@endsection
