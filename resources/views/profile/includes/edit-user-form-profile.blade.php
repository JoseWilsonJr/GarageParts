<form class="form-horizontal" action="{{ route( 'profile.update' ) }}" method="POST">  
            @include('includes.alerts')
    <div class="box box-info no-collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-retweet fa-lg" aria-hidden="true"></i>
                Atualizar Cadastro
            </h3>
        </div>

        <div class="box-body">
            {!! csrf_field() !!}    
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input class="form-control" value="@if( !old('nome')){{ auth()->user()->name}}@else{{ old('nome') }}@endif" name="nome" type="text" placeholder="Nome completo">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Apelido</label>
                <div class="col-sm-10">
                    <input class="form-control" value="@if( !old('apelido')){{ auth()->user()->nickname }}@else{{ old('apelido') }}@endif" name="apelido" type="text" placeholder="Apelido">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" type="text" placeholder="E-mail" value="{{ auth()->user()->email }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="senha" class="col-sm-2 control-label">Senha Atual</label>
                <div class="col-sm-10">
                    <input class="form-control" name="senha" type="password" placeholder="Didite a senha atual ">
                </div>
            </div>
            
        </div>
    </div>

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title"> Alterar Senha</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-plus "></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: none;">
            <div class="form-group">
                <label for="novaSenha" class="col-sm-2 control-label">Nova Senha</label>
                <div class="col-sm-10">
                    <input class="form-control" name="novaSenha" type="password" placeholder="Digite a nova senha">
                </div>
            </div>
            <div class="form-group">
                <label for="confirmarSenha" class="col-sm-2 control-label">Confirmação Senha</label>
                <div class="col-sm-10">
                    <input class="form-control" name="confirmarSenha" type="password" placeholder="Repita a nova senha">
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-success">
                    <i class="icon fa fa-share fa-lg"></i> Atualizar Informações
                </button>
            </div>
        </div>  
    </div>
</form>