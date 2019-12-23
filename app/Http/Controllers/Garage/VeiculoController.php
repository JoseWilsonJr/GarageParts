<?php

namespace App\Http\Controllers\Garage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Montadora;
use App\Models\Modelo_veiculo;
use App\Models\Garage\Tipo_veiculo;
use App\Models\Garage\Tipo_combustivel;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Preco_veiculo;
use App\Models\Garage\Timeline;
use App\Http\Requests\Garage\MontadoraRegisterRequest;
use App\Http\Requests\Garage\ModeloRegisterRequest;
use App\Http\Requests\Garage\VeiculoRegisterRequest;
use App\Http\Requests\Garage\VeiculoEditRequest;
use Illuminate\Support\Facades\Input;

class VeiculoController extends Controller
{
    
    public function cadastroVeiculoForm()
    {
        // $montadoras = Montadora::orderBy('name')->get();
        $tipoVeiculos = Tipo_veiculo::all();
        $tipoCombustivel = Tipo_Combustivel::all();

        return view( 'menu.garage.cadastro-veiculo', compact('tipoVeiculos', 'tipoCombustivel','montadoras'));
    }

    public function cadastrarVeiculo(VeiculoRegisterRequest $request, Timeline $timeline , Veiculo $veiculo, Preco_veiculo $preco)
    {   
        $tipo_registro = 'cadastro_veiculo';
        $dataForm = $request->all();
        $response = $veiculo->registrarVeiculo($dataForm);
        
        $automovel = Veiculo::where('placa', '=', $dataForm['placa'])->get();
        
        $response1 = $preco->registrarPrecoVeiculo($veiculo, $dataForm);
        $response2 = $timeline->timelineRegistrarVeiculo($tipo_registro, $automovel);

        if ($response['success'])
                        return redirect()
                            ->route( 'garage.gerenciar.veiculos' )
                            ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    public function editarVeiculo(VeiculoEditRequest $request, Timeline $timeline, Veiculo $veiculo, Preco_veiculo $preco, $veiculo_id)
    {
        $tipo_registro = 'editar_veiculo';
        $dataForm = $request->all();

        $response = $veiculo->editVeiculo($dataForm, $veiculo_id);

        $automovel = Veiculo::where('id', '=', $veiculo_id)->with('precos')->first();
        $preco_id = $automovel->precos()->orderBy('data_compra', 'desc')->first()->id;

        $response1 = $preco->editPrecoVeiculo($preco_id, $dataForm);  
        
        if ($response['success'])
  
            $response2 = $timeline->timelineEditarVeiculo($tipo_registro, $automovel);
            return redirect()
                ->route( 'garage.gerenciar.veiculo.detalhes', $veiculo_id )
                ->with('success', $response['message']);

                            

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    public function apagarVeiculo(Veiculo $veiculo, $veiculo_id)
    {   

        $response = $veiculo->deleteVeiculo($veiculo_id);

        if ($response['success'])
            return redirect()
                ->route( 'garage.gerenciar.veiculos' )
                ->with('success', $response['message']);

            return redirect()
                ->back()
                ->with('error', $response['message']);

    }

    public function cadastarFabricante(MontadoraRegisterRequest $request, Montadora $montadora)
    {
        $dataForm = $request->all();

        if ($request->hasFile('logoFabricante') && $request->file('logoFabricante')->isvalid()) {
            $name = $dataForm['nomeDoFabricante'];
            $extension = $request->logoFabricante->extension();
            $nameFile = "{$name}.{$extension}";

                
            $upload = $request->logoFabricante->storeAs('fabricantes', $nameFile);
                
            if(!$upload)
                return redirect()
                    ->route('garage.cadastro')
                    ->with('error', 'Falha ao fazer upload da imagem.');
        } else {
            return redirect()
                    ->back()
                    ->with('error', 'Nemhuma logomarca foi selecionada!');
        }

        $dataForm['logoFabricante'] = $nameFile;

        $response = $montadora->registrarFabricante($dataForm);
        
        if ($response['success'])
                        return redirect()
                            ->route( 'garage.cadastro' )
                            ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }


    public function cadastarModelo(ModeloRegisterRequest $request, Modelo_veiculo $modelo)
    {
        $dataForm = $request->all();
        $response = $modelo->registrarModelo($dataForm);

        if ($response['success'])
                        return redirect()
                            ->route( 'garage.cadastro' )
                            ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }
}
