<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\LoadMoreController;
use App\Http\Controllers\DetailController;

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'checklogin'], function () {
     // Logout
     Route::get('logout', [AuthController::class, 'logout'])->name('logout');

     // Menu
     Route::get('dashboard-{role}', [IndexController::class, 'index']);
     Route::get('surat_jalan-{role}', [IndexController::class, 'index']);
     
     // Get Data
     Route::post('load_data_pengiriman_baru', [LoadMoreController::class, 'load_data']);
     Route::post('load_data_berangkat', [LoadMoreController::class, 'load_data']);
     Route::post('load_data_terkirim', [LoadMoreController::class, 'load_data']);
     Route::post('load_data_batal', [LoadMoreController::class, 'load_data']);

     // Global 
     Route::post('load_data_total', [GlobalController::class, 'load_data_total']);

     // Detail 
     Route::get('detail-{parameter}', [DetailController::class, 'detail']);
     Route::post('load_timeline', [DetailController::class, 'load_timeline']);
     Route::post('getdatadetail', [DetailController::class, 'getdatadetail']);

});