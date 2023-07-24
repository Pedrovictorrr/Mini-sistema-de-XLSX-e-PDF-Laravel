<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/empenhos-emitidos', fn () => view('commitments-issued'));
Route::get('/solicitacao-pagamentos', fn () => view('payment-request'));
Route::get('/solicitacao-pagamentos/info', fn () => view('payment-request-info'));