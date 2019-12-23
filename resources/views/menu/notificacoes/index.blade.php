@extends('adminlte::page')

@section('title', 'GarageParts - Notificações')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Painel<small>Nofiticações</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-bell fa-lg" aria-hiden></i> Notificações</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        @if(isset($agendamentos) && $agendamentos->count()!=0 || isset($seguros) && $seguros->count()!=0 || isset($manut_mecanicas) && $manut_mecanicas->count()!=0)
            @foreach($veiculos as $key => $value)
                <div class="col-sm-6">
                    <div class="box box-widget widget-user-2 ">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black bg-widget-image">
                        <div class="widget-user-image">
                            <img class="" src="{{ url('assets/site/logomarcas/'.$value->nome_montadora.'.png')}}" alt="User Avatar">
                        </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{ $value->nome_modelo }}</h3>
                            <h5 class="widget-user-desc">Placa: {{ $value->placa }}</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @if($agendamentos->where('veiculo_id', $value->id)->count()!=0)
                                    <li><a href="{{ route('notificacoes.agendamentos', $value->id) }}"><i class="fa fa-calendar" aria-hidden="true"></i> Agendamentos <span class="pull-right badge bg-blue">{{ $agendamentos->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @else
                                    <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Agendamentos <span class="pull-right badge bg-blue">{{ $agendamentos->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @endif
                                @if($manut_mecanicas->where('veiculo_id', $value->id)->count()!=0)
                                    <li><a href="{{ route('notificacoes.mecanicas', $value->id) }}"><i class="fa fa-wrench" aria-hidden="true"></i> Manutenções Mecânicas <span class="pull-right badge bg-blue">{{ $manut_mecanicas->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @else
                                    <li><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Manutenções Mecânicas <span class="pull-right badge bg-blue">{{ $manut_mecanicas->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @endif
                                @if($manutencao_hidraulicas->where('veiculo_id', $value->id)->count()!=0)
                                    <li><a href="{{ route('notificacoes.hidraulicas', $value->id) }}"><i class="fa fa-tint" aria-hidden="true"></i> Manutenções de Fluidos <span class="pull-right badge bg-blue">{{ $manutencao_hidraulicas->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @else
                                    <li><a href="#"><i class="fa fa-tint" aria-hidden="true"></i> Manutenções de Fluidos <span class="pull-right badge bg-blue">{{ $manutencao_hidraulicas->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @endif
                                @if($manut_pneus->where('veiculo_id', $value->id)->count()!=0)
                                    <li><a href="{{ route('notificacoes.pneus', $value->id) }}"><i class="fa fa-cog" aria-hidden="true"></i> Manutencões de Pneus <span class="pull-right badge bg-blue">{{ $manut_pneus->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @else
                                    <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Manutenções de Pneus <span class="pull-right badge bg-blue">{{ $manut_pneus->where('veiculo_id', $value->id)->count() }}</span></a></li>
                                @endif
                                @if($seguros->where('veiculo_id', $value->id)->count() !=0 && $seguros->where('veiculo_id', $value->id)->first()->data_validade < date('Y-m-d') ) 
                                    <li><a href="{{ route('seguros.gerenciar.detalhes', $value->id ) }}"><i class="fa fa-shield" aria-hiden></i> Seguro <span class="pull-right badge bg-red">Status: Expirado </span></a></li>
                                @elseif($seguros->where('veiculo_id', $value->id)->count() !=0 && $seguros->where('veiculo_id', $value->id)->first()->data_validade > date('Y-m-d') )
                                    <li><a href="{{ route('seguros.gerenciar.detalhes', $value->id ) }}"><i class="fa fa-shield" aria-hiden></i> Seguro <span class="pull-right badge bg-green"> Status: Ativo </span></a></li>
                                @else
                                    <li><a href="{{ route('seguros.cadastro.form' ) }}"><i class="fa fa-shield" aria-hiden></i> Seguro <span class="pull-right badge bg-orange"> Status: Não Segurado </span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-sm-12">
                <div class="box-background box-info">
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4>Não existem nofitifações pendentes!</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@stop
@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush