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

    <title>Shifty API</title>

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
                        <a class="nav-item nav-link custNavItem" href="add">Add Employee</a>
                        <a class="nav-item nav-link custNavItem" href="addShift">Add Shift</a>
                        <span id="currPage" class="nav-item active custNavItem">Weekly plan</span>
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

        <h2 id="weekHeading">Week Commencing: </h2>

        <weekly></weekly>

    </div>

    <script>
        function getMonday(d) {
            d = new Date(d);
            var day = d.getDay(),
            diff = d.getDate() - day + (day == 0 ? -6:1);
            return new Date(d.setDate(diff));
        }

        var now = getMonday(new Date());
        var format = now.toISOString().slice(0, 10);
        document.getElementById("weekHeading").innerHTML = "Week Commencing: " + format;
    </script>

    <script src="js/app.js" charset="utf-8"></script>
</body>
</html>
