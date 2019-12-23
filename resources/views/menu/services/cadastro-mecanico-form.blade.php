@extends('adminlte::page')

@section('title', 'GarageParts - Serviços Mecânicos')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Cadastrar Serviços<small>Mecânicos</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class=""><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar</li>
        <li class="active"><i class="fa fa-wrench fa-lg" aria-hiden></i> Mecânicos</li>
    </ol>
@stop

@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <div class="form-group">
                <h3 class="box-title col-sm-10"><i class="fa fa-wrench" aria-hidden="true"></i> Adicionar Nova Manutenção Mecânica</h3>
            </div>
        </div>
            <form action="{{ route( 'service.cadastro.mecanico', $servico_id) }}" class="form-horizontal" method="POST">
            <div class="box-body">
                {!! csrf_field() !!} 
                @include('includes.alerts')
                <div class="form-group">
                    <label for="nomeDaPeca" class="col-sm-3 control-label">Nome da Peça<span class="text-red">*</span></label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{old('nomeDaPeca')}}" name="nomeDaPeca" type="text" placeholder="Digite o nome da peça">
                    </div>
                </div>
                <div class="form-group">
                    <label for="quantidadeDePecas" class="col-sm-3   control-label">Quantidade<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('quantidadeDePecas')}}" name="quantidadeDePecas" type="text" placeholder="Qtd Peças" >
                    </div>
                    <label for="valorPorPeca" class="col-sm-2 control-label">Valor por Peça<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control moeda" name="valorPorPeca" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="R$ {{old('valorPorPeca')}}" placeholder="Valor por peça" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="validadeKM" class="col-sm-3   control-label">Validade (KM)</label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('validadeKM')}}" name="validadeKM" type="text" placeholder="Validade" >
                    </div>
                    <label for="dataValidade" class="col-sm-2 control-label">Data validade</label>
                    <div class="col-sm-2">
                        <input class="form-control" name="dataValidade" type="date">
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