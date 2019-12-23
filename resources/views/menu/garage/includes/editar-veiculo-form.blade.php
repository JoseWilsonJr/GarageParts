<div class="tab-content">
    <p class="text-muted"><strong>Os campos com <span class="text-red">*</span> são de preenchimento obrigatório.</strong></p>
</div>  

@include('includes.alerts')
<form action="{{ route( 'garage.gerenciar.veiculo.update', $veiculo->id ) }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!} 
    <div class="content">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title lead"> Marca e Modelo</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Marca<span class="text-red">*</span></label>
                        <div class="col-sm-9">
                            <input class="form-control" value="{{ $veiculo->nome_montadora }}" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Modelo<span class="text-red">*</span></label>
                        <div class="col-sm-9">
                            <input class="form-control" value="{{ $veiculo->nome_modelo }}" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anoDoModelo" class="col-sm-3 control-label">Ano do Modelo<span class="text-red">*</span></label>
                        <div class="col-sm-9">
                            <input class="form-control" value="{{ $veiculo->ano_modelo }}" type="text" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title lead"> Informações do Veículo</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="placa" class="col-sm-2 control-label">Placa<span class="text-red">*</span></label>
                        <div class="col-sm-4">
                            <input class="placaCarro form-control" value="{{$veiculo->placa}}" disabled>
                        </div>
                        <label for="numeroDoRenavan" class="col-sm-2 control-label">Renavan</label>
                        <div class="col-sm-4">
                            <input class="form-control" value="{{$veiculo->renavan}}" name="numedoDoRenavan" type="text" placeholder="Digite o renavan">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="cor" class="col-sm-2 control-label">Cor<span class="text-red">*</span></label>
                        <div class="col-sm-4">
                            <input class="form-control" value="{{$veiculo->cor}}" name="cor" type="text" placeholder="Cor do veículo">
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
                            <input class="form-control" value="{{number_format($veiculo->precos()->orderBy('data_compra', 'desc')->first()->km_inicial, 0, ',', '.')}}" name="hodometro" type="text" placeholder="Digite o Km inicial do veículo" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valorDeCompra" class="col-sm-2 control-label">Valor R$</label>
                        <div class="col-sm-3">
                            <input class="form-control moeda" value="{{ number_format($veiculo->precos()->orderBy('data_compra', 'desc')->first()->valor_compra, 2,',', '.') }}" name="valorDeCompra" type="text" placeholder="Digite o valor da compra">
                        </div>
                        <label for="dataDeAquisicao" class="col-sm-3 control-label">Data de aquisição<span class="text-red">*</span></label>
                        <div class="col-sm-4">
                            <input class="form-control" value="{{$veiculo->precos()->first()->data_compra->format('d/m/Y')}}" name="dataDeAquisicao" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">
            <i class="icon fa fa-share fa-lg"></i> Atualizar Informações do Veículo
        </button>
    </div>
</form>
