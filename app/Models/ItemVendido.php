<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemVendido extends Model
{
    protected $fillable = ['item_id', 'venda_id', 'desconto', 'promocao'];

    protected $table = 'item_vendido';

    public function item() : HasOne
    {
        return $this->hasOne(Item::class);
    }
}