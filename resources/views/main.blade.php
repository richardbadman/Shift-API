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
                        <span id="currPage" class="nav-item active custNavItem">Home</span>
                        <a class="nav-item nav-link custNavItem" href="add">Add Employee</a>
                        <a class="nav-item nav-link custNavItem" href="addShift">Add Shift</a>
                        <a class="nav-item nav-link custNavItem" href="week">Weekly plan</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- <div class="col-md-6 col-md-offset-3">
            <div id="infoDiv">
                Shown is a list of all Employee's, here you can view, edit and delete a selected Employee as well as add additional Employee's
            </div>
        </div> -->

        <div id="mainContainer" class="container">
            <h1 id="empHeading">Employees</h1>
            <button id="addEmp" class="btn btn-primary">
                <a href="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Employee</a>
            </button>
        </div>

        <emptable></emptable>

    </div>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="js/app.js" charset="utf-8"></script>
</body>
</html>
