<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard/admin'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/admin', 'backend\dashboardController@index');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
