@extends('admin.layouts.main')

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- Just an image -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="#">Информация о книге</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
                        <a href="{{route('admin.books.edit',$book->id)}}" class="my-2 my-sm-0 btn btn-warning text-white" type="submit">Редактировать информацию</a>
                        <a href="{{route('admin.books.index')}}" class="my-2 my-sm-0 btn btn-success text-white" type="submit">Вернуться к списку книг</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="card" style="width: 33%;">
                <img src="{{asset('storage/'.$book->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text pt-2">
                        <span class="badge badge-danger">{{$book->author}}</span>
                    </p>
                    <p class="card-text">{{$book->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
