<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa', 8)->unique();
            $table->string('renavan')->nullable();
            $table->string('tipo_veiculo');
            $table->integer('montadora_id');
            $table->integer('modelo_id');
            $table->string('ano_modelo_id');
            $table->string('nome_montadora');
            $table->string('nome_modelo');
            $table->string('ano_modelo');
            $table->string('cor');
            $table->integer('km_atual')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('veiculos');
    }
}
