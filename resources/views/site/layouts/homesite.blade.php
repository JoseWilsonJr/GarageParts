@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-blue sidebar-mini layout-top-nav')

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ route('home') }}" class="logo">
                             <!-- logo for regular state and mobile devices -->
                            <img src="{{ url('assets/site/img/logo-garage-parts.png') }}" class="logolarge">    
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="btn color-palette btn-flat" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> 
                                    Entrar
                                </a>
                            </li>
                            <li>
                                <a class="btn bg-teal-active color-palette btn-flat" href="{{ route('register') }}">
                                    <i class="fa fa-user-plus fa-lg" aria-hidden="true"></i> 
                                    Cadastre-se
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            
                        </ul>
                    </div>
                </div>

            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content_header')
                </section>

                <!-- Main content -->
                <section class="content">

                    @yield('content')

                </section>
                <!-- /.content -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
