<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManutencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->string('tipo');
            $table->string('nome_peca', 50);
            $table->integer('qtd_pecas');
            $table->integer('alinhamento')->default(0);
            $table->integer('balanceamento')->default(0);
            $table->string('tipo_troca_penus')->nullable();
            $table->double('valor_peca', 10,2);
            $table->double('valor_total', 10,2);
            $table->integer('km_validade')->nullable();
            $table->date('data_prox_troca')->nullable();
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
        Schema::dropIfExists('manutencaos');
    }
}
