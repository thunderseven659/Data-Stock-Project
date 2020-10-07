<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="title">
            Just Du It !
        </div>
        <div class="button">
            <div class="login">
            <a href={{route('login')}}>
                Login
            </a>
            </div>
            <div class="register">
            <a href={{route('register')}}>
                Register
            </a>
            </div>
        </div>
    </div>

    @yield('body')
</body>
</html>
