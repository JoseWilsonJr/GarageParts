<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Timeline;
use App\Models\Services\Servico;
use App\Models\Notificacoes\Pendencia;;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'imagem',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateUser(Array $user) : Array
    {

        DB::beginTransaction();

        $this->name = $user["nome"];
        $this->nickname = $user["apelido"];

        if($user['novaSenha'] != null && $user['confirmarSenha'] != null){
            $this->password = bcrypt($user['novaSenha']);
        }
        
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Informações atualizadas com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao atualizar as informações!'
            ];
        }

    }

    public function updateUserImage(Array $user) : Array
    {

        DB::beginTransaction();

        $this->image = $user["image"];
        
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

    /********************** 
    *Relacionamentos
    *************/
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function pendencias()
    {
        return $this->hasMany(Pendencia::class);
    }

}
