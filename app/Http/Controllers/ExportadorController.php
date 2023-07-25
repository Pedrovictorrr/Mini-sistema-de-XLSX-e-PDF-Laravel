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

        $PlanoContabilResult = ExportLog::where('PlanoContabil', '1')->latest()->first();
        $PlanoContabil = $PlanoContabilResult ? $PlanoContabilResult->value('created_at') : 'default_value_1';
        
        $MovimentoContabilMensalResult = ExportLog::where('MovimentoContabilMensal', '1')->latest()->first();
        $MovimentoContabilMensal = $MovimentoContabilMensalResult ? $MovimentoContabilMensalResult->value('created_at') : 'default_value_2';
        
        $DiarioContabilidadeResult = ExportLog::where('DiarioContabilidade', '1')->latest()->first();
        $DiarioContabilidade = $DiarioContabilidadeResult ? $DiarioContabilidadeResult->value('created_at') : 'default_value_3';
        
        $MovimentoRealizavelResult = ExportLog::where('MovimentoRealizavel', '1')->latest()->first();
        $MovimentoRealizavel = $MovimentoRealizavelResult ? $MovimentoRealizavelResult->value('created_at') : 'default_value_4';
        
        

        $anos = [];
        // Loop para adicionar os anos de 1900 ao ano atual no array
        for ($ano = $anoAtual; $ano >= 1900; $ano--) {
            $anos[] = $ano;
        }

        return view('admin.exportador', compact('anos', 'meses', 'PlanoContabil', 'MovimentoContabilMensal', 'DiarioContabilidade', 'MovimentoRealizavel'));
    }



    public function findFile(Request $request)
    {
        try {
        $dados = $request->all();

        // Assign the value of the array keys to the corresponding variables
        $PlanoContabil = isset($dados['Plano_Contabil']) ? true : false;
        $MovimentoContabil = isset($dados['Movimento_Contabil']) ? true : false;
        $DiarioContabil = isset($dados['Diario_Contabilidade']) ? true : false;
        $RealizacaMensal = isset($dados['Movimento_Realizavel']) ? true : false;
        
            if ($PlanoContabil) {
                $PlanoContabilQTD = $this->generatePlanoContabilFile($dados);
            }
            if ($MovimentoContabil) {
                $MovimentoContabilQTD =  $this->generateMovimentoContabilFile($dados);
            }
            if ($DiarioContabil) {
                $DiarioContabilQTD =  $this->generateDiarioContabilidadeFile($dados);
            }
            if ($RealizacaMensal) {
                $RealizacaMensalQTD = $this->generateRealizacaoMensalReceitaFile($dados);
            }


            //salvando log//
            ExportLog::create([
                'idUser' => Auth()->user()->id,
                //verificando se é true ou false os registros
                'PlanoContabil' => $PlanoContabil,
                'MovimentoContabilMensal' => $MovimentoContabil,
                'DiarioContabilidade' => $DiarioContabil,
                'MovimentoRealizavel' => $RealizacaMensal,
                //salvando quantidades de registros no log
                'PlanoContabilQTD' => isset($PlanoContabilQTD) ? $PlanoContabilQTD : 0,
                'MovimentoContabilMensalQTD' => isset($MovimentoContabilQTD) ? $MovimentoContabilQTD : 0,
                'DiarioContabilidadeQTD' => isset($DiarioContabilQTD) ? $DiarioContabilQTD : 0,
                'MovimentoRealizavelQTD' => isset($RealizacaMensalQTD) ? $RealizacaMensalQTD : 0,
            ]);

            return true;
        } catch (\Throwable $th) {
            return $th;
        } //code...//code...
    }


    // Funções para gerar arquivos // 
    public function generatePlanoContabilFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  PlanoContabil::where('nrAnoAplicacao', $ano)->get();
        Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/PlanoContabil.xlsx');
        $count =  $registros->count();
        return $count;
    }

    public function generateMovimentoContabilFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  MovimentoContabilMensal::where('nrAnoAplicacao', $ano)->get();
        Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/MovimentoContabilMensal.xlsx');
        $count =  $registros->count();
        return $count;
    }

    public function generateRealizacaoMensalReceitaFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  RealizacaoMensalReceitaFonte::where('nrAnoAplicacao', $ano)->get();
        Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/RealizacaoMensalReceitaFonte.xlsx');
        $count =  $registros->count();
        return $count;
    }

    public function generateDiarioContabilidadeFile($dados)
    {
        $ano = $dados['Ano'];
        $cpf = Auth()->user()->cpf;
        $registros =  DiarioContabilidade::where('nrAnoOperacao', $ano)->get();
        Excel::store(new PlanoContabilExport($registros), 'planilhas/' . $cpf . '/DiarioContabilidade.xlsx');
        $count =  $registros->count();
        return $count;
    }


    //***** Donwload xlsx *****// 

    public function getDownloadExportList()
    {
        $dados = ExportLog::latest()->first();
        return response()->json([$dados]);
    }

    public function DonwloadPlanoContabil()
    {
        $cpf = Auth()->user()->cpf;
        $arquivo = storage_path('app/planilhas/' . $cpf . '/PlanoContabil.xlsx');

        if (file_exists($arquivo)) {
            return response()->download($arquivo);
        } else {
            abort(404, 'Arquivo não existe');
        }
    }

    public function DonwloadMovimentoContabilMensal()
    {
        $cpf = Auth()->user()->cpf;
        $arquivo = storage_path('app/planilhas/' . $cpf . '/MovimentoContabilMensal.xlsx');

        if (file_exists($arquivo)) {
            return response()->download($arquivo);
        } else {
            abort(404, 'Arquivo não existe');
        }
    }

    public function DonwloadDiarioContabilidade()
    {
        $cpf = Auth()->user()->cpf;
        $arquivo = storage_path('app/planilhas/' . $cpf . '/DiarioContabilidade.xlsx');

        if (file_exists($arquivo)) {
            return response()->download($arquivo);
        } else {
            abort(404, 'Arquivo não existe');
        }
    }

    public function DonwloadRealizacaoMensalReceitaFonte()
    {
        $cpf = Auth()->user()->cpf;
        $arquivo = storage_path('app/planilhas/' . $cpf . '/RealizacaoMensalReceitaFonte.xlsx');

        if (file_exists($arquivo)) {
            return response()->download($arquivo);
        } else {
            abort(404, 'Arquivo não existe');
        }
    }
}
