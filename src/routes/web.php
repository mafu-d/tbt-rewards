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
    if (Auth::check()) {
        return redirect(route('home'));
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return redirect(route('home'));
});
Route::get('/dashboard', 'ClaimsController@index')->name('home');
Route::get('/claim/edit/{id?}', 'ClaimsController@claimForm');
Route::post('/claim/save', 'ClaimsController@save');
Route::post('/claim/submit', 'ClaimsController@submit');
Route::get('/claim/view/{id}', 'AdminController@view');
Route::get('/attachment/{id}', 'AdminController@downloadSingle');
Route::get('/download/all', 'AdminController@downloadClaims');
Route::get('/download/{id}', 'AdminController@downloadAttachments');
