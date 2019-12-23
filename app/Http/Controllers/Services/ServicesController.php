<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Garage\Veiculo;
use App\Models\Garage\Timeline;
use App\Models\Services\Servico;
use App\Models\Services\Manutencao;
use App\Http\Requests\Services\ServiceRegisterRequest;
use App\Http\Requests\Services\CadastroMecanicoFormRequest;
use App\Http\Requests\Services\CadastroHidraulicoFormRequest;
use App\Http\Requests\Services\CadastroMaoDeObraRequest;
use App\Http\Requests\Services\EditServiceRequest;
use App\Http\Requests\Services\AnexoUploadRequest;
use App\Http\Requests\Services\CadastroPneusFormRequest;
use App\Models\Notificacoes\Pendencia;

class ServicesController extends Controller
{
    public function index()
    {
        $veiculos = auth()->user()->veiculos()->get();
        $servicos = auth()->user()->servicos()->with(['veiculo'])->orderBy('data_servico', 'desc')->paginate(100);

        $preco = 0;
        foreach($servicos as $key => $servico){
            $preco += $servico->valor_total;            
        }

        return view('menu.services.index', compact('veiculos', 'servicos', 'preco'));
    }

    public function gerenciarServico(Manutencao $manutencao, Servico $servico, $servico_id)
    {  
        $manutencoes_mecanicas = $manutencao->where('servico_id', $servico_id)->where('tipo', 'Mecanica')->orderBy('created_at', 'asc')->get();
        $manutencoes_eletricas = $manutencao->where('servico_id', $servico_id)->where('tipo', 'Elétrica')->orderBy('created_at', 'asc')->get();
        $manutencoes_hidraulicas = $manutencao->where('servico_id', $servico_id)->where('tipo', 'Hidráulica')->orderBy('created_at', 'asc')->get();
        $manutencoes_pneus = $manutencao->where('servico_id', $servico_id)->where('tipo', 'Pneus')->orderBy('created_at', 'asc')->get();
        $manutencoes_mao_de_obra = $manutencao->where('servico_id', $servico_id)->where('tipo', 'Mão de Obra')->orderBy('created_at', 'asc')->get();
        $servico = auth()->user()->servicos()->where('id', $servico_id)->with(['veiculo'])->get()->first();
        return view( 'menu.services.gerenciar-servico', compact('servico', 'manutencoes_mecanicas', 'manutencoes_eletricas', 'manutencoes_hidraulicas', 'manutencoes_pneus', 'manutencoes_mao_de_obra', 'servico_id') );
    }

