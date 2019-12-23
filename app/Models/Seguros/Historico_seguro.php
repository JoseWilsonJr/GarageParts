<?php

namespace App\Models\Seguros;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use App\Models\Seguros\Seguro;
use DB;

class Historico_seguro extends Model
{
    protected $fillable = [
        'veiculo_id', 'valor_apolice', 'num_apolice ', 'contato_emergencia', 'seguradora', 'detalhes','data_pagamento','data_validade'
    ];

    protected $dates = [
        'data_pagamento',
        'data_validade',
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

    /*********************************************************
     * ATUALIZAR HISTÓRICO
    **********************************************************/
    public function atualizarHistorico($seguro)
    {

        DB::beginTransaction();

        $this->veiculo_id = $seguro->veiculo_id;
        $this->valor_apolice = $seguro->valor_apolice;
        $this->num_apolice = $seguro->num_apolice;
        $this->contato_emergencia = $seguro->contato_emergencia;
        $this->seguradora = $seguro->seguradora;
        $this->detalhes = $seguro->detalhes;
        $this->data_pagamento = $seguro->data_pagamento;
        $this->data_validade = $seguro->data_validade;
        $this->status = 'Expirado';
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Seguro registrado com êxito'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao registrar novo Seguro!'
            ];
        }
    }


    /**********************************************************
     * DELETAR SEGURO
    ***********************************************************/
    public function deletarHistoricoSeguro($veiculo_id)
    {
        $historico = $this->where('veiculo_id', $veiculo_id)->get();
        foreach($historico as $key => $historico){
            $seguro = $this->find($historico->id);
            $seguro->delete();
        }
            
        return [
            'success' => true,
            'message' => 'Historico excluído com sucesso!'
        ];

    }

    /**********************************************************
     * Relacionamentos
    ***********************************************************/
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
        
    }
}
