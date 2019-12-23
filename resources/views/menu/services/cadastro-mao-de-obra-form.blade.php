@extends('adminlte::page')

@section('title', 'GarageParts - Serviços Mão de Obra')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Cadastrar Serviços<small>Mão de Obra</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class=""><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar</li>
        <li class="active"><i class="fa fa-sign-language fa-lg" aria-hiden></i> Mão de Obra</li>
    </ol>
@stop

@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <div class="form-group">
                <h3 class="box-title col-sm-10"><i class="fa fa-sign-language" aria-hidden="true"></i> Adicionar Nova Mão de Obra</h3>
            </div>
        </div>
            <form action="{{ route( 'service.cadastro.mao-de-obra', $servico_id) }}" class="form-horizontal" method="POST">
            <div class="box-body">
                {!! csrf_field() !!} 
                @include('includes.alerts')
                <div class="form-group">
                    <label for="nomeDaPeca" class="col-sm-3 control-label">Descrição<span class="text-red">*</span></label>
                    <div class="col-sm-6">
                        <input class="form-control" value="{{old('descricao')}}" name="descricao" type="text" placeholder="Digite o nome da peça">
                    </div>
                </div>
                <div class="form-group">
                    <label for="valorPorPeca" class="col-sm-3 control-label">Valor da Mão de Obra<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control moeda" name="valorDaMaoDeObra" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="R$ {{old('valorDaMaoDeObra')}}" placeholder="Valor da mão de obra" >
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        <a href="{{ route('services.gerenciar.servico', $servico_id) }}" class="btn btn-primary btn-block"><i class="icon fa fa-arrow-left fa-lg"></i> Retornar ao Serviço</a>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-block"><i class="icon fa fa-share fa-lg"></i> Cadastrar Mão de Obra</button>
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