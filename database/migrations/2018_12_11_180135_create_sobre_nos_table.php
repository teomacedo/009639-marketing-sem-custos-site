<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobreNosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sobre_nos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sequencia');
            $table->string('imagem', 190)->nullable();
            $table->longText('titulo')->nullable();
            $table->longText('subtitulo')->nullable();
            $table->longText('trecho')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sobre_nos');
    }

}
