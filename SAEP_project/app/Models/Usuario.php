<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nome da tabela no banco de dados (minúsculo)
    protected $primaryKey = 'idusuario'; // Nome da chave primária

    protected $fillable = [
        'nomeUsuario',
        'emailUsuario',
    ];

    // Definir relacionamento com Tarefas
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'idusuario', 'idusuario');
    }
}
