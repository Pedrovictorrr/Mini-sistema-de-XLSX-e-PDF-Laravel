<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Caso ocorra erro ao criar a factory, descomentar;
    // /**
    //  * Convert a DateTime to a storable string.
    //  *
    //  * @param  \DateTime|int  $value
    //  * @return string
    //  */
    // public function fromDateTime($value)
    // {
    //     return empty($value) ? $value : $this->asDateTime($value)->format('d-M-Y h:i:s A');
    // }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    
    public function ticketsResponsavel()
    {
        return $this->hasMany(Ticket::class, 'responsavel_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
