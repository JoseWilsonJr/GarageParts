<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use DB;

class Preco_veiculo extends Model
{
    protected $fillable = [
        'veiculo_id','data_compra', 'valor_compra', 'km_inicial'
    ];
    
    protected $dates = [
        'data_compra',
    ];
    /*********************************************************
     * Função que trata valor monetário para entrada no DB.
    **********************************************************/
    public static function moeda($get_valor) {

        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }

        
    /*************************************************************************
     * REGISTRAR PRECO do VEÍCULO
    ***************************************************************************************/
    public function registrarPrecoVeiculo($veiculo, $formulario)
    {
        DB::beginTransaction();

        $this->veiculo_id = $veiculo->id;
        $this->valor_compra = $this->moeda($formulario['valorDeCompra']);
        $this->data_compra = $formulario['dataDeAquisicao'];
        $this->km_inicial = $formulario['hodometro'];
        
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

    public function editPrecoVeiculo($preco_id, $veiculo)
    {
        $dbPreco = $this->find($preco_id);
        
        DB::beginTransaction();
        
        $updated = $dbPreco->update(
            [
                'valor_compra' => $this->moeda($veiculo['valorDeCompra']),
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

    
    /*************************************************************************
     * Relacionamentos
    ***************************************************************************************/
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
