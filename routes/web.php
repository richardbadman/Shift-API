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
//['prefix' => 'api', 'middleware' => 'throttle']
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

Route::resource('employee', 'EmployeeController');
Route::resource('shift', 'ShiftController');

Auth::routes();

Route::get('/', 'HomeController@index');
