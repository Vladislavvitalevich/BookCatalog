@extends('admin.layouts.main')

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Just an image -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="#">Редактировать информацию о книге <b>{{ $book->name }}</b></a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
                        <a href="{{route('admin.books.index')}}" class="my-2 my-sm-0 btn btn-success text-white" type="submit">Вернуться к списку книг</a>
                        <form class="d-inline" action="{{route('admin.books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white">Удалить книгу</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-start">
            <div class="col-md-6">
                <form method="post" action="{{route('admin.books.update', $book->id)}}"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Название книги <code>*</code></label>
                        <input required type="text" name="name" value="{{$book->name}}" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="author">Автор книги <code>*</code></label>
                        <input required type="text" name="author" value="{{$book->author}}" class="form-control" id="author">
                    </div>
                    <div class="form-group">
                        <label for="description">Краткое опимание <code>*</code></label>
                        <textarea required type="text" name="description" rows="3"  maxlength="255" class="form-control" id="description">{{$book->description}}"</textarea>
                        <small id="descriptionHelp" class="form-text text-muted">Максимальное количество символов <code>250</code></small>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Обложка книги </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{asset('storage/'.$book->image)}}" class="card-img-top w-75" alt="..." >
            </div>
        </div>
    </div>
@endsection
