<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idusuario');
            $table->string('nomeUsuario');
            $table->string('emailUsuario')->unique();
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
        Schema::dropIfExists('usuarios');
    }
}   
