@extends('adminlte::page')

@section('title', 'GarageParts - Garage')

@push('css')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@endpush

@section('content_header')
<h1>Cadastrar<small> Novos Veículos</small></h1>
    <ol class="breadcrumb">
        <li class=""><i class="fa fa-home fa-lg" aria-hiden></i> Garagem</li>
        <li class="active"><i class="fa fa-plus-square-o fa-lg" aria-hiden></i> Cadastrar Veículo</li>
    </ol>
@stop

@section('content')
<div class="box-background box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Folumário de Cadastro</h3>
    </div>
    <div class="box-body">
        @include('includes.modals')
        @include('menu.garage.includes.cadastro-veiculo-form')
    </div>
</div>

@stop

@push('js')
<script src="{{ asset('vendor/custom/custom.js') }}"></script>
<script src="{{ asset('vendor/custom/jquery.mask.min.js') }}"></script>

<script type='text/javascript'>
    $('.moeda').mask('#.##0,00', {reverse: true});
</script>

<script type='text/javascript'>
    $('.placaCarro').mask('AAA-0000');
</script>

<script type='text/javascript'>
    document.getElementById("nomeMarca").style.display = "none";
    document.getElementById("nomeModelo").style.display = "none";
    document.getElementById("anoModelo").style.display = "none";

    $('#tipoVeiculo').on('change', function(e){
        
        // console.log(e);
        var tipo_name = e.target.value;
        $.get('https://parallelum.com.br/fipe/api/v1/'+tipo_name+'/marcas', function(data){
            console.log(data);
            $('#montadora').empty();
            $('#montadora').append('<option value="0" disabel="true" selected="true">Selecione a Montadora</option>');
            $.each(data, function(index, montadorasObj){
                $('#montadora').append('<option value="' + montadorasObj.codigo + '" placeholder="'+ montadorasObj.nome + '">'+ montadorasObj.nome + '</option>');
            })
        });
    });

    $('#montadora').on('change', function(e){

        // console.log(tipo_name);
        // console.log(montadora_id);
        var tipo_name = $('#tipoVeiculo').val();
        var montadora_id = e.target.value;

        $.get('https://parallelum.com.br/fipe/api/v1/'+tipo_name+'/marcas/'+ montadora_id + '/modelos', function(data){

            console.log(data);
            $('#modelo').empty();
            $('#modelo').append('<option value="0" disabel="true" selected="true">Selecione o Modelo</option>');
            $.each(data.modelos, function(index, modelosObj){
                $('#modelo').append('<option value="' + modelosObj.codigo + '">'+ modelosObj.nome + '</option>');
            })

        });
    });


    $('#modelo').on('change', function(e){

        // console.log(e);
        // console.log(montadora_id);
        var tipo_name = $('#tipoVeiculo').val();
        var montadora_id = $('#montadora').val();
        var modelo_id = $('#modelo').val();

        $.get('https://parallelum.com.br/fipe/api/v1/'+tipo_name+'/marcas/'+ montadora_id + '/modelos/'+ modelo_id +'/anos', function(data){

            console.log(data);
            $('#anoDoModelo').empty();
            $('#anoDoModelo').append('<option value="0" disabel="true" selected="true">Selecione o Ano do Modelo</option>');
            $.each(data, function(index, modelosObj){
                $('#anoDoModelo').append('<option value="' + modelosObj.codigo + '">'+ modelosObj.nome + '</option>');
            })

        });
    });

    $('#montadora').on('change', function(e){
        var tipo_name = $("#montadora option:selected").text();
        $('#nomeMarca').append('<option value="'+tipo_name+'" selected="true">'+tipo_name+'</option>'); 
        document.getElementById("nomeMarca").style.display = "none";   
    });
    $('#modelo').on('change', function(e){
        var tipo_name = $("#modelo option:selected").text();
        $('#nomeModelo').append('<option value="'+tipo_name+'" selected="true">'+tipo_name+'</option>'); 
        document.getElementById("nomeModelo").style.display = "none";   
    });
    $('#anoDoModelo').on('change', function(e){
        var tipo_name = $("#anoDoModelo option:selected").text();
        $('#anoModelo').append('<option value="'+tipo_name+'" selected="true">'+tipo_name+'</option>'); 
        document.getElementById("anoModelo").style.display = "none";   
    });

</script>
@endpush