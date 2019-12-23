<?php

namespace App\Models\Abastecimento;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use DB;

class Abastecimento extends Model
{
    protected $fillable = [
        'vendedor_id', 'veiculo_id', 'litros', 'preco_por_litro ', 'odometro', 'descricao', 'data_abastecimento'
    ];

    protected $dates = [
        'data_abastecimento',
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

    public function registrarAbastecimento($abastecimento)
    {
        DB::beginTransaction();

        $this->veiculo_id = $abastecimento["placaDoVeiculo"];
        $this->litros = $abastecimento["litragem"];
        $this->custo_total = $this->moeda($abastecimento["custoTotal"]);
        $this->preco_por_litro = $this->moeda($abastecimento["precoLitro"]);
        $this->hodometro = $abastecimento["hodometro"];
        if(isset($abastecimento['tanqueCheio']) && $abastecimento['tanqueCheio'] == 'true'){
            $this->tanque_cheio = true;
        }else {
            $this->tanque_cheio = false;
        }
        $this->nome_posto = $abastecimento["nomeDoPosto"];
        $this->data_abastecimento = $abastecimento["dataDoAbastecimento"];
        $this->descricao = $abastecimento["descricao"];
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Abastecimento registrado com êxito'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao registrar novo abastecimento!'
            ];
        }
    }

    /*******************
     * Filtro Timeline
    *********************/
    public function filtro(Array $data, Array $date, $totalPagina)
    {
        if (!isset($date['inicioDoPeriodo'])){
            $date = [
               'fimDoPeriodo' => date('Y-m-d'),
               'inicioDoPeriodo' => date('Y-m-d', strtotime('-100 year')),
            ];
        }
        //dd($date);
        return $this->where(function ($query) use ($data) {

            if (isset($data['valorInicial']) && isset($data['valorFinal'])){
                $query->where('custo_total', '>=', $this->moeda($data['valorInicial']))->where('custo_total', '<=', $this->moeda($data['valorFinal']));
            } else if (isset($data['valorInicial'])){
                $query->where('custo_total', '>=', $this->moeda($data['valorInicial']));
            } else if (isset($data['valorFinal'])){
                $query->where('custo_total', '<=', $this->moeda($data['valorFinal']));
            }

            if (isset($data['posto'])){
                $query->where('nome_posto', 'like', '%'.$data['posto'].'%');
            }

            if (isset($data['litros'])){
                $query->where('litros', $data['litros']);
            }

        })->whereDate('data_abastecimento', '<=', date('Y-m-d', strtotime($date['fimDoPeriodo'])))
        ->whereDate('data_abastecimento', '>=', date('Y-m-d', strtotime($date['inicioDoPeriodo'])))
        ->orderBy('data_abastecimento', 'desc')
        ->paginate($totalPagina);
    }

    /**********************************************************
     * DELETAR Abastecimentos
    ***********************************************************/
    public function deletarAbastecimento($abastecimento_id)
    {
        $abastecimento = $this->find($abastecimento_id);

        $updated = $abastecimento->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Abastecimento excluído com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão do Abastecimento!'
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
}
