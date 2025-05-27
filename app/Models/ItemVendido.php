<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVendido extends Model
{
    protected $fillable = ['item_id', 'venda_id', 'desconto', 'promocao'];

    protected $table = 'item_vendido';
}