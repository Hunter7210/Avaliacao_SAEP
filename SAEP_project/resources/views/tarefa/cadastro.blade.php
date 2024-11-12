<!-- resources/views/tarefas/cadastro.blade.php -->

@extends('layouts.app')

@section('title', 'Cadastro de Tarefa')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Tarefa</h1>

        <form action="{{ route('tarefa.store') }}" method="POST" class="bg-light p-5 rounded shadow">
            @csrf

            <!-- Descrição da Tarefa -->
            <div class="mb-3">
                <label for="descricTaref" class="form-label">Descrição da Tarefa:</label>
                <textarea id="descricTaref" name="descricTaref" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Nome do Setor -->
            <div class="mb-3">
                <label for="nomeSetorTaref" class="form-label">Nome do Setor:</label>
                <input type="text" id="nomeSetorTaref" name="nomeSetorTaref" class="form-control" required>
            </div>

            <!-- Prioridade -->
            <div class="mb-3">
                <label for="prioridTaref" class="form-label">Prioridade:</label>
                <select id="prioridTaref" name="prioridTaref" class="form-select" required>
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </div>

            <!-- Data de Cadastro -->
            <div class="mb-3">
                <label for="dataCadasTaref" class="form-label">Data de Cadastro:</label>
                <input type="date" id="dataCadasTaref" name="dataCadasTaref" class="form-control" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="statusTaref" class="form-label">Status:</label>
                <select id="statusTaref" name="statusTaref" class="form-select" required>
                    <option value="a fazer">A fazer</option>
                    <option value="fazendo">Fazendo</option>
                    <option value="pronto">Pronto</option>
                </select>
            </div>

            <!-- Responsável -->
            <div class="mb-3">
                <label for="idUsuario" class="form-label">Responsável:</label>
                <select id="idUsuario" name="idUsuario" class="form-select" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->idusuario }}">{{ $usuario->nomeUsuario }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botão de Submissão -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar Tarefa</button>
            </div>
        </form>
    </div>
@endsection
