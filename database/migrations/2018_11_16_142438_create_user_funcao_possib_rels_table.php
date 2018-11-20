<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFuncaoPossibRelsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_funcao_possib_rels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcao_id')->unsigned();
            $table->integer('possib_id')->unsigned();

            $table->foreign('funcao_id')
                    ->references('id')
                    ->on('user_funcaos');

            $table->foreign('possib_id')
                    ->references('id')
                    ->on('user_possibilidades');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_funcao_possib_rels');
    }

}
