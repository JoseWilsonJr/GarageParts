<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Garage', 'prefix' => 'garage' ], function(){


    $this->get('/{qtdPagina}', 'GarageController@index')->name( 'garage' );
    $this->get('/linha-do-tempo/{id}/5', 'GarageController@index')->name( 'garage.linha-do-tempo' );
    $this->get('/gerenciar/veiculos', 'GarageController@gerenciarVeiculos')->name( 'garage.gerenciar.veiculos' );
    $this->get('/gerenciar/veiculo/{id}/detalhes', 'GarageController@detalhesVeiculo')->name( 'garage.gerenciar.veiculo.detalhes' );
    $this->get('/gerenciar/veiculo/{id}/transferir', 'GarageController@transferenciaVeiculo')->name( 'garage.gerenciar.veiculo.trasferencia' );
    $this->get('/gerenciar/veiculo/{id}/transferir/confirmar', 'GarageController@confirmarTransferenciaVeiculo')->name( 'garage.gerenciar.veiculo.trasferencia-confirmar' );
    $this->get('/gerenciar/veiculo/{id}/editar', 'GarageController@editarVeiculo')->name( 'garage.gerenciar.veiculo.editar' );
    $this->get('/gerenciar/veiculo/{id}/deletar', 'VeiculoController@apagarVeiculo')->name( 'garage.gerenciar.veiculo.delete' );
    $this->get('/gerenciar/veiculo/{veiculo_id}/galeria/deletar', 'GarageController@apagarImagensGaleria')->name( 'garage.veiculo.imagem.delete' );
    $this->get('/cadastro/veiculo', 'VeiculoController@cadastroVeiculoForm')->name( 'garage.cadastro.form');

    $this->post('/filtro', 'GarageController@timelineFiltro')->name( 'garage.filtro' );
    $this->post('/gerenciar/veiculo/{id}/transferir/efetivar', 'GarageController@efetivarTransferenciaVeiculo')->name( 'garage.gerenciar.veiculo.trasferencia-efetivar' );
    $this->post('/gerenciar/veiculo/{id}/editar', 'VeiculoController@editarVeiculo')->name( 'garage.gerenciar.veiculo.update' );
    $this->post('/cadastro/veiculo/', 'VeiculoController@cadastrarVeiculo')->name( 'garage.cadastro.veiculo' );
    $this->post('/cadastro/veiculo/fabricante', 'VeiculoController@cadastarFabricante')->name( 'garage.cadastro.fabricante' );
    $this->post('/cadastro/veiculo/modelo', 'VeiculoController@cadastarModelo')->name( 'garage.cadastro.modelo' );
    $this->post('/gerenciar/veiculo/{id}/add-galeria', 'GarageController@adicionarFotoGaleira')->name( 'garage.veiculo.detalhes.add-galeria' );

    $this->get('/json-modelos', 'VeiculoController@modelos' );
    $this->get('/json-infoModelos', 'VeiculoController@infoModelos' );
    
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Abastecimento', 'prefix' => 'abastecimento' ], function(){
    
    $this->get('/gerenciar', 'AbastecimentoController@index')->name( 'abastecimentos' );
    $this->get('/cadastrar', 'AbastecimentoController@cadastrarAbastecimentoForm')->name( 'abastecimento.cadastro.form' );
    $this->get('/gerenciar/{id_veiculo}/historico', 'AbastecimentoController@abastecimentoHistorico')->name( 'abastecimentos.gerenciar.historico' );
    $this->get('/gerenciar/{id_veiculo}/historico/deletar', 'AbastecimentoController@apagarAbastecimento')->name( 'abastecimento.gerenciar.historico.delete' );

    $this->post('/cadastro/abastecimento', 'AbastecimentoController@cadastarAbastecimento')->name( 'abastecimento.cadastro' );

    $this->any('/gerenciar/{id_veiculo}/historico-filtro', 'AbastecimentoController@filtrarAbastecimentos')->name( 'abastecimentos.filtrar' );
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Services', 'prefix' => 'services' ], function(){
    
    $this->get('/gerenciar', 'ServicesController@index')->name( 'services' );
    $this->get('/cadastrar', 'ServicesController@cadastrarServicoForm')->name( 'service.cadastro.form' );
    $this->get('/gerenciar/servico-{servico_id}', 'ServicesController@gerenciarServico')->name( 'services.gerenciar.servico' );
    $this->get('/gerenciar/servico-{servico_id}/deletar', 'ServicesController@apagarServico')->name( 'services.gerenciar.servico.delete' );
    $this->get('/gerenciar/servico-{servico_id}/manutencao/deletar', 'ServicesController@apagarManutencao')->name( 'services.gerenciar.manutencao.delete' );
    $this->get('/gerenciar/servico-{servico_id}/editar', 'ServicesController@formularioEditarServico')->name( 'services.editar.servico' );
    $this->get('/cadastrar/servico-{servico_id}/mecanico', 'ServicesController@formularioManutencoMecanica')->name( 'service.cadastro.mecanico.form' );
    $this->get('/cadastrar/servico-{servico_id}/eletrico', 'ServicesController@formularioManutencaoEletrica')->name( 'service.cadastro.eletrico.form' );
    $this->get('/cadastrar/servico-{servico_id}/hidraulico', 'ServicesController@formularioManutencaoHidraulica')->name( 'service.cadastro.hidraulico.form' );
    $this->get('/cadastrar/servico-{servico_id}/mao-de-obra', 'ServicesController@formularioManutencaoMaoDeObra')->name( 'service.cadastro.mao-de-obra.form' );
    $this->get('/cadastrar/servico-{servico_id}/pneus', 'ServicesController@formularioServicoPneus')->name( 'service.cadastro.pneus.form' );
    
    $this->any('/gerenciar-filtro', 'ServicesController@filtrarServicos')->name( 'filtrar' );
    $this->post('/gerenciar/servico-{servico_id}/editar', 'ServicesController@editarServico')->name( 'services.editar.servico' );
    $this->post('/gerenciar/servico-{servico_id}/editar/anexo', 'ServicesController@adicionarAnexo')->name( 'services.editar.servico.add-anexo' );
    $this->post('/cadastrar/servico', 'ServicesController@cadastrarServico')->name( 'service.cadastro' );
    $this->post('/cadastrar/servico-{servico_id}/mecanico', 'ServicesController@cadastrarManutencaoMecanica')->name( 'service.cadastro.mecanico' );
    $this->post('/cadastrar/servico-{servico_id}/eletrico', 'ServicesController@cadastrarManutencaoEletrica')->name( 'service.cadastro.eletrico' );
    $this->post('/cadastrar/servico-{servico_id}/hidraulico', 'ServicesController@cadastrarManutencaoHidraulica')->name( 'service.cadastro.hidraulico' );
    $this->post('/cadastrar/servico-{servico_id}/pneus', 'ServicesController@cadastrarManutencaoPneus')->name( 'service.cadastro.pneus' );
    $this->post('/cadastrar/servico-{servico_id}/mao-de-obra', 'ServicesController@cadastrarManutencaoMaoDeObra')->name( 'service.cadastro.mao-de-obra' );
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Seguros', 'prefix' => 'seguros' ], function(){
    
    $this->get('/gerenciar', 'SegurosController@index')->name( 'seguros' );
    $this->get('/cadastrar', 'SegurosController@cadastrarSegurosForm')->name( 'seguros.cadastro.form' );
    $this->get('/gerenciar/{id_veiculo}/detalhes', 'SegurosController@detalhesSeguro')->name( 'seguros.gerenciar.detalhes' );
    $this->get('/gerenciar/{id_veiculo}/renovar', 'SegurosController@renovarSeguroForm')->name( 'seguros.gerenciar.renovar.form' );
    $this->get('/excluir/seguro-{id_seguro}', 'SegurosController@excluirSeguro')->name( 'seguros.excluir' );

    $this->post('/cadastro/seguro', 'SegurosController@cadastrarSeguros')->name( 'seguros.cadastro' );
    $this->post('/renovar/seguro', 'SegurosController@renovarCadastroSeguro')->name( 'seguros.cadastro.renovar' );

});

