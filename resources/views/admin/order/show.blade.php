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
                        <a class="navbar-brand" href="#">Информация о заказе</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
                        <a href="{{route('admin.orders.index')}}" class="my-2 my-sm-0 btn btn-success text-white" type="submit">Все заказы</a>

                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><code>№ Заказа</code> - {{$order->id}}</li>
                        <li class="list-group-item"><code>Имя</code> - {{$order->name}}</li>
                        <li class="list-group-item"><code>Телефон</code> - {{$order->phone}}</li>
                        <li class="list-group-item"><code>Email</code> - {{$order->email}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    @foreach($order->books as $book)
                    <div class="col-4">
                        <div class="card">
                                <img src="{{asset('storage/'.$book->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{$book->name}}</b></h5>
                                    <p class="card-text"><small class="text-muted">{{$book->author}}</small></p>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
