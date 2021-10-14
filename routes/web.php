<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/dashboard/search', [ChamadosController::class, 'search'])->name('ciama.search');
Route::post('/dashboard/update', [ChamadosController::class, 'update'])->name('ciama.update');
Route::get('/dashboard/{id}', [ChamadosController::class, 'show'])->name('ciama.show');
Route::get('/dashboard', [ChamadosController::class, 'index'])->name('ciama.dashboard');
Route::post('/ciama/store', [ChamadosController::class, 'store'])->name('ciama.store');
Route::get('/ciama', [ChamadosController::class, 'chamados'])->name('ciama.chamados');

Route::get('/', function () {
    return view('home');
});
