<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['GrahamCampbell\Throttle\Http\Middleware\ThrottleMiddleware:50,30', 'auth']], function() {
    Route::get('/home', function () {
        return view('main');
    });

    Route::get('week', function() {
        return view('week');
    });

});

Route::group(['middleware' => ['GrahamCampbell\Throttle\Http\Middleware\ThrottleMiddleware:25,30', 'auth']], function() {
    Route::get('add', function() {
        return view('add');
    });

    Route::get('addShift', function() {
      return view('shift');
  });
});

Route::get('weekly/{date}', 'ShiftController@weekly');

Route::get('date', function() {

    $monday = date('d.m.Y', strtotime('monday this week'));
    $tuesday = date('d.m.Y', strtotime('tuesday this week'));
    $wednesday = date('d.m.Y', strtotime('wednesday this week'));
    $thursday = date('d.m.Y', strtotime('thursday this week'));
    $friday = date('d.m.Y', strtotime('friday this week'));

    $response = [
        "monday" => $monday,
        "tuesday" => $tuesday,
        "wednesday" => $wednesday,
        "thursday" => $thursday,
        "friday" => $friday
    ];

    return $response;

});

Route::resource('employee', 'EmployeeController');
Route::resource('shift', 'ShiftController');
