<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [
        'disciplina_id', 'titulo', 'descricao', 'created_by',
    ];

    protected $table = 'avaliacoes';

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
