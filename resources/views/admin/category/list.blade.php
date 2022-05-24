@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto">
            <h4>Category List </h4>
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
            <br>
        @if(!empty(session('success')))
                <div class="alert col-lg-6 m-auto alert-success rounded-3">
                    <b>{{session('success')}}</b>
                </div>
            @endif
            <table class="table table-light table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>slug</th>
                    <th class="text-center">opts</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($categories as $cat )
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->slug}}</td>
                        <td class="text-center">
                            <a href="{{route('edit.category.admin',$cat->id)}}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Edit
                            </a>


                        </td>
                    </tr>
                    @php($i++)
                @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
@endsection
