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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/persona', 'Auth\LoginController@showPersonaLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/persona', 'Auth\RegisterController@showPersonaRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/persona', 'Auth\LoginController@personaLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/persona', 'Auth\RegisterController@createPersona');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/persona', 'persona');