@extends('adminlte::page')

@section('title', 'GarageParts - Garagem')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/line/red.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/line/purple.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/line/aero.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/line/orange.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/line/blue.css') }}" rel="stylesheet">
 <!-- daterange picker -->
 <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('content_header')
<h1>Garagem<small> Linha do Tempo</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-clock-o fa-lg" aria-hiden></i> Linha do Tempo</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box-background box-primary">
                <div class="box-header with-border">
                    <div class="form-group">
                        <h3 class="box-title col-sm-9"><i class="fa fa-info" aria-hidden="true"></i> Eventos Ocorridos Recentemente</h3>
                        @if($checked == 16)
                        <div class="col-sm-3">
                            <select class="form-control" name="qtdPagina" id="qtdPagina">
                                <option value="0">Exibindo {{ $qtdPaginas }} itens</option>
                                <option value="5">5 itens por página</option>
                                <option value="10">10 itens por página</option>
                                <option value="20">20 itens por página</option>
                                <option value="50">50 itens por página</option>
                                <option value="100">100 itens por página</option>
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="timeline">
                            <ul class="timeline timeline-inverse">
                                @if(isset($times) && $times->count() == 0 && $checked == 16)
                                    <li class="time-label">
                                        <span class="bg-teal">
                                            {{ $date = date('d/m/Y')}}
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-info fa-lg bg-teal"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{ $date = date('H:i') }}</span>
                                            <h3 class="timeline-header"><a href="#">Nenhum Registro Encontrado até o momento</a></h3>
                                            <div class="timeline-body">
                                                <div class="callout callout-info">
                                                    <h4>Nenhum veículo foi encontrado em sua Garagem!</h4>
                                                    <p>Nenhum registro foi encontrado em seu histórico de ações, comece agora mesmo!</p>
                                                    <p>Inicie cadastrando seu primeiro veículo para gerenciar em sua Garagem clicando no botão a seguir.</p> 
                                                </div>
                                            </div>
                                            <div class="timeline-footer">
                                                <a type="button" class="btn btn-primary btn-flat" href="{{ route( 'garage.cadastro.form' ) }}"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Cadastrar Novo Veículo</a>
                                            </div>
                                        </div>
                                    </li>
                                @elseif(isset($times) && $times->count() == 0 && $checked < 16)
                                        <li class="time-label">
                                        <span class="bg-teal">
                                            {{ $date = date('d/m/Y')}}
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-info fa-lg bg-teal"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{ $date = date('H:i') }}</span>
                                            <h3 class="timeline-header"><a href="#">Nenhum Registro Encontrado para este filtro</a></h3>
                                        </div>
                                    </li>
                                @endif
                                @foreach($times as $key => $value)
                                    @switch($value->tipo_registro)
                                        @case("cadastro_veiculo")
                                            <li class="time-label">
                                                <span class="bg-purple">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-car fa-lg bg-purple"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->veiculo()->with('precos')->where('id', $value->veiculo()->value('id') )->first()->precos()->orderBy('data_compra', 'desc')->first()->data_compra->format('d/m/Y') }}</span>
                                                    <h3 class="timeline-header"><strong>Novo Veículo Cadastrado na Garagem - </strong><a href="{{ route( 'garage.gerenciar.veiculo.detalhes', $value->veiculo()->first()->id ) }}">{{ $value->veiculo()->first()->placa }} </a><strong>.</strong> </h3>
                                                    <div class="timeline-body">
                                                        <p>
                                                            <img class="logo-mini" src="{{ url('assets/site/logomarcas/'.$value->veiculo()->first()->nome_montadora.'.png')}}" alt="{{$value->veiculo()->first()->nome_montadora.'.png'}}">
                                                            {{ $value->veiculo()->first()->nome_modelo }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                        @case('editar_veiculo')
                                            <li class="time-label">
                                                <span class="bg-purple">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-pencil-square-o fa-lg bg-purple"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y H:i:s') }}</span>
                                                    <h3 class="timeline-header"><strong>O veículo de placa</strong> <a href="{{ route( 'garage.gerenciar.veiculo.detalhes', $value->veiculo()->first()->id ) }}">{{ $value->veiculo()->first()->placa }}</a><strong> foi atualizado.</strong></h3>
                                                    <div class="timeline-body">
                                                        <p><img class="logo-mini" src="{{ url('assets/site/logomarcas/'.$value->veiculo()->first()->nome_montadora.'.png')}}" alt="{{$value->veiculo()->first()->nome_montadora.'.png'}}">{{ $value->veiculo()->first()->nome_modelo }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                        @case('atualizar_perfil')
                                            <li class="time-label">
                                                <span class="bg-maroon">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-pencil-square-o fa-lg bg-maroon"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y H:i:s') }}</span>
                                                    <div class="user-block">
                                                        @if(auth()->user()->image === null)
                                                            <img class="profile-user-img margin img-responsive img-circle no-border" src="{{ url('assets/site/img/user.png')}}">
                                                        @else   
                                                            <img class="img-responsive margin img-circle" src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->image}}">
                                                        @endif
                                                        <h3 class="username">As informações do perfil  de <a href="{{ route('profile') }}"> {{ auth()->user()->nickname }} </a> foram atualizadas. </h3>
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                        @case('atualizar_imagem_perfil')
                                            <li class="time-label">
                                                <span class="bg-teal">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-camera bg-teal"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y H:i:s') }}</span>
                                                    <h3 class="timeline-header"><strong>A imagem do perfil de</strong> <a href="{{ route('profile') }}"> {{ auth()->user()->nickname }} </a> <strong>foi atualizada.</strong></h3>
                                                    <div class="timeline-body">
                                                        <img src="{{ url('storage/users/'.$value->image_profile()->first()->name) }}" alt="..." class="img-responsive image-timeline-body margin img-circle">
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                        @case('cadastrar_servico')
                                            <li class="time-label">
                                                <span class="bg-red">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-wrench fa-lg bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y \\à\s H:i:s') }}</span>
                                                    <h3 class="timeline-header">
                                                        <strong>Novo</strong>
                                                            <a href="{{ route( 'services.gerenciar.servico', $value->servico()->first()->id ) }}">Serviço </a>
                                                        <strong>cadastrado - Veiculo: <a href="{{ route( 'garage.gerenciar.veiculo.detalhes', $value->veiculo()->first()->id ) }}">{{ $value->veiculo()->first()->placa }}</a>.</strong> 
                                                    </h3>
                                                    <div class="timeline-body">
                                                            <h4 class="text-red">Detalhes do Serviço:</h4>
                                                            <ul>
                                                                <li> <strong>Modelo do Veículo:</strong> {{ $value->veiculo()->first()->nome_modelo }}</li>
                                                                <li> <strong>Título do Serviço:</strong> {{ $value->servico()->first()->titulo }}</li>
                                                                <li> <strong>Valor Total:</strong><strong class="text-green"> R$ {{ number_format($value->servico()->first()->valor_total, 2, ',', '.') }}</strong></li>
                                                                @if($value->servico()->first()->nome_oficina) <li><strong>Estabelecimento:</strong> {{ $value->servico()->first()->nome_oficina }}</li> @endif
                                                                @if($value->servico()->first()->anexo) <li><strong><a href="{{ url('storage/anexos/servicos/'.$value->servico()->first()->anexo) }}"><i class="icon fa fa-paperclip fa-lg"></i> Vizualizar Anexo. </a></strong></li>@endif
                                                            </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                        @case('transferencia_veiculo')
                                                <li class="time-label">
                                                    <span class="bg-orange">
                                                        {{ $value->created_at->diffForHumans() }}
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-exchange fa-lg bg-orange"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y \\à\s H:i:s') }}</span>
                                                        <h3 class="timeline-header">
                                                            <strong>Veículo de placa <span class="text-blue"> {{$value->veiculo()->value('placa') }}</span>, foi transferido para o usuário <span class="text-blue"> {{ $users->first()->where('id', $value->transferencia()->value('comprador_id'))->first()->name }} </span>.</strong>
                                                        </h3>
                                                        <div class="timeline-body">
                                                        <p><img class="logo-mini" src="{{ url('assets/site/logomarcas/'.$value->veiculo()->first()->nome_montadora.'.png')}}" alt="{{$value->veiculo()->first()->nome_montadora.'.png'}}">{{ $value->veiculo()->first()->nome_modelo }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @break
                                        @case('cadastro_abastecimento')
                                            <li class="time-label">
                                                <span class="bg-teal">
                                                    {{ $value->created_at->diffForHumans() }}
                                                </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-tint fa-lg bg-teal"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d/m/Y \\à\s H:i:s') }}</span>
                                                    <h3 class="timeline-header">
                                                        <strong>Novo <span class="text-info">Abastecimento</span></strong>
                                                        <strong>cadastrado.</strong> 
                                                    </h3>
                                                    <div class="timeline-body">
                                                            <h4 class="text-teal">Detalhes do Abastecimento:</h4>
                                                            <ul>
                                                                <li> <strong>Veículo:</strong> {{ $value->veiculo()->value('nome_modelo') }}</li>
                                                                <li> <strong>Placa: <a href="{{ route( 'abastecimentos.gerenciar.historico', $value->veiculo()->first()->id ) }}">{{ $value->veiculo()->first()->placa }}</a> </strong></li>
                                                                <li> <strong>Hodômetro:</strong> {{ number_format($value->abastecimento()->first()->hodometro, 0, ',', '.') }}</li>
                                                                <li> <strong>Valor por Litro:</strong> R$ {{ number_format($value->abastecimento()->first()->preco_por_litro, 2, ',', '.') }}</li>
                                                                <li> <strong>Volume em Litros:</strong> {{ number_format($value->abastecimento()->first()->litros, 2, ',', '.') }}</li>
                                                                <li> <strong>Custo Total:</strong><strong class="text-green"> R$ {{ number_format($value->abastecimento()->first()->custo_total, 2, ',', '.') }}</strong></li>
                                                                @if($value->abastecimento()->first()->nome_posto) <li><strong>Posto:</strong> {{ $value->abastecimento()->first()->nome_posto }}</li> @endif
                                                            </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            @break
                                    @endswitch
                                @endforeach
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                    </div>     
                    @if($checked == 16)              
                        {!! $times->links() !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <form action="{{ route('garage.filtro') }}" class="form-horizontal" method="POST">
                {!! csrf_field() !!} 
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="form-group">
                            <h3 class="box-title col-sm-10"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</h3>
                        </div>
                    </div>
                    <div class="box-body box-profile">
                        <div class="form-group">
                            <div class="col-sm-12">
                            <label>Categorias:</label>
                                @if(isset($checked) && ($checked == 1 || $checked == 3 || $checked == 5 || $checked == 7 || $checked == 9 || $checked == 11 || $checked == 13 || $checked == 15 || $checked == 16) ) 
                                    <input name="checkVeiculos" id="checkVeiculos" value="1" type="checkbox" checked > 
                                @else
                                    <input name="checkVeiculos" id="checkVeiculos" value="1" type="checkbox">
                                @endif
                                <label for="checkVeiculos" class="control-label">Veículos</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if(isset($checked) && ($checked == 2 || $checked == 3 || $checked == 6 || $checked == 7 || $checked == 10 || $checked == 11 || $checked == 14 || $checked == 15 || $checked == 16) ) 
                                <input name="checkAbastecimentos" id="checkAbastecimentos" value="2" type="checkbox" checked>
                                @else
                                    <input name="checkVeiculos" id="checkAbastecimentos" value="2" type="checkbox">
                                @endif
                                <label for="tipoTroca" class="control-label">Abastecimentos</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if(isset($checked) && ($checked == 4 || $checked == 5 || $checked == 6 || $checked == 7 || $checked == 12 || $checked == 13 || $checked == 14 || $checked == 15 || $checked == 16) ) 
                                    <input name="checkServicos" id="checkServicos" value="4" type="checkbox" checked>
                                @else
                                    <input name="checkServicos" id="checkServicos" value="4" type="checkbox">
                                @endif                    
                                <label for="checkServicos" class="control-label">Serviços</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if(isset($checked) && ($checked == 8 || $checked == 9 || $checked == 10 || $checked == 11 || $checked == 12 || $checked == 13 || $checked == 14 || $checked == 15 || $checked == 16) ) 
                                    <input name="checkTransferencias" id="checkTransferencias" value="8" type="checkbox" checked>
                                @else
                                    <input name="checkTransferencias" id="checkTransferencias" value="8" type="checkbox">
                                @endif 
                                <label for="tipoTroca" class="control-label">Transferencias</label>
                            </div>
                        </div> 
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
                                    <select class="form-control" name="start" id="start">
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <select class="form-control" name="end" id="end">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>      
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-block btn-default"><i class="icon fa fa-filter fa-lg"></i> Filtrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>

    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/icheck.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('vendor/adminlte/bower_components/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script type='text/javascript'>
        $('#qtdPagina').on('change', function(e){
            var itens_pagina = e.target.value;
            window.location.assign("./"+ itens_pagina);
        });
    </script>



    <script>
        $(document).ready(function(){
            $('#checkVeiculos').each(function(){
                var self = $(this),
                label = self.next(),
                label_text = label.text();

                label.remove();
                self.iCheck({
                checkboxClass: 'icheckbox_line-purple',
                radioClass: 'iradio_line-purple',
                insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#checkServicos').each(function(){
                var self = $(this),
                label = self.next(),
                label_text = label.text();

                label.remove();
                self.iCheck({
                checkboxClass: 'icheckbox_line-red',
                radioClass: 'iradio_line-red',
                insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#checkAbastecimentos').each(function(){
                var self = $(this),
                label = self.next(),
                label_text = label.text();

                label.remove();
                self.iCheck({
                checkboxClass: 'icheckbox_line-aero',
                radioClass: 'iradio_line-aero',
                insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#checkTransferencias').each(function(){
                var self = $(this),
                label = self.next(),
                label_text = label.text();

                label.remove();
                self.iCheck({
                checkboxClass: 'icheckbox_line-orange',
                radioClass: 'iradio_line-orange',
                insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('input.radio').each(function(){
                var self = $(this),
                label = self.next(),
                label_text = label.text();

                label.remove();
                self.iCheck({
                checkboxClass: 'icheckbox_line-blue',
                radioClass: 'iradio_line-blue',
                insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
        });
    </script>
    <script>
        document.getElementById("start").style.display = "none";
        document.getElementById("end").style.display = "none";
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
                $('#start').append('<option value="'+start.format('YYYY-MM-D')+'" selected="true">start</option>');
                document.getElementById("start").style.display = "none";
            })
            $.each(end, function(index, montadorasObj){
                $('#end').append('<option value="'+end.format('YYYY-MM-D')+'" selected="true">end</option>');
                document.getElementById("end").style.display = "none";
            })
        })
    </script>
@endpush