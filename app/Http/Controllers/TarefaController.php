<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Tarefa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function create(string $id)
    {
        $projetos = Projeto::find($id);
        return view('Tarefa.addTarefa', ['projetos' => $projetos]);
    }

    // public function pesquisaTarefa(Request $request){
    //     dd($request->get('titulo'));
    //     if(!empty($request->titulo))
    //     {
    //         $search = DB::table('Tarefas')->where('titulo' , $request->get('titulo'))->get();
    //         return view('Tarefa.indexTarefa', ['tarefa' => $search]);
    //     }
    //     elseif(empty($request->titulo))
    //     {
    //         $tarefas = Tarefa::all();
    //         return view('Tarefa.indexTarefa', ['tarefas' => $tarefas]);
    //     }
    // }

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

    public function edit(string $id, string $idTarefa)
    {
        $tarefa = DB::table('Tarefas')->where([['idProjeto', '=', $id], ['idTarefa', '=', $idTarefa]])->first();
        return view('Tarefa.editTarefa', ['tarefa' => $tarefa]);
    }

    public function update(Request $request, string $idProjeto, string $idTarefa)
    {
        try {
            $data = $request->only(['titulo', 'nomeUsuario', 'descricaoTarefa', 'importancia', 'xStatus']);
            DB::table('Tarefas')->where([['idProjeto', '=', $idProjeto], ['idTarefa', '=', $idTarefa]])
                ->update([
                    'titulo' => $data['titulo'],
                    'nomeUsuario' => $data['nomeUsuario'],
                    'descricaoTarefa' => $data['descricaoTarefa'],
                    'importancia' => $data['importancia'],
                    'xStatus' => $data['xStatus'],
                ]);
            Projeto::find($idProjeto);
            DB::table('Tarefas')->where('idProjeto', '=', $idProjeto)->get();
            return redirect()->route('tarefa.show', $idProjeto)->with('success', 'Tarefa alterada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro ao alterar Tarefa!');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::table('Tarefas')->where('idTarefa', $id)->delete();
            return redirect()->back()->with('toast_success', 'Tarefa excluída com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('toast_error', 'Não foi possível deletar essa tarefa!');
        }
    }
}