    public function adicionarAnexo(AnexoUploadRequest $request, Servico $servico, $servico_id)
    {
        $data = $request->all();
        $dateTime = date('Ymd-His');
        $servico = auth()->user()->servicos()->where('id', $servico_id)->get()->first();
        if ($request->hasFile('anexo') && $request->file('anexo')->isvalid()) {
            if (!isset($servico->anexo)){
                $name = $servico_id.kebab_case($servico->titulo);
                $extension = $request->anexo->extension();
                $nameFile = "{$name}-{$dateTime}.{$extension}";
            }else{
                $nameFile = $servico->anexo;
            }

            $data['anexo'] = $nameFile;

            $upload = $request->anexo->storeAs('anexos\\servicos', $nameFile);
    
            if(!$upload)
                return redirect()
                        ->route('services.gerenciar.servico', compact('servico_id'))
                        ->with('error', 'Falha ao fazer upload do anexo.');

        } else {
            return redirect()
            ->route('services.gerenciar.servico', compact('servico_id'))
            ->with('warning', 'Nenhum anexo foi selecionado.');
        }

        $response = $servico->updateAnexo($data);

        if ($response['success'])
            return redirect()
                    ->route( 'services.gerenciar.servico', compact('servico_id') )
                    ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function cadastrarServicoForm()
    {
        $veiculos = auth()->user()->veiculos()->get();
        return view('menu.services.cadastro-servico', compact('veiculos'));
    }

    /**********************************************************************************************************************
     * Função para CADASTRAR um SERVICO
    ***********************************************************************************************************************/
    public function cadastrarServico(ServiceRegisterRequest $request, Servico $servico, Pendencia $pendencia,Timeline $timeline, Veiculo $veiculo)
    {
        $tipo_registro = 'cadastrar_servico';
        $dataForm = $request->all();
        $response = $servico->registrarServico($dataForm);
        $servico_id = $servico->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        if(isset($dataForm['agendado']) && $dataForm['agendado'] && $dataForm['dataDoServico'] >= date('Y-m-d')){
            $pendencia->registrarAgendamento($servico_id);
        };
        $veiculo->atualizarHodometro($dataForm['placaDoVeiculo'], $dataForm['hodometro'], $dataForm['dataDoServico']);
        if ($response['success'])
            $response2 = $timeline->timelineCadastrarServico($tipo_registro, $servico->id, $servico->veiculo_id);
            return redirect()
                ->route( 'services' )
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }
    /**********************************************************************************************************************
    * Função para editar um SERVICO ja cadastrado
    ***********************************************************************************************************************/

    public function editarServico(EditServiceRequest $request, Servico $servico, $servico_id)
    {
        // $tipo_registro = 'editar_veiculo';
        $dataForm = $request->all();
        $response = $servico->editServico($dataForm, $servico_id);

        // $automovel = Veiculo::where('id', '=', $servico_id)->get();
        
        
        if ($response['success'])
            // $response2 = $timeline->timelineEditarVeiculo($tipo_registro, $automovel);
            return redirect()
                ->route( 'services.gerenciar.servico', $servico_id )
                ->with('success', $response['message']);

                            

        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }

    public function apagarServico(Servico $servico, $servico_id)
    {
        $response = $servico->deletarSerico($servico_id);

        if ($response['success'])
            return redirect()
                ->route( 'services' )
                ->with('success', $response['message']);

            return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function apagarManutencao(Request $request, Manutencao $manutencao, Servico $servico, $servico_id)
    {
        $requests= $request->all();
        if(isset($requests) && $requests == []){
            return redirect()
                ->back()
                ->with('error', 'Selecione ao menos uma peça para exclusão!');
        }else{
            foreach( $request->all() as $key => $manutencao_id ){
                $response = $manutencao->deletarManutencao($manutencao_id);
                
                if (!$response['success'])
                return redirect()
                    ->back()
                    ->with('error', 'Falha na exclusão das manutenções!');
            }

            $servicos = $servico->atualizaValorServico($servico_id);
            if ($response['success'])
                return redirect()
                    ->route( 'services.gerenciar.servico', compact('servico_id'))
                    ->with('success', $response['message']);
    
                return redirect()
                    ->back()
                    ->with('error', $response['message']);

        }

    }

    public function filtrarServicos(Request $request, Servico $servico)
    {
        $dataForm = $request->except('_token');
        $servicos = $servico->filtro($dataForm, 100);
        $veiculos = auth()->user()->veiculos()->get();

        $preco = 0;
        foreach($servicos as $key => $servico){
            $preco += $servico->valor_total;            
        }

        return view('menu.services.filtro', compact('veiculos', 'servicos', 'dataForm', 'preco'));
    }

    public function formularioEditarServico(Manutencao $manutencao, Servico $servico, $servico_id)
    {
        $manutencoes = $manutencao->where('servico_id', $servico_id)->orderBy('created_at', 'asc')->paginate(5);
        $servico = auth()->user()->servicos()->where('id', $servico_id)->with(['veiculo'])->get()->first();
        return view('menu.services.editar-servico-form', compact('servico_id', 'manutencoes', 'servico'));
    }

    public function formularioManutencoMecanica($servico_id)
    {
        return view('menu.services.cadastro-mecanico-form', compact('servico_id'));
    }

    public function formularioManutencaoEletrica($servico_id)
    {
        return view('menu.services.cadastro-eletrico-form', compact('servico_id'));
    }

    public function formularioManutencaoHidraulica($servico_id)
    {
        return view('menu.services.cadastro-hidraulico-form', compact('servico_id'));
    }

    public function formularioServicoPneus($servico_id)
    {
        return view('menu.services.cadastro-pneus-form', compact('servico_id'));
    }

    public function formularioManutencaoMaoDeObra($servico_id)
    {
        return view('menu.services.cadastro-mao-de-obra-form', compact('servico_id'));
    }

    /**************************************
    * Cadastrar Manutenção MECANICA
    ****************************************/
    public function cadastrarManutencaoMecanica(CadastroMecanicoFormRequest $request, Servico $servico, Manutencao $manutencao, Pendencia $pendencia, $servico_id)
    {
        $dataForm = $request->all();
        $response = $manutencao->registrarManutencaoMecanica($dataForm, $servico_id);
        $servicos = $servico->atualizaValorServico($servico_id);
        $manut = Manutencao::where('servico_id', $servico_id)->first();

    
        if(isset($dataForm['validadeKM']) ||isset($dataForm['dataValidade'])){
            $response1 = $pendencia->registrarServicoMecanico($manut);
        }

        if ($response['success'])
            return redirect()
                ->route( 'services.gerenciar.servico',  $servico_id)
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    /**************************************
    * Cadastrar Manutenção ELETRICA
    ****************************************/
    public function cadastrarManutencaoEletrica(CadastroMecanicoFormRequest $request, Servico $servico, Manutencao $manutencao, $servico_id)
    {
        $dataForm = $request->all();

        $response = $manutencao->registrarManutencaoEletrica($dataForm, $servico_id);
        $servicos = $servico->atualizaValorServico($servico_id);

        if ($response['success'])
            return redirect()
                ->route( 'services.gerenciar.servico',  $servico_id)
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    /**************************************
    * Cadastrar Manutenção HIDRAULICA
    ****************************************/
    public function cadastrarManutencaoHidraulica(CadastroHidraulicoFormRequest $request, Servico $servico, Manutencao $manutencao, Pendencia $pendencia, $servico_id)
    {
        $dataForm = $request->all();
        $response = $manutencao->registrarManutencaoHidraulica($dataForm, $servico_id);
        $servicos = $servico->atualizaValorServico($servico_id);

        $manut = Manutencao::where('servico_id', $servico_id)->first();
    
        if(isset($dataForm['kmDeAutonomia']) ||isset($dataForm['dataDeValidade'])){
            $response1 = $pendencia->registrarServicoHidraulico($manut);
        }

        if ($response['success'])
            return redirect()
                ->route( 'services.gerenciar.servico',  $servico_id)
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    /**************************************
    * Cadastrar Manutenção Pneus
    ****************************************/
    public function cadastrarManutencaoPneus(CadastroPneusFormRequest $request, Servico $servico, Manutencao $manutencao, Pendencia $pendencia, $servico_id)
    {
        $dataForm = $request->all();
        $response = $manutencao->registrarManutencaoPenus($dataForm, $servico_id);
        $servicos = $servico->atualizaValorServico($servico_id);

        $manut = Manutencao::where('servico_id', $servico_id)->first();
    
        if(isset($dataForm['kmProximaManutencao']) || isset($dataForm['dataProximaManutencao'])){
            $response1 = $pendencia->registrarServicoPneu($manut);
        }

        if ($response['success'])
            return redirect()
                ->route( 'services.gerenciar.servico',  $servico_id)
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    /**************************************
    * Cadastrar Manutenção MÃO DE OBRA
    ****************************************/
    public function cadastrarManutencaoMaoDeObra(CadastroMaoDeObraRequest $request, Servico $servico, Manutencao $manutencao, $servico_id)
    {
        $dataForm = $request->all();

        $response = $manutencao->registrarManutencaoMaoDeObra($dataForm, $servico_id);
        $servicos = $servico->atualizaValorServico($servico_id);

        if ($response['success'])
            return redirect()
                ->route( 'services.gerenciar.servico',  $servico_id)
                ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }


}
