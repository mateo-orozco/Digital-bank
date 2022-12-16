<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DepositController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'deposits'], function(){
Route::post('',[DepositController::class,'create']);


});

Route::group(['prefix'=>'transactions'], function(){
Route::post('',[TransactionController::class,'create']);
});