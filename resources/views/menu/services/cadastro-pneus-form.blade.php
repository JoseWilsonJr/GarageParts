@extends('adminlte::page')

@section('title', 'GarageParts - Serviços Pneus')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Cadastrar Serviços<small>Pneus</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class=""><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar</li>
        <li class="active"><i class="fa fa-cog fa-lg" aria-hiden></i> Pneus</li>
    </ol>
@stop

@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <div class="form-group">
                <h3 class="box-title col-sm-10"><i class="fa fa-cog" aria-hidden="true"></i> Adicionar Nova Manutenção Mecânica</h3>
            </div>
        </div>
            <form action="{{ route( 'service.cadastro.pneus', $servico_id) }}" class="form-horizontal" method="POST">
            <div class="box-body">
                {!! csrf_field() !!} 
                @include('includes.alerts')
                <div class="form-group">
                    <label for="descricao" class="col-sm-3 control-label">Descrição do Pneu<span class="text-red">*</span></label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{old('descricao')}}" name="descricao" type="text" placeholder="Digite o nome da peça">
                    </div>
                </div>
                <div class="form-group">
                    <label for="quantidade" class="col-sm-3 control-label">Quantidade<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('quantidade')}}" name="quantidade" type="text" placeholder="Quantidade" >
                    </div>
                    <label for="valorPorUnidade" class="col-sm-2 control-label">Valor por unidade<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control moeda" name="valorPorUnidade" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="R$ {{old('valorPorUnidade')}}" placeholder="Valor por pneu" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoTroca" class="col-sm-3 control-label">Alinhamento e Balanceamento</label>
                    <div class="checkbox col-sm-3">
                        <input name="alinhamento" id="alinhamento" value="1" type="checkbox">Alinhamento
                    </div>
                    <div class="checkbox col-sm-3">
                        <input name="balanceamento" id="balanceamento" value="1" type="checkbox">Balanceamento
                    </div>
                </div>
                <div class="form-group">
                    <label for="dataProximaManutencao" class="col-sm-3 control-label">Data proxima manut.</label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('dataProximaManutencao')}}" name="dataProximaManutencao" type="date" placeholder="Próxima Manutenção">
                    </div>
                    <label for="kmProximoAlinhamento" class="col-sm-2 control-label">Km proxima manut.</label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('kmProximoAlinhamento')}}" name="kmProximaManutencao" type="text" placeholder="Km prox. manutenção">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoTroca" class="col-sm-3 control-label">Selecione uma das opções<span class="text-red">*</span></label>
                    <div class="radio col-sm-3">
                        <input name="tipoTroca" id="diateiros" value="D" type="radio">Troca dos pneus Dianteiros
                    </div>
                    <div class="radio col-sm-3">
                        <input name="tipoTroca" id="traseiros" value="T" type="radio">Troca dos pneus Traseiros
                    </div>
                    <div class="radio col-sm-3">
                        <input name="tipoTroca" id="completa" value="C" type="radio">Troca completa
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        <a href="{{ route('services.gerenciar.servico', $servico_id) }}" class="btn btn-primary btn-block"><i class="icon fa fa-arrow-left fa-lg"></i> Retornar ao Serviço</a>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-block"><i class="icon fa fa-share fa-lg"></i> Cadastrar Manutenção</button>
                    </div>
                </div>
                <div class="form-group">
                </div>
            </div>
        </form>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>
    <script type='text/javascript'>
        $('.moeda').mask('#.##0,00', {reverse: true});
    </script>
@endpush