<?php
// app/Http/Controllers/UsuarioController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    //Criando um CRUD para os usuarios

    // Método para exibir o formulário de cadastro 
    public function create()
    {
        return view('usuario.cadastro');
    }

    // Método para armazenar o usuário no banco de dados CREATE
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:usuarios,emailUsuario',
        ]);

        // Criação do usuário no banco de dados
        Usuario::create([
            'nomeUsuario' => $request->nomeUsuario,
            'emailUsuario' => $request->emailUsuario,
        ]);

        // Redireciona para a página de login ou página de sucesso
        return redirect()->route('tarefas')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
