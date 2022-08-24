@extends('layouts.main')

@section('content')

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

<div class="container-fluid ">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">Delicious Snacks</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach ($product_array as $product)

                <div class="row align-items-center mb-5 text-center">
                    <div class="col-12 col-sm-12">
                        <div class="col-lg-6 col-sm-6">
                        <h5 style ="width: 66px"; class="menu-price">${{ $product->price }}</h5>
                        </div>
                        <img style="width:200px;" class=" rounded-circle mb-3 mb-sm-0" src="{{ asset('img/'.$product->image) }}" alt="">
                    </div>
                    <div class="col-12 col-sm-12 mt-5">
                        <h4>{{ $product->name }}</h4>
                        <p class="m-0">{{ $product->description }}</p>
                    </div>
                    <form class="mx-auto mt-3" method="POST" action="{{ route('add_to_card') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="image" value="{{ $product->image }}">

                        <input type="submit"value="Add to Card" name="" class="btn btn-primary">

                    </form>
                </div>
                @endforeach


            </div>

        </div>
    </div>
</div>
<!-- Menu End -->


@endsection
