<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['aparelho_eletrico_id', 'codigo', 'preco_venda',
                           'valor', 'data'];

    protected $table = 'item';    
    
    public function aparelho_eletrico()
    {
        return $this->belongsTo(AparelhoEletrico::class);
    }
}
