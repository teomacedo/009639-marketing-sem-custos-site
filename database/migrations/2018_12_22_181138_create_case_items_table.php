<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sequencia');
            $table->string('imagem', 190);
            $table->longText('titulo');
            $table->longText('citacao')->nullable();
            $table->string('nome_cliente', 190);
            $table->string('nome_loja', 190);
            $table->string('link_loja', 190);
            $table->string('link_artigo', 190)->nullable();
            $table->string('video', 190)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_items');
    }
}
