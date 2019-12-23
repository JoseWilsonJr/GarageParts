@if(session('warning'))
<div class="modal modal-warning fade in" id="modal-warning" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
            </div>
            <div class="modal-body">
                <p>{{ session('warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-warning" class="btn btn-primary btn-outline" data-dismiss="modal">OK!</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('success'))
<div class="modal modal-success fade in" id="modal-success" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            </div>
            <div class="modal-body">
                <p>{{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-success" class="btn btn-primary btn-outline" data-dismiss="modal">OK!</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- @if(session('error'))
<div class="modal modal-danger fade in" id="modal-danger" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-ban"></i> Sucesso!</h4>
            </div>
            <div class="modal-body">
                <p>{{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-error" class="btn btn-outline" data-dismiss="modal">OK!</button>
            </div>
        </div>
    </div>
</div>
@endif -->

<div class="modal modal-default fade in" id="modal-photo" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="icon fa fa-photo fa-lg"></i> Editar Imagem do Perfil</h4>
            </div>
            <div class="modal-body">
            
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Selecionar a Imagem:</h3>
                    </div>

                    <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}    
                        <div class="box-body">
                            <div class="form-group">
                                <input id="image" name="image" type="file">

                                <p class="help-block">Clique no botão para selecionar a imagem.</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon fa fa-share fa-lg"></i> Enviar Imagem
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="confirm-photo" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

