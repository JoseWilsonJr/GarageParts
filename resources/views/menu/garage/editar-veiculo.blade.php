@extends('adminlte::page')

@section('title', 'GarageParts - Editar Veiculo')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Garagem<small> Editar Veículo</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-home fa-lg" aria-hiden></i> Garagem</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar Veículos</li>
        <li class=""><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> Detalhes do Veículo</li>
        <li class="active"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Editar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="img-responsive no-border" src="{{ url('assets/site/logomarcas/'.$veiculo->nome_montadora.'.png')}}" alt="{{ $veiculo->placa.'.png' }}">
                </div>
                <div class="box-footer">
                    <h3 class="profile-username text-center"><strong>{{ $veiculo->placa }}</strong></h3>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-primary btn-block" href="{{ route( 'garage.gerenciar.veiculo.detalhes', $veiculo->id ) }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Retornar aos Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box-background box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></i> Editar Informações do Veículo</h3>
                </div>
                <div class="box-body">
                    @include('includes.modals')
                    @include('menu.garage.includes.editar-veiculo-form')
                </div>
            </div>
        </div>  
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
    <script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>

    <script type='text/javascript'>
        $('.moeda').mask('#.##0,00', {reverse: true});
    </script>

    <script type='text/javascript'>
        $('.placaCarro').mask('AAA-0000');
    </script>
@endpush