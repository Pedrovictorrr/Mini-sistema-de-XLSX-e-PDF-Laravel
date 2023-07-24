<?php

namespace App\Http\Controllers;

use App\Models\AtosOrcamentarios;
use Illuminate\Http\Request;

class AtosOrcamentariosController extends Controller
{
    public function index()
    {
        return view('admin.AtosOrcamentarios');
    }
    public function store(Request $request)
    {
        try {

            $dados = $request->all();

            AtosOrcamentarios::create([
                'tipoLei' => 'Orcamentario',
                'decretoAlteracaoOrcamentaria' => $dados['Numero'],
                'dataAto' => $dados['Data_do_Ato'],
                'dataPublicacao' => $dados['Data_da_Publicacao'],
                'tipoAto' => $dados['Tipo_do_ato'],
                'tipoCredito' => $dados['Tipo_do_Credito'],
                'tipoRecurso' => $dados['Tipo_do_recurso'],
                'Situacao' => $dados['Status'],
                'valorCredito' => $dados['Valor'],

            ]);
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
