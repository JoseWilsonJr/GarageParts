<div class="box-body">
    <div class="modal modal-default fade in" id="modal-galeria" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="icon fa fa-photo fa-lg"></i> Adicionar uma nova imagem a galeria.</h4>
                </div>
                <div class="modal-body">
                
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Selecionar a Imagem:</h3>
                        </div>
                        <form action="{{ route('garage.veiculo.detalhes.add-galeria', $veiculo->id) }}" method="POST" enctype="multipart/form-data">
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
                    <button type="button" id="confirm-galeria" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <form action="{{ route('garage.veiculo.imagem.delete', $veiculo_id)}}">
            <div class="box-header with-border">
                <div class="form-group">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#modal-galeria"><i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i> Adicionar Nova Foto</button>
                    </div>
        @if(isset($imagens) && $imagens->count() != 0)
                    <div class="modal modal-default fade in" id="modal-galeria-view" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4><i class="icon fa fa-photo fa-lg"></i> - Galeria de Fotos - </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            <div id="carousel-galera-fotos" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @forelse($imagens as $key => $imagem)
                                                        @if($key < 0)
                                                            <li data-target="#carousel-galera-fotos" data-slide-to="{{ $key }}" class="active"></li>
                                                        @else
                                                            <li data-target="#carousel-galera-fotos" data-slide-to="{{ $key }}" class=""></li>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img src="{{ url('storage/galeria/'.$imagem->nome_imagem) }}" alt="First slide">
                                                        <div class="carousel-caption">
                                                            {{$imagem->created_at->format('d-m-Y')}}
                                                        </div>
                                                    </div>
                                                @forelse($imagens as $key => $imagem)
                                                    @if($key < 0)
                                                        <div class="item active">
                                                            <img class="galeria1" src="{{ url('storage/galeria/'.$imagem->nome_imagem) }}" alt="First slide">

                                                            <div class="carousel-caption">
                                                                {{$imagem->created_at->format('d-m-Y')}}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="item">
                                                            <img class="galeria1" src="{{ url('storage/galeria/'.$imagem->nome_imagem) }}" alt="First slide">
                                                            <div class="carousel-caption">
                                                                {{$imagem->created_at->format('d-m-Y')}}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @empty
                                                @endforelse
                                                </div>
                                                <a class="left carousel-control" href="#carousel-galera-fotos" data-slide="prev">
                                                    <span class="fa fa-angle-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-galera-fotos" data-slide="next">
                                                    <span class="fa fa-angle-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="confirm-galeria" class="btn btn-primary btn-flat" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal modal-default fade in" id="modal-delete-galeria" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="text-orange"><i class="icon fa fa-warning"></i> Atenção!</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-header">
                                        <h3 class="box-title text-red"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir Abastecimento</h3>
                                    </div>
                                    <div class="box-body">
                                        <p><strong>ESTA AÇÃO NÃO PODERÁ SER DESFEITA!</strong></p>
                                        <p>A EXCLUSÃO das IMAGENS selecionadas não poderá ser desfeita, tem certeza que deseja executar a exclusão das IMAGENS Selecinonadas?</p>
                                    </div>
                                </div>  
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Sim!</a>
                                    <button type="button" id="confirm-delete-manut" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modal-delete-galeria"><i class="fa fa-ban fa-lg" aria-hidden="true"></i> Excluir fotos selecionadas</button>
                    </div>

                </div>
            </div>
            <div class="box-body">
                <div class="timeline-body">
                    @forelse($imagens as $key => $imagem)
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <input class="pull-right" type="checkbox" name="imagem{{$imagem->id}}" value="{{ $imagem->id }}" />
                                    <h3 class="panel-title">{{$imagem->created_at->format('d-m-Y')}}</h3>
                                </div>
                                <div class="panel-body">
                                    <a type="submit" data-toggle="modal" data-target="#modal-galeria-view">
                                         <img class="galeria2" src="{{ url('storage/galeria/'.$imagem->nome_imagem) }}" alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
        @endif
                </div>
            </div>

        </form>

    </div>

</div>






