<div class="tab-content">
    <p class="text-muted"><strong>Os campos com <span class="text-red">*</span> são de preenchimento obrigatório.</strong></p>
</div>  

@include('includes.alerts')
<form action="{{ route( 'garage.cadastro.veiculo' ) }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!} 
    <div class="content">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo do veículo<span class="text-red">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="tipoVeiculo" id="tipoVeiculo">
                        <option value="0" disabel="true" selected="true">Selecione o tipo de veículo</option>
                        @foreach($tipoVeiculos as $key => $value)
                            <option value="{{$value->type}}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> 

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Marca e Modelo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Marca<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="montadora" id="montadora">
                            <option value="0" disabel="true" selected="true">Selecione a Montadora</option>
                        </select>
                    </div>
                    <label for="" class="col-sm-2 control-label">Modelo<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="modelo" id="modelo">
                            <option value="0" id="nomeModelos" disabel="true" selected="true">Selecione o Modelo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="anoDoModelo" class="col-sm-2 control-label">Ano do Modelo<span class="text-red">*</span></label>
                    <div name="anoDoModelo" class="col-sm-4">
                        <select class="form-control" name="anoDoModelo" id="anoDoModelo">
                            <option value="0" disabel="true" selected="true">Selecione o Ano do Modelo</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control" name="nomeMarca" id="nomeMarca">
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control" name="nomeModelo" id="nomeModelo">
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control" name="anoModelo" id="anoModelo">
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Informações do Veículo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <label for="placa" class="col-sm-2 control-label">Placa<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="placaCarro form-control" value="{{old('placa')}}" name="placa" type="text" placeholder="Ex: AAA-9999">
                    </div>
                    <label for="numeroDoRenavan" class="col-sm-2 control-label">Renavan</label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('numedoDoRenavan')}}" name="numedoDoRenavan" type="text" placeholder="Digite o renavan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cor" class="col-sm-2 control-label">Cor<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('cor')}}" name="cor" type="text" placeholder="Cor do veículo">
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Informações da Aquisição</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <label for="kmDoVeiculo" class="col-sm-2 control-label">Hodômetro<span class="text-red">*</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" value="{{old('hodometro')}}" name="hodometro" type="text" placeholder="Digite o Km inicial do veículo" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="valorDeCompra" class="col-sm-2 control-label">Valor R$</label>
                    <div class="col-sm-4">
                        <input class="form-control moeda" value="{{old('valorDeCompra')}}" name="valorDeCompra" type="text" placeholder="Digite o valor da compra">
                    </div>
                    <label for="dataDeAquisicao" class="col-sm-2 control-label">Data de aquisição</label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('dataDeAquisicao')}}" name="dataDeAquisicao" type="date">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="icon fa fa-share fa-lg"></i> Cadastrar Novo Veículo
        </button>
    </div>
</form>
