@extends('adminlte::page')

@section('title', 'GarageParts - Relatórios')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Relatórios<small></small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-list fa-lg" aria-hiden></i> Relatórios</li>
        <li class="active"><i class="fa fa-flag-checkered fa-lg" aria-hiden></i> Gerenciar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <a type="button" class="btn btn-default btn-block" href="{{ route('relatorios.gerar') }}" >Relatorio</a>
        </div>
    </div>
@stop
@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
@endpush