<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->double('litros', 10,2);
            $table->double('custo_total', 10,2);
            $table->double('preco_por_litro', 10,2);            
            $table->boolean('tanque_cheio');
            $table->integer('hodometro');
            $table->string('nome_posto', 50)->nullable();
            $table->string('descricao', 200)->nullable();
            $table->date('data_abastecimento');
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
        Schema::dropIfExists('abastecimentos');
    }
}
