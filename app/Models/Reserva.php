<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_carrinha',
        'nr_meses_reservado',
    ];

    public function usuario_reserva()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function carrinha_reserva()
    {
        return $this->hasOne('App\Models\Carrinha', 'id', 'id_carrinha');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'criado_por', 'id');
    }
}
