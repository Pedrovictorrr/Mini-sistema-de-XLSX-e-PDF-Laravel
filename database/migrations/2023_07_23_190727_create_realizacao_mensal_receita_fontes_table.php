<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizacaoMensalReceitaFontesTable extends Migration
{
    public function up()
    {
        Schema::create('realizacao_mensal', function (Blueprint $table) {
            $table->id();
            $table->string('idPessoa', 7);
            $table->string('cdFonte', 5);
            $table->string('cdMarcadorSTN', 4);
            $table->string('cdCategoriaEconomica', 1);
            $table->string('cdOrigem', 1);
            $table->string('cdEspecie', 1);
            $table->string('cdDesdobramentoD1', 1);
            $table->string('cdDesdobramentoDD2', 2);
            $table->string('cdDesdobramentoD3', 1);
            $table->string('cdTipoNaturezaReceita', 1);
            $table->string('cdNivel8', 2);
            $table->string('cdNivel9', 2);
            $table->string('cdNivel10', 2);
            $table->string('cdNivel11', 2);
            $table->string('cdNivel12', 2);
            $table->unsignedSmallInteger('nrAnoAplicacao');
            $table->string('idTipoOperacaoReceita', 2);
            $table->unsignedSmallInteger('nrMes');
            $table->decimal('vlOperacao', 16, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('realizacao_mensal');
    }
}

