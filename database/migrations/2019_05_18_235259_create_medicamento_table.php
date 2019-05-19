<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->float('valor', 8, 2);
            $table->integer('num_lote');
            $table->integer('tipo_unidade')->unsigned();
            $table->float('valor_unidade', 8, 2);
            $table->string('composicao');

            $table->foreign('tipo_unidade')->references('id')->on('tipo_unidade');
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
        Schema::dropIfExists('medicamento');
    }
}
