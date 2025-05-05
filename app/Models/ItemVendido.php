<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVendido extends Model
{
    protected $table = 'item_vendido';
    protected $fillable = ['item', 'venda', 'desconto', 'promocao'];
}