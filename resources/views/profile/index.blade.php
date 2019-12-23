@extends('adminlte::page')

@section('title', 'GarageParts - Perfil do Usuário')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
    <h1>Gerenciar<small>Perfil do Usuáro</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-home fa-lg" aria-hiden></i> Garagem></li>
        <li class=""><i class="fa fa-lock fa-lg" aria-hiden></i> Admin</li>
        <li class="active"><i class="fa fa-user-circle fa-lg" aria-hiden></i> Perfil do Usuário</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(auth()->user()->image === null)
                        <img class="profile-user-img img-responsive img-circle" src="{{ url('assets/site/img/user.png')}}">
                        <!-- Profile Image -->
                    @else   
                        <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->image }}" class="img-responsive img-circle">
                    @endif
                    <h3 class="profile-username text-center">{{ auth()->user()->nickname }}</h3>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-photo">
                    <i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>
                        Alterar Imagem
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @if($errors->any())
                        <li>
                            <a href="#profileInfo" data-toggle="tab" aria-expanded="false"><i class="fa fa-user-circle" aria-hiden></i> Perfil do Usuário</a>
                        </li>
                        <li class="active">
                            <a href="#profileSettings" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o" aria-hiden></i> Editar Perfil</a>
                        </li>
                    @else
                        <li class="active">
                            <a href="#profileInfo" data-toggle="tab" aria-expanded="false"><i class="fa fa-user-circle" aria-hiden></i> Perfil do Usuário</a>
                        </li>
                        <li>
                            <a href="#profileSettings" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o" aria-hiden></i> Editar Perfil</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    @include('includes.modals')
                    @if($errors->any())
                        <div class="tab-pane" id="profileInfo">
                    @else
                        <div class="tab-pane active" id="profileInfo">
                    @endif
                    <!-- Conteúdo Informações do Perfil -->
                    <!-- PAINEL DE INFORMACOES DO PERFIL DE USUARIO -->
                    @include('profile.includes.info-user-profile')
                    </div>

                    @if($errors->any())
                        <div class="tab-pane active" id="profileSettings">
                    @else
                        <div class="tab-pane" id="profileSettings">
                    @endif
                    <!-- FORMULARIO EDICAO PERFIL DE USUARIO -->
                    @include('profile.includes.edit-user-form-profile')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/custom/custom.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
