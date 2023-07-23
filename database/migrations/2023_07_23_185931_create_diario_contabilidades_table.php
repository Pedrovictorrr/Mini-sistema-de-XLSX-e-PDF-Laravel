<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diario_contabilidades', function (Blueprint $table) {
            $table->id(); // Add an auto-incrementing primary key column

            $table->unsignedBigInteger('idPessoa');
            $table->unsignedBigInteger('nrOperacao');
            $table->integer('nrAnoOperacao');
            $table->date('dtOperacao');
            $table->integer('idTipoMovimentoContabil');
            $table->integer('idTipoFinanceiroPatrimonial');
            $table->string('cdClasse', 1);
            $table->string('cdGrupo', 1);
            $table->string('cdSubGrupo', 1);
            $table->string('cdTitulo', 1);
            $table->string('cdSubTitulo', 1);
            $table->string('cdItem', 2);
            $table->string('cdSubItem', 2);
            $table->string('cdNivel8', 2);
            $table->string('cdNivel9', 2);
            $table->string('cdNivel10', 2);
            $table->string('cdNivel11', 2);
            $table->string('cdNivel12', 2);
            $table->integer('nrAnoAplicacaoPlano');
            $table->string('tpNaturezaSaldo', 1);
            $table->decimal('vlOperacao', 16, 2);
            $table->integer('idEventoPadraoTCE');
            $table->unsignedBigInteger('nrEventoEntidade');
            $table->string('nrLancamento', 15);
            $table->string('dsHistorico', 500);
            $table->integer('idTipoVariacaoQualitativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diario_contabilidades');
    }
};
