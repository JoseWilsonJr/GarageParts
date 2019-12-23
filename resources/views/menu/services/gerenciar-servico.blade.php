@extends('adminlte::page')

@section('title', 'GarageParts - Gerenciar Serviço')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content_header')
<h1>Serviços<small> Cadastrar Manutenção</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
        <li class="active"><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar Manutenção</li>
    </ol>
@stop
@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-clipboard fa-lg" aria-hidden="true"></i> Detalhes do Serviço</h3>
        </div>
        <div class="box-body">
            @include('includes.modals')
            @include('includes.alerts')
            @include('includes.modal-warning-excluir-sevico')
            <!-- MODAL ANEXO-->
            <div class="modal modal-default fade in" id="modal-anexo" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><i class="icon fa fa-paperclip fa-lg"></i> Adicionar Anexo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Selecionar o arquivo:</h3>
                                </div>
                                <form action="{{ route('services.editar.servico.add-anexo', $servico_id) }}" method="POST" enctype="multipart/form-data">
                                    {!! csrf_field() !!}    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input id="anexo" name="anexo" type="file">
                                            <p class="help-block">Clique no botão para selecionar o arquivo.</p>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon fa fa-share fa-lg"></i> Enviar arquivo
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="confirm-anexo" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-horizontal"> 
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-2">
                        <a href="{{ route( 'services.editar.servico', $servico_id ) }}" class="btn btn-default btn-block"><i class="icon fa fa-pencil-square-o fa-lg"></i> Editar Serviço</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#modal-anexo"><i class="icon fa fa-paperclip fa-lg"></i> Anexar Nota Fiscal</a>
                    </div>
                </div> 
                <hr>
                <div class="form-group">
                    <label for="placa" class="col-sm-2 control-label">Referente ao Veículo</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="placa">{{ $servico->veiculo->placa  }}</p>
                    </div>
                    <label for="descricaoDoServico" class="col-sm-2 control-label">KM do Veículo</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="descricaoDoServico">{{ number_format($servico->km_veiculo, 0, '','.') }}</p>
                    </div>           
                    <label for="ValorTotal" class="col-sm-1 control-label">Total</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="valorTotal">R$ {{ number_format($servico->valor_total, 2, ',', '.')}}</p>
                    </div>            
                </div>
                <div class="form-group">
                    <label for="tituloDoServico" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-6">
                        <p class="form-control" name="tituloDoServico">{{ $servico->titulo }}</p>
                    </div>
                    <label for="RegistradoEm" class="col-sm-1 control-label">Data</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="RegistradoEm">{{ $servico->data_servico->format('d/m/Y') }}</p>
                    </div> 
                </div> 
                <div class="form-group">
                    <label for="estabelecimento" class="col-sm-2 control-label">Estabelecimento</label>
                    <div class="col-sm-9">
                        <p class="form-control" name="estabelecimento" value="{{ old('estabelecimento') }}" placeholder="Adicione o nome do estabelecimento">{{ $servico->nome_oficina }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" style="resize: none;" readonly="readonly" name="descricao" value="{{ old('descricao') }}" placeholder="Adicione o nome do estabelecimento">{{ $servico->descricao }}</textarea>
                    </div>
                </div> 
                @if(isset($servico->anexo))
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-3">
                        <a href="{{ url('storage/anexos/servicos/'.$servico->anexo) }}" class="btn btn-default btn-block"><i class="fa fa-search fa-lg" aria-hidden="true"></i> Vizualizar anexo</a>
                    </div>
                </div> 
                @endif
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <a href="{{ route('services') }}" class="btn btn-primary btn-block"><i class="icon fa fa-arrow-left fa-lg"></i> Retornar ao Gerenciamento</a>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Serviço</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> Adicionar Peças ao Serviço</h3>
        </div>
        <div class="box-body">

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-2">
                    <a class="btn btn-default btn-block" href="{{ route('service.cadastro.mecanico.form', $servico_id) }}">
                        <i class="icon fa fa-wrench fa-lg"></i> Mecânica
                    </a>
                </div>  
                <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="{{ route('service.cadastro.eletrico.form', $servico_id ) }}">
                        <i class="icon fa fa-bolt fa-lg"></i> Elétrica
                    </a>
                </div>  
                <div class="col-sm-2">
                    <a class="btn btn-default btn-block " href="{{ route('service.cadastro.hidraulico.form', $servico_id ) }}">
                        <i class="icon fa fa-tint fa-lg"></i> Hidraulica
                    </a>
                </div>  
                <div class="col-sm-2">
                    <a class="btn btn-default btn-block " href="{{ route('service.cadastro.pneus.form', $servico_id ) }}">
                        <i class="icon fa fa-cog fa-lg"></i> Pneus
                    </a>
                </div>  
                <div class="col-sm-2">
                    <a class="btn btn-default btn-block " href="{{ route('service.cadastro.mao-de-obra.form', $servico_id) }}">
                        <i class="icon fa fa-sign-language  fa-lg"></i> Mão de Obra
                    </a>
                </div>  
            </div>
        </div>
        <div class="content">
            @include('includes.alerts')

            <form action="{{ route('services.gerenciar.manutencao.delete', $servico_id)}}">
                @include('includes.modal-warning-excluir-manutencao')
                <!-- MECANICA -->
                @if(isset($manutencoes_mecanicas)&& $manutencoes_mecanicas->count() != 0)
                    <div class="box-background box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"> <i class="icon fa fa-wrench fa-lg"></i> Mecânica</h3>
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-manut"><i class="fa fa-ban fa-sm" aria-hidden="true"></i> Excluir Seleção</button>
                            </div>
                        </div>
                        <div class="box-body">
                            
                                <div style="overflow-x:auto;">
                                    <table class="tg table">
                                        <tbody>
                                            <tr>
                                                <th class="tg-k4wc">#</th>
                                                <th class="tg-k4wc">Nome</th>
                                                <th class="tg-k4wc">Quantidade</th>
                                                <th class="tg-k4wc">Custo por peça</th>
                                                <th class="tg-k4wc">Validade (KM)</th>
                                                <th class="tg-k4wc">Prox. Troca</th>
                                                <th class="tg-k4wc">Custo total</th>
                                            </tr>
                                            @forelse($manutencoes_mecanicas as $key => $manutencao)
                                            <tr>
                                                <td class="tg-n62z"><input name="manutencao_{{ $manutencao->id }}" type="checkbox" value="{{ $manutencao->id }}"></td>
                                                <td class="tg-n62z">{{ $manutencao->nome_peca }}</td>
                                                <td class="tg-n62z">{{ $manutencao->qtd_pecas }}</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_peca, 2, ',', '.') }}</td>
                                                @if(!$manutencao->km_validade)<td class="tg-n62z">--</td>@else<td class="tg-n62z">{{ number_format($manutencao->km_validade, 0, ',', '.') }}</td>@endif
                                                @if(!$manutencao->data_prox_troca) <td class="tg-n62z">--</td> @else<td class="tg-n62z">{{ $manutencao->data_prox_troca->format('d/m/Y') }}</td>@endif
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_total, 2, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                @else
                @endif
                <!-- ELETRICA  -->
                @if(isset($manutencoes_eletricas)&& $manutencoes_eletricas->count() != 0)
                    <div class="box-background box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="icon fa fa-bolt fa-lg"></i> Elétrica </h3>
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-manut"><i class="fa fa-ban fa-sm" aria-hidden="true"></i> Excluir Seleção</button>
                            </div>
                        </div>

                        <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <table class="tg table">
                                        <tbody>
                                            <tr>
                                                <th class="tg-k4wc">#</th>
                                                <th class="tg-k4wc">Nome</th>
                                                <th class="tg-k4wc">Quantidade</th>
                                                <th class="tg-k4wc">Custo por peça</th>
                                                <th class="tg-k4wc">Custo total</th>
                                            </tr>
                                            @forelse($manutencoes_eletricas as $key => $manutencao)
                                            <tr>
                                                <td class="tg-n62z"><input name="manutencao_{{ $manutencao->id }}" type="checkbox" value="{{ $manutencao->id }}"></td>
                                                <td class="tg-n62z">{{ $manutencao->nome_peca }}</td>
                                                <td class="tg-n62z">{{ $manutencao->qtd_pecas }}</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_peca, 2, ',', '.') }}</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_total, 2, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                @else
                @endif
                <!-- HIDRAULICA  -->
                @if(isset($manutencoes_hidraulicas)&& $manutencoes_hidraulicas->count() != 0)
                    <div class="box-background box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="icon fa fa-tint fa-lg"></i> Hidraulica </h3>
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-manut"><i class="fa fa-ban fa-sm" aria-hidden="true"></i> Excluir Seleção</button>
                            </div>
                        </div>

                        <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <table class="tg table">
                                        <tbody>
                                            <tr>
                                                <th class="tg-k4wc">#</th>
                                                <th class="tg-k4wc">Nome</th>
                                                <th class="tg-k4wc">Quantidade</th>
                                                <th class="tg-k4wc">Custo por Litro</th>
                                                <th class="tg-k4wc">Validade (Km)</th>
                                                <th class="tg-k4wc">Prox. Troca</th>
                                                <th class="tg-k4wc">Custo Total</th>
                                            </tr>
                                            @forelse($manutencoes_hidraulicas as $key => $manutencao)
                                            <tr>
                                                <td class="tg-n62z"><input name="manutencao_{{ $manutencao->id }}" type="checkbox" value="{{ $manutencao->id }}"></td>
                                                <td class="tg-n62z">{{ $manutencao->nome_peca }}</td>
                                                <td class="tg-n62z">{{ $manutencao->qtd_pecas }}</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_peca, 2, ',', '.') }}</td>
                                                @if(!$manutencao->km_validade)<td class="tg-n62z">--</td>@else<td class="tg-n62z">{{ number_format($manutencao->km_validade, 0, ',', '.') }}</td>@endif
                                                @if(!$manutencao->data_prox_troca) <td class="tg-n62z">--</td> @else<td class="tg-n62z">{{ $manutencao->data_prox_troca->format('d/m/Y') }}</td>@endif
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_total, 2, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                @else
                @endif
                <!-- PNEUS  -->
                @if(isset($manutencoes_pneus)&& $manutencoes_pneus->count() != 0)
                    <div class="box-background box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="icon fa fa-cog fa-lg"></i> Pneus </h3>
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-manut"><i class="fa fa-ban fa-sm" aria-hidden="true"></i> Excluir Seleção</button>
                            </div>
                        </div>
                        <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <table class="tg table">
                                        <tbody>
                                            <tr>
                                                <th class="tg-k4wc">#</th>
                                                <th class="tg-k4wc">Nome</th>
                                                <th class="tg-k4wc">Qtd</th>
                                                <th class="tg-k4wc">Valor Pneu</th>
                                                <th class="tg-k4wc">Validade (Km)</th>
                                                <th class="tg-k4wc">Prox. Manut.</th>
                                                <th class="tg-k4wc">Alin.</th>
                                                <th class="tg-k4wc">Balan.</th>
                                                <th class="tg-k4wc">Troca Pneus</th>
                                                <th class="tg-k4wc">Custo Total</th>
                                            </tr>
                                            @forelse($manutencoes_pneus as $key => $manutencao)
                                            <tr>
                                                <td class="tg-n62z"><input name="manutencao_{{ $manutencao->id }}" type="checkbox" value="{{ $manutencao->id }}"></td>
                                                <td class="tg-n62z">{{ $manutencao->nome_peca }}</td>
                                                <td class="tg-n62z">{{ $manutencao->qtd_pecas }}</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_peca, 2, ',', '.') }}</td>
                                                @if(!$manutencao->km_validade)<td class="tg-n62z">--</td>@else<td class="tg-n62z">{{ number_format($manutencao->km_validade, 0, ',', '.') }}</td>@endif
                                                @if(!$manutencao->data_prox_troca) <td class="tg-n62z">--</td> @else<td class="tg-n62z">{{ $manutencao->data_prox_troca->format('d/m/Y') }}</td>@endif
                                                @if($manutencao->alinhamento == 1)<td class="tg-n62z"><span class="text-green"><i class="fa fa-check" aria-hidden="true"></i></span></td>@else <td class="tg-n62z"> </td>@endif
                                                @if($manutencao->balanceamento == 1)<td class="tg-n62z"><span class="text-green"><i class="fa fa-check" aria-hidden="true"></i></span></td>@else <td class="tg-n62z"> </td>@endif
                                                @if(strcmp($manutencao->tipo_troca_penus, 'C') == 0)<td class="tg-n62z">Completa</td>@elseif(strcmp($manutencao->tipo_troca_penus, 'D') == 0) <td class="tg-n62z"> Dianteiros </td>@elseif(strcmp($manutencao->tipo_troca_penus, 'T') == 0)<td class="tg-n62z"> Traseiros </td>@endif
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_total, 2, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                @else
                @endif
                <!-- MAO DE OBRA  -->
                @if(isset($manutencoes_mao_de_obra)&& $manutencoes_mao_de_obra->count() != 0)
                    <div class="box-background box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="icon fa fa-sign-language  fa-lg"></i> Mão de Obra </h3>
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-manut"><i class="fa fa-ban fa-sm" aria-hidden="true"></i> Excluir Seleção</button>
                            </div>
                        </div>
                        <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <table class="tg table">
                                        <tbody>
                                            <tr>
                                                <th class="tg-k4wc">#</th>
                                                <th class="tg-k4wc">Descrição</th>
                                                <th class="tg-k4wc"> </th>
                                                <th class="tg-k4wc">Custo</th>
                                            </tr>
                                            @forelse($manutencoes_mao_de_obra as $key => $manutencao)
                                            <tr>
                                                <td class="tg-n62z"><input name="manutencao_{{ $manutencao->id }}" type="checkbox" value="{{ $manutencao->id }}"></td>
                                                <td class="tg-n62z">{{ $manutencao->nome_peca }}</td>
                                                <td class="tg-n62z">---------------------</td>
                                                <td class="tg-n62z">R$ {{ number_format($manutencao->valor_total, 2, ',', '.') }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                @else
                @endif
            </form>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush