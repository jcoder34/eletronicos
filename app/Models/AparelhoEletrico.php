<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AparelhoEletrico extends Model
{
    protected $fillable = ['marca_id', 'codigo', 'nome', 'potencia',
                           'voltagem_minima', 'voltagem_maxima',
                           'corrente_maxima_entrada'];
    
    protected $table = 'aparelho_eletrico';
    
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
