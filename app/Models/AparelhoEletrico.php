<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AparelhoEletrico extends Model
{
    protected $fillable = ['marca_id', 'nome', 'potencia', 'consumo',
                           'voltagem_minima', 'voltagem_maxima', 'largura',
                           'altura', 'profundidade', 'peso',
                           'corrente_maxima_entrada'];
    
    protected $table = 'aparelho_eletrico';
    
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
