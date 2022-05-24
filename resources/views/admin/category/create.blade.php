@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Create new Category</h4>
            <br>
            <a href="{{route('dashboard.admin')}}"
               class="link text-decoration-none link-warning border rounded-3 p-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Back
            </a>
            <br>
            @if(!empty(session('success')))
                <div class="col-lg-6 m-auto rounded-2 alert-success text-center">
                    {{session('success')}}
                </div>

            @endif

            <form action="{{route('store.category.admin')}}" method="post">
                @method('post')
                @csrf
                <div class="form-group col-lg-5 m-auto">
                    <label for="title">Title</label>
                    <input type="text"
                           value="{{old('title')}}"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           placeholder="Enter Name">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button
                        class="btn btn-primary"
                        type="submit">Create
                    </button>

                </div>
            </form>

        </div>
    </div>
@endsection
