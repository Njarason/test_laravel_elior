<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/connexion', function () {
    return view('auth.login');
});

Route::get('/subscribe', function () {
    return view('auth.register');
});

Route::namespace('App\\Http\\Controllers\\API')->group(function () {
    Route::get('/client/{filtre?}', 'ClientController@index')->name('client');
    Route::get('/admin-client/{filtre?}', 'ClientController@adminIndex')->name('admin-client');
    Route::get('/edit-client/{id}', 'ClientController@show')->name('edit-client');
   
    Route::post('/new-client', 'ClientController@create')->name('new-client');
    Route::post('/update-client/{id}', 'ClientController@update')->name('update-client');
    Route::get('/add-client', function () {
            return view('component.client.client-form');
    });
    Route::delete('/delete-client/{id}', 'ClientController@destroy')->name('delete-client');
});

Auth::routes();

