<?php

namespace App\Models\Notificacoes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use App\Models\Services\Servico;
use App\Models\Services\Manutencao;
use App\Models\Seguros\Seguro;
use DB;

class Pendencia extends Model
{
    protected $fillable = [
        'user_id','veiculo_id', 'servico_id', 'servico_id', 'manutencao_id', 'seguro_id', 'data_validade', 'status',
    ];
 
    protected $dates = [
        'data_validade',
    ];

    /**********************************************************
     * RENOCACAO do SEGURO
    ***********************************************************/
    public function renovarSeguro($seguro)
    {
        DB::beginTransaction();

        $this->user_id = auth()->user()->id;
        $this->categoria = 'renovar_seguro';
        $this->veiculo_id = $seguro->veiculo_id;
        $this->seguro_id = $seguro->id;
        $this->data_validade = $seguro->data_validade;
        $this->status = 'novo';

        $this->save();

        DB::commit();
    }

    /**********************************************************
     * Servicos Agendados
    ***********************************************************/
    public function registrarAgendamento($servico)
    {

        DB::beginTransaction();

        $this->user_id = auth()->user()->id;
        $this->categoria = 'servicos_agendados';
        $this->veiculo_id = $servico->veiculo_id;
        $this->servico_id = $servico->id;
        $this->data_validade = $servico->data_servico;
        $this->status = 'novo';

        $this->save();

        DB::commit();
        
    }

    /**********************************************************
     * Validade MECANICO
    ***********************************************************/
    public function registrarServicoMecanico($manutencao)
    {
        $veiculo_id = Servico::where('id', $manutencao->servico_id)->value('veiculo_id');

        DB::beginTransaction();

        $this->user_id = auth()->user()->id;
        $this->categoria = 'manutencao_mecanica';
        $this->veiculo_id = $veiculo_id;
        $this->manutencao_id = $manutencao->id;
        $this->servico_id = $manutencao->servico_id;
        $this->km_validade = $manutencao->km_validade;
        $this->data_validade = $manutencao->data_prox_troca;
        $this->status = 'novo';

        $this->save();

        DB::commit();
        
    }

    /**********************************************************
     * Validade Hidraulico
    ***********************************************************/
    public function registrarServicoHidraulico($manutencao)
    {
        $veiculo_id = Servico::where('id', $manutencao->servico_id)->value('veiculo_id');

        DB::beginTransaction();

        $this->user_id = auth()->user()->id;
        $this->categoria = 'manutencao_hidraulica';
        $this->veiculo_id = $veiculo_id;
        $this->manutencao_id = $manutencao->id;
        $this->servico_id = $manutencao->servico_id;
        $this->km_validade = $manutencao->km_validade;
        $this->data_validade = $manutencao->data_prox_troca;
        $this->status = 'novo';

        $this->save();

        DB::commit();
        
    }

    /**********************************************************
     * Validade Pneus
    ***********************************************************/
    public function registrarServicoPneu($manutencao)
    {
        $veiculo_id = Servico::where('id', $manutencao->servico_id)->value('veiculo_id');

        DB::beginTransaction();

        $this->user_id = auth()->user()->id;
        $this->categoria = 'manutencao_pneus';
        $this->veiculo_id = $veiculo_id;
        $this->manutencao_id = $manutencao->id;
        $this->servico_id = $manutencao->servico_id;
        $this->km_validade = $manutencao->km_validade;
        $this->data_validade = $manutencao->data_prox_troca;
        $this->status = 'novo';

        $this->save();

        DB::commit();
        
    }


    /**********************************************************
     * DELETAR Pendencia
    ***********************************************************/
    public function deletarPendencia($pendencia_id)
    {
        $pendencia = $this->find($pendencia_id);
        $updated = $pendencia->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'agendamento encerrada com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha ao encerrar agendamento!'
            ];
        }  
    }

    /**********************************************************
     * Altera Proprietário
    ***********************************************************/
    public function alterarProprietario($user_id, $veiculo_id)
    {
        $pendencias = $this->where('veiculo_id', $veiculo_id)->get();
        DB::beginTransaction();

        if(isset($pendencias) && $pendencias->count() != 0)
        {

            foreach($pendencias as $key => $pendencia){
            
                $updated = $pendencia->update(
                    [
                        'user_id' => $user_id,
                    ]
                );
            }
    
            if($updated){  
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'Serviços atualizados!'
                ];
            } else {
                DB::rollback();
                return [
                    'success' => false,
                    'message' => 'Falha ao criar novo serviço!'
                ];
            }
        } else {
            DB::rollback();
            return [
                'success' => true,
                'message' => 'Serviços atualizados!'
            ];
        }
    }

    /*******************
     * Relacionamentos 
    *********************/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
    public function manutencao()
    {
        return $this->belongsTo(Manutencao::class);
    }
    public function seguro()
    {
        return $this->belongsTo(Seguro::class);
    }  
}
