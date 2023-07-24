<?php

namespace App\Http\Controllers;

use App\Models\AtosOrcamentarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function search(Request $request)
    {
        try {
            // Inicie a consulta com o modelo "Documento"
            $query = AtosOrcamentarios::query();
            $teste = $request->all();
            // Verifique cada parâmetro e adicione condições na consulta conforme necessário
            if ($request['Ano']!= null) {
                $query->whereDate('data_publicacao', $request['data_publicacao']);
            }
            if ($request['Data_do_Ato'] != null) {
                $query->whereDate('dataAto', $request['data_ato']);
            }

            if ( $request['Data_do_Lancamento']!= null) {
                $query->whereDate('data_lancamento', $request['Data_do_Lancamento']);
            }

            if ($request['Data_da_Publicacao']!= null) {
                $query->whereDate('dataPublicacao', $request['Data_da_Publicacao']);
            }

            if ($request['Tipo_do_Ato'] != 'null') {
                $query->where('tipoAto', $request['Tipo_do_Ato']);
            }

            if ($request['Tipo_de_Credito'] != 'null') {
                $query->where('tipoCredito', $request['Tipo_de_Credito']);
            }

            if ($request['Tipo_do_Recurso'] != 'null') {
                $query->where('tipoCredito', $request['Tipo_do_Recurso']);
            }

            if ($request['Pendente']) {
                $query->where('Situacao', 'Pendente');
            }
            // Execute a consulta
            $resultados = $query->get();

            return response()->json($resultados);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function DonwloadPdf($id)
    {
        
        return PDF::loadView('admin.pdf.pdf')->setPaper('a4')->stream();;

    }
}
