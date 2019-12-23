                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                                    Transferir Propriedade do veículo.
                                </h3>
                            </div>
                            <div class="box-body">
                                @include('includes.alerts')
                                <form action="{{ route( 'garage.gerenciar.veiculo.trasferencia-confirmar', $veiculo->id ) }}" class="form-horizontal">
                                    {!! csrf_field() !!} 
                                    <div class="form-group">
                                        <label for="nomeDoComprador" class="col-sm-3 control-label">Nome do Comprador<span class="text-red">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="nomeDoComprador" type="text" placeholder="Digite o e-mail para transferência." value="{{old('nomeDoComprador')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="valorDaTransferencia" class="col-sm-3 control-label">Valor da Transferencia<span class="text-red">*</span></label>
                                        <div class="col-sm-3">
                                            <input class="form-control moeda" name="valorDaTransferencia" type="text" placeholder="Digite o Valor do Veículo" value="{{old('valorDaTransferencia')}}">
                                        </div>

                                        <label for="valorDaTransferencia" class="col-sm-3 control-label">Data da Transferência<span class="text-red">*</span></label>
                                        <div class="col-sm-3">
                                            <input class="form-control" name="dataDaTransferencia" type="date" value="{{old('dataDaTransferencia')}}">
                                        </div>
                                        <input type="hidden" name="hodometro" value="{{ $veiculo->km_atual }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-3">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i> Transferir</a>
                                        </div>
                                    </div>
                                </form>   
                            </div>
                        </div>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                    Informações do Veículo
                                </h3>
                            </div>

                            <div class="box-body">
                                <div class="form-horizontal">  
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Marca</label>
                                        <div class="col-sm-4">
                                            <p class="form-control" name="nome">{{ $veiculo->nome_montadora }}</p>
                                        </div>
                                        <label class="col-sm-3 control-label">Placa</label>
                                        <div class="col-sm-3">
                                            <p class="form-control" name="RegistradoEm">{{$veiculo->placa}}</p>
                                        </div>
                                        <label class="col-sm-2 control-label">Modelo</label>
                                        <div class="col-sm-4">
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
                                        <label class="col-sm-2 control-label">Nº Renavan</label>
                                        <div class="col-sm-4">
                                            <p class="form-control" name="Email">{{$veiculo->renavan or ''}}</p>
                                        </div>
                                        <label class="col-sm-2 control-label">Hodômetro</label>
                                        <div class="col-sm-3">
                                            <p class="form-control" name="Email">{{  number_format($veiculo->km_atual, 0,',', '.') }}</p>
                                        </div>
                                    </div>            
                                </div>
                            </div>
                        </div>
