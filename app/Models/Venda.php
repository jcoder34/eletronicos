<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Venda extends Model
{
    protected $fillable = ['funcionario_id', 'cliente_id', 'total', 'created_at'];

    protected $table = 'venda';

    public function aparelho_eletrico() : HasManyThrough
    {
        return $this->hasManyThrough(AparelhoEletrico::class, ItemVendido::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
