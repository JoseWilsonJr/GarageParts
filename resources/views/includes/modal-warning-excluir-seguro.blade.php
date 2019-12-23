<div class="modal modal-default fade in" id="modal-delete-seguro" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-orange"><i class="icon fa fa-warning"></i> Atenção!</h4>
            </div>
            <div class="modal-body">

                <div class="box-header">
                    <h3 class="box-title text-red"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Seguro do Veículo</h3>
                </div>
                <div class="box-body">
                    <p class=""><strong>ESTA AÇÃO NÃO PODERÁ SER DESFEITA!</strong></p>
                    <p>A exclusão do seguro referente ao veículo selecionado implica na excluasão de todas as suas informações relacionadas, inclusive seu histórico. Tem certeza que deseja executar a exclusão dos dados de Seguro?</p>
                </div>
            </div>  
            <div class="modal-footer">
                <a type="button" href="{{ route( 'seguros.excluir', $seguro->id ) }}" class="btn btn-primary">Sim!</a>
                <button type="submit" id="confirm-delete-manut" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>