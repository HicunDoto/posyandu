<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::get('/',[LoginController::class,'homes'])->name('index');
Route::get('/login',[LoginController::class,'home'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('post.login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/registrasi',[LoginController::Class,'registrasi'])->name('get.registrasi');
Route::post('/registrasi',[LoginController::Class,'store'])->name('registrasi');
// Route::get('/layout/admin',[AdminController::class,'layout_admin'])->name('layout.admin');

Route::group(['middleware'=>['admin']], function(){
    Route::get('/admin',[AdminController::class,'index'])->name('get.admin');
    Route::get('/admin/timbang',[AdminController::class,'show_timbang'])->name('get.timbang');
    Route::get('/admin/input-timbang',[AdminController::class,'show_create_timbang'])->name('get.input-timbang');
    Route::get('/admin/input-akun',[AdminController::class,'show_create_akun'])->name('get.input-akun');
    Route::get('/admin/pelayanan',[AdminController::class,'show_pelayanan'])->name('get.pelayanan');
    Route::get('/admin/laporan',[AdminController::class,'show_laporan'])->name('get.laporan');
    Route::get('/admin/pdf-laporan',[AdminController::class,'pdf_laporan'])->name('get.pdf');
    Route::get('/admin/pdf-laporan-bidan',[AdminController::class,'pdf_laporan_bidan'])->name('get.pdf-bidan');
    Route::get('/admin/laporan-bidan',[AdminController::class,'show_laporan_bidan'])->name('get.laporan-bidan');
    Route::get('/admin/bidan',[AdminController::class,'show_bidan'])->name('get.bidan');
    Route::get('/admin/kader',[AdminController::class,'show_kader'])->name('get.kader');
    Route::get('/admin/jadwal',[AdminController::class,'show_jadwal'])->name('get.jadwal');
    Route::get('/admin/posyandu',[AdminController::class,'show_posyandu'])->name('get.posyandu');
    Route::get('/admin/input-jadwal',[AdminController::class,'show_create_jadwal'])->name('get.input-jadwal');
    Route::get('/admin/input-pelayanan',[AdminController::class,'show_create_pelayanan'])->name('get.input-pelayanan');
    Route::post('/admin/input-pelayanan',[AdminController::class,'create_pelayanan'])->name('post.input-pelayanan');
    Route::post('/admin/input-akun',[AdminController::class,'create_akun'])->name('post.input-akun');
    Route::get('/admin/input-bidan',[AdminController::class,'show_create_bidan'])->name('get.input-bidan');
    Route::get('/admin/input-kader',[AdminController::class,'show_create_kader'])->name('get.input-kader');
    Route::get('/admin/lihat-balita/',[AdminController::class,'lihat_balita'])->name('get.lihat_balita');
    Route::get('/admin/vaksinasi/',[AdminController::class,'show_vaksin'])->name('get.show_vaksin');
    Route::get('/admin/imunisasi/',[AdminController::class,'show_imun'])->name('get.show_imun');
    Route::get('/admin/input-vaksin',[AdminController::class,'show_create_vaksin'])->name('get.input-vaksin');
    Route::get('/admin/input-data-vaksin',[AdminController::class,'show_create_dtvaksin'])->name('get.input-dtvaksin');
    Route::get('/admin/input-imun',[AdminController::class,'show_create_imun'])->name('get.input-imun');
    Route::get('/admin/input-data-imun',[AdminController::class,'show_create_dtimun'])->name('get.input-dtimun');
    Route::get('/admin/detail-bidan/{user}',[AdminController::class,'show_detail_bidan'])->name('get.detail_bidan');
    Route::get('/admin/detail-bidan/{user}/edit-bidan',[AdminController::class,'edit_detail_bidan'])->name('get.edit_detail_bidan');
    Route::put('/admin/detail-bidan/{user}',[AdminController::class,'update_detail_bidan'])->name('update.detail_bidan');
    Route::delete('/admin/detail-bidan/{user}',[AdminController::class,'delete_detail_bidan'])->name('delete.detail_bidan');
    Route::post('/admin/input-timbang',[AdminController::class,'create_timbang'])->name('post.input-timbang');
    Route::get('/admin/{user}',[AdminController::class,'detail_balita'])->name('get.detail_balita');
    Route::get('/admin/{user}/edit-balita',[AdminController::class,'edit_detail_balita'])->name('get.edit_detail_balita');
    Route::get('/admin/detail-kader/{user}',[AdminController::class,'show_detail_kader'])->name('get.detail_kader');
    Route::get('/admin/detail-kader/{user}/edit-kader',[AdminController::class,'edit_detail_kader'])->name('get.edit_detail_kader');
    Route::put('/admin/detail-kader/{user}',[AdminController::class,'update_detail_kader'])->name('update.detail_kader');
    Route::delete('/admin/detail-kader/{user}',[AdminController::class,'delete_detail_kader'])->name('delete.detail_kader');
    Route::get('/admin/detail-timbang/{user}',[AdminController::class,'show_detail_timbang'])->name('get.detail_timbang');
    Route::get('/admin/detail-timbang/{user}/edit-timbang',[AdminController::class,'edit_detail_timbang'])->name('get.edit_detail_timbang');
    Route::put('/admin/detail-timbang/{user}',[AdminController::class,'update_detail_timbang'])->name('update.detail_timbang');
    Route::delete('/admin/detail-timbang/{user}',[AdminController::class,'delete_detail_timbang'])->name('delete.detail_timbang');
    Route::get('/admin/detail-pelayanan/{user}',[AdminController::class,'show_detail_pelayanan'])->name('get.detail_pelayanan');
    Route::get('/admin/detail-pelayanan/{user}/edit-pelayanan',[AdminController::class,'edit_detail_pelayanan'])->name('get.edit_detail_pelayanan');
    Route::put('/admin/detail-pelayanan/{user}',[AdminController::class,'update_detail_pelayanan'])->name('update.detail_pelayanan');
    Route::delete('/admin/detail-pelayanan/{user}',[AdminController::class,'delete_detail_pelayanan'])->name('delete.detail_pelayanan');
    Route::get('/admin/input-balita/{user}',[AdminController::class,'show_create_balita'])->name('get.input-balita');
    Route::post('/admin/input-bidan',[AdminController::class,'create_bidan'])->name('post.input-bidan');
    Route::post('/admin/input-vaksin',[AdminController::class,'create_vaksin'])->name('post.input-vaksin');
    Route::get('/admin/detail-vaksin/{user}',[AdminController::class,'show_detail_vaksin'])->name('get.detail_vaksin');
    Route::get('/admin/vaksinasi/{user}/edit-vaksin',[AdminController::class,'edit_detail_vaksin'])->name('get.edit_detail_vaksin');
    Route::put('/admin/vaksinasi/{user}',[AdminController::class,'update_detail_vaksin'])->name('update.detail_vaksin');
    Route::delete('/admin/vaksinasi/{user}',[AdminController::class,'delete_detail_vaksin'])->name('delete.detail_vaksin');
    Route::post('/admin/input-data-vaksin',[AdminController::class,'create_dtvaksin'])->name('post.input-data-vaksin');
    Route::get('/admin/detail-data-vaksin/{user}',[AdminController::class,'show_detail_dtvaksin'])->name('get.detail_data_vaksin');
    Route::get('/admin/detail-data-vaksin/{user}/edit-data-vaksin',[AdminController::class,'edit_detail_dtvaksin'])->name('get.edit_detail_dtvaksin');
    Route::put('/admin/detail-data-vaksin/{user}',[AdminController::class,'update_detail_dtvaksin'])->name('update.detail_dtvaksin');
    Route::delete('/admin/detail-data-vaksin/{user}',[AdminController::class,'delete_detail_dtvaksin'])->name('delete.detail_dtvaksin');
    Route::post('/admin/input-imun',[AdminController::class,'create_imun'])->name('post.input-imun');
    Route::get('/admin/detail-imun/{user}',[AdminController::class,'show_detail_imun'])->name('get.detail_imun');
    Route::get('/admin/imunisasi/{user}/edit-imun',[AdminController::class,'edit_detail_imun'])->name('get.edit_detail_imun');
    Route::put('/admin/imunisasi/{user}',[AdminController::class,'update_detail_imun'])->name('update.detail_imun');
    Route::delete('/admin/imunisasi/{user}',[AdminController::class,'delete_detail_imun'])->name('delete.detail_imun');
    Route::post('/admin/input-data-imun',[AdminController::class,'create_dtimun'])->name('post.input-data-imun');
    Route::get('/admin/detail-data-imun/{user}',[AdminController::class,'show_detail_dtimun'])->name('get.detail_data_imun');
    Route::get('/admin/detail-data-imun/{user}/edit-data-imun',[AdminController::class,'edit_detail_dtimun'])->name('get.edit_detail_dtimun');
    Route::put('/admin/detail-data-imun/{user}',[AdminController::class,'update_detail_dtimun'])->name('update.detail_dtimun');
    Route::delete('/admin/detail-data-imun/{user}',[AdminController::class,'delete_detail_dtimun'])->name('delete.detail_dtimun');
    Route::post('/admin/input-jadwal',[AdminController::class,'create_jadwal'])->name('post.input-jadwal');
    Route::get('/admin/jadwal/{user}',[AdminController::class,'show_detail_jadwal'])->name('get.detail_jadwal');
    Route::get('/admin/jadwal/{user}/edit-jadwal',[AdminController::class,'edit_detail_jadwal'])->name('get.edit_detail_jadwal');
    Route::put('/admin/jadwal/{user}',[AdminController::class,'update_detail_jadwal'])->name('update.detail_jadwal');
    Route::delete('/admin/detail-jadwal/{user}',[AdminController::class,'delete_detail_jadwal'])->name('delete.detail_jadwal');
    Route::get('/admin/posyandu/{user}/edit-posyandu',[AdminController::class,'edit_posyandu'])->name('get.edit_posyandu');
    Route::put('/admin/edit-posyandu/{user}',[AdminController::class,'update_posyandu'])->name('update.posyandu');
    Route::delete('/admin/edit-posyandu/{user}',[AdminController::class,'delete_posyandu'])->name('delete.posyandu');
    Route::post('/admin/input-kader',[AdminController::class,'create_kader'])->name('post.input-kader');
    Route::post('/admin/input-balita/{user}',[AdminController::class,'create_balita'])->name('post.input-balita');
    Route::put('/admin/{user}',[AdminController::class,'update_detail_balita'])->name('update.detail_balita');
    Route::delete('/admin/{user}',[AdminController::class,'delete_balita'])->name('delete.detail_balita');
});

Route::group(['middleware'=>['user']], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('get.dashboard');
    Route::get('/dashboard/laporan',[DashboardController::class,'laporan'])->name('get.laporan');
    Route::get('/dashboard/imunisasi',[DashboardController::class,'imunisasi'])->name('get.imunisasi');
    Route::get('/dashboard/vaksinasi',[DashboardController::class,'vaksinasi'])->name('get.vaksinasi');
    Route::get('/dashboard/{soal}',[DashboardController::class,'show'])->name('get.laporan/id_timbang');
});
// Route::resource('soal',SoalController::class);