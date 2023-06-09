<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'idTarefa',
        'idProjeto',
        'nomeUsuario',
        'Titulo',
        'dhCriacao',
        'importancia',
        'xStatus',
        'ultimaAlteracao',
        'descricaoTarefa'
    ];

    public function Projeto(){
        return $this->belongsTo(Projeto::class, 'id');
    }
}