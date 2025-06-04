<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIGuruController;     
use App\Http\Controllers\APIIndustriController; 
use App\Http\Controllers\APIPklController;      
use App\Http\Controllers\APISiswaController;    

Route::apiResource("guru", APIGuruController::class);
Route::apiResource("industri", APIIndustriController::class);
Route::apiResource("pkl", APIPklController::class);
Route::apiResource("siswa", APISiswaController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
