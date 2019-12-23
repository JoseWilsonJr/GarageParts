<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Image_profile;
use App\Models\Garage\Transferencia;
use App\Models\Abastecimento\Abastecimento;
use App\Models\Services\Servico;
use App\user;
use DB;

class Timeline extends Model
{
    protected $fillable = [
      'transferencia_id', 'comprador', 'user_id', 'veiculo_id', 'tipo_registro', 'servico_id', 'image', 'created_at', 'updated_at',
    ];

    public function timelineRegistrarVeiculo($tipo_registro, $veiculo) 
    {
        $user = auth()->user()->id;

        DB::beginTransaction();

        $this->user_id = $user;
        $this->veiculo_id = $veiculo[0]->id;
        $this->tipo_registro = $tipo_registro;
        $this->save();

        DB::commit();
    }

    public function timelineEditarVeiculo($tipo_registro, $veiculo) 
    {
        $user = auth()->user()->id;
        DB::beginTransaction();

        $this->user_id = $user;
        $this->veiculo_id = $veiculo->id;
        $this->tipo_registro = $tipo_registro;
        $this->save();
        
        DB::commit();
    }

    public function timelineAtualizarProfile($tipo_registro)
    {
        $user = auth()->user()->id;
        
        DB::beginTransaction();

        $this->user_id = $user;
        $this->tipo_registro = $tipo_registro;
        $this->save();
        
        DB::commit();
    }
    
    public function timelineAtualizarImagemProfile($tipo_registro)
    {
        $user = auth()->user()->id;
        $image = auth()->user()->image;
        
        DB::beginTransaction();

        $this->user_id = $user;
        $this->tipo_registro = $tipo_registro;
        $this->image = $image;
        $this->save();
        
        DB::commit();
    }

    public function timelineCadastrarServico($tipo_registro, $servico_id, $veiculo_id)
    {
        $user = auth()->user()->id;
        
        DB::beginTransaction();

        $this->user_id = $user;
        $this->veiculo_id = $veiculo_id;
        $this->tipo_registro = $tipo_registro;
        $this->servico_id = $servico_id;
        $this->save();

        DB::commit();
    }

    public function timelineCadastrarAbastecimento($tipo_registro, $abastecimento_id, $veiculo_id)
    {
        $user = auth()->user()->id;
        
        DB::beginTransaction();

        $this->user_id = $user;
        $this->veiculo_id = $veiculo_id;
        $this->tipo_registro = $tipo_registro;
        $this->abastecimento_id = $abastecimento_id;
        $this->save();

        DB::commit();
    }
    
    /********************************
    * Atualiza Poprietáro
    ****************************************/

    public function alterarProprietario($comprador_id, $veiculo_id, $transferencia_id)
    {
        $timelines = $this->where('veiculo_id', $veiculo_id)->get();

        DB::beginTransaction();

        foreach($timelines as $key => $timeline){
            
            if(strcmp($timeline->tipo_registro,"transferencia_veiculo") != 0) {
                $updated = $timeline->update(
                    [
                        'user_id' => $comprador_id,
                    ]
                );
            }
        }

        $this->user_id = auth()->user()->id;
        $this->veiculo_id = $veiculo_id;
        $this->tipo_registro = "transferencia_veiculo";
        $this->transferencia_id = $transferencia_id;
        $updated = $this->save();

        if($updated){  
        
            DB::commit();

            return [
                'success' => true,
                'message' => 'Transferencia concluída com êxito'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao concluir transferencia novo serviço!'
            ];
        }
    }

    public function registrarComprador($comprador_id, $veiculo_id, $transferencia_id)
    {
        DB::beginTransaction();

        $this->user_id = $comprador_id;
        $this->veiculo_id = $veiculo_id;
        $this->tipo_registro = "transferencia_compra";
        $this->save();

        DB::commit();
    }

    /*******************
     * Filtro Timeline
    *********************/
        public function filtro(Array $data, Array $date, $totalPagina)
    {
    
        if (!isset($date['start'])){
            $date = [
               'end' => date('Y-m-d'),
               'start' => date('Y-m-d', strtotime('-100 year')),
            ];
        }
        return $this->where(function ($query) use ($data) {

            if (isset($data['checkVeiculos']) && ($data['checkVeiculos'] == 1)){
                $query->orWhere('tipo_registro', '=', 'cadastro_veiculo')
                      ->orWhere('tipo_registro', '=', 'editar_veiculo');
            }
            if (isset($data['checkAbastecimentos']) && ($data['checkAbastecimentos'] == 2)){
                $query->orWhere('tipo_registro', '=', 'cadastro_abastecimento');
            }

            if (isset($data['checkServicos']) && ($data['checkServicos'] == 4)){
                $query->orWhere('tipo_registro', '=', 'cadastrar_servico');
            }

            if (isset($data['checkTransferencias']) && ($data['checkTransferencias'] == 8)){
                $query->orWhere('tipo_registro', '=', 'transferencia_veiculo');
            }

        })->where('user_id', auth()->user()->id)
        ->whereDate('created_at', '<=', date('Y-m-d', strtotime($date['end'])))
        ->whereDate('created_at', '>=', date('Y-m-d', strtotime($date['start'])))
        ->orderBy('created_at', 'desc')->get();
    }

    /*******************
     * Relacionamentos 
    *********************/
    public function image_profile()
    {
        return $this->hasOne(Image_profile::class);
    }

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
    public function abastecimento()
    {
        return $this->belongsTo(Abastecimento::class);
    }
    public function transferencia()
    {
        return $this->belongsTo(Transferencia::class);
    }
}