<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas'; // Nome da tabela no banco de dados
    protected $primaryKey = 'idtarefa'; // Nome da chave primária

    protected $fillable = [
        'descricTaref',
        'nomeSetorTaref',
        'prioridTaref',
        'dataCadasTaref',
        'statusTaref',
        'idusuario',
    ];

    // Definir relacionamento com Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idusuario', 'idusuario');
    }
}
