
@extends('adminlte::page')

@section('title', 'GarageParts - Cadastrar Abastecimento')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
<link href="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/skins/flat/blue.css') }}" rel="stylesheet">
@endpush

@section('content_header')
<h1>Cadastrar<small> Novos Abastecimentos</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-tint fa-lg" aria-hiden></i> Abastecimento</li>
        <li class="active"><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar</li>
    </ol>
@stop

@section('content')
    <div class="box-background box-primary">
        <div class="box-header with-border">
            <div class="form-group">
                <h3 class="box-title col-sm-10"><i class="fa fa-tint" aria-hidden="true"></i> Adicionar Novo Abastecimento</h3>
            </div>
        </div>
        <div class="box-body">
        @include('menu.abastecimento.includes.cadastro-abastecimento-form')
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>
    <script type='text/javascript'>
        $('.moeda').mask('#.##0,00', {reverse: true});
    </script>

    <script src="{{ asset('vendor/adminlte/plugins/icheck-1.0.2/icheck.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#tanqueCheio').each(function(){
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