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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/', function () {
// 	return redirect("/home");
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/myownact/ahfmqslek1', 'ImportantController@act');

Route::group(['middleware' => 'auth'], function () {
	Route::get('blacklist/delet/{id}', 'BlacklistController@destro');
	Route::resource('user', 'UserController', ['except' => ['show']])->middleware('role');
	Route::resource('blacklist', 'BlacklistController', ['except' => ['show', 'destroy']]);
	Route::get('blacklist/getdata', 'BlacklistController@getlist');
	Route::get('blacklist/showdata/{id}', 'BlacklistController@showdata');
	// Route::delete('blacklist/{id}', 'BlacklistController@destroy')->name('blacklist.destroy');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

