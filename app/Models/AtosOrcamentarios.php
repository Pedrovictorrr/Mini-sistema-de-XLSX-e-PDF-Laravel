<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtosOrcamentarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoLei',
        'decretoAlteracaoOrcamentaria',
        'dataAto',
        'dataPublicacao',
        'tipoAto',
        'tipoCredito',
        'tipoRecurso',
        'Situacao',
        'valorCredito'
    ];
}
