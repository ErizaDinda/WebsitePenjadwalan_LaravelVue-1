<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ruangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/dosen', DosenController::class);
Route::resource('/ruang', ruangController::class);
Route::resource('/jam', Jamcontroller::class);
Route::resource('/hari', hariController::class);
Route::resource('/waktu_tidak_bersedia', waktu_tidak_bersediaController::class);
Route::resource('/pengampu', pengampuController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
