<?php

namespace App\Http\Controllers;

use App\Models\Empenho;
use App\Models\EmpenhoPagamento;
use Illuminate\Http\Request;

class EmpenhoController extends Controller
{
    private $userId = 1;

    public function index()
    {
        $empenhos = Empenho::select('empenhos.*')
            ->with('contrato')
            ->selectSub(function ($query) {
                $query->from('empenho_pagamentos')
                    ->selectRaw('COALESCE(SUM(valor), 0)')
                    ->whereRaw('empenho_id = empenhos.id');
            }, 'valor')
            ->get();

        return response()->json($empenhos);
    }

    public function showPagamentos($empenho_id)
    {
        $empenho = Empenho::where('user_id', $this->userId)
            ->where('id', $empenho_id)
            ->firstOrFail();

        $pagamentos = EmpenhoPagamento::select('empenho_pagamentos.*')
            ->where('empenho_id', $empenho->id)
            ->with('empenho.user', function ($query) use ($empenho) {
                $query->select('id', 'name')
                    ->where('id', $empenho->user_id);
            })
            ->get();

        return response()->json($pagamentos);
    }
    
    public function storePagamento(Request $request)
    {
        $pagamento = new EmpenhoPagamento($request->all());
        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/anexos_pagamentos', $fileName);
            $pagamento->documento = '/storage/anexos_pagamentos/' . $fileName; 
        }
        $pagamento->save();
        return response()->json($pagamento);
    }
}
