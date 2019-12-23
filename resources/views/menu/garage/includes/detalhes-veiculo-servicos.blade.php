<div class="box-body">


    <div class="row">
        <div class="col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $servicos->count() }}</h3>

              <p>SERVIÇOS EXECUTADOS</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
          </div>
        </div>

        <div class="col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>R$ {{ number_format($preco, 2, ',','.') }}</h3>

              <p>CUSTO TOTAL</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
          </div>
        </div>

    </div>

    @if(isset($servicos) && $servicos->count() !=0 )
    <div style="overflow-x:auto;">
        <table class="table tg">
            <tbody>
                <tr>
                    <th class="tg-c7os">Data</th>
                    <th class="tg-k4wc">Placa</th>
                    <th class="tg-k4wc">Serviço<br></th>
                    <th class="tg-k4wc">Custo Total<br></th>
                    <th class="tg-k4wc">Agendado</th>
                    <th class="tg-k4wc">Detalhamento</th>
                </tr>
                @forelse($servicos as $key => $servico)
                    <tr>
                        <td class="tg-n62z">{{ $servico->data_servico->format('d/m/Y') }}</td>
                        <td class="tg-n62z">{{ $servico->veiculo->placa }}</td>
                        <td class="tg-n62z">{{ $servico->titulo }}</td>
                        <td class="tg-n62z">R$ {{ number_format($servico->valor_total, 2, ',','.') }}</td>
                        <td class="tg-n62z">@if($servico->agendado == 1) <span class="text-green"><i class="fa fa-check" aria-hidden="true"></i></span>@else  @endif</td>
                        <td class="tg-n62z"><a href="{{ route( 'services.gerenciar.servico', $servico->id ) }}" class="btn btn-default btn-xs btn-block">Detalhar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    @else
        <div class="callout callout-info">
            <h4> Você ainda não possui serviços cadastrados para este veículo. </h4>
        </div>
    @endif
</div>