@extends('adminlte::page')

@section('title', 'GarageParts - Serviços')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('content_header')
<h1>Serviços<small> Gerenciar</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-cogs fa-lg" aria-hiden></i> Serviços</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            @include('includes.modals')
            <div class="box-background box-primary">
                <div class="box collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title col-sm-10"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista Serviços Cadastrados</h3>

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
                                <div class="small-box bg-red">
                                    <div class="inner">
                                    <h3>{{ $servicos->count() }}</h3>

                                    <p>SERVIÇOS EXECUTADOS</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-cogs"></i>
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
                        <table class="table tg">
                            <tbody>
                                    <tr>
                                        <!--<th class="tg-k4wc">#</th>-->
                                        <th class="tg-c7os">Data</th>
                                        <th class="tg-k4wc">Placa</th>
                                        <th class="tg-k4wc">Serviço<br></th>
                                        <th class="tg-k4wc">Custo Total<br></th>
                                        <th class="tg-k4wc">Agendado</th>
                                        <th class="tg-k4wc">Detalhamento</th>
                                    </tr>
                                @forelse($servicos as $key => $servico)
                                    <tr>
                                        <!-- <td class="tg-n62z"><input type="checkbox" class="checkbox" id="servico" name="servico" value="true"></td> -->
                                        <td class="tg-n62z">{{ $servico->data_servico->format('d/m/Y') }}</td>
                                        <td class="tg-n62z">{{ $servico->veiculo->placa }}</td>
                                        <td class="tg-n62z">{{ $servico->titulo }}</td>
                                        <td class="tg-n62z">R$ {{ number_format($servico->valor_total, 2, ',','.') }}</td>
                                        <td class="tg-n62z">@if($servico->agendado == 1) <span class="text-green"><i class="fa fa-check" aria-hidden="true"></i></span>@else  @endif</td>
                                        <td class="tg-n62z"><a href="{{ route( 'services.gerenciar.servico', $servico->id ) }}" class="btn btn-default btn-xs btn-block">Detalhar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if (isset($dataForm))
                        {!! $servicos->appends($dataForm)->links() !!}
                    @else
                        {!! $servicos->links() !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="form-group">
                        <h3 class="box-title col-sm-10"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar Serviços</h3>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus "></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('filtrar') }}" class="form form-horizontal" method="POST">
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
                            <label class="col-sm-12" for="valorInicial" >Valor do serviço de R$</label>
                            <div class="col-sm-12">
                                <input class="form-control moeda" name="valorInicial" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="{{old('valorPorPeca')}}" placeholder="Valor do serviço" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="valorFinal" >Até R$</label>
                            <div class="col-sm-12">
                                <input class="form-control moeda" name="valorFinal" type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" oninvalid="setCustomValidity('Formato do Valor Monetário Inválido! Ex: 1.000,00')" onchange="try{setCustomValidity('')}catch(e){}" value="{{old('valorPorPeca')}}" placeholder="Valor do serviço" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="titulo"> Título</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="titulo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Placa</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="placaDoVeiculo" id="placaDoVeiculo">
                                    <option value="" disabel="true" selected="true">-- Selecionex --</option>
                                    @foreach($veiculos as $key => $veiculo)
                                        <option value="{{ $veiculo->id }}" disabel="true">{{ $veiculo->placa }}</option>
                                    @endforeach
                                </select>
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

@endpush