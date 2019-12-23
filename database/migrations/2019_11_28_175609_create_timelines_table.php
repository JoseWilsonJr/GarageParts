<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('veiculo_id')->unsigned()->nullable()->default(null);
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->integer('servico_id')->unsigned()->nullable()->default(null);
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->integer('abastecimento_id')->unsigned()->nullable()->default(null);
            $table->foreign('abastecimento_id')->references('id')->on('abastecimentos')->onDelete('cascade');
            $table->integer('transferencia_id')->unsigned()->nullable()->default(null);
            $table->foreign('transferencia_id')->references('id')->on('transferencias')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('tipo_registro');
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
        Schema::dropIfExists('timelines');
    }
}
