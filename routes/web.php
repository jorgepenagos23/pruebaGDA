<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


use Inertia\Inertia;



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


Route::get('/{any}', function () {
    return Inertia::render('App');  // Reemplaza 'App' con tu componente principal
})->where('any', '.*');






Route::middleware(['auth'])->group(function () {
    Route::get('/autenticado', [Controller::class, 'autenticado'])->name('success');
    // Otras rutas protegidas
});
