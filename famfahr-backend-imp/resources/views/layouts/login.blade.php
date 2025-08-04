<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Famfa Solution - Login</title>
{{--    <link rel="stylesheet" href="style.css">--}}
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
            box-sizing: border-box; /* Add box-sizing globally */
        }

        *, *::before, *::after {
            box-sizing: inherit; /* Ensure all elements use border-box */
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("/storage/tt.jpg") no-repeat center center;
            background-size: cover;
            filter: blur(8px) brightness(0.7);
            z-index: -1;
        }

        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #008FD5; /* Famfa Blue */
            padding: 40px 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white; /* Make all text white */
        }

        .login-box h2 {
            color: white; /* Ensure heading is white */
        }

        .login-box input[type="text"],
        .login-box input[type="password"],
        .login-box button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box; /* Include padding in width */
            display: block;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            border: none;
            background: #ffffff; /* White background for contrast */
            color: #000;
        }

        .login-box input::placeholder {
            color: #888;
        }

        .login-box button {
            background-color: #ffffff;
            color: #008FD5;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.3s;
        }

        .login-box button:hover {
            background-color: #dbeeff;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
            display: inline-block;
        }
        /*span {*/
        /*    animation: colorPulse 3s infinite;*/
        /*    font-weight: bold;*/
        /*    font-size: 36px;*/
        /*}*/

        /*@keyframes colorPulse {*/
        /*    0%, 100% { color: #f0f0f0; }*/
        /*    50% { color: #bb2d3b; }*/
        /*}*/
        span {
            display: inline-block;
            animation: bounce 1.5s infinite;
            font-weight: bold;
            font-size: 36px;
            color: #ece1be;
            position: relative;
        }

        @keyframes bounce {
            0%, 100% { top: 0; }
            50% { top: -10px; }
        }

    </style>
    </head>
    <body>
    <div class="background"></div>

    <div class="login-container">
        <div class="login-box">
            <img src="../../../storage/famfa.png" alt="Famfa Logo" class="logo" />
            <h2>Login to Famfa <span >HR</span></h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                @if ($errors->has('username'))
                    <div style="color: #ff9999; margin-bottom: 10px; text-align: left;">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    </body>
    </html>

{{--#008FD5--}}
