<?php

use Illuminate\Database\Seeder;
use App\Models\Services\Manutencao;

class ManutencaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manutencao::create([
            'id'                 => '1',
            'servico_id'         => '1',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Alavanca freio de mão',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '97.00', 
            'valor_total'        => '97.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '2',
            'servico_id'         => '1',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Cilindro freio',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '32.00', 
            'valor_total'        => '32.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '3',
            'servico_id'         => '1',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro oleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '18.00', 
            'valor_total'        => '18.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '4',
            'servico_id'         => '1',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Oleo Motor 5W40 Maxi Performance VW Sintetico SL',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '160.00',   
            'km_validade'        => '91679',
            'data_prox_troca'    => '2019-06-17',
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '5',
            'servico_id'         => '1',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Oleo Freio 500ML DOT4 Bosch',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '19.00', 
            'valor_total'        => '19.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '6',
            'servico_id'         => '1',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Substituição Alavanca Freio',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '60.00', 
            'valor_total'        => '60.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '7',
            'servico_id'         => '1',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Limpeza Sistema de Freio',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,
            'valor_peca'         => '45.00', 
            'valor_total'        => '45.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '8',
            'servico_id'         => '1',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Substituição Cilindro de Freio',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '15.00', 
            'valor_total'        => '15.00',       
            'created_at'         => '2018-12-17 12:30:01',
            'updated_at'         => '2018-12-17 12:30:01',
        ]);

        Manutencao::create([
            'id'                 => '9',
            'servico_id'         => '2',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro oleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '16.00', 
            'valor_total'        => '16.00',       
            'created_at'         => '2017-08-21 14:00:31',
            'updated_at'         => '2017-08-21 14:00:31',
        ]);

        Manutencao::create([
            'id'                 => '10',
            'servico_id'         => '2',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Oleo Motor 5W40 Castrol SLX Professional VW',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '160.00',   
            'km_validade'        => '80215',
            'data_prox_troca'    => '2019-06-17',
            'created_at'         => '2017-08-21 14:00:31',
            'updated_at'         => '2017-08-21 14:00:31',
        ]);

        Manutencao::create([
            'id'                 => '11',
            'servico_id'         => '3',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro oleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '14.00', 
            'valor_total'        => '14.00',       
            'created_at'         => '2016-11-04 13:33:31',
            'updated_at'         => '2016-11-04 13:33:31',
        ]);

        Manutencao::create([
            'id'                 => '12',
            'servico_id'         => '3',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Oleo Motor 5W40 Castrol SLX Professional VW',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '44.00', 
            'valor_total'        => '176.00',   
            'km_validade'        => '80215',
            'data_prox_troca'    => '2019-06-17',
            'created_at'         => '2016-11-04 13:33:31',
            'updated_at'         => '2016-11-04 13:33:31',
        ]);

        Manutencao::create([
            'id'                 => '13',
            'servico_id'         => '4',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Oleo Lubrax OH-50 ATF TA LT',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '21.70', 
            'valor_total'        => '21.70',   
            'created_at'         => '2018-04-28 11:01:23',
            'updated_at'         => '2018-04-28 11:01:23',
        ]);

        Manutencao::create([
            'id'                 => '14',
            'servico_id'         => '5',
            'tipo'               => 'Pneus',
            'nome_peca'          => 'Pneus Michelin 175/65/r14 Energy Max2',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '1',            
            'balanceamento'      => '1',
            'tipo_troca_penus'   => 'C',            
            'valor_peca'         => '239.15', 
            'valor_total'        => '965.60',
            'km_validade'        => '81500',
            'data_prox_troca'    => '2017-09-08',   
            'created_at'         => '2017-03-08 10:11:23',
            'updated_at'         => '2017-03-08 10:11:23',
        ]);

        Manutencao::create([
            'id'                 => '15',
            'servico_id'         => '5',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Montagem / Alinhamento / Balanceamento',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '90.00', 
            'valor_total'        => '90.00',       
            'created_at'         => '2017-03-08 10:11:23',
            'updated_at'         => '2017-03-08 10:11:23',
        ]);
        
        Manutencao::create([
            'id'                 => '16',
            'servico_id'         => '5',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Mão de Obra Troca de peças',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '100.00', 
            'valor_total'        => '100.00',       
            'created_at'         => '2017-03-08 10:11:23',
            'updated_at'         => '2017-03-08 10:11:23',
        ]);

        Manutencao::create([
            'id'                 => '17',
            'servico_id'         => '5',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Coxim Amortecedor Dianteiro x2',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '74.00', 
            'valor_total'        => '74.00',       
            'created_at'         => '2017-03-08 10:11:23',
            'updated_at'         => '2017-03-08 10:11:23',
        ]);

        Manutencao::create([
            'id'                 => '18',
            'servico_id'         => '6',
            'tipo'               => 'Elétrica',
            'nome_peca'          => 'Kit Velas Ingnição e cabos de vela',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '184.90', 
            'valor_total'        => '184.90',       
            'created_at'         => '2017-03-08 10:11:23',
            'updated_at'         => '2017-03-08 10:11:23',
        ]);

        Manutencao::create([
            'id'                 => '19',
            'servico_id'         => '7',
            'tipo'               => 'Pneus',
            'nome_peca'          => 'Penu 175/70R14 Dunlop 88T Touring R1 XL',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '1',            
            'balanceamento'      => '1',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '282.00', 
            'valor_total'        => '564.00',       
            'created_at'         => '2019-09-21 09:57:23',
            'updated_at'         => '2019-09-21 09:57:23',
        ]);

        Manutencao::create([
            'id'                 => '20',
            'servico_id'         => '7',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Montagem / Alinhamento / Balanceamento',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '73.00', 
            'valor_total'        => '73.00',       
            'created_at'         => '2019-09-21 09:57:23',
            'updated_at'         => '2019-09-21 09:57:23',
        ]);

        Manutencao::create([
            'id'                 => '21',
            'servico_id'         => '8',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca do rolamento dianteiro esquerdo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '60.00', 
            'valor_total'        => '60.00',       
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);

        Manutencao::create([
            'id'                 => '22',
            'servico_id'         => '8',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Rolamento dianteiro',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '95.00', 
            'valor_total'        => '95.00',       
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);
        
        Manutencao::create([
            'id'                 => '23',
            'servico_id'         => '8',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Aditivo Radiador',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '25.00', 
            'valor_total'        => '50.00',   
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);

        Manutencao::create([
            'id'                 => '24',
            'servico_id'         => '8',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Limpador Radiador',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '12.00', 
            'valor_total'        => '24.00',   
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);

        
        Manutencao::create([
            'id'                 => '25',
            'servico_id'         => '8',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Limpeza sistema arrefecimento',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '60.00', 
            'valor_total'        => '60.00',       
            'created_at'    => '2019-08-07 16:55:23',
            'updated_at'    => '2019-08-07 16:55:23',
        ]);

        Manutencao::create([
            'id'                 => '26',
            'servico_id'         => '9',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca de Oleo e Filtro',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        Manutencao::create([
            'id'                 => '27',
            'servico_id'         => '9',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca da mangueira do bocal do tanque',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '60.00', 
            'valor_total'        => '60.00',       
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        Manutencao::create([
            'id'                 => '28',
            'servico_id'         => '9',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Tampa do óleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '14.00', 
            'valor_total'        => '14.00',       
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        Manutencao::create([
            'id'                 => '29',
            'servico_id'         => '9',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro de óleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '19.60', 
            'valor_total'        => '19.60',       
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        Manutencao::create([
            'id'                 => '30',
            'servico_id'         => '9',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Mangueira Bocal Tanque',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '26.50', 
            'valor_total'        => '26.50',       
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);
        
        Manutencao::create([
            'id'                 => '31',
            'servico_id'         => '9',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Óleo motor 5W40',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '29.00', 
            'valor_total'        => '116.00',   
            'created_at'    => '2019-12-10 17:05:23',
            'updated_at'    => '2019-12-10 17:05:23',
        ]);

        // Serviço 2121,99
        Manutencao::create([
            'id'                 => '32',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Conjunto Carcaça Valvula Termostatica',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '280.00', 
            'valor_total'        => '280.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '33',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Tampa Reservatorio de Agua',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '26.50', 
            'valor_total'        => '26.50',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '34',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Tampa Óleo Motor',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '13.00', 
            'valor_total'        => '13.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '35',
            'servico_id'         => '10',
            'tipo'               => 'Elétrica',
            'nome_peca'          => 'Bobina Infnição',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '440.00', 
            'valor_total'        => '440.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '36',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Rolamento Tensor',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '48.00', 
            'valor_total'        => '48.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '37',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro de Óleo',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '18.50', 
            'valor_total'        => '18.50',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '38',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Reservatório de Água',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '58.00', 
            'valor_total'        => '58.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '39',
            'servico_id'         => '10',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Aditivo Radiador Paraflu',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '22.50', 
            'valor_total'        => '45.00',   
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '40',
            'servico_id'         => '10',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Higienizador Ar Condicionado',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '19.50', 
            'valor_total'        => '19.50',   
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '41',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Filtro Ar-Condicionado',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '21.80', 
            'valor_total'        => '21.80',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '42',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Bieleta Susp',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '32.50', 
            'valor_total'        => '65.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '43',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Correia do Alternador',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '65.00', 
            'valor_total'        => '65.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '44',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Bucha reservatório partida a frio',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '19.00', 
            'valor_total'        => '38.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '45',
            'servico_id'         => '10',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Óleo Motor 5W40',            
            'qtd_pecas'          => '4',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '32.50', 
            'valor_total'        => '130.00',   
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '46',
            'servico_id'         => '10',
            'tipo'               => 'Hidráulica',
            'nome_peca'          => 'Querosene',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '15.20', 
            'valor_total'        => '15.20',   
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '47',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Bucha da bandeja dianteira',            
            'qtd_pecas'          => '2',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '57.45', 
            'valor_total'        => '114.90',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '48',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Veda Juntas',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '9.00', 
            'valor_total'        => '9.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '49',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Anel Bujão Carter',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '1.52', 
            'valor_total'        => '1.52',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '50',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Silicone',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '38.00', 
            'valor_total'        => '38.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '51',
            'servico_id'         => '10',
            'tipo'               => 'Mecanica',
            'nome_peca'          => 'Rolamento Dianteiro Direito',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '95.00', 
            'valor_total'        => '95.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '52',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Gasolina',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '53',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca Rolamento Dianteiro',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '50.00', 
            'valor_total'        => '50.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '54',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca da Carcada da Valvula Termostatica',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '80.00', 
            'valor_total'        => '80.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '55',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca das Buchas',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '80.00', 
            'valor_total'        => '80.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '56',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Limpeza do Corpo borboletas e Bicos',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '80.00', 
            'valor_total'        => '80.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '57',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca da Junta do Carter',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '60.00', 
            'valor_total'        => '60.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '58',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca das Beletas',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '59',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca das ved do reservatorio de partida a frio',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);
        
        Manutencao::create([
            'id'                 => '60',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca Tensor',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '61',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Reposicionar e regurlar freio de estacionamento',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '40.00', 
            'valor_total'        => '40.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

        Manutencao::create([
            'id'                 => '62',
            'servico_id'         => '10',
            'tipo'               => 'Mão de Obra',
            'nome_peca'          => 'Troca da bobina de ignição',            
            'qtd_pecas'          => '1',            
            'alinhamento'        => '0',            
            'balanceamento'      => '0',
            'tipo_troca_penus'   => null,            
            'valor_peca'         => '30.00', 
            'valor_total'        => '30.00',       
            'created_at'    => '2019-06-24 11:51:23',
            'updated_at'    => '2019-06-24 11:51:23',
        ]);

    }
}
