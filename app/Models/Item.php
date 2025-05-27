<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['aparelho_eletrico_id', 'valor', 'data'];

    protected $table = 'item';    
}
