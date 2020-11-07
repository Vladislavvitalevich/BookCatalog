@extends('book.layouts.main')

@section('content')
    <div class="container">
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
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$book->image)}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="">{{$book->name}}</a></h5>
                            <p class="card-text">{{$book->description}}</p>
                            <p class="card-text"><small class="text-muted">{{$book->author}}</small></p>
                            <!-- Button trigger modal -->
                            <button type="button" data-id="{{$book->id}}" class="btn btn-outline-primary orderModal" data-toggle="modal" data-target="#orderModal">
                                Заказать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="comments" class="row bg-white">
            <div class="col-md-12">
                <h2>Коментарии</h2>
                <hr>
                <form action="{{route('comment.saveComment')}}" method="post" class="border p-2 w-100">
                    @csrf
                    <input type="hidden" name="bookId" value="{{$book->id}}">

                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" required name="name" id="name" aria-describedby="nameHelp">
                        <small id="nameHelp" class="form-text text-muted">Введите ваше имя</small>
                    </div>
                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <textarea class="form-control" maxlength="500" name="comment" required id="comment" rows="3"></textarea>
                        <small id="commentHelp" class="form-text text-muted">Максимальное количество символов <code>500</code></small>

                    </div>
                    <button type="submit" class="btn btn-primary w-100" >Опубликовать</button>
                </form>
            </div>
        </div>
        @if($book->comments->count() > 0)
            @foreach($book->comments as $comment)
                <div class="row">
                    <div class="col-12">
                        <div class="media border p-2">
                            <img src="https://image.flaticon.com/icons/png/128/2232/2232688.png" class="mr-3" style="width: 64px;" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">{{$comment->name}}</h5>
                                {{$comment->comment}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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
