<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AtosOrcamentariosController;
use App\Http\Controllers\ExportadorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/empenhos-emitidos', fn () => view('commitments-issued'));
Route::get('/empenho/{empenho_id}/pagamentos', fn () => view('payment-request'));
Route::get('/solicitacao-pagamentos/info', fn () => view('payment-request-info'));

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
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ****** exportador contabil ******* // 
    Route::post('/exportador/find-file',[ExportadorController::class, 'findFile'])->name('Exportador.findFile');
    Route::get('/exportador-contabil',[ExportadorController::class, 'index'])->name('Exportador.index');
    Route::get('/teste',[ExportadorController::class, 'getDownloadExportList'])->name('Exportador.getDownloadExportList');

    // Rotas de download // 
    Route::get('export/download/DiarioContabilidade',[ExportadorController::class, 'DonwloadDiarioContabilidade'])->name('Exportador.DonwloadDiarioContabilidade');
    Route::get('export/download/PlanoContabil',[ExportadorController::class, 'DonwloadPlanoContabil'])->name('Exportador.DonwloadPlanoContabil');
    Route::get('export/download/MovimentoContabilMensal',[ExportadorController::class, 'DonwloadMovimentoContabilMensal'])->name('Exportador.DonwloadMovimentoContabilMensal');
    Route::get('export/download/RealizacaoMensalReceitaFonte',[ExportadorController::class, 'DonwloadRealizacaoMensalReceitaFonte'])->name('Exportador.DonwloadRealizacaoMensalReceitaFonte');
    Route::get('/donwload/orcamentario/pdf/{id}',[AtosOrcamentariosController::class, 'DonwloadPdf'])->name('orcamentarios.DownloadPdf');
    // atos orçamentarios // 

    Route::get('/orcamentario',[AtosOrcamentariosController::class, 'index'])->name('orcamentarios.atos');
    Route::get('/getLogAto',[AtosOrcamentariosController::class, 'getLogAto'])->name('orcamentarios.getLogAto');
    Route::post('/orcamentario/nova-lei',[AtosOrcamentariosController::class, 'store'])->name('orcamentarios.store');
    Route::post('/orcamentario/pesquisar-lei',[AtosOrcamentariosController::class, 'search'])->name('orcamentarios.search');
    Route::post('/orcamentario/delete',[AtosOrcamentariosController::class, 'delete'])->name('orcamentarios.delete');
    Route::post('/orcamentario/edit',[AtosOrcamentariosController::class, 'edit'])->name('orcamentarios.edit');
});





require __DIR__.'/auth.php';
