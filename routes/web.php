<?php

use App\Http\Controllers\AtosOrcamentariosController;
use App\Http\Controllers\ExportadorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('layout');
})->middleware(['auth', 'verified'])->name('layout');

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

    // atos orçamentarios // 

    Route::get('/orcamentario',[AtosOrcamentariosController::class, 'index'])->name('orcamentarios.atos');
    Route::post('/orcamentario/nova-lei',[AtosOrcamentariosController::class, 'store'])->name('orcamentarios.store');
});





require __DIR__.'/auth.php';
