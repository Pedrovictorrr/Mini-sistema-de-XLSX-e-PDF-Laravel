<?php

namespace App\Http\Controllers;

use App\Models\AtosOrcamentarios;
use App\Models\LogAtosOrcamentarios;
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
            $idAtos = AtosOrcamentarios::latest()->first()->value('id');
            $userid = Auth()->user()->name;

            LogAtosOrcamentarios::create([
                'idAtos' =>  $idAtos,
                'username' => $userid

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
            if ($request['Ano'] != null) {
                $query->whereDate('data_publicacao', $request['data_publicacao']);
            }
            if ($request['Data_do_Ato'] != null) {
                $query->whereDate('dataAto', $request['data_ato']);
            }

            if ($request['Data_do_Lancamento'] != null) {
                $query->whereDate('data_lancamento', $request['Data_do_Lancamento']);
            }

            if ($request['Data_da_Publicacao'] != null) {
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
        $dados = AtosOrcamentarios::where('id', $id)->first();

        return PDF::loadView('admin.pdf.pdf', compact('dados'))->setPaper('a4')->stream();;
    }

    public function delete(Request $request)
    {
        try {
            $dados = $request->all();
            AtosOrcamentarios::where('id', $dados['id'])->delete();
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getLogAto(Request $request)
    {
        // Obtenha o ID do ato da requisição

        $dados = $request->all();
        $logs =  LogAtosOrcamentarios::where('idAtos', $dados['id'])->get();


        return response()->json($logs);
    }


    public function edit(Request $request)
    {
        // Obtain the ID of the ato from the request
        $dados = $request->all();
        $id = $dados['id'];
    
        // Fetch the existing record with the given ID
        $logs = AtosOrcamentarios::find($id);
    
        if (!$logs) {
            return response()->json(['error' => 'Record not found.'], 404);
        }
    
        // Validate and update the fields only if the data is not empty or null
        $tipoLei = 'Orcamentario';
        $decretoAlteracaoOrcamentaria = $dados['Numero'] ?? '';
        $dataAto = $dados['Data_do_Ato'] ?? '';
        $dataPublicacao = $dados['Data_da_Publicacao'] ?? '';
        $tipoAto = $dados['Tipo_do_ato'] ?? '';
        $tipoCredito = $dados['Tipo_do_Credito'] ?? '';
        $tipoRecurso = $dados['Tipo_do_recurso'] ?? '';
        $Situacao = $dados['Status'] ?? '';
        $valorCredito = $dados['Valor'] ?? '';
    
        if (!empty($decretoAlteracaoOrcamentaria) &&
            !empty($dataAto) &&
            !empty($dataPublicacao) &&
            !empty($tipoAto) &&
            !empty($tipoCredito) &&
            !empty($tipoRecurso) &&
            !empty($Situacao) &&
            !empty($valorCredito)) {
            
            $logs->update([
                'tipoLei' => $tipoLei,
                'decretoAlteracaoOrcamentaria' => $decretoAlteracaoOrcamentaria,
                'dataAto' => $dataAto,
                'dataPublicacao' => $dataPublicacao,
                'tipoAto' => $tipoAto,
                'tipoCredito' => $tipoCredito,
                'tipoRecurso' => $tipoRecurso,
                'Situacao' => $Situacao,
                'valorCredito' => $valorCredito,
            ]);
    
            return response()->json(['message' => 'Update successful.'], 200);
        } else {
            return response()->json(['error' => 'One or more fields have NULL or empty values.'], 422);
        }
    }
}
