@extends('adminlte::page')

@section('title', 'GarageParts - Agendamentos')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content_header')
    <h1>Painel<small>Manutenções Mecânicas</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-bell fa-lg" aria-hiden></i> Notificações</li>
        <li class=""><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
        <li class="active"><i class="fa fa-wrench" aria-hidden="true"></i> Manutenções Mecânicas</li>
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
                    <a type="button" class="btn btn-primary btn-block" href="{{ route( 'notificacoes' ) }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Retornar ao Gerenciamento</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        <div class="box-background box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-wrench" aria-hidden="true"></i> Lista de Próximas Trocas</h3>
            </div>
            @if(isset($manut_mecanicas) && $manut_mecanicas->count()!=0)
                <div class="box-body">
                    <div style="overflow-x:auto;">
                        <table class="tg table">
                            <tbody>
                                <tr>
                                    <th class="tg-k4wc">Data</th>
                                    <th class="tg-k4wc">Peças</th>
                                    <th class="tg-k4wc">Link do Serviço</th>
                                    <th class="tg-k4wc">Custo</th>
                                    <th class="tg-k4wc">Estabelecimento</th>
                                    <th class="tg-k4wc">Conclusão</th>
                                </tr>
                                @forelse($manut_mecanicas as $key => $mecanica)
                                <tr>
                                    <td class="tg-n62z">{{ $mecanica->data_validade->format('d/m/Y') }}</td>
                                    <td class="tg-n62z">{{ $mecanica->manutencao()->first()->nome_peca}}</td>
                                    <td class="tg-n62z"><a href="{{ route('services.gerenciar.servico', $mecanica->servico()->first()->id) }}">{{ $mecanica->servico()->first()->titulo}}</a></td>
                                    <td class="tg-n62z">R$ {{ $mecanica->servico()->first()->valor_total}}</td>
                                    <td class="tg-n62z">{{ $mecanica->servico()->first()->nome_oficina}}</td>
                                    <td class="tg-n62z"><a href="{{ route( 'notificacoes.agendamentos.encerar', $mecanica->id ) }}" class="btn btn-success btn-xs btn-block"><i class="fa fa-check" aria-hidden="true"></i> Concluir</a></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="box-body">
                    <div class="callout callout-info">
                        <h4>Não há agendamentos pendentes!</h4>
                    </div>
                </div>
            @endif
        </div>
        </div>
    </div>
@stop
@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush