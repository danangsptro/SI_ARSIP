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
        // Jenis Pengajuan
        Route::get('/jenisPengajuan', 'backend\jenisPengajuanController@index')->name('pengajuan');
        Route::get('/createPengajuan', 'backend\jenisPengajuanController@create')->name('createPengajuan');
        Route::post('/storePengajuan', 'backend\jenisPengajuanController@store')->name('storePengajuan');
        Route::delete('/deletePengajuan/{id}', 'backend\jenisPengajuanController@destroy')->name('deletePengajuan');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
