<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome', 'cpf', 'cep', 'rua', 'bairro', 'numero',
                           'telefone', 'email', 'data_nascimento'];

    protected $table = 'funcionario';
}
