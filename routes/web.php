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

Route::get('/', function () {
    return view('main');
});

Route::get('add', function() {
    return view('add');
});

Route::get('week', function() {
    return view('week');
});

Route::get('addShift', function() {
  return view('shift');
});

Route::resource('employee', 'EmployeeController');
Route::resource('shift', 'ShiftController');
