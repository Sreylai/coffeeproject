@extends('layouts.main')

@section('content')
 <!-- Navbar Start -->
 <div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="index.html" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text" style="color: blue;">ឈូករ័ត្ន</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="index" class="nav-item nav-link">Home</a>
                <a href="about_us" class="nav-item nav-link">About</a>

                <a href="product" class="nav-item nav-link active">Menu</a>

                <a href="contact" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">Menu</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">Competitive Pricing</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h1 class="mb-5">Hot Drinks</h1>
                @foreach ($Drinks as $drink)

                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{asset ('img/'.$drink->image) }} " alt="">
                        <h5 class="menu-price" style="font-size: 14px;font-weight:bold"  >${{$drink->price }}</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4> <a href="{{route( 'single_products',['id'=>$drink->id]) }}">{{ $drink->name }}</a></h4>
                        <p class="m-0">{{ $drink->description }}</p>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="col-lg-6">
                <h1 class="mb-5">Delicious Snacks</h1>
                @foreach ($Snacks as $snack)

                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{asset ('img/'.$snack->image) }}" alt="" >
                        <h5 class="menu-price" style="font-size: 14px;font-weight:bold">${{$snack->price }}</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4> <a href="{{ route('single_products',['id'=>$snack->id]) }}">{{ $snack->name }} </a></h4>
                        <p class="m-0">{{ $snack->description }}</p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
<!-- Menu End -->



@endsection
