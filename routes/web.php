<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelatorioController;

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

Route::get('/', [RelatorioController::class, 'index']);
Route::get('pedidos/ajax', [RelatorioController::class, 'data'])->name('pedidos.ajax');
