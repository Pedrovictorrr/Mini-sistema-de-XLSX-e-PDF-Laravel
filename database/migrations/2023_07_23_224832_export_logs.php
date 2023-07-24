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
        Schema::create('ExportLog', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->boolean('PlanoContabil');
            $table->unsignedBigInteger('PlanoContabilQTD');
            $table->boolean('MovimentoContabilMensal');
            $table->unsignedBigInteger('MovimentoContabilMensalQTD');
            $table->boolean('DiarioContabilidade');
            $table->unsignedBigInteger('DiarioContabilidadeQTD');
            $table->boolean('MovimentoRealizavel');
            $table->unsignedBigInteger('MovimentoRealizavelQTD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExportLog');
    }
};
