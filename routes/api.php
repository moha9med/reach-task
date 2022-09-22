<?php

use App\Http\Controllers\Advertising\AdController;
use App\Http\Controllers\Advertising\AdvertiserController;
use App\Http\Controllers\Advertising\CategoryController;
use App\Http\Controllers\Advertising\TagController;
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


Route::apiResource('ad', AdController::class);
Route::apiResource('advertiser', AdvertiserController::class);
Route::apiResource('tag', TagController::class);
Route::apiResource('category', CategoryController::class);
// Showing Advertiser Ads
Route::get('advertiser/{id}/ads', [AdController::class, 'advertiserAds']);
