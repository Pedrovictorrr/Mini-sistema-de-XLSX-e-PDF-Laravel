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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text('mensagem', 1000)->nullable();
            $table->string('assunto');
            $table->string('anexo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modulo_id')->default(1);
            $table->unsignedBigInteger('situacao_id')->default(1);
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->timestamp('ultima_resposta')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('responsavel_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
