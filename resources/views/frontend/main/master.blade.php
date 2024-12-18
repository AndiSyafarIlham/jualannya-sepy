<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JualannyaSepy | @yield('title')</title>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="shortcut icon" type="image/png" href="/sepy/logo-trans.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
    <style>
        /* Set default font */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff9e6;
            /* Light yellow background */
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            height: 100vh;
            /* Ensures the page takes full viewport height */
        }

        /* Navbar Section */
        .navbar {
            background-color: #000;
            /* Black background for navbar */
            animation: slideDown 0.5s ease-out;
        }

        .navbar-nav .nav-link {
            color: #fff;
            /* White text in navbar */
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00;
            /* Yellow hover effect */
            transform: scale(1.05);
        }

        /* Navbar items sliding in */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Main Content Animation */
        main {
            flex: 1;
            /* Allow content to take up remaining space */
            animation: fadeIn 1.5s ease-out;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .alert {
            margin-top: 20px;
            animation: fadeInAlert 1.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInAlert {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Hover Effects for Buttons */
        .btn-secondary {
            background-color: #ffcc00;
            border-color: #ffcc00;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #e6b800;
            border-color: #e6b800;
            transform: scale(1.05);
        }

        /* Footer Section */
        footer {
            background-color: #000;
            /* Black background for footer */
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            /* Footer stays at the bottom */
            animation: slideUp 1s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive Navbar */
        .navbar-toggler-icon {
            background-color: #ffcc00;
        }

        .container-fluid .alert {
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/sepy/logo-trans.png" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top">
                JualannyaSepy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Add your navbar items here -->
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/product">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="/cart">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="/order">Order</a></li>
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-secondary"
                                        style="margin-left: 1cm;">Logout</button>
                                </form>
                            </li>
                            @elseguest
                            <li class="nav-item">
                                <a href="/login" class="nav-link btn btn-secondary" style="margin-left: 1cm;">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 JualannyaSepy. All Rights Reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.min.js"></script>
</body>

</html>
