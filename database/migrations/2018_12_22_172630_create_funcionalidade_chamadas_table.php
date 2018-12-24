<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionalidadeChamadasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('funcionalidade_chamadas', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('titulo');
            $table->longText('subtitulo');
            $table->string('botao_texto', 190);
            $table->string('botao_link', 190);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('funcionalidade_chamadas');
    }

}
