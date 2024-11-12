<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    // TarefaController.php
    public function index()
    {
        // Buscar as tarefas, separando-as por status
        $a_fazer = Tarefa::where('statusTaref', 'a fazer')->get();
        $fazendo = Tarefa::where('statusTaref', 'fazendo')->get();
        $feito = Tarefa::where('statusTaref', 'pronto')->get();

        // Retorna a view passando as tarefas divididas por status
        return view('tarefa.index', compact('a_fazer', 'fazendo', 'feito'));
    }


    public function create()
    {
        // Pega todos os usuários para preencher a lista de responsáveis
        $usuarios = Usuario::all();

        return view('tarefa.cadastro', compact('usuarios'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'descricTaref' => 'required',
            'nomeSetorTaref' => 'required',
            'prioridTaref' => 'required|in:baixa,media,alta',
            'dataCadasTaref' => 'required|date',
            'statusTaref' => 'required|in:a fazer,fazendo,pronto',
            'idUsuario' => 'required|exists:usuarios,idusuario', // Valida se o usuário existe
        ]);

        // Cria a tarefa
        Tarefa::create([
            'descricTaref' => $request->descricTaref,
            'nomeSetorTaref' => $request->nomeSetorTaref,
            'prioridTaref' => $request->prioridTaref,
            'dataCadasTaref' => $request->dataCadasTaref,
            'statusTaref' => $request->statusTaref,
            'idusuario' => $request->idUsuario,
        ]);

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('tarefa.index')->with('success', 'Tarefa cadastrada com sucesso!');
    }


    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $usuarios = Usuario::all(); // Para preencher o campo de responsável

        return view('tarefa.edit', compact('tarefa', 'usuarios'));
    }

    // TarefaController.php
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'descricTaref' => 'required',
            'nomeSetorTaref' => 'required',
            'prioridTaref' => 'required|in:baixa,media,alta',
            'dataCadasTaref' => 'required|date',
            'statusTaref' => 'required|in:a fazer,fazendo,pronto',
        ]);

        // Encontrar a tarefa
        $tarefa = Tarefa::findOrFail($id);

        // Atualizar os dados da tarefa
        $tarefa->update($validated);

        // Redirecionar para a lista de tarefas com uma mensagem de sucesso
        return redirect()->route('tarefa.index')->with('success', 'Tarefa atualizada com sucesso!');
    }



    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefa.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
