<?php
 
namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notificacoes\Pendencia;
use DB;

class Manutencao extends Model
{
    protected $fillable = [
        'tipo', 'servico_id', 'nome_peca', 'qtd_pecas', 'valor_peca', 'km_validade', 'data_prox_troca', 'tipo_troca_penus'
    ];
    
    protected $dates = [
        'data_prox_troca',
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
     * Adiona manutenção MECÂNICA ao Serviço.
     **********************************************************/
    public function registrarManutencaoMecanica($manutencao, $servico_id)
    {
        DB::beginTransaction();

        $this->tipo = "Mecanica";
        $this->servico_id = $servico_id;
        $this->nome_peca = $manutencao['nomeDaPeca'];
        $this->qtd_pecas = $manutencao['quantidadeDePecas'];
        $this->valor_peca = $this->moeda($manutencao['valorPorPeca']);
        $this->valor_total = $this->moeda($manutencao['valorPorPeca'])*$manutencao['quantidadeDePecas'];
        $this->data_prox_troca = $manutencao['dataValidade'];
        $this->km_validade = $manutencao['validadeKM'];
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Peças cadastradas com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadatrar Peças!'
            ];
        }
    }
    /*********************************************************
     * Adiona manutenção ELÉTRICA ao Serviço.
     **********************************************************/
    public function registrarManutencaoEletrica($manutencao, $servico_id)
    {
        DB::beginTransaction();

        $this->tipo = "Elétrica";
        $this->servico_id = $servico_id;
        $this->nome_peca = $manutencao['nomeDaPeca'];
        $this->qtd_pecas = $manutencao['quantidadeDePecas'];
        $this->valor_peca = $this->moeda($manutencao['valorPorPeca']);
        $this->valor_total = $this->moeda($manutencao['valorPorPeca'])*$manutencao['quantidadeDePecas'];
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Peças cadastradas com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadatrar Peças!'
            ];
        }
    }

    /*********************************************************
     * Adiona manutenção HIDRAULICA ao Serviço.
     **********************************************************/
    public function registrarManutencaoHidraulica($manutencao, $servico_id)
    {
        DB::beginTransaction();

        $this->tipo = "Hidráulica";
        $this->servico_id = $servico_id;
        $this->nome_peca = $manutencao['tipoDeFluido'];
        $this->qtd_pecas = $manutencao['quantidade'];
        $this->valor_peca = $this->moeda($manutencao['valorPorUnidade']);
        $this->valor_total = $this->moeda($manutencao['valorPorUnidade'])*$manutencao['quantidade'];
        $this->km_validade = $manutencao['kmDeAutonomia'];
        $this->data_prox_troca = $manutencao['dataDeValidade'];
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Manutencão cadastrada com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadatrar Manutenção!'
            ];
        }
    }

    /*********************************************************
     * Adiona manutenção PNEUS ao Serviço.
     **********************************************************/
    public function registrarManutencaoPenus($manutencao, $servico_id)
    {
        DB::beginTransaction();

        $this->tipo = "Pneus";
        $this->servico_id = $servico_id;
        $this->nome_peca = $manutencao['descricao'];
        $this->qtd_pecas = $manutencao['quantidade'];
        $this->valor_peca = $this->moeda($manutencao['valorPorUnidade']);
        $this->valor_total = $this->moeda($manutencao['valorPorUnidade'])*$manutencao['quantidade'];
        if(isset($manutencao['kmProximaManutencao'])){
            $this->km_validade = $manutencao['kmProximaManutencao'];
        }
        if(isset($manutencao['dataProximaManutencao'])){
            $this->data_prox_troca = $manutencao['dataProximaManutencao'];
        }
        if(isset($manutencao['alinhamento'])){
            $this->alinhamento = $manutencao['alinhamento'];
        }
        if(isset($manutencao['balanceamento'])){
            $this->balanceamento = $manutencao['balanceamento'];
        }
        $this->tipo_troca_penus = $manutencao['tipoTroca'];
       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Manutencão cadastrada com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadatrar Manutenção!'
            ];
        }
    }
    /*********************************************************
     * Adiona manutenção MÃO DE OBRA ao Serviço.
     **********************************************************/
    public function registrarManutencaoMaoDeObra($manutencao, $servico_id)
    {
        DB::beginTransaction();

        $this->tipo = "Mão de Obra";
        $this->servico_id = $servico_id;
        $this->nome_peca = $manutencao['descricao'];
        $this->qtd_pecas = 1;
        $this->valor_peca = $this->moeda($manutencao['valorDaMaoDeObra']);
        $this->valor_total = $this->moeda($manutencao['valorDaMaoDeObra']);

        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Mão de obra cadastrada com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadatrar Mão de obra!'
            ];
        }
    }

    /*********************************************************
     * EXCLUI Manutenções Selecionadas
     **********************************************************/    

    public function deletarManutencao($manutencao_id)
    {
        $manutencao = $this->find($manutencao_id);

        $updated = $manutencao->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Manutenções excluídas com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão das Manutenções!'
            ];
        }  
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

}
