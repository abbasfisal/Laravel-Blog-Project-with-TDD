@extends('layouts.app')

@section('content')

    <div class="col-lg-6 m-auto">
        <h4>Create New Writer</h4>

        @if(!empty(session('success')))
            <div class="aler alert-success text-center">
                {{session('success')}}
            </div>
        @endif

        <form method="post" action="{{route('store.writer.admin')}}">
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
