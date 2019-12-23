<?php

use Illuminate\Database\Seeder;
use App\Models\Garage\Timeline;

class TimelinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timeline::create([
            'id'                => '1',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'tipo_registro'     => 'cadastro_veiculo',            
            'created_at'        => '2016-11-02 10:23:41',
        ]);

        Timeline::create([
            'id'                => '2',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '1',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2018-12-17 12:29:01',
        ]);

        Timeline::create([
            'id'                => '3',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '2',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2017-08-21 14:00:01',
        ]);

        Timeline::create([
            'id'                => '4',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '3',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2016-11-04 13:33:31',
        ]);

        Timeline::create([
            'id'                => '5',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '4',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2018-04-28 11:01:23',
        ]);

        Timeline::create([
            'id'                => '6',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '5',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2017-03-08 10:11:23',
        ]);

        Timeline::create([
            'id'                => '7',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '6',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2017-01-17 12:27:23',
        ]);

        Timeline::create([
            'id'                => '8',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '7',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2019-09-21 09:57:23',
        ]);

        Timeline::create([
            'id'                => '9',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '8',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2019-08-07 16:55:23',
        ]);

        Timeline::create([
            'id'                => '10',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '9',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2019-12-10 17:05:23',
        ]);

        Timeline::create([
            'id'                => '11',
            'user_id'           => '1',
            'veiculo_id'        => '1',
            'servico_id'        => '10',
            'tipo_registro'     => 'cadastrar_servico',            
            'created_at'        => '2019-06-24 11:51:23',
        ]);
    }
}
