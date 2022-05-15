@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 m-auto">
            <h4>Category List </h4>
            @if(!empty(session('success')))
                <div class="alert col-lg-6 m-auto alert-success rounded-3">
                    <b>{{session('success')}}</b>
                </div>
            @endif
            <table class="table table-light">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>slug</th>
                    <th>opts</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($categories as $cat )
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->slug}}</td>
                        <td>
                            <a href="{{route('edit.category.admin',$cat->id)}}"
                               class="btn btn-info">
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
