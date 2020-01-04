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

// Employees and Profiles
Route::resource('employee', 'UserController');
Route::post('/users/search', 'UserController@search')->name('users.search');

// Schedule
Route::resource('schedule', 'ScheduleController');
Route::get('/myschedule', 'ScheduleController@mySchedule')->name('myschedule');

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

// Vacation
Route::get('/ask-vacation', [
    'uses' => 'VacationController@create',
    'as' => 'askVacation'
]);
Route::post('/submit-vacation', [
    'uses' => 'VacationController@store',
    'as' => 'submitVacation'
]);

Route::get('/vacation-request', [
    'uses' => 'VacationController@index',
    'as' => 'vacationRequest'
]);
Route::get('/vacation-approve/{id}', [
    'uses' => 'VacationController@vacApprove',
    'as' => 'vac.approve'
]);
Route::get('/vacation-reject/{id}', [
    'uses' => 'VacationController@vacReject',
    'as' => 'vac.reject'
]);

// Salary
Route::resource('salary', 'SalaryController');
// Route::get('/create', 'SalaryController');
