<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPcontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'send_otp',[OTPcontroller::class , 'send_otp']);
Route::match(['get','post'],'register',[OTPcontroller::class , 'register']);

Route::match(['get','post'],'otp_match/{mobile}',[OTPcontroller::class , 'otp_match']);

Route::match(['get','post'],'logout',[OTPcontroller::class , 'logout']);
