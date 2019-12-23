<div class="modal modal-default fade in" id="modal-fabricante" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-plus-square fa-lg"></i> Cadatrar novo fabricante</h4>
            </div>
            <div class="modal-body">
            
                <div class="box box-primary">

                    <form action="{{ route('garage.cadastro.fabricante') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}    
                        <div class="box-body">
                        <p class="text-muted"><strong>Os campos com <span class="text-red">*</span> são de preenchimento obrigatório.</strong></p>
                            <div class="form-group">
                                <label for="nomeDoFabricante" class="label-control">Nome do fabricante<span class="text-red">*</span></label>
                                <input name="nomeDoFabricante" class="form-control" placeholder="Digite o Nome do Fabricante" type="text">
                            </div>
                            <div class="form-group">
                                <label for="logoFabricante" class="label-control">Selecione uma imagem<span class="text-red">*</span></label>
                                <input name="logoFabricante" type="file">

                                <p class="help-block">Clique no botão acima para definir uma logomarca do fabricante.</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon fa fa-share fa-lg"></i> Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="confirm-fabricante" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default fade in" id="modal-modelo" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-plus-square fa-lg"></i> Cadatrar novo modelo</h4>
            </div>
            <div class="modal-body">
            
                <div class="box box-primary">

                    <form action="{{ route('garage.cadastro.modelo') }}" method="POST">
                        {!! csrf_field() !!}    
                        <div class="box-body">
                            <p class="text-muted"><strong>Os campos com <span class="text-red">*</span> são de preenchimento obrigatório.</strong></p>
                            <div class="form-group">
                                <label for="nomeDoModelo" class="label-control">Nome do modelo<span class="text-red">*</span></label>
                                <input name="nomeDoModelo" class="form-control" placeholder="Digite o Nome do Modelo" type="text">
                            </div>
                            <!-- <div class="form-group">
                                <label for="anoDoModelo" class="label-control">Ano do Modelo<span class="text-red">*</span></label>
                                <input name="anoDoModelo" class="form-control" placeholder="Digite o Ano do modelo" type="text">
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="versaoDoModelo" class="label-control">Versão do Modelo<span class="text-red">*</span></label>
                                <input name="versaoDoModelo" class="form-control" placeholder="Digite a Versão do modelo" type="text">
                            </div> -->
                            <div class="form-group">
                                <label for="marca" class="label-control">Selecione a Marca<span class="text-red">*</span></label>
                                <div>
                                    <select name="marca" class="form-control">
                                        <option>Selecione</option>
                                        @foreach($montadoras as $montadora)
                                            <option>{{ $montadora->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon fa fa-share fa-lg"></i> Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="confirm-modelo" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>