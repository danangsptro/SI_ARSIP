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
        Route::get('/admin', 'backend\dashboardController@index')->name('dashboard');
        // Jenis Pengajuan
        Route::get('/jenisPengajuan', 'backend\jenisPengajuanController@index')->name('pengajuan');
        Route::get('/createPengajuan', 'backend\jenisPengajuanController@create')->name('createPengajuan');
        Route::post('/storePengajuan', 'backend\jenisPengajuanController@store')->name('storePengajuan');
        Route::get('/editPengajuan/{id}', 'backend\jenisPengajuanController@edit')->name('editPengajuan');
        Route::post('/updateStore', 'backend\jenisPengajuanController@update')->name('updateStore');
        Route::delete('/deletePengajuan/{id}', 'backend\jenisPengajuanController@destroy')->name('deletePengajuan');
        // Pengajuan Surat
        Route::get('/pengajuanSurat', 'backend\pengajuanSuratController@index')->name('pengajuanSurat');
        Route::get('/createSurat', 'backend\pengajuanSuratController@create')->name('createSurat');
        Route::post('/storeSurat', 'backend\pengajuanSuratController@store')->name('storeSurat');
        Route::get('/editSurat/{id}', 'backend\pengajuanSuratController@edit')->name('editSurat');
        Route::delete('/deleteSurat/{id}', 'backend\pengajuanSuratController@destroy')->name('deleteSurat');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
