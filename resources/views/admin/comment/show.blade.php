@extends('admin.layouts.main')

@section('content_header')
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
        <div class="row">
            <div class="col">
                <!-- Just an image -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="#">Комментарии к книге <b>{{$book->name}}</b></a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
                        <a href="{{route('admin.comments.index')}}" class="my-2 my-sm-0 btn btn-success text-white" type="submit">Книги имеющие комментарий </a>

                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            @foreach($comments as $comment)
                <div class="card w-100" >
                    <div class="card-body">
                        <h5 class="card-title">{{$comment->name}}</h5>
                        <p class="card-text">{{$comment->comment}}</p>
                        <br>
                        <form class="d-inline" action="{{route('admin.comments.destroy', $comment->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-danger border-0 px-2 text-white">
                                 Удалить комментарий <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
