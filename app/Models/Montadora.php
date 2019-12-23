<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Montadora extends Model
{
    protected $fillable = [
        'name', 'logo',
    ];
    
    public function registrarFabricante($veiculo)
    {

        DB::beginTransaction();

        $this->name = $veiculo['nomeDoFabricante'];
        $this->logo = $veiculo['logoFabricante'];
        
        $updated = $this->save();

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Fabricante cadastrado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadastrar novo fabricante!'
            ];
        }

    }
}
