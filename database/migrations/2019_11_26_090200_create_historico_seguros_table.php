<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veiculo_id')->unsigned()->nullable()->default(null);
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->double('valor_apolice', 10,2);
            $table->integer('num_apolice');
            $table->string('contato_emergencia');
            $table->string('seguradora', 50)->nullable();
            $table->string('detalhes', 200)->nullable();
            $table->string('status', 50)->nullable();
            $table->date('data_pagamento');
            $table->date('data_validade');
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
        Schema::dropIfExists('historico_seguros');
    }
}
