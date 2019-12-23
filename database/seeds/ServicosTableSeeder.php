<?php

use Illuminate\Database\Seeder;
use App\Models\Services\Servico;

class ServicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Servico::create([
            'id'            => '1',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2018-12-17',            
            'titulo'        => 'Troca Óleo e Filtro / Freio de Mão',            
            'nome_oficina'  => 'Auto Peças Brasil Novo',            
            'descricao'     => 'Troca de óleo e filtro;
Verificar freio de mão, alavanca solta.',            
            'km_veiculo'    => '86679',            
            'valor_total'   => '446.00',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2018-12-17 12:29:01',
            'updated_at'    => '2018-12-17 12:29:01',
        ]);
    
        Servico::create([
            'id'            => '2',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2017-08-21',            
            'titulo'        => 'Troca Óleo e Filtro',            
            'nome_oficina'  => 'Auto Peças Brasil Novo',            
            'descricao'     => 'Troca de óleo e filtro.',            
            'km_veiculo'    => '75215',            
            'valor_total'   => '176.00',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2017-08-21 14:00:31',
            'updated_at'    => '2017-08-21 12:00:31',
        ]);

        Servico::create([
            'id'            => '3',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2016-11-04',            
            'titulo'        => 'Troca Óleo e Filtro',            
            'nome_oficina'  => 'Lana Pneus',            
            'descricao'     => 'Troca de óleo e filtro.',            
            'km_veiculo'    => '68849',            
            'valor_total'   => '190.00',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2016-11-04 13:33:31',
            'updated_at'    => '2016-11-04 13:33:31',
        ]);

        Servico::create([
            'id'            => '4',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2018-04-28',            
            'titulo'        => 'Óleo Direção Hidráulica',            
            'nome_oficina'  => 'Lana Pneus',            
            'descricao'     => 'Óleo da direção hidraulica Lubrax.',            
            'km_veiculo'    => '85000',            
            'valor_total'   => '21.70',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2018-04-28 11:01:23',
            'updated_at'    => '2018-04-28 11:01:23',
        ]);

        Servico::create([
            'id'            => '5',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2017-03-08',            
            'titulo'        => 'Troca de Pneus',            
            'nome_oficina'  => 'Revisa Pneus Autocenter',            
            'descricao'     => '4 Pneus comprados no Magazine Luiza Online - 20/02/2017.',            
            'km_veiculo'    => '71500',            
            'valor_total'   => '1220.60',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2017-03-08 10:11:23',
            'updated_at'    => '2017-03-08 10:11:23',
        ]);

        Servico::create([
            'id'            => '6',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2017-01-17',            
            'titulo'        => 'Troca de velas de ingnição / Troca Cabos de vela',            
            'nome_oficina'  => 'GGE Distribuidora',            
            'descricao'     => 'Jogo de velas e cabos de vela NGK. (Mercado Livre)',            
            'km_veiculo'    => '70856',            
            'valor_total'   => '184.90',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2017-01-17 12:27:23',
            'updated_at'    => '2017-01-17 12:27:23',
        ]);

        Servico::create([
            'id'            => '7',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2019-09-21',            
            'titulo'        => 'Troca Penus Dianteiros',            
            'nome_oficina'  => 'Revisa Penus Auto Center',            
            'descricao'     => 'Troca dos pneus traseiros por pneus Dunlop e substituição dos dianteiros pelos trazeiros Michelin',            
            'km_veiculo'    => '92638',            
            'valor_total'   => '637.00',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2019-09-21 09:57:23',
            'updated_at'    => '2019-09-21 09:57:23',
        ]);

        Servico::create([
            'id'            => '8',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2019-08-07',            
            'titulo'        => 'Verificar ruído roda dianteira',            
            'nome_oficina'  => 'Everton Manutenções Automotivas',            
            'descricao'     => 'Verificação do ruído originado na parte dianteira do veículo, possível causa rolamento.',            
            'km_veiculo'    => '90830',            
            'valor_total'   => '289.00',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);
        
        Servico::create([
            'id'            => '9',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2019-12-10',            
            'titulo'        => 'Troca de óleo',            
            'nome_oficina'  => 'Everton Manutenções Automotivas',            
            'descricao'     => 'Troca de Óleo.',            
            'km_veiculo'    => '96011',            
            'valor_total'   => '276.10',            
            'anexo'         => null,
            'agendado'      => '1',            
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        Servico::create([
            'id'            => '10',
            'user_id'       => '1',
            'veiculo_id'    => '1',
            'data_servico'  => '2019-06-24',            
            'titulo'        => 'Revisão Periódica',            
            'nome_oficina'  => 'Everton Manutenções Automotivas',            
            'descricao'     => 'Revisão para retirada de vasamento de óleo, limpeza do arrefecimento, verificar escapamento de centelha.',            
            'km_veiculo'    => '94978',            
            'valor_total'   => '2121.92',            
            'anexo'         => null,
            'agendado'      => '0',            
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);
    }
}
