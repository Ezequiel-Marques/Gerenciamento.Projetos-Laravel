<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'idTarefa',
        'idProjeto',
        'NomeUsuario',
        'Titulo',
        'dhCriacao',
        'Importancia',
        'xStatus',
        'ultimaAlteracao',
        'DescricaoTarefa'
    ];
}