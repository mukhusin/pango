<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/admin', function () {
    return view('auth.admin.index');
});
Route::get('/lessor', function () {
    return view('auth.lessor.index');
});
Auth::routes();
Route::post('/login-user', 'LoginController@login')->name('login-user');
Route::get('/home', 'HomeController@index')->name('home');

//Admin you must secure this by midleware
Route::get('/lessors-page','AdminController@lessor')->name('lessors-page');
Route::post('/addLessor', 'AdminController@addLessor')->name('addLessor');
Route::post('/updateChair', 'AdminController@updateChair')->name('updateChair');
Route::get('/property','AdminController@property')->name('property');
Route::post('/addProperty', 'AdminController@addProperty')->name('addProperty');
Route::post('/updateProperty', 'AdminController@updateProperty')->name('updateProperty');

// lessor zone you must secure this by midleware
Route::get('/apartment-page', 'ApartmentController@apartment')->name('apartment-page');


