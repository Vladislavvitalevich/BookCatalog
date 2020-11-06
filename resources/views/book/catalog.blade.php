@extends('book.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Каталог литературы</h1>
                <p class="lead">Мир книг – самое замечательное творение человека. – Кларенс Шепард Дей;</p>
            </div>
        </div>
        <div class="row justify-content-center">
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
        <div class="row justify-content-center">
            @foreach($books as $book)
                <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/'.$book->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    <p class="card-text"><small class="text-muted">{{$book->author}}</small></p>
                </div>
                <div class="card-body">
                    <a href="{{route('catalog.getSingleBook',$book->id)}}" class="btn btn-outline-info">Подробнее</a>
                    <!-- Button trigger modal -->
                    <button type="button" data-id="{{$book->id}}" class="btn btn-outline-primary orderModal" data-toggle="modal" data-target="#orderModal">
                        Заказать
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    <div class="row">
        <div class="col-auto">
            {{ $books->links() }}
        </div>
    </div>
    @include('book.parts.modalOrder')
@endsection

@section('scripts')
    <script>
        $(function() {
            console.log( "ready!" );
            $('.orderModal').focus(function(){
                var bookId = this;
                $('#formBookOrder').append( "<input type='hidden' name='id' value=' " + bookId.dataset.id + " '/><br/>");
            });
        });
    </script>
@endsection
