@extends('site.layouts.homesite')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Garage<small>Parts</small></h1>
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-home fa-lg" aria-hiden></i> 
        Home
    </li>
</ol>
@stop

@section('content')
    <div class="row">
        <hr class="featurette-divider">
        <div class="col-lg-4">
            <img class="img-circle" src="{{ url('assets/site/img/car.png') }}" alt="Generic placeholder image" width="140" height="140">
            <h2>Gerenciar Veículos</h2>
            <p>Cadastre seus carros ou motos a partir dos modelos disponíveis na tabela FIPE. Acopanhe o preço de mercado e alimente o sistema com informações relacionadas aos seus veículos.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="{{ url('assets/site/img/wrench.png') }}" alt="Generic placeholder image" width="140" height="140">
            <h2>Gerenciar Manutenções</h2>
            <p>cadastere as manutenções realizadas no seus veículos, sejam elas manutenções corretivas ou agendadas. Acompanhe a saúde de seu veículo atavés do gerenciamento de manutenções, é possível consultar informações históricas e sempre mante-las em dia com o auxílio o painel de notificações.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="{{ url('assets/site/img/tint.png') }}" alt="Generic placeholder image" width="140" height="140">
            <h2>Gerenciar Abastecimento</h2>
            <p>Acompanhe os gastos com combustível alimentando todos os abatecimentos no sistema. Veja a progressão da quilometragem e consumo de seus veículos.</p>
        </div><!-- /.col-lg-4 -->
        <hr class="featurette-divider">
    </div>
    <div class="row">
    <hr class="featurette-divider">
        <div class="container marketing">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Fácil de usar. <span class="text-muted"></span></h2>
                    <p class="lead">O GarageParts oferece uma interface simples, com todos os menús dispostos em um painel lateral, o que torna o acesso as funcionalidades direto e objetivo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="{{ url('assets/site/img/Publicidade1.jpg') }}" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 col-md-push-5">
                    <h2 class="featurette-heading">Mantenha a procedência de seus veículos. <span class="text-muted"></span></h2>
                    <p class="lead">Alimente o sistema com todas as informações de Manutenções e Abastecimentos, gerencie o Seguro veicular e quando vender seu veículo, transfira todo o histórico de informações para o novo prorietário.</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="{{ url('assets/site/img/Publicidade2.jpg') }}" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Sistema responsivo e compatível. <span class="text-muted"></span></h2>
                    <p class="lead">O GarageParts se ajusta ao tamanho da tela dos mais divesos dispositivos, desde computadores Desktop, Notebooks, Tablets e até mesmo nos Smartphones. </p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="{{ url('assets/site/img/Publicidade3.jpg') }}" data-holder-rendered="true">
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </div>
@stop
