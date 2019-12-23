<?php

use Illuminate\Database\Seeder;
use App\Models\Garage\Tipo_veiculo;

class Tipo_veiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_veiculo::create([
            'id'    => '1',
            'name'  => 'Carros',
            'type'  => 'carros',
        ]);

        Tipo_veiculo::create([
            'id'    => '2',
            'name'  => 'Motos',
            'type'  => 'motos',
        ]);
    }
}
