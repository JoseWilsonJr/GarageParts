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
                    <img class="img-responsive no-border" src="{{ url('assets/site/logomarcas/'.$veiculo->nome_montadora.'.png')}}" alt="{{$veiculo->nome_montadora.'.png'}}">
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                        Confirmar dados do Comprador.
                    </h3>

                </div>
            </div>
            @include('includes.modals')
            @include('includes.alerts')
            @foreach($dadosConfirm as $key => $usuario)
                <div class="col-md-6 col-sm-12 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><img class="info-box-icon" src="@if($usuario['imagem']!= NULL){{ url('storage/users/'.$usuario['imagem']) }}@else {{ url('assets/site/img/user.png') }}@endif " alt="..."></span>
                        <form action="{{ route('garage.gerenciar.veiculo.trasferencia-efetivar', $veiculo_id) }}" method="POST">
                            @include('includes.modal-warning-transferencia')
                            {!! csrf_field() !!}
                            <div class="info-box-content">
                                <span class="info-box-number"> {{$usuario['nome']}}</span>
                                <span class="info-box-text">
                                    <label for="email">E-mail:</label>
                                    <input class="no-border" name="email" type="text" value="{{$usuario['email']}}"> </input></span>
                                    <input type="hidden" name="valorDeCompra" value="{{$dataForm['valorDaTransferencia']}}">
                                    <input type="hidden" name="dataDeAquisicao" value="{{$dataForm['dataDaTransferencia']}}">
                                    <input type="hidden" name="hodometro" value="{{$dataForm['hodometro']}}">
                                <button type="button" class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#modal-transf{{$key}}">Confirmar <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush