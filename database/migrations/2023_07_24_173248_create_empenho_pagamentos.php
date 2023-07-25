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
        Schema::create('empenho_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empenho_id');
            $table->decimal('valor', 15, 2);
            $table->enum('tipo_documento', ['fiscal', 'recibo']);
            $table->string('numero_documento');
            $table->string('serie_documento')->nullable();
            $table->string('emissao_documento');
            $table->string('observacao_documento')->nullable();
            $table->enum('forma_pagamento', ['conta_bancaria', 'documento_fatura']);
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->string('op_conta')->nullable();
            $table->string('nome_banco')->nullable();
            $table->string('cidade_banco')->nullable();
            $table->string('documento')->nullable();
            $table->string('observacao_pagamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empenho_pagamentos');
    }
};
