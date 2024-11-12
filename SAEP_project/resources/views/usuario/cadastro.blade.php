{{-- Criando a VIEW para o cadastro de usuario --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="{{ route('usuario.store') }}"> {{-- Chama  o metodo store para ralizar a inserção do banco de dados --}}
            @csrf
            <div class="form-group">
                <label for="nomeUsuario">Nome:</label>
                <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" value="{{ old('nomeUsuario') }}"
                    required>
                @error('nomeUsuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="emailUsuario">E-mail:</label>
                <input type="email" class="form-control" id="emailUsuario" name="emailUsuario"
                    value="{{ old('emailUsuario') }}" required>
                @error('emailUsuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- 
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
            @error('senha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="senha_confirmation">Confirmar Senha:</label>
            <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" required>
        </div>
        --}}

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
