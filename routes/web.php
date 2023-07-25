<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('layout');
})->middleware(['auth', 'verified'])->name('layout');

Route::get('/criar-suporte-usuario', function () {
    return view('criar-ticket');
})->middleware(['auth', 'verified'])->name('criar-ticket');

Route::resource('/tickets', TicketController::class)->middleware(['auth', 'verified'])
    ->except('delete', 'destroy');

Route::delete('/tickets/{ticketId}/files/{fileName}', [FileController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/usuarios', [UserController::class, 'index'])->middleware(['auth', 'verified']);


Route::get('/suporte-usuario', function () {
    return view('suporte-usuario');
})->middleware(['auth', 'verified'])->name('suporte');

Route::middleware(['auth'])->group(function () {
    Route::get('/empenhos-emitidos', fn () => view('commitments-issued'));
    Route::get('/empenho/{empenho_id}/pagamentos', fn () => view('payment-request'));
    Route::get('/solicitacao-pagamentos/info', fn () => view('payment-request-info'));
    
    Route::prefix('api')->group(function () {
        Route::get('empenhos', [App\Http\Controllers\EmpenhoController::class, 'index']);
        Route::get('empenho/{empenho_id}/pagamentos', [App\Http\Controllers\EmpenhoController::class, 'showPagamentos']);
        Route::post('empenho/pagamentos', [App\Http\Controllers\EmpenhoController::class, 'storePagamento']);
        Route::post('empenho/pagamentos/anexos', [App\Http\Controllers\EmpenhoController::class, 'storeAnexos']);
        Route::delete('empenho/pagamento/{pagamento_id}/anexo/{anexo_name}', [App\Http\Controllers\EmpenhoController::class, 'deleteAnexo']);    
    });
});

require __DIR__.'/auth.php';
