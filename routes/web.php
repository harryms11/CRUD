<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});

Route::get('/dataPegawai',[EmployeeController::class,'index'])->name('pegawai');

Route::get('/tambahDataPegawai',[EmployeeController::class,'tambahDataPegawai'])->name('tambahDataPegawai');
Route::post('/insertData',[EmployeeController::class,'insertData'])->name('insertData');

Route::get('/editDataPegawai/{id}',[EmployeeController::class,'editDataPegawai'])->name('editDataPegawai');
Route::post('/updateDataPegawai/{id}',[EmployeeController::class,'updateDataPegawai'])->name('updateDataPegawai');

Route::get('/deleteDataPegawai/{id}',[EmployeeController::class,'deletedatapegawai'])->name('deleteDataPegawai');

Route::get('/exportPdf',[EmployeeController::class,'exportPdf'])->name('exportPdf'); //Export PDF
Route::get('/exportExcel',[EmployeeController::class,'exportExcel'])->name('exportExcel'); //Export Excel
Route::post('/importExcel',[EmployeeController::class,'importExcel'])->name('importExcel'); //Import Excel



