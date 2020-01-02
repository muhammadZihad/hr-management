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

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('employee', 'UserController');
Route::post('/users/search', 'UserController@search')->name('users.search');
Route::resource('schedule', 'ScheduleController');

// Attendance
Route::get('/checkIn/{id}', [
    'uses' => 'AttendanceController@checkIn',
    'as' => 'checkIn'
]);
Route::get('/checkOut/{id}', [
    'uses' => 'AttendanceController@checkOut',
    'as' => 'checkOut'
]);
Route::get('/attendances', [
    'uses' => 'AttendanceController@index',
    'as' => 'attendances'
]);
Route::get('/single-attendance/{id}', [
    'uses' => 'AttendanceController@singleAttendance',
    'as' => 'single.attendance'
]);