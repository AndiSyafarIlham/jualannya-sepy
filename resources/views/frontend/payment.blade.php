@extends('frontend.main.master')
@section('title', 'Payment')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Complete Your Payment</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <p><strong>Product Name:</strong> {{ $product_name }}</p>
            <p><strong>Price:</strong> Rp {{ number_format($product_price, 0, ',', '.') }}</p>
            
            <form action="{{ route('processPayment') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <input type="hidden" name="product_name" value="{{ $product_name }}">
                <input type="hidden" name="product_price" value="{{ $product_price }}">

                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
