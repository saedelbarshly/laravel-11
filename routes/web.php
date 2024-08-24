<?php

use App\Models\Message;
use App\Jobs\SendMessageJob;
use Payment\Facades\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/category/create',[CategoryController::class,'create']);
Route::delete('/category/delete/{id}',[CategoryController::class,'delete']);
Route::delete('/category/update/{id}',[CategoryController::class,'update']);

Route::put('/put',function () {
    return view('welcome');
})->withoutMiddleware(VerifyCsrfToken::class);

Route::delete('/delete',function () {
    return response()->json(["msg" => "Test Delete"]); 
});

#####################################################################

Route::get('/category/index',[CategoryController::class,'index']);

####################################################################
Route::get('/test-otp', function () {
    return view('firebase.test');
});
Route::get('/test-verify-otp', function () {
    return view('firebase.test2');
});
Route::get('/send-otp', function () {
    return view('firebase.sendOtp');
});
Route::get('/verify-otp', function () {
    return view('firebase.verifyOtp');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/customer',[CustomerController::class,'index']);

Route::get('/send', function (){
    Message::where('status','pending')->chunk(1000,function ($messages) {
        dispatch(new SendMessageJob($messages));
    });
    return "All messages have been sent";
});

Route::get('/upload',function (){
    return view('Upload.index');
})->middleware('auth');


Route::get('payment', function (){
    Payment::driver('stripe')->refund(123);
});

require __DIR__.'/auth.php';
