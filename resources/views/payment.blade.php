@extends('layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Payment</h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">Payment</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<section class="container mt-2 my-3 py-5">
    <div class="container mt-2 text-center">
        <h1>Payment</h1>
        @if(Session::has('total') && Session::get('total') !=null)
            @if(Session::has('order_id') && Session::get('order_id') !=null)
            <h4 style="color: blue" class="my-5">Total: ${{ Session::get('total') }}</h4>

                <div id="paypal-button-container"></div>
            @endif
        @endif
    </div>
</section>
@endsection
