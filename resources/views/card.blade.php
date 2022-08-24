@extends('layouts.main')

@section('content')
    <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
                <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Card</h1>
                <div class="d-inline-flex mb-lg-5">
                    <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                    <p class="m-0 text-white px-2">/</p>
                    <p class="m-0 text-white">Card</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!--Card-->
        <div class="container-fluid pt-5">
            <div class="container">
                <section class="cart container mt-2 my-3 py-5">
                    <div class="container mt-2">
                        <h4>Your Card</h4>
                    </div>
                    <table class=" table pt-5">
                        <tbody>
                            <tr style="background-color: blanchedalmond  " >
                                <th style="width: 50%">Product</th>
                                <th style="width: 50%">Quantity</th>
                                <th style="width: 50%">Subtotal</th>
                            </tr>
                            @if(Session::has('card'))
                            @foreach (Session::get('card') as $product)
                            <tr>
                                <td>
                                    <div class="product-info ">
                                        <img class=" rounded-circle mb-3 mb-sm-0"src="{{ asset('img/'.$product['image']) }}" alt="" width="20%" >
                                        <div class="col-lg-6 col-sm-6">

                                            <p>{{ $product['name'] }}</p>
                                            <small><span>$</span>{{ $product['price'] }}</small>
                                        </div>
                                        <div>
                                            <br>
                                            <form method="POST" action="{{ route('remove_from_card') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                                <input type="submit" name="remove_btn" class="remove_btn" value="remove">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('edit_product_quantity') }}">
                                        @csrf
                                        <input type="submit" value="-" class="edit-btn" name="decrease_product_quantity_btn">
                                        <input type="hidden" name="id" value="{{ $product['id'] }}">

                                        <input type="text" name="quantity" value="{{ $product['quantity'] }}" readonly style="width: 50px">
                                        <input type="submit" name="increase_product_quantity_btn" class="btn-edit  " value="+">
                                    </form>
                                </td>
                                <td>
                                    <span class="product-price">${{ $product['price'] *$product['quantity']}}</span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="cart-total float-right">
                            <table>
                                    @if(Session::has('card'))
                                 <tr>
                                        <td><b>Total: </b></td>
                                            @if(Session::has('total'))
                                        <td>${{ Session::get('total') }}</td>
                                     @endif
                                </tr>
                                    @endif
                            </table>
                    </div>

                    <div class="checkout-container ">
                        @if(Session::has('total'))
                        @if(Session::get('total') !=null)
                        <form method="GET" action="{{ route('checkout') }}">
                            <input type="submit" class="btn btn-primary" value="Checkout" name="">
                        </form>
                        @endif
                        @endif
                    </div>
                </section>
            </div>
        </div>
        <!--End of card-->
    @endsection
