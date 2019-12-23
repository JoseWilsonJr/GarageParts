<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modelo_veiculo extends Model
{
    protected $table = 'modelo_veiculos';
    
    protected $fillable = [
        'name', 'montadora_id',
    ];

    public function registrarModelo($modelo)
    {
        $idMontadora = DB::table('montadoras')->where('name', $modelo['marca'] )->value('id');
 
        DB::beginTransaction();

        $this->name = $modelo['nomeDoModelo'];
        $this->montadora_id = $idMontadora;
        
        $updated = $this->save();

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Modelo cadastrado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao cadastrar novo modelo!'
            ];
        }
    }
}
