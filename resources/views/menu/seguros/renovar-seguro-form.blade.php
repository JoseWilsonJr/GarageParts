@extends('adminlte::page')

@section('title', 'GarageParts - Detalhes')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Seguros<small> Detalhes </small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-shield fa-lg" aria-hiden></i> Seguros</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar Seguros</li>
        <li class="active"><i class="fa fa-refresh fa-lg" aria-hidden="true"></i> Renovar</li>
    </ol>
@stop

@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <div class="form-group">
                <h3 class="box-title col-sm-10"><i class="fa fa-refresh" aria-hidden="true"></i> Renovar Seguro</h3>
            </div>
        </div>
        <div class="box-body">
            <form action="{{ route('seguros.cadastro.renovar') }}" class="form-horizontal" method="POST">
                {!! csrf_field() !!} 
                <div class="content">
                    @include('includes.alerts')
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title lead"> Informações do Seguro</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="dataDePagamento" class="col-sm-3 control-label">Data de Pagamento<span class="text-red">*</span></label>
                                <div class="col-sm-2">
                                    <input class="form-control" value="{{old('dataDePagamento')}}" name="dataDePagamento" type="date">
                                </div>
                                <label for="validadeDoSeguro" class="col-sm-3 control-label">Validade do Seguro<span class="text-red">*</span></label>
                                <div class="col-sm-2">
                                    <input class="form-control" value="{{old('validadeDoSeguro')}}" name="validadeDoSeguro" type="date" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valorDaApolice" class="col-sm-3 control-label">Valor da Aplólice<span class="text-red">*</span></label>
                                <div class="col-sm-3">
                                    <input class="form-control moeda" value="{{old('valorDaApolice')}}" name="valorDaApolice" type="text" placeholder="Digite valor da Apólice">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numeroDaApolice" class="col-sm-3 control-label">Número da Apólice<span class="text-red">*</span></label>
                                <div class="col-sm-4">
                                    <input class="form-control" value="{{$seguro->num_apolice}}" name="numeroDaApolice" type="number" placeholder="Digite o número da Apólice">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numeroDeEmergencia" class="col-sm-3 control-label">Número de Emergência<span class="text-red">*</span></label>
                                <div class="col-sm-4">
                                    <input class="form-control" value="{{$seguro->contato_emergencia}}" name="numeroDeEmergencia" type="text" placeholder="Digite o número do socorro" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seguradora" class="col-sm-3 control-label">Seguradora<span class="text-red">*</span></label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$seguro->seguradora}}" name="seguradora" type="text" placeholder="Digite o nome da Seguradora" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detalhes" class="col-sm-3 control-label">Detalhes do Seguro</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="detalhes" type="text" placeholder="Detalhes" >{{ $seguro->detalhes }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $seguro->id }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="icon fa fa-share fa-lg"></i> Renovar Seguro
                    </button>
                </div>
            </form>      
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush


