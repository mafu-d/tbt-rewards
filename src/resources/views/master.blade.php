<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lenovo Rewards Centre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
                <a href="#" class="navbar-brand">Lenovo Rewards Centre</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Log in</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>This is a test page</h1>
        <p>Here is some content. <span class="glyphicon glyphicon-ok"></span></p>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
</body>
</html>
