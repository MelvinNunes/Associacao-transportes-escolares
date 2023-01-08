<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinha extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_motorista',
        'contacto',
        'rota',
        'nr_lugares',
        'preco',
        'image'
    ];

    public function motorista()
    {
        return $this->hasOne('App\Models\Motorista', 'id', 'id_motorista');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'criado_por', 'id');
    }
}
