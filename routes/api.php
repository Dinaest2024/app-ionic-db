<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;

//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:sanctum');

//Route::get('create_gift', [GiftController::class, 'store'])
//Route::resourcel('/gift', [GiftController::class])
Route::resource('/gift', GiftController::class);