$this->group(['middleware' => ['auth'], 'namespace' => 'Notificacoes', 'prefix' => 'notificacoes' ], function(){

    $this->get('/gerenciar', 'NotificacoesController@index')->name( 'notificacoes' );
    $this->get('/gerenciar/agendamentos/{veiculo_id}', 'NotificacoesController@agendamentos')->name( 'notificacoes.agendamentos' );
    $this->get('/gerenciar/agendamentos/encerar/{pendencia_id}', 'NotificacoesController@apagarAgendamento')->name( 'notificacoes.agendamentos.encerar' );

    $this->get('/gerenciar/manut_mecanicas/{veiculo_id}', 'NotificacoesController@mecanicas')->name( 'notificacoes.mecanicas' );
    $this->get('/gerenciar/manut_hidraulicas/{veiculo_id}', 'NotificacoesController@hidraulicas')->name( 'notificacoes.hidraulicas' );
    $this->get('/gerenciar/troca_pneus/{veiculo_id}', 'NotificacoesController@pneus')->name( 'notificacoes.pneus' );


});

$this->group(['middleware' => ['auth'], 'namespace' => 'Profile', 'prefix' => 'admin' ], function(){

    $this->post('/profile/update', 'ProfileController@profileUpdate')->name( 'profile.update' );
    $this->post('/profile/update/imagem', 'ProfileController@imageUpdate')->name( 'image.update' );
    $this->get('/profile', 'ProfileController@index')->name( 'profile' );
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Relatorios', 'prefix' => 'relatorios' ], function(){

    $this->get('/gerenciar', 'RelatoriosController@index')->name( 'relatorios' );
    $this->get('/gerenciar/gerar', 'RelatoriosController@geraRelatorio')->name( 'relatorios.gerar' );


});

$this->get('/', 'Site\SiteController@index')->name( 'home' );

Auth::routes();

