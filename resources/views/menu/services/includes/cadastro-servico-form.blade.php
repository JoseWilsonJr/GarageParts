<form action="{{ route( 'service.cadastro' ) }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!} 
    <div class="content">
            @include('includes.alerts')
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Informações do Serviço</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Selecione a placa do veículo<span class="text-red">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control" name="placaDoVeiculo" id="placaDoVeiculo">
                            <option value="" disabel="true" selected="true">Veículos do usuário</option>
                            @foreach($veiculos as $key => $veiculo)
                                <option value="{{ $veiculo->id }}" disabel="true">{{ $veiculo->placa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="dataDoServico" class="col-sm-2 control-label">Data da execução<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('dataDoServico')}}" name="dataDoServico" type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="hodometro" class="col-sm-3 control-label">Hodômetro<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('hodometro')}}" name="hodometro" type="number" placeholder="Digite o KM do veículo na execução do serviço" >
                    </div>
                    <label for="agendado" class="control-label">
                        <input type="checkbox" id="agendado" name="agendado" value="true"> Agendado
                    </label>
                </div>
                <div class="form-group">
                    <label for="tituloDoServico" class="col-sm-3 control-label">Título do serviço<span class="text-red">*</span></label>
                    <div class="col-sm-7">
                        <input class="form-control" value="{{old('tituloDoServico')}}" name="tituloDoServico" type="text" placeholder="Digite o nome do serviço" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="tituloDoServico" class="col-sm-3 control-label">Estabelecimento</label>
                    <div class="col-sm-7">
                        <input class="form-control" value="{{old('estabelecimento')}}" name="estabelecimento" type="text" placeholder="Digite o nome do serviço" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricaoDoServico" class="col-sm-3 control-label">Dercrição do serviço</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="descricaoDoServico" type="text" placeholder="Descrição do serviço" >{{old('descricaoDoServico')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="icon fa fa-share fa-lg"></i> Cadastrar Novo Serviço
        </button>
    </div>
</form>