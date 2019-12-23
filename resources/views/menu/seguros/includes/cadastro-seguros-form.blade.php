<form action="{{ route('seguros.cadastro') }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!} 
    <div class="content">
        @include('includes.alerts')
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Informações do Seguro</h3>
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
                    <label for="dataDePagamento" class="col-sm-2 control-label">Data de Pagamento<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('dataDePagamento')}}" name="dataDePagamento" type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="valorDaApolice" class="col-sm-3 control-label">Valor da Aplólice<span class="text-red">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control moeda" value="{{old('valorDaApolice')}}" name="valorDaApolice" type="text" placeholder="Digite valor da Apólice">
                    </div>
                    <label for="validadeDoSeguro" class="col-sm-2 control-label">Validade do Seguro<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('validadeDoSeguro')}}" name="validadeDoSeguro" type="date" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="numeroDaApolice" class="col-sm-3 control-label">Número da Apólice<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('numeroDaApolice')}}" name="numeroDaApolice" type="number" placeholder="Digite o número da Apólice">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numeroDeEmergencia" class="col-sm-3 control-label">Número de Emergência<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('numeroDeEmergencia')}}" name="numeroDeEmergencia" type="text" placeholder="Digite o número do socorro" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="seguradora" class="col-sm-3 control-label">Seguradora<span class="text-red">*</span></label>
                    <div class="col-sm-7">
                        <input class="form-control" value="{{old('seguradora')}}" name="seguradora" type="text" placeholder="Digite o nome da Seguradora" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="detalhes" class="col-sm-3 control-label">Detalhes do Seguro</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="detalhes" type="text" placeholder="Detalhes" >{{old('detalhes')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="icon fa fa-share fa-lg"></i> Cadastrar Novo Seguro
        </button>
    </div>
</form>