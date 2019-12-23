@extends('adminlte::page')

@section('title', 'GarageParts - Detalhes')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Garagem<small> Detalhes do Veículo </small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-home fa-lg" aria-hiden></i> Garagem</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar Veículos</li>
        <li class="active"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i> Transferir Veiculo</li>
    </ol>
@stop

@section('content')
    @include('includes.modal-warning-excluir-veiculo')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="img-responsive no-border" src="{{ url('assets/site/logomarcas/'.$veiculo->nome_montadora.'.png')}}" alt="{{ $veiculo->nome_montadora.'.png'}}">
                </div>
                <div class="box-footer">
                    <h3 class="profile-username text-center"><strong>{{ $veiculo->placa }}</strong></h3>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-primary btn-block" href="{{ route( 'garage.gerenciar.veiculo.editar', $veiculo->id) }}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Editar Veículo</a>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-block bg-orange" href="{{ route( 'garage.gerenciar.veiculo.trasferencia', $veiculo->id) }}"><i class="fa fa-exchange fa-lg"></i> Transferir Veículo</a>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Veículo</button>
                </div>
                <div class="box-footer">
                    <a type="button" class="btn btn-primary btn-block" href="{{ route( 'garage.gerenciar.veiculos' ) }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Retornar ao Gerenciamento</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @include('includes.modals')
            @include('menu.garage.includes.transferir-veiculo')
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
    <script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>
    <script type='text/javascript'>
        $('.moeda').mask('#.##0,00', {reverse: true});
    </script>

@endpush