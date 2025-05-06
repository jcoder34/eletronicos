<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AparelhoEletrico extends Model
{
    protected $table = 'aparelho_eletrico';
    protected $fillable = ['marca', 'codigo', 'nome', 'potencia', 'voltagem_minima', 'voltagem_maxima', 'corrente_maxima_entrada'];
}
