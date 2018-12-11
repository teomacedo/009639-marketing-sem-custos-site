<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtigoComponentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artigo_componentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sequencia');
            $table->string('imagem', 190)->nullable();
            $table->longText('titulo')->nullable();
            $table->longText('subtitulo')->nullable();
            $table->longText('trecho')->nullable();
            
            $table->integer('artigo_id')->unsigned();
            $table->foreign('artigo_id')
                    ->references('id')
                    ->on('artigos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('artigo_componentes');
    }

}
