<!-- resources/views/tarefas/edit.blade.php -->
@extends('layouts.app')  <!-- Extende o layout principal do site -->

@section('content')
<div class="container">
    <h2>Editar Tarefa</h2>

    <!-- Formulário de Edição da Tarefa -->
    <form action="{{ route('tarefa.update', $tarefa->idtarefa) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Indica que será um método PUT para a atualização -->

        <div class="form-group">
            <label for="descricTaref">Descrição</label>
            <textarea name="descricTaref" id="descricTaref" class="form-control" required>{{ old('descricTaref', $tarefa->descricTaref) }}</textarea>
        </div>

        <div class="form-group">
            <label for="nomeSetorTaref">Nome do Setor</label>
            <input type="text" name="nomeSetorTaref" id="nomeSetorTaref" class="form-control" value="{{ old('nomeSetorTaref', $tarefa->nomeSetorTaref) }}" required>
        </div>

        <div class="form-group">
            <label for="prioridTaref">Prioridade</label>
            <select name="prioridTaref" id="prioridTaref" class="form-control" required>
                <option value="baixa" {{ old('prioridTaref', $tarefa->prioridTaref) == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ old('prioridTaref', $tarefa->prioridTaref) == 'media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ old('prioridTaref', $tarefa->prioridTaref) == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dataCadasTaref">Data de Cadastro</label>
            <input type="date" name="dataCadasTaref" id="dataCadasTaref" class="form-control" value="{{ old('dataCadasTaref', $tarefa->dataCadasTaref) }}" required>
        </div>

        <div class="form-group">
            <label for="statusTaref">Status</label>
            <select name="statusTaref" id="statusTaref" class="form-control" required>
                <option value="a fazer" {{ old('statusTaref', $tarefa->statusTaref) == 'a fazer' ? 'selected' : '' }}>A Fazer</option>
                <option value="fazendo" {{ old('statusTaref', $tarefa->statusTaref) == 'fazendo' ? 'selected' : '' }}>Fazendo</option>
                <option value="pronto" {{ old('statusTaref', $tarefa->statusTaref) == 'pronto' ? 'selected' : '' }}>Pronto</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
    </form>
</div>
@endsection
