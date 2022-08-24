@extends('layouts.main')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">CheckOut</h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">CheckOut</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!--Checkout-->
<section class="my-2 py-3 checkout">
    <div class="container text-center mt-1 pt-5">
        <h1>CheckOut</h1>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" action="{{ route('place_order') }}" method="POST">
            @csrf
            <div class="form-group checkout-small-element" >
                <label for="">Name</label>
                <input type="text" class="form-control" id="checkout_name" name="name" placeholder="name" required>
            </div>
            <div class="form-group checkout-small-element" >
                <label for="">Email</label>
                <input type="email" class="form-control" id="checkout_email" name="email" placeholder="email address" required>
            </div>
            <div class="form-group checkout-small-element" >
                <label for="">Phone</label>
                <input type="tel" class="form-control" id="checkout_phone" name="phone" placeholder="phone number" required>
            </div>
            <div class="form-group checkout-small-element" >
                <label for="">City</label>
                <input type="text" class="form-control" id="checkout_city" name="city" placeholder="city" required>
            </div>
            <div class="form-group checkout-large-element" >
                <label for="">Address</label>
                <input type="text" class="form-control" id="checkout_address" name="address" placeholder="address" required>
            </div>

            @if(Session::has('total'))
            @if(Session::get('total') !=null)


            <div class="form-group checkout-btn-container ">
                <p>Total amount: ${{ Session::get('total') }}</p>
                <input type="submit" class="btn" id="checkout-btn" name="checkout_btn" value="Checkout">
            </div>
            @endif
            @endif
        </form>

    </div>

</section>
<!--end of checkout-->








































@endsection
