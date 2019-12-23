<?php

namespace App\Http\Controllers\Garage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Preco_veiculo;
use App\Models\Garage\Timeline;
use App\Models\Garage\Transferencia;
use App\Models\Garage\Image_profile;
use App\Models\Garage\Galeria;
use App\Models\Services\Servico;
use App\Models\Abastecimento\Abastecimento;
use App\Models\Notificacoes\Pendencia;
use App\Http\Requests\Garage\TransferirVeiculoRequest;
use App\Models\Montadora;
use App\User;
use DB;

class GarageController extends Controller
{

    public function index(Timeline $comprador, $qtdPagina)
    {
        $qtdPaginas = $qtdPagina;
        if($qtdPaginas === 'linha-do-tempo'){
            $qtdPaginas = 5;
        }
        $checked = 16;
        $radio = 9;
        $times = auth()->user()->timelines()->with(['servico', 'veiculo', 'user', 'image_profile', 'abastecimento', 'transferencia'])->orderBy('created_at', 'desc')->paginate($qtdPaginas);
        $users = User::select(['id','name'])->get();
        return view( 'menu.garage.index', compact('times', 'qtdPaginas', 'checked', 'radio', 'users') );
    }

    public function timelineFiltro(Timeline $timeline, Request $request)
    {

        $qtdPaginas = 5;
        $dataForm = $request->except(['_token','start', 'end']);
        $date = $request->except(['_token','checkVeiculos','checkAbastecimentos', 'checkServicos','checkTransferencias']);
        $checked = 0;
        foreach($dataForm as $key  => $data){
            $checked += $data;
        }
        //$times = auth()->user()->timelines()->with(['servico', 'veiculo', 'user', 'image_profile'])->orderBy('created_at', 'desc')->paginate($qtdPaginas);
        $times = $timeline->filtro($dataForm, $date,10);
        return view( 'menu.garage.index', compact('times', 'qtdPaginas', 'checked', 'radio', 'dataForm') );
    }

    public function gerenciarVeiculos (Veiculo $veiculo)
    {
        $montadoras = Montadora::orderBy('id')->get();
        $user = auth()->user()->id;
        $veiculos = Veiculo::where('user_id', '=', $user)->get();

        return view( 'menu.garage.gerenciar-veiculos', compact('veiculos') );
    }

    public function detalhesVeiculo(Veiculo $veiculo, Servico $servicos, Galeria $imagens, $veiculo_id)
    {
        $imagens = Galeria::where('veiculo_id', $veiculo_id)->get();
        $servicos = auth()->user()->servicos()->with(['veiculo'])->where('veiculo_id', $veiculo_id)->orderBy('data_servico', 'desc')->get();
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->with('precos')->first();
        $preco = 0;
        foreach($servicos as $key => $servico){
            $preco += $servico->valor_total;            
        }
        return view('menu.garage.detalhes-veiculo', compact('veiculo', 'servicos', 'imagens', 'veiculo_id', 'preco'));
    }

    public function editarVeiculo(Veiculo $veiculo, $id)
    {
        $veiculo = Veiculo::where('id', '=', $id)->with('precos')->first();
        return view('menu.garage.editar-veiculo', compact('veiculo'));
    }
    /*************************************************************************
     * TRANSFERIR veículo de proprietário
     ***************************************************************************************/

    public function transferenciaVeiculo($veiculo_id)
    {
        $veiculo = Veiculo::where('id', $veiculo_id)->first();
        return view('menu.garage.tranferencia-veiculo', compact('veiculo'));
    }

    public function confirmarTransferenciaVeiculo(TransferirVeiculoRequest $request, User $user, $veiculo_id)
    {
        $dataForm = $request->except(['_token', 'nomeDoComprador']);
        $users = User::where('name', 'like', "%".$request->nomeDoComprador."%")->get();
        if(isset($users) && $users->count() == 0){
            return redirect()
                    ->back()
                    ->with('error', 'Usuário não pode ser localizado através dos dados informados.');
        } else {
            $veiculo = Veiculo::where('id', $veiculo_id)->first();
            $dadosConfirm = collect();

            foreach ($users as $key => $user) {
                $dadosUsuario = [
                    'id'     => $user->id,
                    'nome'   => $user->name,
                    'imagem' => $user->image,
                    'email'  => $user->email,
                ];
                $dadosConfirm->push($dadosUsuario);
            }
            return view('menu.garage.transferencia-veiculo-confirmar', compact('dadosConfirm', 'veiculo', 'dataForm', 'veiculo_id'));
        }
        
    }

