<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
            Informações do Registro
        </h3>
    </div>
    <div class="box-body">
        <div class="form-horizontal">  
            <div class="form-group">
                <label for="nome" class="col-sm-1 control-label">Nome</label>
                <div class="col-sm-4">
                    <p class="form-control" name="nome">{{ auth()->user()->name }}</p>
                </div>
                <label for="RegistradoEm" class="col-sm-2 control-label">Registrado em</label>
                <div class="col-sm-3">
                    <p class="form-control" name="RegistradoEm">{{ auth()->user()->created_at->format('d/m/Y') }}</p>
                </div>
            </div> 
            <div class="form-group">
            <label for="Email" class="col-sm-1 control-label">E-mail</label>
                <div class="col-sm-4">
                    <p class="form-control" name="Email">{{ auth()->user()->email }}</p>
                </div>
            </div>            
        </div>
    </div>

</div>  

<!-- <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-line-chart fa-lg" aria-hidden="true"></i>
         Estatísticas
        </h3>
    </div>
    <div class="box-body">

    </div>
</div> -->
