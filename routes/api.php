<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;

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

Route::get('empenhos', [App\Http\Controllers\EmpenhoController::class, 'index']);
Route::get('empenho/{empenho_id}/pagamentos', [App\Http\Controllers\EmpenhoController::class, 'showPagamentos']);
Route::post('empenho/pagamentos', [App\Http\Controllers\EmpenhoController::class, 'storePagamento']);
Route::post('empenho/pagamentos/anexos', [App\Http\Controllers\EmpenhoController::class, 'storeAnexos']);
Route::delete('empenho/pagamento/{pagamento_id}/anexo/{anexo_name}', [App\Http\Controllers\EmpenhoController::class, 'deleteAnexo']);