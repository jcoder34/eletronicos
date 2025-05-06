<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'functionario';
    protected $fillable = ['nome', 'telefone', 'email'];
}
