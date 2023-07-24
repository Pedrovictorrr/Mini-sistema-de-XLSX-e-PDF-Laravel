<?php

namespace App\Http\Controllers;

use App\Exports\PlanoContabilExport;
use App\Models\DiarioContabilidade;
use App\Models\ExportLog;
use App\Models\MovimentoContabilMensal;
use App\Models\PlanoContabil;
use App\Models\RealizacaoMensalReceitaFonte;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;

class ExportadorController extends Controller
{
    public function index()
    {
        // Obtém o ano atual
        $anoAtual = Carbon::now()->year;
        $meses = [
            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ];
        // Cria um array para armazenar os anos
        $anos = [];

        // Loop para adicionar os anos de 1900 ao ano atual no array
        for ($ano = $anoAtual; $ano >= 1900; $ano--) {
            $anos[] = $ano;
        }

        return view('admin.exportador', compact('anos', 'meses'));
    }



    public function findFile(Request $request)
    {
        $PlanoContabil = false;
        $MovimentoContabil = false;
        $DiarioContabil = false;
        $RealizacaMensal = false;
        
        try {
            $dados = $request->all();
            if ($dados['Plano_Contabil']) {
                $this->generatePlanoContabilFile($dados);
                $PlanoContabil = true;
            }
            if ($dados['Movimento_Contabil']) {
                $this->generateMovimentoContabilFile($dados);
                $MovimentoContabil = true;
            }
            if ($dados['Diario_Contabilidade']) {
                $this->generateDiarioContabilidadeFile($dados);
                $DiarioContabil = true;
            }
            if ($dados['Movimento_Realizavel']) {
                $this->generateRealizacaoMensalReceitaFile($dados);
                $RealizacaMensal = true;
            }

            //salvando log//
            ExportLog::create([
                'idUser' => Auth()->user()->id,
                'PlanoContabil' => $PlanoContabil,
                'MovimentoContabilMensal' => $MovimentoContabil,
                'DiarioContabilidade' => $DiarioContabil,
                'MovimentoRealizavel' => $RealizacaMensal,
            ]);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
        } //code...//code...
    }


    // Funções para gerar arquivos // 
    public function generatePlanoContabilFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  PlanoContabil::where('nrAnoAplicacao', $ano)
            ->get();
        return Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/PlanoContabil.xlsx');
    }

    public function generateMovimentoContabilFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  MovimentoContabilMensal::where('nrAnoAplicacao', $ano)
            ->get();
        return Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/MovimentoContabilMensal.xlsx');
    }

    public function generateRealizacaoMensalReceitaFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  RealizacaoMensalReceitaFonte::where('nrAnoAplicacao', $ano)
            ->get();
        return Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/RealizacaoMensalReceitaFonte.xlsx');
    }

    public function generateDiarioContabilidadeFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  DiarioContabilidade::where('nrAnoOperacao', $ano)
            ->get();
        return Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/DiarioContabilidade.xlsx');
    }
}
