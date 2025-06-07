<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['funcionario_id', 'cliente_id', 'total', 'created_at'];

    protected $table = 'venda';

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
