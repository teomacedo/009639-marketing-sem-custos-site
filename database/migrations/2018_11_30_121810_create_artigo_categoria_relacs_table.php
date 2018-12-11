<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtigoCategoriaRelacsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artigo_categoria_relacs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('artigo_id')->unsigned();

            $table->foreign('categoria_id')
                    ->references('id')
                    ->on('artigo_categorias');

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
        Schema::dropIfExists('artigo_categoria_relacs');
    }

}
