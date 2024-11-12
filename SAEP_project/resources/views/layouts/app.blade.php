<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minha Aplicação Laravel')</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Início do Cabeçalho (Navbar) -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">Minha Aplicação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/') }}">Gerenciar Tarefas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('cadastro') }}">Cadastro Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tarefas/create') }}">Cadastro Tarefa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Fim do Cabeçalho (Navbar) -->

    <!-- Início do Conteúdo da Página -->
    <div class="container mt-5 pt-5">
        <!-- Adicionando um Alert para feedback de sucesso ou erro -->
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content') <!-- Aqui o conteúdo da página será injetado -->
    </div>
    <!-- Fim do Conteúdo da Página -->

    <!-- Início do Rodapé -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 Minha Aplicação Laravel. Todos os direitos reservados.</p>
    </footer>
    <!-- Fim do Rodapé -->

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
