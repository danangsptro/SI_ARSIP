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
        Route::get('/printPengajuanSurat', 'backend\pengajuanSuratController@pagePdf')->name('pagePdf');
        Route::get('/pengajuanSurat', 'backend\pengajuanSuratController@index')->name('pengajuanSurat');
        Route::get('/createSurat', 'backend\pengajuanSuratController@create')->name('createSurat');
        Route::post('/storeSurat', 'backend\pengajuanSuratController@store')->name('storeSurat');
        Route::get('/editSurat/{id}', 'backend\pengajuanSuratController@edit')->name('editSurat');
        Route::post('/updateSurat/{id}', 'backend\pengajuanSuratController@update')->name('updateSurat');
        Route::delete('/deleteSurat/{id}', 'backend\pengajuanSuratController@destroy')->name('deleteSurat');
        // Laporan
        Route::get('/laporan', 'backend\laporanController@index')->name('laporan');
        Route::get('/laporan/{id}', 'backend\laporanController@show')->name('laporanShow');
        Route::get('/laporan-pdf/{id}', 'backend\laporanController@print')->name('laporanPrint');
        Route::get('/laporan-pdf/export/{id}', 'backend\laporanController@exportPdf')->name('exportPdf');
        // Data User
        Route::get('/dataUser', 'backend\dashboardController@dataUser')->name('dataUser');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
