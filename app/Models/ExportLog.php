<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportLog extends Model
{
    use HasFactory;

    protected $table = 'ExportLog';
    protected $fillable = ['PlanoContabil', 'idUser', 'MovimentoContabilMensal', 'DiarioContabilidade', 'MovimentoRealizavel', 'PlanoContabilQTD', 'MovimentoContabilMensalQTD', 'DiarioContabilidadeQTD', 'MovimentoRealizavelQTD'];
}
