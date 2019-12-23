<?php

use Illuminate\Database\Seeder;
use App\Models\Garage\Preco_veiculo;

class Preco_veiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preco_veiculo::create([
            'id'            => '1',
            'veiculo_id'    => '1',
            'valor_compra'  => '24000',
            'data_compra'   => '2016-11-02',
            'km_inicial'      => '60000',

        ]);
    }
}
