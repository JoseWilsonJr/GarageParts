@extends('adminlte::page')

@section('title', 'GarageParts - Seguros')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Seguros<small> Gerenciar</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-shield fa-lg" aria-hiden></i> Seguros</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    @include('includes.modals')
    @if(isset($seguro))
        <div class="box-background box-primary">
            <div class="box-body">
                <div class="callout callout-info">
                    <h4>Nenhum Seguro foi encontrado em sua Garagem!</h4>
                    <p>
                        Você ainda não cadastrou seguros referente a seus veículos.
                        Cadastre seu primeiro seguro clicando no botão abaixo!
                    </p>
                </div>
                <div>
                    <a type="button" class="btn btn-primary btn-flat" href="{{ route( 'seguros.cadastro.form' ) }}"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Cadastrar Novo Seguro</a>
                </div>
            </div>
        </div>
    @else
    <div class="row">
        @foreach($veiculos as $key => $value)
            @if(isset($value->seguros->first()->data_validade))
                <div class="col-md-6">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black bg-widget-image">
                            <h3 class="widget-user-username"> <strong>{{$value->nome_montadora}}</strong></h3>
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
                                    @if(isset($value->seguros->first()->data_validade) && $value->seguros->first()->data_validade <= date('Y-m-d'))
                                        <h3 class="text-danger col-sm-offset-5"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i> Vencido</h3>
                                    @elseif(isset($value->seguros->first()->data_validade) && $value->seguros->first()->data_validade > date('Y-m-d'))
                                        <h3 class="text-success col-sm-offset-5"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i> Ativo</h3>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <hr>
                                    <a type="button" class="btn btn-primary btn-block" href="{{route('seguros.gerenciar.detalhes', $value->id)}}"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> <strong>Detalhar</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @endif
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush