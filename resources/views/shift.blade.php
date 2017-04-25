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
                        <a class="nav-item nav-link custNavItem" href="/">Home</a>
                        <a class="nav-item nav-link custNavItem" href="add">Add Employee</a>
                        <span id="currPage" class="nav-item active custNavItem">Add Shift</span>
                        <a class="nav-item nav-link custNavItem" href="week">Weekly Plan</a>
                    </div>
                </div>
            </div>
        </nav>

        <shifty></shifty>

    </div>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="js/app.js" charset="utf-8"></script>
</body>
</html>
