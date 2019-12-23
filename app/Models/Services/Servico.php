<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Veiculo;
use App\Models\Services\Manutencao;
use App\User;
use DB;

class Servico extends Model
{
    protected $fillable = [
        'titulo', 'user_id', 'veiculo_id', 'data_servico', 'descricao', 'km_veiculo', 'valor_total', 'anexo', 'nome_oficina', 'agendado'
    ];

    protected $dates = [
        'data_servico',
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

    public function registrarServico($servico)
    {
        $user = auth()->user()->id;

        DB::beginTransaction();

        $this->user_id = $user;
        $this->veiculo_id = $servico["placaDoVeiculo"];
        $this->data_servico = $servico["dataDoServico"];
        $this->titulo = $servico["tituloDoServico"];
        $this->km_veiculo = $servico["hodometro"];       
        $this->nome_oficina = $servico["estabelecimento"];
        $this->descricao = $servico["descricaoDoServico"];
        if(isset($servico['agendado']) && $servico['agendado'] == 'true'){
            $this->agendado = true;
        }else {
            $this->agendado = false;
        }

       
        $updated = $this->save();
        
        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Novo Serviço criado!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao criar novo serviço!'
            ];
        }
    }

    public function deletarSerico($servico_id)
    {
        $servico = $this->find($servico_id);

        $updated = $servico->delete();

        if($updated){  
            return [
                'success' => true,
                'message' => 'Servico excluído com sucesso!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Falha na exclusão do serviço!'
            ];
        }  
    }
    /**********************************************************
    * Edita as Informações do Serviço
    ***********************************************************/
    public function editServico($servico, $servico_id)
    {
        $dbServico = $this->find($servico_id);

        DB::beginTransaction();
        
        $updated = $dbServico->update(
            [
                'titulo' => $servico['tituloDoServico'],
                'nome_oficina' => $servico['estabelecimento'],
                'descricao' => $servico['descricao'],
                'km_veiculo' => $servico['hodometro'],
                // 'data_servico' => $servico['data'],
            ]
        );

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Servico atualizado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao atualizar informações do servico!'
            ];
        }
    }

    /**********************************************************
    * Atualiza o Valor Total do Serviço
    ***********************************************************/
    public function atualizaValorServico($servico_id)
    {
        $servico = $this->where('id', $servico_id)->with(['manutencoes'])->get()->first();

        if($this->valor_total){
            $valorAtual = 0.00;
        }else {
            $valorAtual = number_format($servico->valor_atual, 2, '.', '');
        };

        foreach($servico->manutencoes as $key => $manut){
            $valorAtual += $manut->valor_peca * $manut->qtd_pecas;
        }  

        DB::beginTransaction();
        
        $updated = $servico->update(
            [
                'valor_total' => $valorAtual,
            ]
        );

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Novo Serviço criado!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao criar novo serviço!'
            ];
        }
    }

    /**********************************************************
    * Atualiza o PROPRIETARIO DO VEICULO E SERVICOS
    ***********************************************************/
    public function alterarProprietario($user_id, $veiculo_id)
    {
        $servicos = $this->where('veiculo_id', $veiculo_id)->get();

        DB::beginTransaction();

        if(isset($servicos) && $servicos->count() != 0)
        {

            foreach($servicos as $key => $servico){
            
                $updated = $servico->update(
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

    public function filtro(Array $data, $totalPagina)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['inicioDoPeriodo']) && isset($data['fimDoPeriodo'])){
                $query->where('data_servico', '>=',$data['inicioDoPeriodo'])->where('data_servico', '<=', $data['fimDoPeriodo']);
            } else if(isset($data['inicioDoPeriodo'])){
                $query->where('data_servico', '>=',$data['inicioDoPeriodo']);
            } else if(isset($data['fimDoPeriodo'])){
                $query->where('data_servico', '<=', $data['fimDoPeriodo']);
            }

            if (isset($data['valorInicial']) && isset($data['valorFinal'])){
                $query->where('valor_total', '>=', $this->moeda($data['valorInicial']))->where('valor_total', '<=', $this->moeda($data['valorFinal']));
            } else if (isset($data['valorInicial'])){
                $query->where('valor_total', '>=', $this->moeda($data['valorInicial']));
            } else if (isset($data['valorFinal'])){
                $query->where('valor_total', '<=', $this->moeda($data['valorFinal']));
            }

            if (isset($data['titulo'])){
                $query->where('titulo', 'like', '%'.$data['titulo'].'%');
            }

            if (isset($data['placaDoVeiculo'])){
                $query->where('veiculo_id', $data['placaDoVeiculo']);
            }

        })->where('user_id', auth()->user()->id)
        ->paginate($totalPagina);
    }

    /**********************************************************
    * Salva anexo no serviço
    ***********************************************************/
    public function updateAnexo(Array $arquivo) : Array
    {

        DB::beginTransaction();

        $this->anexo = $arquivo['anexo'];
        
        $updated = $this->save();

        if($updated){  
            DB::commit();
            return [
                'success' => true,
                'message' => 'Anexo adicionado com êxito!'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao enviar a anexo!'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}