    public function efetivarTransferenciaVeiculo(Request $request, Servico $servico, Preco_veiculo $preco, Timeline $timeline, Transferencia $transferencia, Pendencia $pendencia, $veiculo_id)
    {
        $dataForm = $request->all();
        $comprador_id = User::where('email', $dataForm['email'])->value('id');
        $veiculo = Veiculo::where('id', $veiculo_id)->first();
        if($comprador_id == auth()->user()->id){
            return redirect()
                ->route('garage.gerenciar.veiculo.trasferencia', compact('veiculo_id'))
                ->with('error', 'Não é possível transferir o veículo para o Proprietário Atual.');
        }

        $response = $veiculo->alterarProprietario($comprador_id, $veiculo_id);
        $response1 = $preco->registrarPrecoVeiculo($veiculo, $dataForm);

        if ($response['success']){

            $response = $servico->alterarProprietario($comprador_id, $veiculo_id);

            if ($response['success']){

                $response = $transferencia->registrarTransferencia($comprador_id, $veiculo_id);
                
                if ($response['success']){

                    $transferencia_id = Transferencia::where('comprador_id', $comprador_id)->where('vendedor_id', auth()->user()->id)->orderBy('created_at', 'desc')->value('id');

                    $response = $timeline->alterarProprietario($comprador_id, $veiculo_id, $transferencia_id);
                    
                    $response1 = $pendencia->alterarProprietario($comprador_id, $veiculo_id);

                    if ($response['success']){

                        return redirect()
                        ->route( 'garage.gerenciar.veiculos' )
                        ->with('success', $response['message']);
                    }  

                }

            }
        }

    return redirect()
            ->back()
            ->with('error', $response['message']);
    }

    public function adicionarFotoGaleira(Request $request, Galeria $galeria, $veiculo_id)
    {
        $tipo_registro = 'add_imagem_galeria';
        $veiculo = Veiculo::where('id', '=', $veiculo_id)->get()->first();
        $data = $request->all();
        $dateTime = date('Ymd-His');

        if ($request->hasFile('image') && $request->file('image')->isvalid()) {
            $extension = $request->image->extension();
            $nameFile = "{$veiculo->id}_{$veiculo->placa}_{$dateTime}.{$extension}";
        
            $data['image'] = $nameFile;

            $upload = $request->image->storeAs('galeria', $nameFile);
    
            if(!$upload)
                return redirect()
                        ->route('garage.gerenciar.veiculo.detalhes', compact('veiculo_id'))
                        ->with('error', 'Falha ao fazer upload da imagem.');
                                             
        } else {
            return redirect()
            ->route('garage.gerenciar.veiculo.detalhes', compact('veiculo_id'))
            ->with('warning', 'Nenhum arquivo de imagem foi selecionado.');
        }

        $response = $galeria->addVeiculoGaleriaImagem($data, $veiculo_id);

        if ($response['success'])
            // $response2 = $timeline->timelineAtualizarImagemProfile($tipo_registro);

            // $timelineRef = Timeline::where('image', '=', $nameFile)->get();

            // $response3 = $imageProfile->timelineHistoricImageProfile($timelineRef);
            return redirect()
                    ->route( 'garage.gerenciar.veiculo.detalhes', compact('veiculo_id') )
                    ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('error', $response['message']);
    }


    public function apagarImagensGaleria(Request $request, Galeria $imagens, $veiculo_id)
    {
        $requests = $request->all();
        if(isset($requests) && $requests == []){
            return redirect()
                ->back()
                ->with('error', 'Selecione ao menos uma imagem para exclusão!');
        }else{
            foreach( $request->all() as $key => $imagem_id ){
                $response = $imagens->deletarFotosGaleria($imagem_id);
                
                if (!$response['success'])
                return redirect()
                    ->back()
                    ->with('error', 'Falha na exclusão das Fotos!');
            }

            if ($response['success'])
                return redirect()
                    ->route( 'garage.gerenciar.veiculo.detalhes', compact('veiculo_id'))
                    ->with('success', $response['message']);
    
                return redirect()
                    ->back()
                    ->with('error', $response['message']);

        }

    }

}
        