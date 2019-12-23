@extends('adminlte::page')

@section('title', 'GarageParts - Abastecimentos')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Abastecimentos<small> Gerenciar</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-tint fa-lg" aria-hiden></i> Abastecimentos</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    @include('includes.modals')
    @if(isset($veiculos) && $veiculos->count() == 0)
        <div class="box-background box-primary">
            <div class="box-body">
                <div class="callout callout-info">
                    <h4>Nenhum veículo foi encontrado em sua Garagem!</h4>
                    <p>
                        Você ainda não adicionou veículos para gerenciar em sua Garagem.
                        Cadastre seu primeiro veículo clicando no botão abaixo!
                    </p>
                </div>
                <div>
                    <a type="button" class="btn btn-primary btn-flat" href="{{ route( 'garage.cadastro.form' ) }}"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Cadastrar Novo Veículo</a>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($veiculos as $key => $value)
            <div class="col-md-6">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black bg-widget-image">
                        <h3 class="widget-user-username"> <strong>{{ $value->nome_modelo }}</strong></h3>
                        <h3 class="">{{ $value->placa }}</h3>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-square no-border" src="{{ url('assets/site/logomarcas/'.$value->nome_montadora.'.png')}}" alt="{{$value->nome_montadora.'.png'}}">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $value->ano_modelo }}</h5>
                                    <span class="description-text">Ano Modelo</span>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{number_format($value->km_atual,0,',','.')}}</h5>
                                    <span class="description-text">Hodômetro</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{{ucwords($value->cor)}}</h5>
                                    <span class="description-text">Cor</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a type="button" class="btn btn-primary btn-block" href="{{route('abastecimentos.gerenciar.historico', $value->id)}}"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> <strong>Histórico de Abastecimentos</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush