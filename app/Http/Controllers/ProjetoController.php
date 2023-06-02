<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Tarefa;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostDec;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::all();
        return view('Projeto.indexProjeto', ['projetos' => $projetos]);
    }

    public function pesquisaProjeto(Request $request)
    {
        // if () {
        //     $projetos = Projeto::all();
        //     return view('Projeto.indexProjeto', ['projetos' => $projetos]); 
        // } else {
        //     $search = Projeto::where('nomeProjeto', $request->get('nomeProjeto'))->get();
        //     return view('Projeto.indexProjeto', ['projetos' => $search]);
        // }

        if(!empty($request->nomeProjeto))
        {
            $search = Projeto::where('nomeProjeto' , $request->get('nomeProjeto'))->get();
            return view('Projeto.indexProjeto', ['projetos' => $search]);
        }
        elseif(empty($request->nomeProjeto))
        {
            $projetos = Projeto::all();
            return view('Projeto.indexProjeto', ['projetos' => $projetos]);
        }
    }

    public function create()
    {
        return view('Projeto.addProjeto');
    }

    public function store(Request $request)
    {
        try {
            $date = Carbon::now();
            $projeto = new Projeto();
            $data = $request->only(['nomeProjeto', 'linkProjeto', 'descricaoProjeto', 'xStatus']);
            $projeto->setAttribute('nomeProjeto', $data['nomeProjeto']);
            $projeto->setAttribute('linkProjeto', $data['linkProjeto']);
            $projeto->setAttribute('descricaoProjeto', $data['descricaoProjeto']);
            $projeto->setAttribute('dhCriacao', $date);
            $projeto->setAttribute('xStatus', $data['xStatus']);
            $projeto->save();
            return redirect('/')->with('success', 'Projeto criado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Erro ao criar projeto!');
        }
    }

    public function showTarefa(string $id)
    {
        $projetos = Projeto::find($id);
        $tarefas = DB::table('Tarefas')->where('idProjeto', '=' , $id)->get();
        return view('Tarefa.indexTarefa', ['tarefas' => $tarefas, 'projetos' => $projetos]);
        
    }

    public function edit(string $id)
    {
        $projetos = Projeto::find($id);
        return view('Projeto.editProjeto', ['projetos' => $projetos]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = $request->only(['nomeProjeto', 'linkProjeto', 'descricaoProjeto', 'xStatus']);
            $projeto = Projeto::find($id);
            $projeto->update($data);
            return redirect('/')->with('success', 'Projeto alterado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Erro ao alterar projeto!');
        }
    }

    public function destroy(string $id)
    {
        try {
            $projeto = Projeto::find($id);
            $projeto->delete();
            return redirect('/')->with('toast_success', 'Projeto deletado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/')->with('toast_error', 'Não foi possível deletar esse projeto!');
        }
    }
}