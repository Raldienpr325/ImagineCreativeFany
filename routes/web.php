<?php

use App\Http\Controllers\LoginUser;
use App\Http\Controllers\LoginAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;

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

Auth::routes(); 

Route::get('/', [LoginUser::class, 'index'])->name('login');
Route::get('/login', [LoginUser::class, 'index'])->name('login');
Route::get('/registerpegawai', [LoginUser::class, 'PegawaiRegister'])->name('registerpegawai');
Route::post('/userregister', [LoginUser::class, 'UserRegister'])->name('userregister');
Route::post('/cekloginpegawai', [LoginUser::class, 'CekLoginPegawai'])->name('cekloginpegawai');
Route::get('/listpresensi', [LoginUser::class, 'ListPresensi'])->name('listpresensi');
Route::post('/datapresensi', [LoginUser::class, 'DataPresensi'])->name('datapresensi');

Route::get('/adminlogin', [LoginAdmin::class, 'AdminLogin'])->name('adminlogin');
Route::get('/adminregister', [LoginAdmin::class, 'AdminRegister']);
Route::get('/deleteadmin/{id}', [LoginAdmin::class, 'DeleteAdmin']);
Route::get('/deletepegawai/{id}', [LoginAdmin::class, 'DeletePegawai']);
Route::get('/listadmin', [LoginAdmin::class, 'ListAdmin']);
Route::get('/editpegawai', [LoginAdmin::class, 'EditPegawai']);
Route::get('/updatepegawai/{id}', [LoginAdmin::class, 'UpdatePegawai']);
Route::get('/editadmin/{id}', [LoginAdmin::class, 'EditAdmin']);
Route::post('/updateadmin/{id}', [LoginAdmin::class, 'UpdateAdmin']);
Route::post('/updatepegawaifix/{id}', [LoginAdmin::class, 'UpdatePegawaiFix']);
Route::post('/dataadminregister', [LoginAdmin::class, 'DataAdminRegister'])->name('dataadminregister');
Route::post('/dataloginadmin', [LoginAdmin::class, 'DataLoginAdmin'])->name('dataloginadmin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
