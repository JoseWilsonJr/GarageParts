<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use App\Models\Services\Servico;
use App\Models\Garage\Galeria;
use App\Models\Garage\Preco_veiculo;
use App\Models\Notificacoes\Pendencia;
use App\Models\Abastecimento\Abastecimento;
use App\Models\Seguros\Seguro;
use App\User;
use DB;

class Veiculo extends Model
{
    protected $fillable = [
        'user_id','placa', 'renavan','nome_montadora', 'nome_modelo', 'ano_modelo','tipo_veiculo', 'montadora_id', 'modelo_id', 'ano_modelo_id', 'cor', 'tipo_combustivel_id', 'km_inicial', 'km_atual', 'valor_compra', 'data_compra',
    ];

    protected $dates = [
        'data_compra',
    ];

    public function registrarVeiculo($veiculo)
    {

        $user = auth()->user()->id;
        
        DB::beginTransaction();

        $this->user_id = $user;
        $this->placa = strtoupper($veiculo['placa']);
        $this->renavan = $veiculo['numedoDoRenavan'];
        $this->tipo_veiculo = $veiculo['tipoVeiculo'];
        $this->montadora_id = $veiculo['montadora'];
        $this->modelo_id = $veiculo['modelo'];
        $this->ano_modelo_id = $veiculo['anoDoModelo'];
        $this->nome_montadora = $veiculo['nomeMarca'];
        $this->nome_modelo = $veiculo['nomeModelo'];
        $this->ano_modelo = $veiculo['anoModelo'];
        $this->cor = strtoupper($veiculo['cor']);
        $this->km_atual = $veiculo['hodometro'];
        
        $updated = $this->save();

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Veículo adicionado a Garagem com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao adicionar veículo a Garagem!'
            ];
        }

    }
    /*************************************************************************
     * Atualizar a KM dos veículos
    ***************************************************************************************/
    public function atualizarHodometro($veiculo_id, $hodometro, $dataExecucao)
    {
        $dbCar = $this->find($veiculo_id);

        if($dbCar['km_atual'] < $hodometro && $dataExecucao <= date('Y-m-d')){
            DB::beginTransaction();
        
            $updated = $dbCar->update(
                [
                    'km_atual' => $hodometro,
                ]
            );
            DB::commit();
        }        
    }

    public function editVeiculo($veiculo, $veiculo_id)
    {
        $dbCar = $this->find($veiculo_id);
        $cor = strtoupper($veiculo['cor']);

        DB::beginTransaction();
        
        $updated = $dbCar->update(
            [
                'cor' => $cor,
                'renavan' => $veiculo['numedoDoRenavan'],
     //            'valor_compra' => $veiculo['valorDeCompra'],
                // 'data_compra' => $veiculo['dataDeAquisicao'],
            ]
        );

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Veículo atualizado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao atualizar informações do veículo!'
            ];
        }

    }

    public function alterarProprietario($user_id, $veiculo_id)
    {
        $dbCar = $this->find($veiculo_id);
        
        DB::beginTransaction();
        
        $updated = $dbCar->update(
            [
                'user_id' => $user_id,
            ]
        );

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Veículo atualizado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao atualizar informações do veículo!'
            ];
        }

    }

    public function deleteVeiculo($veiculo_id)
    {
        $dbCar = $this->find($veiculo_id);

        $updated = $dbCar->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Sucesso ao excluir o Veículo!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão do veículo!'
            ];
        }        

    }

    /*************************************************************************
     * Relacionamentos
    ***************************************************************************************/
    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function precos()
    {
        return $this->hasMany(Preco_veiculo::class);
    }

    public function galerias()
    {
        return $this->hasMany(Galeria::class);
    }

    public function abastecimentos()
    {
        return $this->hasMany(Abastecimento::class);
    }

    public function seguros()
    {
        return $this->hasMany(Seguro::class);
    }

    public function pendencias()
    {
        return $this->belongsTo(Pendencia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
