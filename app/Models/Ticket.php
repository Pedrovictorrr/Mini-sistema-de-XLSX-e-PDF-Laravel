<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['assunto', 'mensagem', 'user_id', 'responsavel_id', 'situacao_id', 'modulo_id', 'anexo', 'ultima_resposta'];

    protected $casts = [
        'ultima_resposta' => 'datetime:d/m/Y',
        'created_at' => 'datetime:d/m/Y',
    ];

    public function situacao()
    {
        return $this->belongsTo(Situacao::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
