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
                        <a class="navbar-brand" href="#">Список заказов</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        </ul>
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
                        <th scope="col">Id</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Телефон</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orders)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>
                                    <a href="{{route('admin.orders.show', $order->id)}}" class="px-2 text-primary"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
