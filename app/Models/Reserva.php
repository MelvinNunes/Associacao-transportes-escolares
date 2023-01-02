<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_carrinha',
        'nr_meses_reservado',
    ];

    public function usuario_reserva()
    {
        return $this->hasOne('App\Models\User', 'id_usuario', 'id');
    }

    public function carrinha_reserva()
    {
        return $this->hasOne('App\Models\Carrinha', 'id_carrinha', 'id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'criado_por', 'id');
    }
}
