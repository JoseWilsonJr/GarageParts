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
