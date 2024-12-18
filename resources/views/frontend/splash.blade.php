<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sepy</title>
    <link rel="shortcut icon" type="image/png" href="/sepy/logo-trans.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General styling */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #ffcc00; /* Yellow background */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Splash Screen styling */
        .splash-screen {
            text-align: center;
            animation: fadeIn 1.5s ease-out forwards, fadeOut 1s 3.5s ease-out forwards;
        }

        /* Logo Animation */
        .logo {
            width: 180px;
            animation: bounce 2s ease-out;
        }

        /* Button Styling */
        .login-btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #000;
            color: #fff;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            margin-top: 40px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #333;
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }

        @keyframes bounce {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="splash-screen">
        <!-- Logo -->
        <img src="/sepy/logo-trans.png" alt="Sepy Logo" class="logo">
        <div class="welcome-text">
            <h1 style="color: #000; font-size: 2.5rem; margin-top: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                Welcome to <span style="color: #ff6600;">Jualannya Sepy</span>
            </h1>
        </div>
        
        <!-- Login Button -->
        <a href="/login" class="login-btn">Login</a>
    </div>

    <!-- Redirect to home after animation -->
    <script>
        setTimeout(function() {
            window.location.href = '/login';  // Automatically redirect after splash animation
        }, 5000); // Change this value if you want the redirect to happen after a different time (in milliseconds)
    </script>
</body>
</html>
