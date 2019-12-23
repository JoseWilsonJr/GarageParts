@extends('adminlte::page')

@section('title', 'GarageParts - Detalhes')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<!-- iCheck CSS -->
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/flat/blue.css') }}" rel="stylesheet">
@endpush

@section('content_header')
<h1>Garagem<small> Detalhes do Veículo </small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-home fa-lg" aria-hiden></i> Garagem</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar Veículos</li>
        <li class="active"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> Detalhes do Veículo</li>
    </ol>
@stop

@section('content')
    @php
        $json_file = file_get_contents("https://parallelum.com.br/fipe/api/v1/{$veiculo->tipo_veiculo}/marcas/{$veiculo->montadora_id}/modelos/{$veiculo->modelo_id}/anos/{$veiculo->ano_modelo_id}");
        $json_str = json_decode($json_file, true);
    @endphp
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
            @include('includes.modals')
            @include('includes.alerts')
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#carInfo" data-toggle="tab" aria-expanded="false"><i class="fa fa-car" aria-hiden></i> Veículo</a></li>
                    <li><a href="#galeria" data-toggle="tab" aria-expanded="false"><i class="fa fa-photo" aria-hiden></i> Galeria</a></li>
                    <li><a href="#servicos" data-toggle="tab" aria-expanded="false"><i class="fa fa-cogs" aria-hiden></i> Lista de Serviços</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="carInfo">
                        @include('menu.garage.includes.detalhes-veiculo-info')
                    </div>

                    <div class="tab-pane" id="galeria">
                        <!-- GALERIA -->
                        @include('menu.garage.includes.detalhes-veiculo-galeria')
                    </div>
                    <div class="tab-pane" id="servicos">
                        <!-- SERVIÇOS -->
                        @include('menu.garage.includes.detalhes-veiculo-servicos')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>

    <!-- iCheck JS -->
    <script src="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/icheck.js') }}"></script>
    <script>
            $(document).ready(function(){
                $('input.checkbox').each(function(){
                    var self = $(this),
                    label = self.next(),
                    label_text = label.text();

                    label.remove();
                    self.iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue',
                    insert: '<div class="icheck_line-icon"></div>' + label_text
                    });
                });
            });
    </script>
@endpush