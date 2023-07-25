<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpenhoPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'empenho_id',
        'data',
        'valor',
        'tipo_documento',
        'numero_documento',
        'serie_documento',
        'emissao_documento',
        'observacao_documento',
        'forma_pagamento',
        'agencia',
        'conta',
        'op_conta',
        'nome_banco',
        'cidade_banco',
        'documento',
        'observacao_pagamento',
    ];

    public function empenho()
    {
        return $this->belongsTo(Empenho::class, 'empenho_id', 'id');
    }
}
