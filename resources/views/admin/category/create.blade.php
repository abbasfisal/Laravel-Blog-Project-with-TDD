@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Create new Category</h4>

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
