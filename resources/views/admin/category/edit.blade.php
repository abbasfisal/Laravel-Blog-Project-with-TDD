@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto ">
            <h4>Edit a Category</h4>

            @if(!empty(session('success')))
                <div class="col-lg-6 m-auto rounded-2 alert-success text-center">
                    {{session('success')}}
                </div>

            @endif

            <form action="{{route('update.category.admin',$category->id)}}" method="post">
                @method('put')
                @csrf
                <div class="form-group col-lg-5 m-auto">
                    <label for="title">Title</label>
                    <input type="text"

                           value="{{$category->title ?: old('title')}}"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           placeholder="Enter Title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button
                        class="btn btn-primary"
                        type="submit">Update
                    </button>

                    <a href="{{route('list.category.admin')}}" class="btn btn-warning">Cacel</a>
                </div>
            </form>

        </div>
    </div>
@endsection
