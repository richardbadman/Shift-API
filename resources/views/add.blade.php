<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script>
            // rename myToken as you like
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        <script>
            console.log(Laravel.csrfToken);
        </script>


        <title>Shifty API - Add an employee</title>

        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span class="navbar-brand" href="">Employee Shift table</span>
                        <div class="navbar-nav">
                            <a class="nav-item nav-link custNavItem" href="home">Home</a>
                            <span id="currPage" class="nav-item active custNavItem">Add Employee</span>
                            <a class="nav-item nav-link custNavItem" href="addShift">Add Shift</a>
                            <a class="nav-item nav-link custNavItem" href="week">Weekly plan</a>
                            <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <a id="backButton" href="/home"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back</a>

            <adding></adding>

        </div>

        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>
