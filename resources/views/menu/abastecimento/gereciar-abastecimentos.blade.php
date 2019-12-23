@extends('adminlte::page')

@section('title', 'GarageParts - Abastecimentos')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<!-- iCheck -->
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/flat/aero.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/flat/blue.css') }}" rel="stylesheet">
@endpush

@section('content_header')
<h1>Abastecimentos<small> Gerenciar</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-tint fa-lg" aria-hiden></i> Abastecimentos</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    @if(!isset($veiculo))
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
    @else
        @include('includes.modals')
        @if(isset($veiculo) && $veiculo->abastecimentos()->get()->count() == 0)
            <div class="box-background box-primary">
                <div class="box-body">
                    <div class="callout callout-info">
                        <h4>Nenhum Abastecimento foi encontrado!</h4>
                        <p>Adicione um novo abastecimento clicando no botão abaixo!</p>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary btn-flat" href="{{ route( 'abastecimento.cadastro.form' ) }}"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Cadastrar Novo Abastecimento</a>
                    </div>
                </div>
            </div>
        @else
        <div class="row">
            <div class="col-md-9">
                <div class="box-background box-primary">
                    <div class="box collapsed-box">
                        <div class="box-header with-border">
                        <h3 class="box-title col-sm-10"><i class="fa fa-list-alt" aria-hidden="true"></i> Histórico de Abastecimentos: <a href="{{ route( 'garage.gerenciar.veiculo.detalhes', $veiculo->id ) }}">{{ $veiculo->placa }} </a></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-plus "></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            <div class="col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                    <h3>{{ $veiculo->abastecimentos()->get()->count() }}</h3>

                                    <p>ABASTECIMENTOS EFETUADOS</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-tint"></i>
                                    </div>
                                </div>
                                </div>

                                <div class="col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                    <h3>R$ {{ number_format($preco, 2, ',','.') }}</h3>

                                    <p>CUSTO TOTAL</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-usd"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="overflow-x:auto;">
                            <table class="tg table">
                                <tbody>
                                    <tr>
                                        <th class="tg-k4wc">#</th>
                                        <th class="tg-c7os">Data</th>
                                        <th class="tg-k4wc">Hodômetro</th>
                                        <th class="tg-k4wc">Nome do Posto</th>
                                        <th class="tg-k4wc">Custo Total</th>
                                        <th class="tg-k4wc">Volume</th>
                                        <th class="tg-k4wc">Preço por Litro</th>
                                        <th class="tg-k4wc">Anotações</th>
                                        <th class="tg-k4wc">Completo</th>
                                    </tr>
                            <form action="{{ route('abastecimento.gerenciar.historico.delete', $veiculo_id)}}">
                                    @forelse($veiculo->abastecimentos()->get() as $key => $abastecimento)
                                        <tr>
                                            <td class="tg-n62z"><input name="abastecimento_{{ $abastecimento->id }}" type="checkbox" value="{{ $abastecimento->id }}" id="checkbox"></td>
                                            <td class="tg-n62z">{{ $abastecimento->data_abastecimento->format('d/m/Y') }}</td>
                                            <td class="tg-n62z">{{ number_format($abastecimento->hodometro, 0, ',','.') }}</td>
                                            <td class="tg-n62z">{{ $abastecimento->nome_posto }}</td>
                                            <td class="tg-n62z">R$ {{ number_format($abastecimento->custo_total, 2, ',','.') }}</td>
                                            <td class="tg-n62z">{{ $abastecimento->litros }} Litros</td>
                                            <td class="tg-n62z">R$ {{ number_format($abastecimento->preco_por_litro, 2, ',','.') }}</td>
                                            @if(isset($abastecimento->descricao))<td class="tg-n62z">{{ $abastecimento->descricao }}</td>@else<td class="tg-n62z"> </td> @endif
                                            @if(isset($abastecimento->tanque_cheio) && $abastecimento->tanque_cheio == 0)<td class="tg-n62z">Sim</td>@else<td class="tg-n62z"> Não </td> @endif
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            @if(isset($veiculo) && $veiculo->abastecimentos()->get()->count() != 0)
                                <!-- MODAL EXCLUIR ABASTECIMENTOS -->
                                @include('includes.modal-warning-excluir-abastecimento')
                            </form>
                            @include('includes.alerts')
                                <div class="col-sm-offset-5 col-sm-3">
                                    <button class=" btn btn-danger btn-block" data-toggle="modal" data-target="#modal-delete-abastecimento"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Selecionados</button>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="form-group">
                            <h3 class="box-title col-sm-10"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar Serviços</h3>
                        </div>

                    </div>
                    <div class="box-body">
                        <form action="{{ route('abastecimentos.filtrar', $veiculo_id) }}" class="form form-horizontal" method="POST">
                            {!! csrf_field() !!} 
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Periodo:</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-default btn-block" id="daterange-btn">
                                            <span>
                                            <i class="fa fa-calendar"></i> Selecione uma data
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="inicioDoPeriodo" id="inicioDoPeriodo">
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="fimDoPeriodo" id="fimDoPeriodo">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="valorInicial">Valor do Abastecimento de R$</label>
                                <div class="col-sm-12">
                                    <input class="form-control moeda" name="valorInicial" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="{{old('valorInicial')}}" placeholder="Valor de" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="valorFinal">Até R$</label>
                                <div class="col-sm-12">
                                    <input class="form-control moeda" name="valorFinal" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="{{old('valorFinal')}}" placeholder="Valor até" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="posto"> Posto</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="posto" placeholder="Pesquisa por Posto" value="{{old('posto')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="litros">Volume em Litros</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="litros" placeholder="Pesquisa por Volume" value="{{old('litros')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-default btn-block"><i class="icon fa fa-filter fa-lg"></i> Filtrar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endif
    @endif
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
    <script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>

    <script type='text/javascript'>
        $('.moeda').mask('#.##0,00', {reverse: true});
    </script>
        
    <!-- date-range-picker -->
    <script src="{{ asset('vendor/adminlte/bower_components/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    
    <script>
        document.getElementById("inicioDoPeriodo").style.display = "none";
        document.getElementById("fimDoPeriodo").style.display = "none";
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'DD/MM/YYYY hh:mm A' }})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
        {
            ranges   : {
            'Hoje'       : [moment(), moment()],
            'Ontem'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 Dias' : [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
            'Este Mês'  : [moment().startOf('month'), moment().endOf('month')],
            'Ultimo Mês'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
        },
        function (start, end) {
            
            $('#daterange-btn span').html(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'))
            $.each(start, function(index, montadorasObj){
                $('#inicioDoPeriodo').append('<option value="'+start.format('YYYY-MM-D')+'" selected="true">start</option>');
                document.getElementById("inicioDoPeriodo").style.display = "none";
            })
            $.each(end, function(index, montadorasObj){
                $('#fimDoPeriodo').append('<option value="'+end.format('YYYY-MM-D')+'" selected="true">end</option>');
                document.getElementById("fimDoPeriodo").style.display = "none";
            })
        })
    </script>
    
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