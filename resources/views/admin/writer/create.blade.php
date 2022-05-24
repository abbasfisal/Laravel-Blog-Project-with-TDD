@extends('layouts.app')

@section('content')

    <div class="col-lg-6 m-auto">
        <h4>Create New Writer</h4>
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
            <div class="aler alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <br>
        <form method="post" class="shadow p-5 rounded-3" action="{{route('store.writer.admin')}}">
            @csrf
            @method('post')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       value="{{old('name')}}"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       placeholder="Enter Name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <br>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       value="{{old('email')}}"
                       name="email"
                       placeholder="Enter email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <br>

            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="text"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                       placeholder="Enter Password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <br>
            <div class="form-group">
                <label for="password_confirmation">Enter Password Confirmation</label>
                <input type="text"
                       name="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       id="password_confirmation"
                       placeholder="Enter Password Confirmation">

                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <br>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
@endsection
