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
        Schema::create('atos_orcamentarios', function (Blueprint $table) {
          
                $table->id();
                $table->string('tipoLei');
                $table->string('decretoAlteracaoOrcamentaria')->nullable();
                $table->date('dataAto');
                $table->date('dataPublicacao');
                $table->enum('tipoAto', ['Decreto', 'Resolucao', 'Ato Gestor']);
                $table->enum('tipoCredito', ['Especial', 'Suplementar', 'Extraordinario']);
                $table->enum('tipoRecurso', ['Superavit', 'Excesso de arrecadacao','Valor']);
                $table->enum('Situacao', ['Emitido', 'Finalizado','Aberto','Concluido','Pendente']);
                $table->decimal('valorCredito', 20, 2); // Aumentamos a precisão para 20 dígitos e 2 casas decimais.
                $table->timestamps();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atos_orcamentarios');
    }
};
