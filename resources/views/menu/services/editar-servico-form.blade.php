@extends('adminlte::page')

@section('title', 'GarageParts - Gerenciar Serviço')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Serviços<small> Editar</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
        <li class="active"><i class="fa fa-pencil-square-o fa-lg" aria-hiden></i> Editar Serviço</li>
    </ol>
@stop
@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Editar Informações do Serviço</h3>

        </div>
        <div class="box-body">

            @include('includes.modals')
            <div class="modal modal-warning fade in" id="modal-delete" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Esta ação não poderá ser desfeita!</p>
                            <p>A EXCLUSÂO desse SERVICO implica na excluasão de todas as informações relacionadas a ele, tem certeza que deseja executar a exclusão deste veículo?</p>
                        </div>  
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-outline" href="{{ route( 'services.gerenciar.servico.delete', $servico_id ) }}">Sim!</a>
                            <button type="button" id="confirm-delete" class="btn btn-primary btn-outline pull-left" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('services.editar.servico', $servico_id) }}" class="form-horizontal" method="POST">
                {!! csrf_field() !!} 
                @include('includes.alerts') 
                <div class="form-group">
                    <label for="placa" class="col-sm-2 control-label">Referente ao Veículo</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="placa" disabled>{{ $servico->veiculo->placa  }}</p>
                    </div>
                    <label for="hodometro" class="col-sm-2 control-label">Hodômetro</label>
                    <div class="col-sm-2">
                        <input class="form-control" name="hodometro" value="{{ $servico->km_veiculo }}">
                    </div>           
                    <label for="ValorTotal" class="col-sm-1 control-label">Total</label>
                    <div class="col-sm-2">
                        <p class="form-control" name="valorTotal" disabled>R$ {{ number_format($servico->valor_total, 2, ',', '.')}}</p>
                    </div>            
                </div>
                <div class="form-group">
                    <label for="tituloDoServico" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="tituloDoServico" value="{{ $servico->titulo }}">
                    </div>
                    <label for="data" class="col-sm-1 control-label">Data</label>
                    <div class="col-sm-2">
                        <input class="form-control" name="data" disabled value="{{ $servico->data_servico->format('d/m/Y') }}">
                    </div> 
                </div> 
                <div class="form-group">
                    <label for="estabelecimento" class="col-sm-2 control-label">Estabelecimento</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="estabelecimento" value="{{ $servico->nome_oficina }}" placeholder="Adicione o nome do estabelecimento">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" style="resize: vertical;" name="descricao" value="{{ old('descricao') }}" placeholder="Descrição...">{{ $servico->descricao }}</textarea>
                    </div>
                </div> 
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <a href="{{ route('services') }}" class="btn btn-primary btn-block"><i class="icon fa fa-arrow-left fa-lg"></i> Retornar ao Gerenciamento</a>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-share fa-lg" aria-hidden="true"></i> Atualizar Informações do Serviço</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush