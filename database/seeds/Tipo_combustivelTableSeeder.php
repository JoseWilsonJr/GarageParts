<?php

use Illuminate\Database\Seeder;
use App\Models\Garage\Tipo_combustivel;

class Tipo_combustivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_combustivel::create([
            'id'    => '1',
            'name'  => 'Gasolina',
        ]);
        Tipo_combustivel::create([
            'id'    => '2',
            'name'  => 'Alcool',
        ]);
        Tipo_combustivel::create([
            'id'    => '3',
            'name'  => 'Diesel',
        ]);
        Tipo_combustivel::create([
            'id'    => '4',
            'name'  => 'Bicombustível',
        ]);
    }
}
