<?php

use App\Http\Controllers\Api\FirebaseOtpController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test',[TestController::class,'index']);
Route::get('/one',[TestController::class,'one']);
Route::get('/show/{region}',[TestController::class,'show']);

Route::post('send',[FirebaseOtpController::class,'sendOtp']);


