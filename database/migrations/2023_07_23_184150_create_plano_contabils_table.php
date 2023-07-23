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
        Schema::create('plano_contabils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPessoa');
            $table->char('cdClasse', 9);
            $table->char('cdGrupo', 9);
            $table->char('cdSubGrupo', 9);
            $table->char('cdTitulo', 9);
            $table->char('cdSubTitulo', 9);
            $table->char('cdItem', 99);
            $table->char('cdSubItem', 99);
            $table->char('cdNivel8', 99);
            $table->char('cdNivel9', 99);
            $table->char('cdNivel10', 99);
            $table->char('cdNivel11', 99);
            $table->char('cdNivel12', 99);
            $table->unsignedSmallInteger('nrAnoAplicacao');
            $table->string('dsConta', 250);
            $table->char('tpNaturezaSaldo', 1);
            $table->char('tpEscrituracao', 1);
            $table->char('tpNaturezaInformacao', 1);
            $table->char('tpSuperavitFinanceiro', 1);
            $table->char('tpControleConta', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plano_contabils');
    }
};
