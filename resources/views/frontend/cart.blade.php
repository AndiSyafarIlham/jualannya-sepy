@extends('frontend.main.master')

@section('title','Cart')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff9e6; /* Full width background color */
            color: #444444;
        }

        a, a:hover {
            text-decoration: none;
            color: inherit;
        }

        .cart-container {
            padding: 80px 0 54px;
            background-color: #fff9e6; /* Background warna kuning muda */
            width: 100%; /* Ensures full width */
        }

        .cart-container .header {
            margin-bottom: 50px;
            text-align: center;
        }

        .cart-container .header h3 {
            font-size: 1.2rem;
            color: #fe302f;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .cart-container .header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #444444;
        }

        .cart-table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 30px;
        }

        .cart-table thead th {
            background-color: #343a40;
            color: #ffffff;
            text-transform: uppercase;
            padding: 15px;
            text-align: center;
        }

        .cart-table tbody tr {
            text-align: center;
            transition: background-color 0.3s;
        }

        .cart-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .cart-table tbody td {
            padding: 20px;
            vertical-align: middle;
        }

        .cart-table img {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .btn-action {
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .btn-checkout {
            background-color: #ffcc00;
            color: #fff;
        }

        .btn-checkout:hover {
            background-color: #e6b800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
        }
    </style>

    <div class="cart-container">
        <div class="container">
            <div class="header">
                <h3>Your Shopping Cart</h3>
                <h2>Review Your Items</h2>
            </div>
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <th scope="row">{{$cart->id}}</th>
                            <td>
                                <img src="{{$cart->product->getFirstMediaUrl('product_image', 'thumb')}}" alt="{{$cart->product->name}} Image">
                            </td>
                            <td>{{$cart->product->name}}</td>
                            <td>Rp. {{$cart->product->price}},00</td>
                            <td>
                                <a href="{{route('goCheckout',$cart->id)}}" class="btn btn-action btn-checkout">Checkout</a>
                                <a href="{{route('deleteCart',$cart->id)}}" class="btn btn-action btn-delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
