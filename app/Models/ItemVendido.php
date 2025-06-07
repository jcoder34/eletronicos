<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemVendido extends Model
{
    protected $fillable = ['item_id', 'venda_id', 'desconto', 'promocao'];

    protected $table = 'item_vendido';

    public function item() : BelongsTo
    {
        return $this->BelongsTo(Item::class);
    }
}