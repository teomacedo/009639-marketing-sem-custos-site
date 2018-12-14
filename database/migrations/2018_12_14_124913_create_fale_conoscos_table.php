<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaleConoscosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fale_conoscos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 190);
            $table->string('email', 190);
            $table->string('telefone', 190);
            $table->longText('mensagem')->nullable();
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
        Schema::dropIfExists('fale_conoscos');
    }
}
