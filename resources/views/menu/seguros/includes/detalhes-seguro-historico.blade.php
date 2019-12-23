        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="overflow-x:auto;">
                            <table class="tg table">
                                <tbody>
                                    <tr>
                                         <th class="tg-k4wc">Data Validade</th>
                                         <th class="tg-c7os">Número da Apolice</th>
                                         <th class="tg-k4wc">Seguradora</th>
                                         <th class="tg-k4wc">Custo Total</th>
                                         <th class="tg-k4wc">Data Pagamento</th>
                                         <th class="tg-k4wc">Detalhes</th>
                                         <th class="tg-k4wc">Status</th>
                                    </tr>
                            <form action="{{ route('abastecimento.gerenciar.historico.delete', $veiculo_id)}}">
                                    @forelse($inativos as $key => $seguro)
                                        <tr>
                                            <td class="tg-n62z">{{ $seguro->data_validade->format('d/m/Y') }}</td>
                                            <td class="tg-n62z">{{ $seguro->num_apolice }}</td>
                                            <td class="tg-n62z">{{ $seguro->seguradora }}</td>
                                            <td class="tg-n62z">R$ {{ number_format($seguro->valor_apolice, 2, ',','.') }}</td>
                                            <td class="tg-n62z">{{ $seguro->data_pagamento->format('d/m/Y') }}</td>
                                            <td class="tg-n62z">{{ $seguro->detalhes }}</td>
                                            @if(isset($seguro->status))<td class="tg-n62z">{{ $seguro->status }}</td>@else<td class="tg-n62z"> </td> @endif
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>