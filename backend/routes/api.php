<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Devices\DeviceController;

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

Route::prefix('v1')->group(function (){
    Route::post('/device/store', [DeviceController::class, 'store']); # store details
    Route::get('/getSortedList', [DeviceController::class, 'index']); #sorted tab os list details
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
