<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecoVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco_veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veiculo_id')->unsigned()->nullable()->default(null);
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->date('data_compra');
            $table->double('valor_compra', 10,2);
            $table->integer('km_inicial');
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
        Schema::dropIfExists('preco_veiculos');
    }
}
