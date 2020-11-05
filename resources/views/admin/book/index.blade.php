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
                        <a class="navbar-brand" href="#">Список книг</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
                        <a href="{{route('admin.books.create')}}" class="my-2 my-sm-0 btn btn-success text-white" type="submit">Добавить книгу</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($books)
                        @foreach($books as $book)
                            <tr>
                                <td><a href="{{route('admin.books.show', $book->id)}}">{{$book->name}}</a></td>
                                <td>{{$book->author}}</td>
                                <td>
                                    <a href="{{route('admin.books.show', $book->id)}}" class="px-2 text-primary"><i class="fas fa-eye"></i></a>
                                    <form class="d-inline" action="{{route('admin.books.destroy', $book->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 px-2 text-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
