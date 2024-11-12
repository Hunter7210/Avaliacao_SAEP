<!-- resources/views/tarefas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tarefas</h2>

    <div class="row">
        <!-- Tarefas "A Fazer" -->
        <div class="col-md-4">
            <h3>A Fazer</h3>
            @foreach($a_fazer as $tarefa)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tarefa->nomeSetorTaref }}</h5>
                        <p class="card-text">{{ $tarefa->descricTaref }}</p>
                        <a href="{{ route('tarefa.edit', $tarefa->idtarefa) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-tarefa-id="{{ $tarefa->idtarefa }}">
                            Excluir
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tarefas "Fazendo" -->
        <div class="col-md-4">
            <h3>Fazendo</h3>
            @foreach($fazendo as $tarefa)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tarefa->nomeSetorTaref }}</h5>
                        <p class="card-text">{{ $tarefa->descricTaref }}</p>
                        <a href="{{ route('tarefa.edit', $tarefa->idtarefa) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-tarefa-id="{{ $tarefa->idtarefa }}">
                            Excluir
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tarefas "Feito" -->
        <div class="col-md-4">
            <h3>Feito</h3>
            @foreach($feito as $tarefa)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tarefa->nomeSetorTaref }}</h5>
                        <p class="card-text">{{ $tarefa->descricTaref }}</p>
                        <a href="{{ route('tarefa.edit', $tarefa->idtarefa) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-tarefa-id="{{ $tarefa->idtarefa }}">
                            Excluir
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir esta tarefa?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script para definir a ação do formulário de exclusão no modal
    const confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const tarefaId = button.getAttribute('data-tarefa-id');
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/tarefas/${tarefaId}`;
    });
</script>
@endsection
