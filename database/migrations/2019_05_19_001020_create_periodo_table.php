<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_receita')->unsigned();
            $table->integer('id_medicamento')->unsigned();
            $table->string('descricao');
            $table->integer('vezes_ao_dia');
            $table->integer('qtd_ao_dia');

            $table->foreign('id_receita')->references('id')->on('receita');
            $table->foreign('id_medicamento')->references('id')->on('medicamento');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo');
    }
}
