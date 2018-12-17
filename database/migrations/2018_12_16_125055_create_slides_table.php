<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sequencia')->nullable();
            $table->string('nome', 190);

            $table->string('imagem', 190);
            $table->string('imagem_small', 190)->nullable();

            $table->longText('titulo_desktop');
            $table->longText('titulo_small')->nullable();

            $table->longText('subtitulo_desktop');
            $table->longText('subtitulo_small')->nullable();

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
        Schema::dropIfExists('slides');
    }

}
