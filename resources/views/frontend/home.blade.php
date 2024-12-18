@extends('frontend.main.master')

@section('title','Home')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jualannya Sepy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff9e6; /* Warna kuning muda yang konsisten dengan tampilan Product */
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Section Styling */
        .hero-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 2rem auto;
            background-color: #f1faee; /* Background terang untuk hero */
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .hero-img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            filter: brightness(0.9);
            transition: transform 0.5s ease, filter 0.5s ease;
        }

        .hero-img:hover {
            transform: scale(1.05);
            filter: brightness(1);
        }

        .hero-text {
            font-size: 2.5rem;
            color: #1d3557; /* Warna teks kontras */
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
            margin-top: 1rem;
        }

        .highlight-text {
            color: #fe302f; /* Warna merah sebagai aksen */
            font-weight: bold;
        }

        /* Content Container */
        .content-container {
            background-color: #f1faee;
            color: #1d3557;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 4rem;
            margin-top: 2rem;
            animation: slideUp 1s ease-in-out;
        }

        .lead {
            font-size: 1.2rem;
            line-height: 1.8;
        }

        .btn-custom {
            background-color: #ffcc00; /* Warna kuning pada tombol */
            color: #fff;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e6b800; /* Warna kuning lebih gelap saat hover */
            transform: scale(1.05);
        }

        /* Keyframes for Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-container">
        <img src="/sepy/logo.jpg" alt="Sepy Logo" class="img-fluid hero-img">
        <div class="hero-text">
            Welcome to <span class="highlight-text">Jualannya Sepy</span>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container content-container text-center">
        <h2 class="highlight-text">Discover Our Delicious Offerings</h2>
        <p class="lead">
            Explore a variety of mouth-watering rice bowls and beverages. Fresh ingredients, fast service, and unforgettable taste await you.
        </p>
        <a href="https://www.instagram.com/jualannyasepy" class="btn btn-custom mt-3" target="_blank">About Us</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
