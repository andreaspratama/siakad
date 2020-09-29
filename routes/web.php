<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index');

Route::prefix('/')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/home/admin', 'DashboardController@index')
        ->name('dashboard.admin')
        ->middleware('auth', 'check:admin');
        Route::get('/home/guru', 'DashboardController@index')
        ->name('dashboard.guru')
        ->middleware('auth', 'check:guru');
        Route::get('/', 'AuthController@login')
        ->name('login');
        Route::post('/postlogin', 'AuthController@postlogin')
        ->name('postlogin');
        Route::get('/logout', 'AuthController@logout')
        ->name('logout');
        
        Route::group(['middleware' => ['auth', 'check:admin']], function(){
            Route::get('siswa', 'SiswaController@index');
            Route::get('siswa/create', 'SiswaController@create');
            Route::post('siswa/store', 'SiswaController@store');
            Route::get('siswa/{siswa}/show', 'SiswaController@show');
            Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
            Route::put('siswa/{siswa}/update', 'SiswaController@update');
            Route::get('siswa/{siswa}/destroy', 'SiswaController@destroy');
            // Route::post('siswa/{siswa}/nilai', 'SiswaController@nilai');
            // Route::post('/siswa/{id}/nilaiupdate', 'SiswaController@nilaiupdate');
            // Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'SiswaController@nilaitambah');
            Route::get('/siswa/{siswa}/hapusnilai', 'SiswaController@hapusnilai');
            Route::get('siswa/{siswa}/nilaiedit', 'SiswaController@nilaiedit');
            Route::get('siswa/exportexcel', 'SiswaController@exportExcel');
            Route::get('siswa/exportpdf', 'SiswaController@exportPdf');
            Route::get('siswa/{siswa}/nilaiexport', 'SiswaController@exportNilaiPdf');
            
            Route::get('guru', 'GuruController@index');
            Route::get('guru/create', 'GuruController@create');
            Route::post('guru/store', 'GuruController@store');
            Route::get('guru/{guru}/show', 'GuruController@show');
            Route::get('guru/{guru}/edit', 'GuruController@edit');
            Route::put('guru/{guru}/update', 'GuruController@update');
            Route::get('guru/{guru}/destroy', 'GuruController@destroy');
            Route::post('guru/{guru}/nilai', 'GuruController@nilai');
            Route::get('guru/exportexcel', 'GuruController@exportExcel');
            Route::get('guru/exportpdf', 'GuruController@exportPdf');
            
            Route::get('jadwalmapel', 'JadwalmapelController@index');
            Route::get('jadwalmapel/create', 'JadwalmapelController@create');
            Route::post('jadwalmapel/store', 'JadwalmapelController@store');
            Route::get('jadwalmapel/{jadwalmapel}/show', 'JadwalmapelController@show');
            Route::get('jadwalmapel/{jadwalmapel}/edit', 'JadwalmapelController@edit');
            Route::put('jadwalmapel/{jadwalmapel}/update', 'JadwalmapelController@update');
            Route::get('jadwalmapel/{jadwalmapel}/destroy', 'JadwalmapelController@destroy');
            Route::post('jadwalmapel/{jadwalmapel}/nilai', 'JadwalmapelController@nilai');
            Route::get('jadwalmapel/exportexcel', 'JadwalmapelController@exportExcel');
            Route::get('jadwalmapel/exportpdf', 'JadwalmapelController@exportPdf');
    
            Route::resource('mapel', 'MapelController');
            Route::resource('exkul', 'ExkulController');
            Route::resource('ruang', 'RuangController');
            Route::resource('thnakademik', 'ThnakademikController');
            Route::resource('sekolah', 'SekolahController');
            Route::resource('jenispem', 'JenispemController');
            Route::get('cetakPembayaran', 'PembayaranController@cetakPembayaran')->name('pembayaran.cetak');
            Route::get('cetakPembayaranPertanggal/{tglawal}/{tglakhir}', 'PembayaranController@cetakPembayaranPertanggal')->name('pembayaran.cetaktgl');
            Route::resource('pembayaran', 'PembayaranController');
            Route::resource('info', 'InfoController');

            // Route::get('nilai', 'NilaiController@index');
            // Route::get('siswa/{siswa}/nilai', 'NilaiController@detail');
            // Route::post('siswa/{siswa}/nilaitambah', 'NilaiController@nilai');
            // Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'NilaiController@nilaitambah');
            // Route::post('/siswa/{id}/nilaiupdate', 'NilaiController@nilaiupdate');
            
            Route::resource('user', 'UserController');
        });

        Route::group(['middleware' => ['auth', 'check:siswa']], function(){
            Route::get('siswa/profile', 'SiswaController@profile');
            Route::get('siswa/info', 'SiswaController@info');
            Route::get('siswa/info/{slug}', 'SiswaController@infoLebih');
            Route::get('siswa/profile/edit/{id}', 'SiswaController@profileedit');
            Route::get('siswa/nilai', 'SiswaController@lihatNilai');
            Route::get('siswa/jadwal', 'SiswaController@jadwal');
            Route::get('siswa/tugas', 'SiswaController@tugas');
            Route::get('siswa/cetaknilai', 'SiswaController@cetakNilai');
        });

        Route::group(['middleware' => ['auth', 'check:guru']], function(){
            Route::get('guru/profile', 'GuruController@profile');
            Route::get('guru/jadwal', 'JadwalmapelController@jadwal');
            Route::get('guru/tugas', 'TugasController@tugas');
            Route::get('guru/absen', 'GuruController@absen');
            Route::post('absen', 'GuruController@absenpros');
            Route::get('guru/nilai', 'NilaiController@index');
            Route::get('guru/nilaiProses/{kelas}', 'NilaiController@proses');
            Route::get('siswa/{siswa}/nilai', 'NilaiController@detail');
            Route::post('siswa/{siswa}/nilaitambah', 'NilaiController@nilai');
            Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'NilaiController@nilaitambah');
            Route::post('/siswa/{id}/nilaiupdate', 'NilaiController@nilaiupdate');
            // Route::post('guru/store', 'TugasController@store');
        });

        Route::group(['middleware' => ['auth', 'check:kepala_sekolah']], function(){
            Route::get('kepalasekolah/siswa', 'KepalasekolahController@siswa');
            Route::get('kepalasekolah/{kepalasekolah}/siswa', 'KepalasekolahController@detailsiswa');
            Route::get('kepalasekolah/guru', 'KepalasekolahController@guru');
            Route::get('kepalasekolah/{kepalasekolah}/guru', 'KepalasekolahController@detailguru');
            Route::get('kepalasekolah/jadwalmapel', 'KepalasekolahController@jadwal');
        });
    });
