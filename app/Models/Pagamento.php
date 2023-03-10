<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reserva',
        'valor',
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'criado_por', 'id');
    }
}
