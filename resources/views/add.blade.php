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
                        <a class="navbar-brand" href="">Employee Shift table</a>
                        <div class="navbar-nav">
                            <a class="nav-item nav-link custNavItem" href="/">Home</a>
                            <span id="currPage" class="nav-item active custNavItem">Add Employee</span>
                            <a class="nav-item nav-link custNavItem" href="week">Weekly plan</a>
                        </div>
                    </div>
                </div>
            </nav>

            <a id="backButton" href="/"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back</a>

            <adding></adding>

        </div>

        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>
