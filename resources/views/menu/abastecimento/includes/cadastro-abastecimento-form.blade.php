<form action="{{ route('abastecimento.cadastro') }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!} 
    <div class="content">
        @include('includes.alerts')
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title lead"> Informações do Abastecimento</h3>
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
                    <label for="dataDoAbastecimento" class="col-sm-2 control-label">Data do Abastecimento<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control" value="{{old('dataDoAbastecimento')}}" name="dataDoAbastecimento" type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="custoTotal" class="col-sm-3 control-label">Custo Total<span class="text-red">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control moeda" value="{{old('custoTotal')}}" name="custoTotal" type="text" placeholder="Digite Custo Total">
                    </div>
                    <label for="precoLitro" class="col-sm-2 control-label">Preço por Litro<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                        <input class="form-control moeda" value="{{old('precoLitro')}}" name="precoLitro" type="text" placeholder="Digite preço/Litro">
                    </div>

                </div>
                <div class="form-group">
                    <label for="litragem" class="col-sm-3 control-label">Litragem<span class="text-red">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control" value="{{old('litragem')}}" name="litragem" type="number" placeholder="Digite o Volume em Litros">
                    </div>
                    <label for="tanqueCheio" class="control-label">
                        <input type="checkbox" id="tanqueCheio" name="tanqueCheio" value="true"> Tanque Cheio
                    </label>
                </div>
                <div class="form-group">
                    <label for="odometro" class="col-sm-3 control-label">Hodômetro<span class="text-red">*</span></label>
                    <div class="col-sm-4">
                        <input class="form-control" value="{{old('hodometro')}}" name="hodometro" type="number" placeholder="Digite o KM do veículo" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomeDoPosto" class="col-sm-3 control-label">Nome do Posto</label>
                    <div class="col-sm-7">
                        <input class="form-control" value="{{old('nomeDoPosto')}}" name="nomeDoPosto" type="text" placeholder="Digite o nome Posto" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-sm-3 control-label">Descrição</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="descricao" type="text" placeholder="Descrição" >{{old('descricao')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="icon fa fa-share fa-lg"></i> Cadastrar Novo Abastecimento
        </button>
    </div>
</form>