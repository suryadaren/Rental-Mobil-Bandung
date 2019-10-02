<?php



// route-route yang ada di home
Route::get('/', 'homeController@home');
Route::get('/cars', 'homeController@cars');
Route::post('/inputPeminjam', 'homeController@inputPeminjam');
Route::get('/contact_us', 'homeController@contact_us');
// 


// route-route login
Route::get('/login', 'loginController@login');
Route::post('/cekLogin', 'loginController@cekLogin');
// 


// route-route yang hanya bisa di akses jika sudah login
Route::group(['middleware' => 'checkuser'], function(){

	// route-route yang ada di halaman admin
	Route::get('/admin', 'adminController@content_cars');
	Route::get('/admin/content_cars', 'adminController@content_cars');
	Route::post('/admin/addCar', 'adminController@addCar');
	Route::put('/admin/editCar', 'adminController@editCar');
	Route::delete('/admin/delCar', 'adminController@delCar');
	Route::get('/admin/peminjam', 'adminController@peminjam');
	Route::post('/admin/pengembalian', 'adminController@pengembalian');
	Route::get('/logout', 'loginController@logout');
	//

});
// 
