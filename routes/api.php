<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Api'],function(){
    Route::any('/contact','LoginController@contact')->middleware('CheckUser');
    Route::any('/login','LoginController@login');
    Route::any('/get_user','LoginController@get_user');
    Route::any('/get_rtc_token','AccessTokenController@get_rtc_token')->middleware('CheckUser');
    Route::any('/send_notice','LoginController@send_notice')->middleware('CheckUser');
    Route::any('/bind_fcmtoken','LoginController@bind_fcmtoken')->middleware('CheckUser');
    Route::any('/upload_photo','LoginController@upload_photo')->middleware('CheckUser');
    Route::any('/test','LoginController@Test');
   // Route::any('/list','Members@dbOperations');
});
// Route::controller(LoginController::class)->group(function(){
// Route::get('/login','get_user');
// });

Route::group(['prefix'=> 'v1'],function(){
    
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('invoices',InvoiceController::class);
});