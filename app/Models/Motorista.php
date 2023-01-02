<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_motorista',
        'morada',
        'nr_carta',
        'data_nasci',
        'data_emissao_carta'
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'criado_por', 'id');
    }
}
