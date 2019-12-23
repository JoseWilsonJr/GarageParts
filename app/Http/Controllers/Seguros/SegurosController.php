<?php

namespace App\Http\Controllers\Seguros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguros\Seguro;
use App\Models\Seguros\Historico_seguro;
use App\Models\Garage\Veiculo;
use App\Models\Notificacoes\Pendencia;
use App\Http\Requests\Seguros\SeguroRegisterRequest;
use App\Http\Requests\Seguros\RenovarSeguroRegisterRequest;

class SegurosController extends Controller
{
    public function index (Request $request, Seguro $seguros)
    {
        $veiculos = auth()->user()->veiculos()->with('seguros')->get();
        foreach($veiculos as $key => $veiculo){
            $seguro = Seguro::where('veiculo_id', $veiculo->id)->get();
            if(isset($seguro) && $seguro->count() != 0){
                return view('menu.seguros.index', compact('veiculos', 'ativo'));
            }                
            
        }
        $seguro = [];
        return view('menu.seguros.index', compact('seguro'));
    }

    /**********************************************************
     * Formulário de CADASTRO do SEGURO
    ***********************************************************/
    public function cadastrarSegurosForm ()
    {
        $veiculos = auth()->user()->veiculos()->get();
        return view('menu.seguros.cadastro-seguros', compact('veiculos'));
    }

    /**********************************************************
     * Registrar CADASTRO do SEGURO
    ***********************************************************/
    public function cadastrarSeguros (SeguroRegisterRequest $request, Seguro $seguro, Pendencia $pendencias)
    {
        $tipo_registro = 'cadastro_seguro';
        $dataForm = $request->all();
        $seguros = Seguro::where('veiculo_id', $dataForm['placaDoVeiculo'])->get();
        foreach($seguros as $key => $seguro)
            if(isset($seguro->status))
            return redirect()
                ->back()
                ->with('error', 'Seguro já cadastrado para este veículo. Caso queira renovar um seguro, utilize o menu Grenciar Seguros, selecione Detalhar do veículo desejado clique no botão Renovar Seguro!');

        $response = $seguro->registrarSeguro($dataForm, $dataForm['placaDoVeiculo']);

        if ($response['success'])
            $seguros = Seguro::where('veiculo_id', $dataForm['placaDoVeiculo'])->first();
            $response2 = $pendencias->renovarSeguro($seguros);
        
            return redirect()
                ->route( 'seguros' )
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    /**********************************************************
     * DETALHES do SEGURO
    ***********************************************************/
    public function detalhesSeguro (Veiculo $veiculo, $veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();
        $seguro = Seguro::where('veiculo_id', $veiculo_id)->first();
        $inativos = Historico_seguro::where('veiculo_id', $veiculo_id)->get();
        return view('menu.seguros.gerenciar-detalhes', compact('veiculo', 'veiculo_id', 'inativos','seguro'));
    }

    /**********************************************************
     * RENOVAR SEGURO
    ***********************************************************/
    public function renovarSeguroForm (Veiculo $veiculo, $seguro_id)
    {
        $seguro = Seguro::where('id', $seguro_id)->first();
        return view('menu.seguros.renovar-seguro-form', compact('seguro'));
    }

    /**********************************************************
     * RENOVAR CADASTRO DO SERGURO
    ***********************************************************/
    public function renovarCadastroSeguro (RenovarSeguroRegisterRequest $request, Historico_seguro $historico, Seguro $seguro, Pendencia $pendencias)
    {
        $dataForm = $request->all();
        $seguroAtual = Seguro::where('id', $dataForm['id'])->first();
        $pendencia_id = Pendencia::where('seguro_id', $dataForm['id'])->value('id');
        $veiculo_id = $seguroAtual->veiculo_id;
        $response = $historico->atualizarHistorico($seguroAtual);
        
        if($response['success']){
            
            $response = $seguro->deletarSeguro($dataForm['id']);
            
            if($response['success']){

                $seguro->registrarSeguro($dataForm, $veiculo_id);

                if ($response['success'])
                            $seguros = Seguro::where('veiculo_id', $veiculo_id)->first();
                            $pendencias->renovarSeguro($seguros);                                           
                            return redirect()
                                ->route( 'seguros' )
                                ->with('success', $response['message']);
                
                        return redirect()
                                    ->back()
                                    ->with('error', $response['message']);
            }else {
                return redirect()
                ->back()
                ->with('error', $response['message']);
            }
        }else {
            return redirect()
            ->back()
            ->with('error', $response['message']);
        }
    }

    /**********************************************************
     * RENOVAR CADASTRO DO SERGURO
    ***********************************************************/
    public function excluirSeguro (Historico_seguro $historico, Seguro $ativo, $seguro_id)
    {
        $seguro = Seguro::where('id', $seguro_id)->first();
        $response = $historico->deletarHistoricoSeguro($seguro->veiculo_id);
        if($response['success']){
            $response = $ativo->deletarSeguro($seguro->id);
            if ($response['success'])
                return redirect()
                    ->route( 'seguros' )
                    ->with('success', $response['message']);
        }
    }
}
