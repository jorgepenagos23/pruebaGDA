<?php

use App\Http\Controllers\CommunesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//pendiente proteger rutas

Route::post('/create_customer',[CustomerController::class,'store']);
Route::post('/authenticate', [CustomerController::class, 'authenticate']);
Route::post('/authenticate/dni', [CustomerController::class, 'authenticateDNI']);

Route::get('/index-customer-table', [CustomerController::class,'index'])->middleware('check.token');

Route::delete('/delete/{dni}',[CustomerController::class,'delete'])->middleware('check.token');



Route::get('/index-regions',[RegionController::class,'index']);

Route::get('/index-communes',[CommunesController::class,'index']);

