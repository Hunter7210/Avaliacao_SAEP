<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id('idtarefa');
            $table->text('descricTaref');
            $table->string('nomeSetorTaref');
            $table->enum('prioridTaref', ['baixa', 'media', 'alta']);
            $table->date('dataCadasTaref');
            $table->enum('statusTaref', ['a fazer', 'fazendo', 'pronto']);
            $table->foreignId('idusuario')
                  ->constrained('usuarios', 'idusuario') // Isso cria o relacionamento com a tabela Usuario
                  ->onDelete('cascade');    // Exclui as tarefas quando o usuário for excluído
            $table->timestamps();
        });
    }

    /**
     * Reverter as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
