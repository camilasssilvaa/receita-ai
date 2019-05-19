<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_medico')->unsigned();
            $table->integer('id_paciente')->unsigned();
            $table->dateTime('data_receita');

            $table->foreign('id_medico')->references('id')->on('medico');
            $table->foreign('id_paciente')->references('id')->on('paciente');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receita');
    }
}
