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
    return view('welcome');
});

Auth::routes();
Route::view('/register', 'register');
Route::view('/login', 'login');
Route::post('/store','userController@store')->name('user.register');
Route::post('/register','userController@reg')->name('user.reg');
Route::post('/login','userController@login')->name('user.login');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'HomeController@index')->name('welcome');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store')->name('post.store');
Route::get('/post','PostController@view')->name('post.view');


//homestay
Route::get('homestay/view','homestayController@view')->name('homestay.view');
Route::get('homestay/create','homestayController@create')->name('homestay.create');
Route::post('homestay/create','homestayController@store')->name('homestay.store');
Route::get('homestay/{id}/edit','homestayController@edit')->name('homestay.edit');
Route::patch('homestay/{id}/edit','homestayController@update')->name('homestay.update');
// Route::delete('homestay/{id}/delete','homestayController@destroy')->name('homestay.delete');
Route::delete('/homestay/{homestay}/delete','homestayController@destroy')->name('homestay.destroy');
Route::view('/user/welcome','userController@logout')->name('user.logout');