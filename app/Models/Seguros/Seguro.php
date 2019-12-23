<?php

namespace App\Models\Seguros;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use App\Models\Notificacoes\Pendencia;
use DB;

class Seguro extends Model
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
     * Função que REGISTRA SEGURO no DB.
    **********************************************************/
    public function registrarSeguro($seguro, $veiculo_id)
    {
        DB::beginTransaction();

        $this->veiculo_id = $veiculo_id;
        $this->valor_apolice = $this->moeda($seguro["valorDaApolice"]);
        $this->num_apolice = $seguro["numeroDaApolice"];
        $this->contato_emergencia = $seguro["numeroDeEmergencia"];
        $this->seguradora = $seguro["seguradora"];
        $this->detalhes = $seguro["detalhes"];
        $this->data_pagamento = $seguro["dataDePagamento"];
        $this->data_validade = $seguro["validadeDoSeguro"];
        if(date('Y-m-d') > $seguro["validadeDoSeguro"]){
            $this->status = 'Vencido';
        }else{
            $this->status = 'Ativo';
        }
       
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
    public function deletarSeguro($seguro_id)
    {
        $seguro = $this->find($seguro_id);

        $updated = $seguro->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Seguro excluído com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão do seguro!'
            ];
        }  
    }

    /**********************************************************
     * Relacionamentos
    ***********************************************************/
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }   
    
    public function pendencia()
    {
        return $this->belogsTo(Pendencia::class);
    }
}
