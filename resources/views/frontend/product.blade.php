@extends('frontend.main.master')

@section('title', 'Product')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            color: #444444;
            background-color: #fff9e6; /* Warna latar belakang kuning muda */
        }

        a, a:hover {
            text-decoration: none;
            color: inherit;
        }

        .section-products {
            padding: 80px 0 54px;
            background: #fff9e6; /* Warna latar belakang kuning muda */
        }

        .section-products .header {
            margin-bottom: 50px;
        }

        .section-products .header h3 {
            font-size: 1.2rem;
            color: #fe302f; /* Warna merah tetap untuk header */
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .section-products .header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #444444;
        }

        .section-products .single-product {
            margin-bottom: 26px;
            border: none;
            padding: 10px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffffff, #f9f9f9);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section-products .single-product:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
        }

        .section-products .single-product .part-1 {
            position: relative;
            height: 290px;
            max-height: 290px;
            margin-bottom: 20px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .section-products .single-product:hover .part-1 {
            transform: scale(1.05);
        }

        .section-products .single-product .part-1 ul {
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            opacity: 0;
            transition: bottom 0.4s, opacity 0.4s;
        }

        .section-products .single-product:hover .part-1 ul {
            bottom: 20px;
            opacity: 1;
        }

        .section-products .single-product .part-1 ul li {
            margin: 0 5px;
        }

        .section-products .single-product .part-1 ul li a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ffffff;
            color: #444444;
            text-align: center;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, color 0.3s;
        }

        .section-products .single-product .part-1 ul li a:hover {
            background-color: #fe302f; /* Warna merah pada hover */
            color: #ffffff;
        }

        .section-products .single-product .part-2 {
            text-align: center;
        }

        .section-products .single-product .part-2 .product-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .section-products .single-product .part-2 h4 {
            font-size: 1.2rem;
            color: #fe302f; /* Warna merah tetap untuk harga */
            font-weight: 700;
        }

        .btn-checkout {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background: #ffcc00; /* Warna kuning pada tombol */
            color: #fff;
            border-radius: 5px;
            font-weight: 500;
            transition: background 0.3s, transform 0.3s ease;
        }

        .btn-checkout:hover {
            background: #e6b800; /* Warna kuning lebih gelap saat hover */
            transform: scale(1.05); /* Efek memperbesar saat hover */
        }
    </style>

    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-{{$product->id}}" class="single-product">
                            <div class="part-1" style="background: url('{{$product->getFirstMediaUrl('product_image', 'thumb')}}') no-repeat center center / cover;">
                                <ul>
                                    <li><a href="{{route('addToCart', $product->id)}}"><i class="ti ti-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">{{$product->name}}</h3>
                                <h4 class="product-price">Rp. {{$product->price}},00</h4>
                                <a href="{{route('goCheckout', $product->id)}}" class="btn-checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
