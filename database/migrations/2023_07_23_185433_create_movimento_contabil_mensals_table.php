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
        Schema::create('movimento_contabil_mensals', function (Blueprint $table) {
            $table->id(); // Add an auto-incrementing primary key column
            $table->unsignedBigInteger('idPessoa');
            $table->string('cdClasse', 9);
            $table->string('cdGrupo', 9);
            $table->string('cdSubGrupo', 9);
            $table->string('cdTitulo', 9);
            $table->string('cdSubTitulo', 9);
            $table->string('cdItem', 99);
            $table->string('cdSubItem', 99);
            $table->string('cdNivel8', 99);
            $table->string('cdNivel9', 99);
            $table->string('cdNivel10', 99);
            $table->string('cdNivel11', 99);
            $table->string('cdNivel12', 99);
            $table->integer('nrAnoAplicacao');
            $table->integer('nrMes');
            $table->unsignedBigInteger('idTipoMovimentoContabil');
            $table->unsignedBigInteger('idTipoFinanceiroPatrimonial');
            $table->unsignedBigInteger('idTipoVariacaoQualitativa');
            $table->decimal('vlDebito', 16, 2);
            $table->decimal('vlCredito', 16, 2);
            $table->timestamps(); // Add 'created_at' and 'updated_at' columns
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimento_contabil_mensals');
    }
};
