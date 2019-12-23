@extends('menu.relatorios.relatorio-base')

@section('title', 'GarageParts - Relatório')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<!-- iCheck CSS -->
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/flat/blue.css') }}" rel="stylesheet">
@endpush

@section('content')
    @php
        $json_file = file_get_contents("https://parallelum.com.br/fipe/api/v1/{$veiculo->tipo_veiculo}/marcas/{$veiculo->montadora_id}/modelos/{$veiculo->modelo_id}/anos/{$veiculo->ano_modelo_id}");
        $json_str = json_decode($json_file, true);
    @endphp
    <div class="row">
        <div class="col-col-3">
            <div class="box box-primary">
                <div class="box-footer">
                    <h3 class="profile-username text-center"><strong>{{ $veiculo->placa }}</strong></h3>
                </div>
            </div>
        </div>
        <div class="col-col-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#carInfo" data-toggle="tab" aria-expanded="false"><i class="fa fa-car" aria-hiden></i> Veículo</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="carInfo">
                        @include('menu.garage.includes.detalhes-veiculo-info')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
