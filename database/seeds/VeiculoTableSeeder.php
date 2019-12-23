<?php

use Illuminate\Database\Seeder;
use App\Models\Garage\Veiculo;

class VeiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veiculo::create([
            'placa'             => 'HIE-8328',
            'tipo_veiculo'      => 'carros',
            'montadora_id'      => '59',
            'modelo_id'         => '4689',
            'ano_modelo_id'     => '2012-1',
            'cor'               => 'Preto',
            'km_atual'          => '68749',
            'nome_montadora'    => 'VW - VolksWagen',
            'nome_modelo'       => 'Gol (novo) 1.0 Mi Total Flex 8V 4p',
            'ano_modelo'        => '2012',
            'user_id'           => '1',
            'created_at'        => '2016-11-02 14:00:31',
        ]);
    }
}
