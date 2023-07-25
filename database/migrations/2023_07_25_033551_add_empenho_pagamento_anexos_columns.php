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
        Schema::table('empenho_pagamentos', function (Blueprint $table) {
            $table->string('documento_fiscal')->nullable();
            $table->string('certidao_negativa_debitos')->nullable();
            $table->string('certidao_trabalhista')->nullable();
            $table->string('guia_previdencia_social')->nullable();
            $table->string('fgts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empenho_pagamentos', function (Blueprint $table) {
            $table->dropColumn('documento_fiscal');
            $table->dropColumn('certidao_negativa_debitos');
            $table->dropColumn('certidao_trabalhista');
            $table->dropColumn('guia_previdencia_social');
            $table->dropColumn('fgts');
        });
    }
};
