<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Tarefa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function create(string $id)
    {
        $projetos = Projeto::find($id);
        return view('Tarefa.addTarefa', ['projetos' => $projetos]);
    }

    public function store(Request $request, string $idProjeto)
    {
        try {
            $date = Carbon::now();
            $altDate = Carbon::now();
            $tarefa = new Tarefa();
            $data = $request->only(['titulo', 'nomeUsuario', 'descricaoTarefa', 'importancia', 'xStatus']);
            $tarefa->setAttribute('idProjeto', $idProjeto);
            $tarefa->setAttribute('titulo', $data['titulo']);
            $tarefa->setAttribute('nomeUsuario', $data['nomeUsuario']);
            $tarefa->setAttribute('descricaoTarefa', $data['descricaoTarefa']);
            $tarefa->setAttribute('importancia', $data['importancia']);
            $tarefa->setAttribute('xStatus', $data['xStatus']);
            $tarefa->setAttribute('dhCriacao', $date);
            $tarefa->setAttribute('ultimaAlteracao', $altDate);
            $tarefa->save();
            return redirect()->route('tarefa.show', $idProjeto)->with('success', 'Tarefa criada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('tarefa.show', $idProjeto)->with('error', 'Erro ao criar tarefa!');
        }
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $idTarefa)
    {
        //
    }
}
