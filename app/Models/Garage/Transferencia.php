<?php

namespace App\Models\Garage;
use App\user;
use DB;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    protected $fillable = [
        'vendedor_id', 'comprador_id', 'veiculo_id',
    ];

    public function registrarTransferencia($comprador_id, $veiculo_id)
    {
        DB::beginTransaction();

        $this->vendedor_id = auth()->user()->id;
        $this->comprador_id = $comprador_id;
        $this->veiculo_id = $veiculo_id;
        $updated = $this->save();

        DB::commit();
        
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

    /*******************
     * Relacionamentos 
    *********************/
    public function vendedores()
    {
        return $this->belongsTo(User::class);
    }

    /****************
     * Relacionamentos
    ********/
    public function timeline()
    {
        return $this->hasMany(Timeline::class);
    }

}
