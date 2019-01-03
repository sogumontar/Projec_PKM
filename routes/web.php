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
*/Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',['middleware'=>'cekStatus',function(){
		// return view('homestay.view');
	}]);
Auth::routes();
// Route::view('/register', 'register');
// Route::view('/login', 'login');
// Route::post('/store','userController@store')->name('user.register');
Route::post('/register','userController@store')->name('reg');
// Route::post('/login','userController@login')->name('user.login');
// Route::get('/logout','userController@logout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'HomeController@index')->name('welcome');
// Route::get('/post/create', 'PostController@create')->name('post.create');
// Route::post('/post/create', 'PostController@store')->name('post.store');
// Route::get('/post','PostController@view')->name('post.view');
Route::get('/home','homestayController@notif')->name('notifikasi');

//homestay

Route::get('admin/new','homestayController@new');
Route::get('homestay/view','homestayController@view')->name('homestay.view');
Route::get('homestay/create','homestayController@create')->name('homestay.create');
Route::post('homestay/create','homestayController@store')->name('homestay.store');
Route::get('homestay/{id}/edit','homestayController@edit')->name('homestay.edit');
Route::patch('homestay/{id}/edit','homestayController@update')->name('homestay.update');
Route::get('homestay/{id}/kelola','homestayController@kelola')->name('homestay.kelola');
Route::post('homestay/booking','homestayController@keranjang')->name('homestay.Keranjang');
Route::post('homestay/{id}/booking','homestayController@kendaraan')->name('kendaraan.Keranjang');
Route::get('homestay/{id}/detail','homestayController@detail')->name('homestay.detail');
Route::post('homestay/{id}/detail','homestayController@rating')->name('homestay.rating');
Route::get('homestay/{id}/promo','homestayController@promo')->name('homestay.promo');
Route::post('homestay/{id}/promo','homestayController@promoProcess')->name('homestay.promoProcess');

Route::patch('admin/{id}/new','adminController@reject')->name('reject');
Route::patch('admin/{id}/accept','adminController@accept')->name('accept');
// Route::patch('homestay/{record->id}/kelola','homestayController@acceptBooking')->name('booking.accept');
// Route::patch('homestay/{record->id}/kelola','homestayController@rejectBooking')->name('booking.reject');
Route::post('homestay/search','homestayController@search')->name('homestay.search');
// Route::delete('homestay/{id}/delete','homestayController@destroy')->name('homestay.delete');
Route::delete('/homestay/{homestay}/delete','homestayController@destroy')->name('homestay.destroy');
Route::view('/user/welcome','userController@logout')->name('user.logout');
Route::get('homestay/{id}/booking','homestayController@booking')->name('homestay.booking');
Route::post('homestay/{id}/booking','homestayController@bookProcess')->name('homestay.booking.process');
Route::get('homestay/listBook','homestayController@listBook')->name('listBook');

//kendaraan
Route::get('kendaraan/create','kendaraanController@create')->name('kendaraan.create');
Route::post('kendaraan/create','kendaraanController@store')->name('kendaraan.store');
Route::get('kendaraan/view','kendaraanController@view')->name('kendaraan.view');
Route::get('kendaraan/{id}/edit','kendaraanController@edit')->name('kendaraan.edit');
Route::PATCH('kendaraan/{id}/edit','kendaraanController@update')->name('kendaraan.update');
Route::delete('/kendaraan/{kendaraan}/delete','kendaraanController@destroy')->name('kendaraan.destroy');
Route::get('kendaraan/{id}/booking','kendaraanController@booking')->name('kendaraan.booking');
Route::post('kendaraan/{id}/booking','kendaraanController@bookingProcess')->name('kendaraan.booking.process');
Route::PATCH('admin/{id}/bookinf','kendaraanController@acc')->name('kendaraan.acc');
Route::PATCH('admin/{id}/new','kendaraanController@rej')->name('kendaraan.rej');
Route::get('kendaraan/{id}/resi','kendaraanController@resi')->name('kendaraan.resi');

//pengalaman
Route::get('pengalaman/create','pengalamanController@create')->name('pengalaman.create');
Route::post('pengalaman/create','pengalamanController@store')->name('pengalaman.store');
Route::get('pengalaman/view','pengalamanController@view')->name('pengalaman.view');
Route::get('pengalaman/{id}/detail','pengalamanController@detail')->name('pengalaman.detail');

//Objek Wisata

Route::get('admin/objekWisata','objekWisataController@create')->name('objekWisata.create');
Route::get('objekWisata/view','objekWisataController@view')->name('objekWisata.view');
Route::post('admin/objekWisata','objekWisataController@store')->name('objekWisata.store');
Route::get('objekWisata/{id}/edit','objekWisataController@edit')->name('objekWisata.edit');
Route::get('admin/{id}/edit_obj','objekWisataController@edit')->name('edit_obj');
Route::get('objekWisata/{id}/detail','objekWisataController@detail')->name('objekWisata.detail');


//Admin

Route::get('admin/akun','adminController@akun')->name('admin.akun');
Route::get('admin/objekWisata','adminController@objekWisata')->name('admin.objekWisata');
Route::delete('admin/{id}/objekWisata','objekWisataController@destroy')->name('admin.destroy');
Route::get('admin/pengalaman','adminController@pengalaman')->name('admin.pengalaman');
Route::get('admin/homestay','adminController@homestay')->name('admin.homestay');
Route::get('admin/kendaraan','adminController@kendaraan')->name('admin.kendaraan');
Route::get('admin/request','adminController@request')->name('admin.request');
Route::PATCH('objekWisata/{id}/edit','objekWisataController@update')->name('objekWisata.update');
Route::PATCH('admin/{id}/request','adminController@acc')->name('admin.acc');
Route::PATCH('admin/{id}/akun','adminController@rej')->name('admin.rej');
Route::PATCH('admin/{id}/bayar1','adminController@bayar')->name('admin.bayar');
Route::PATCH('admin/{id}/bayar','adminController@bayarKePemilik')->name('admin.bayarPemilik');
Route::get('admin/bayar','adminController@bayarLihat')->name('admin.bayarLihat');


//Owner

Route::get('owner/owner','pemilikController@owner')->name('owner.owner');
Route::get('owner/homestay','pemilikController@homestay')->name('owner.homestay');
Route::get('owner/kendaraan','pemilikController@kendaraan')->name('owner.kendaraan');
Route::get('owner/pengalaman','pemilikController@pengalaman')->name('owner.pengalaman');
Route::get('owner/booking','pemilikController@booking')->name('owner.booking');
Route::get('owner/terimaUang','ownerController@terimaUang')->name('owner.terimaUang');
Route::PATCH('owner/{id}/terima','ownerController@terima')->name('owner.terima');


//Member
Route::get('booking','memberController@booking')->name('member.booking');
Route::get('{id}/bayar','memberController@bayar')->name('member.bayar');
Route::PATCH('{id}/bayar','memberController@bayarProcess')->name('member.bayarProcess');
Route::get('{id}/poin','memberController@poin')->name('member.poin');
Route::get('{id}/resi','memberController@resi')->name('member.resi');
Route::get('owner/daftar','memberController@daftar')->name('member.daftar');
Route::post('owner/daftarProcess','memberController@daftarProcess')->name('member.daftarProcess');
Route::get('kendaraan/{id}/bayar','memberController@bayarKendaraan')->name('kendaraan.bayar');
Route::PATCH('kendaraan/{id}/edit','memberController@bayarKendaraanProcess')->name('member.bayarKendaraanProcess');
Route::get('email','PostController@sendEmail')->name('send.email');