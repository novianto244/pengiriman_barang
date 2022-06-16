<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'checklogin'], function () {
     // Logout
     Route::get('logout', [AuthController::class, 'logout'])->name('logout');

     // Menu
     Route::get('dashboard-{role}', [IndexController::class, 'index']);
     Route::get('surat_jalan-{role}', [IndexController::class, 'index']);
     
});