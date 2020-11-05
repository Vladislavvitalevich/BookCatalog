@extends('book.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Home Page</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Pretium quam vulputate dignissim suspendisse in est ante in nibh. Fames ac
                    turpis egestas sed tempus. Massa tempor nec feugiat nisl pretium. Diam maecenas ultricies mi eget
                    mauris pharetra et. Auctor eu augue ut lectus arcu bibendum at. Magna fringilla urna porttitor
                    rhoncus dolor purus non enim praesent. Facilisis sed odio morbi quis commodo. Amet justo donec enim
                    diam vulputate. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Pharetra et ultrices neque ornare
                    aenean euismod elementum nisi. Amet consectetur adipiscing elit duis tristique. Vitae ultricies leo
                    integer malesuada nunc vel risus.</p>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/carousel/1.jpg')}}" class="d-block w-100 figure-img img-fluid rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/carousel/3.jpg')}}" class="d-block w-100 figure-img img-fluid rounded" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
