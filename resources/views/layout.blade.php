<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SK Player</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        body {
            display: flex;
        }

        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
        }

        #sidebar h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #main {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        #main-nav a {
            display: block;
            color: #000;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        #main-nav a.active {
            background-color: rgb(109, 111, 111);
            color: #fff;
        }

        #main-nav a:hover {
            background-color: #ddd;
        }

    </style>
</head>
<body>

    <div id="sidebar">
        <h1>Volley Ball</h1>
        <nav id="main-nav">
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/players') }}" class="{{ Request::is('players') ? 'active' : '' }}">Players</a>
            <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
        </nav>
    </div>

    <div id="main">
        <div id="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
