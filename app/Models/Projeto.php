<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nomeProjeto',
        'descricaoProjeto',
        'dhCriacao',
        'xStatus',
        'linkProjeto'
    ];

    public function Tarefa()
    {
        return $this->hasMany(Tarefa::class, 'idProjeto');
    }
}