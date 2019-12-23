<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
            Informações do Seguro Nº: {{$seguro->num_apolice}}
        </h3>
    </div>

    <div class="box-body">
        <div class="form-horizontal">  
            <div class="form-group">
                <label class="col-sm-3 control-label">Número da Apolice</label>
                <div class="col-sm-4">
                    <p class="form-control" name="nome">{{$seguro->num_apolice}}</p>
                </div>
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{$seguro->status}}</p>
                </div>
                <label class="col-sm-3 control-label">Contato de Emergência</label>
                <div class="col-sm-3">
                    <p class="form-control telefone" name="Email">{{$seguro->contato_emergencia}}</p>
                </div>
                <label class="col-sm-3 control-label">Validade do Seguro</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{$seguro->data_validade->format('d/m/Y')}}</p>
                </div>
                <label class="col-sm-3 control-label">Seguradora</label>
                <div class="col-sm-9">
                    <p class="form-control" name="Email">{{ $seguro->seguradora }}</p>
                </div>
                <label class="col-sm-3 control-label">Valor da Apolice</label>
                <div class="col-sm-3">
                    <p class="form-control" name="Email">R$ {{number_format($seguro->valor_apolice, 2,',', '.')}}</p>
                </div>
                <label class="col-sm-3 control-label">Data do Pagamento</label>
                <div class="col-sm-3">
                    <p class="form-control" name="nome">{{ $seguro->data_pagamento->format('d/m/Y')}}</p>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-sm-3 control-label">Detalhes do Seguro</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" style="resize: none;" readonly="readonly" name="descricao">{{ $veiculo->seguros->first()->detalhes }}</textarea>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Informações do Veículo</h3>
    </div>
    <div class="box-body">
    <div class="form-horizontal">  
            <div class="form-group">
                <label class="col-sm-3 control-label">Marca</label>
                <div class="col-sm-4">
                    <p class="form-control" name="nome">{{ $veiculo->nome_montadora }}</p>
                </div>
                <label class="col-sm-2 control-label">Placa</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{ $veiculo->placa }}</p>
                </div>
                <label class="col-sm-3 control-label">Modelo</label>
                <div class="col-sm-9">
                    <p class="form-control" name="Email">{{ $veiculo->nome_modelo }}</p>
                </div>
                <label class="col-sm-3 control-label">Ano do Modelo</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{ $veiculo->ano_modelo }}</p>
                </div>
                <label class="col-sm-2 control-label">Cor</label>
                <div class="col-sm-4">
                    <p class="form-control" name="Email">{{ $veiculo->cor }}</p>
                </div>
                @if(isset($veiculo->renavan))
                    <label class="col-sm-3 control-label">Nº Renavan</label>
                    <div class="col-sm-3">
                        <p class="form-control" name="Email">{{$veiculo->renavan or ''}}</p>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Valor de Compra</label>
                <div class="col-sm-3">
                    <p class="form-control" name="nome">R$ {{ number_format($veiculo->precos()->orderBy('data_compra', 'desc')->first()->valor_compra, 2,',', '.')}}</p>
                </div>
                <label class="col-sm-2 control-label">Hodômetro</label>
                <div class="col-sm-4">
                    <p class="form-control" name="kmDoVeiculo">{{ number_format($veiculo->km_atual, 0, ',', '.') }}</p>
                </div>
                <label class="col-sm-3 control-label">Data da Aquisição</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{$veiculo->precos()->orderBy('data_compra', 'desc')->first()->data_compra->format('d/m/Y')}}</p>
                </div>
            </div>            
        </div>
    </div>
</div>