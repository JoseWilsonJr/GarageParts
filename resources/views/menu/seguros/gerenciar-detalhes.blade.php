@extends('adminlte::page')

@section('title', 'GarageParts - Detalhes')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content_header')
<h1>Seguros<small> Detalhes </small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-shield fa-lg" aria-hiden></i> Seguros</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar Seguros</li>
        <li class="active"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> Detalhes</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="img-responsive no-border" src="{{ url('assets/site/logomarcas/'.$veiculo->nome_montadora.'.png')}}" alt="{{$veiculo->nome_montadora.'.png'}}">
                </div>
                <div class="box-footer">
                    <h3 class="profile-username text-center"><strong>{{ $veiculo->placa }}</strong></h3>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-block bg-primary" href="{{ route( 'seguros.gerenciar.renovar.form', $seguro->id ) }}"><i class="fa fa-refresh fa-lg"></i> Renovar Seguro</a>
                </div>
                <div class="box-footer">
                @include('includes.modal-warning-excluir-seguro')
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-delete-seguro"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Seguro</button>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-primary btn-block" href="{{ route( 'seguros' ) }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Retornar ao Gerenciamento</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @include('includes.modals')
            @include('includes.alerts')
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#seguroInfo" data-toggle="tab" aria-expanded="false"><i class="fa fa-shield" aria-hiden></i> Seguro Ativo</a></li>
                    <li><a href="#seguroHistorico" data-toggle="tab" aria-expanded="false"><i class="fa fa-list-alt" aria-hiden></i> Histórico</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="seguroInfo">
                        @include('menu.seguros.includes.detalhes-seguro-ativo')
                    </div>
                    <div class="tab-pane " id="seguroHistorico">
                        @include('menu.seguros.includes.detalhes-seguro-historico')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>

    <script> $('.telefone').mask('(00) 0 0000-0000');</script>
@endpush