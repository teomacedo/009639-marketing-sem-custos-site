<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtigoCategoriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artigo_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sequencia');
            $table->string('imagem', 190);
            $table->string('nome', 190);
            $table->longText('subtitulo')->nullable();
            $table->longText('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('artigo_categorias');
    }

}
