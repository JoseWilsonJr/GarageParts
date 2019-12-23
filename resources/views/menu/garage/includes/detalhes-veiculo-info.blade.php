                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                    Informações do Veículo
                                </h3>
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
                                            <p class="form-control" name="RegistradoEm">{{$veiculo->placa}}</p>
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
                                        <label class="col-sm-3 control-label">Tipo Combustível</label>
                                        <div class="col-sm-3">
                                            <p class="form-control" name="Email">{{$json_str['Combustivel']}}</p>
                                        </div>
                                        <label class="col-sm-2 control-label">Nº Renavan</label>
                                        <div class="col-sm-4">
                                            <p class="form-control" name="Email">{{$veiculo->renavan or ''}}</p>
                                        </div>
                                        <label class="col-sm-3 control-label">Hodômetro Atual</label>
                                        <div class="col-sm-3">
                                            <p class="form-control" name="Email">{{  number_format($veiculo->km_atual, 0,',', '.') }}</p>
                                        </div>
                                    </div>            
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-usd fa-lg" aria-hidden="true"></i>
                                    Informações da Compra do Veiculo
                                </h3>
                            </div>

                            <div class="box-body">
                                <div class="form-horizontal">  
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Valor de Compra</label>
                                        <div class="col-sm-4">
                                            <p class="form-control" name="nome">R$ {{ number_format($veiculo->precos()->orderBy('data_compra', 'desc')->first()->valor_compra, 2,',', '.') }}</p>
                                        </div>
                                        <label class="col-sm-3 control-label">Data da Aquisição</label>
                                        <div class="col-sm-3">
                                            <p class="form-control" name="RegistradoEm">{{$veiculo->precos()->orderBy('data_compra', 'desc')->first()->data_compra->format('d/m/Y')}}</p>
                                        </div>
                                        <label class="col-sm-2 control-label">Hodômetro</label>
                                        <div class="col-sm-4">
                                            <p class="form-control" name="hodometro">{{ number_format($veiculo->precos()->orderBy('data_compra', 'desc')->first()->km_inicial, 0, ',', '.') }}</p>
                                        </div>
                                    </div>  
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Valores de Transferencias Anteriores<span class="text-red">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="tipoVeiculo" id="tipoVeiculo">
                                                <option value="0" disabel="true" selected="true">Cique para ver os valores anteriores</option>
                                                @foreach($veiculo->precos()->get() as $key => $value)
                                                    <option value="{{$value->type}}">Data: {{ $value->data_compra->format('d-m-Y') }} | Hodometro: {{ $value->km_inicial }} | Valor: R$ {{ number_format($value->valor_compra, 2,',', '.') }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <label class="col-sm-7 control-label">Preço base da Tabela FIPE mês de referência {{$json_str['MesReferencia']}}:</label>
                                    <div class="col-sm-5">
                                        <p class="form-control" name="valorFIPE">{{$json_str['Valor']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>