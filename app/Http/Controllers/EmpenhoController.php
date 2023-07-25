<?php

namespace App\Http\Controllers;

use App\Models\Empenho;
use App\Models\EmpenhoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpenhoController extends Controller
{
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
        $empenho = Empenho::where('user_id', Auth::id())
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
            $pagamento->documento = $this->uploadFile(
                $request->file('documento'),
                'anexos_pagamentos'
            );
        }
        $pagamento->save();
        return response()->json($pagamento);
    }

    public function storeAnexos(Request $request)
    {
        $pagamento = EmpenhoPagamento::find($request->pagamento_id);

        if (!$pagamento->documento_fiscal && $request->hasFile('documento_fiscal')) {
            $pagamento->documento_fiscal = $this->uploadFile(
                $request->file('documento_fiscal'),
                'anexos_pagamentos'
            );
        }
        if (!$pagamento->certidao_negativa_debitos && $request->hasFile('certidao_negativa_debitos')) {
            $pagamento->certidao_negativa_debitos = $this->uploadFile(
                $request->file('certidao_negativa_debitos'), 
                'anexos_pagamentos'
            );
        }
        if (!$pagamento->certidao_trabalhista && $request->hasFile('certidao_trabalhista')) {
            $pagamento->certidao_trabalhista = $this->uploadFile(
                $request->file('certidao_trabalhista'), 
                'anexos_pagamentos'
            );
        }
        if (!$pagamento->guia_previdencia_social && $request->hasFile('guia_previdencia_social')) {
            $pagamento->guia_previdencia_social = $this->uploadFile(
                $request->file('guia_previdencia_social'), 
                'anexos_pagamentos'
            );
        }
        if (!$pagamento->fgts && $request->hasFile('fgts')) {
            $pagamento->fgts = $this->uploadFile(
                $request->file('fgts'), 
                'anexos_pagamentos'
            );
        }
        $pagamento->save();
        return response()->json($pagamento);
    }

    public function deleteAnexo($pagamento_id, $anexo_name)
    {
        $pagamento = EmpenhoPagamento::find($pagamento_id);
        if ($pagamento && $pagamento->$anexo_name) {
            $pagamento->$anexo_name = null;
            $pagamento->save();
        }
        return response()->json($pagamento);
    }

    private function uploadFile($file, $directory)
    {
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/'. $directory, $fileName);
        return '/storage/' . $directory . '/' . $fileName;
    }
}
