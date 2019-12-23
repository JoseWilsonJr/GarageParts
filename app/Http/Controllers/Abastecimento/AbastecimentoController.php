<?php

namespace App\Http\Controllers\Abastecimento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Timeline;
use App\Models\Abastecimento\Abastecimento;
use App\Http\Requests\Abastecimento\AbastecimentoRegisterRequest;

class AbastecimentoController extends Controller
{

    /*************************************************************************
     * GERENCIAR ABASTECIMENTOS
    ***************************************************************************************/
    public function index ()
    {
        $user = auth()->user()->id;
        $veiculos = Veiculo::where('user_id', '=', $user)->get();
        return view('menu.abastecimento.index', compact('veiculos'));
    }

    /*************************************************************************
     * GERENCIAR HISTORICO ABASTECIMENTOS
    ***************************************************************************************/
    public function abastecimentoHistorico ($veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->with(['abastecimentos'])->first();
        $abastecimentos = Abastecimento::where('veiculo_id', $veiculo_id)->get();

        $preco = 0;
        foreach($abastecimentos as $key => $abastecimento){
            $preco += $abastecimento->custo_total;            
        }

        return view('menu.abastecimento.gereciar-abastecimentos', compact('veiculo', 'veiculo_id', 'preco'));
    }

    /*************************************************************************
     * Filtrar ABASTECIMENTOS
    ***************************************************************************************/
    public function filtrarAbastecimentos (Request $request, Abastecimento $abastecimento, $veiculo_id)
    {
        $totalPagina = 100;
        $dataForm = $request->except(['_token', 'inicioDoPeriodo', 'fimDoPeriodo']);
        $date = $request->except(['_token','valorInicial', 'valorFinal', 'posto', 'litros']);
        $abastecimentos =  $abastecimento->filtro($dataForm, $date, $totalPagina);
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();

        $preco = 0;
        foreach($abastecimentos as $key => $abastecimento){
            $preco += $abastecimento->custo_total;            
        }

        return view('menu.abastecimento.gereciar-abastecimentos-filtro', compact('abastecimentos', 'veiculo_id', 'veiculo', 'preco'));
    }

    /*************************************************************************
     * FORMULARIO de CADASTRO DE ABASTECIMENTO
    ***************************************************************************************/
    public function cadastrarAbastecimentoForm ()
    {
        $user = auth()->user()->id;
        $veiculos = Veiculo::where('user_id', '=', $user)->get();
        return view('menu.abastecimento.cadastro-abastecimento', compact('veiculos'));
    }

    /*************************************************************************
     * REGISTAR CADASTRO de ABASTECIMENTO
    ***************************************************************************************/
    public function cadastarAbastecimento(AbastecimentoRegisterRequest $request, Abastecimento $abastecimento, Veiculo $veiculo, Timeline $timeline)
    {
        $tipo_registro = 'cadastro_abastecimento';
        $dataForm = $request->all();
        $response = $abastecimento->registrarAbastecimento($dataForm);
        $abastecimento_id = $abastecimento->where('veiculo_id', $dataForm['placaDoVeiculo'])->orderBy('created_at', 'desc')->first()->value('id');
        
        if ($response['success'])
            
            $response1 = $veiculo->atualizarHodometro($dataForm['placaDoVeiculo'], $dataForm['hodometro'], $dataForm['dataDoAbastecimento']);

            $response2 = $timeline->timelineCadastrarAbastecimento($tipo_registro, $abastecimento_id, $abastecimento->veiculo_id);
            return redirect()
                ->route( 'abastecimentos' )
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }

    /*************************************************************************
     * REGISTAR CADASTRO de ABASTECIMENTO
    ***************************************************************************************/
    public function apagarAbastecimento(Request $request, Abastecimento $abastecimento, $veiculo_id)
    {
        $requests= $request->all();
        if(isset($requests) && $requests == []){
            return redirect()
                ->back()
                ->with('error', 'Selecione ao menos um abastecimento para exclusão!');
        }else{
            foreach( $request->all() as $key => $abastecimento_id ){
                $response = $abastecimento->deletarAbastecimento($abastecimento_id);
                
                if (!$response['success'])
                return redirect()
                    ->back()
                    ->with('error', 'Falha na exclusão do(s) Abastecimento(s)!');
            }

            return redirect()
                    ->route( 'abastecimentos.gerenciar.historico', compact('veiculo_id'))
                    ->with('success', $response['message']);

            
        }

    }
}
