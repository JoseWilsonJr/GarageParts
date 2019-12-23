<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('categoria', 50);
            $table->integer('veiculo_id')->unsigned()->nullable()->default(null);
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->integer('servico_id')->unsigned()->nullable()->default(null);
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->integer('manutencao_id')->unsigned()->nullable()->default(null);
            $table->foreign('manutencao_id')->references('id')->on('manutencaos')->onDelete('cascade');
            $table->integer('seguro_id')->unsigned()->nullable()->default(null);
            $table->foreign('seguro_id')->references('id')->on('seguros')->onDelete('cascade');
            $table->integer('km_validade')->nullable()->default(null);
            $table->date('data_validade')->nullable()->default(null);
            $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('pendencias');
    }
}
