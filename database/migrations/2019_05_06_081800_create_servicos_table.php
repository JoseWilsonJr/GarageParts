<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->date('data_servico');
            $table->string('titulo', 50);
            $table->string('nome_oficina', 50)->nullable();
            $table->string('descricao', 500)->nullable();
            $table->integer('km_veiculo');
            // $table->integer('alinhamento')->default(0);
            // $table->integer('balancemento')->default(0);
            $table->double('valor_total', 10,2)->default(0.00);
            $table->boolean('agendado');
            $table->string('anexo')->nullable();
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
        Schema::dropIfExists('servicos');
    }
}
