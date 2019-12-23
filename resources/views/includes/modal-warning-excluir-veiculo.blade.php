<div class="modal modal-default fade in" id="modal-delete" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-orange"><i class="icon fa fa-warning"></i> Atenção!</h4>
            </div>
            <div class="modal-body">
                <div class="box-header">
                    <h3 class="box-title text-red"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Veículo</h3>
                </div>
                <div class="box-body">
                    <p class=""><strong>ESTA AÇÃO NÃO PODERÁ SER DESFEITA!</strong></p>
                    <p>A Exclusão deste veículo, implica na excluasão de todas as informações relacionadas a ele, tem certeza que deseja executar a exclusão deste veículo?</p>
                </div>
            </div>  
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="{{ route( 'garage.gerenciar.veiculo.delete', $veiculo->id) }}">Sim!</a>
                <button type="button" id="confirm-delete" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>