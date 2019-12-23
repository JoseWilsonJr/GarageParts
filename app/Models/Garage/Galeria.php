<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use DB;

class Galeria extends Model
{
    public function addVeiculoGaleriaImagem($imagem, $veiculo_id)
    {
        DB::beginTransaction();

        $this->veiculo_id = $veiculo_id;
        $this->nome_imagem = $imagem["image"];
        
        $updated = $this->save();

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Imagem atualizada com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao enviar a imagem!'
            ];
        }
    }
    /*********************************************************
     * EXCLUI Fotos Selecionadas
     **********************************************************/    

    public function deletarFotosGaleria($imagem_id)
    {
        $imagem = $this->find($imagem_id);

        $updated = $imagem->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Fotos excluídas com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão das Fotos selecionadas!'
            ];
        }  
    }


    /**********************************************************
    * Relacionamentos
    ***********************************************************/

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }


    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
        
    }
}
