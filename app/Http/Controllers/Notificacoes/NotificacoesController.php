<?php

namespace App\Http\Controllers\Notificacoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notificacoes\Pendencia;
use App\Models\Garage\Veiculo;
use App\Models\Service\Servico;
use App\Models\Service\Manutencao;
use App\Models\Seguros\Seguro;

class NotificacoesController extends Controller
{
    public function index ()
    {
        $veiculos = auth()->user()->veiculos()->with('pendencias')->get();
        $pendencias = auth()->user()->pendencias()->with(['veiculo', 'seguro', 'manutencao', 'servico'])->get();
        $agendamentos = $pendencias->where('categoria', 'servicos_agendados');
        $seguros = $pendencias->where('categoria', 'renovar_seguro');
        $manut_mecanicas = $pendencias->where('categoria', 'manutencao_mecanica');
        $manutencao_hidraulicas = $pendencias->where('categoria', 'manutencao_hidraulica');
        $manut_pneus = $pendencias->where('categoria', 'manutencao_pneus');
        return view('menu.notificacoes.index', compact('veiculos', 'seguros', 'agendamentos', 'manut_mecanicas', 'manutencao_hidraulicas', 'manut_pneus'));
    }

    /**********************************************************
     * Exibe Lista de Agendamentos
    ***********************************************************/
    public function agendamentos($veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();
        $pendencias = auth()->user()->pendencias()->with(['veiculo', 'seguro', 'manutencao', 'servico'])->get();
        $agendamentos = $pendencias->where('categoria', 'servicos_agendados')->where('veiculo_id', $veiculo_id);
        return view('menu.notificacoes.pendencias-agendamentos', compact('veiculo', 'agendamentos'));
    }

    public function mecanicas($veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();
        $pendencias = auth()->user()->pendencias()->with(['veiculo', 'seguro', 'manutencao', 'servico'])->get();
        $manut_mecanicas = $pendencias->where('categoria', 'manutencao_mecanica')->where('veiculo_id', $veiculo_id);
        return view('menu.notificacoes.pendencias-mecanicas', compact('veiculo', 'manut_mecanicas'));
    }
    
    public function hidraulicas($veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();
        $pendencias = auth()->user()->pendencias()->with(['veiculo', 'seguro', 'manutencao', 'servico'])->get();
        $manut_hidraulicas = $pendencias->where('categoria', 'manutencao_hidraulica')->where('veiculo_id', $veiculo_id);
        return view('menu.notificacoes.pendencias-hidraulicas', compact('veiculo', 'manut_hidraulicas'));
    }

    public function pneus($veiculo_id)
    {
        $veiculo = auth()->user()->veiculos()->where('id', $veiculo_id)->first();
        $pendencias = auth()->user()->pendencias()->with(['veiculo', 'seguro', 'manutencao', 'servico'])->get();
        $manut_pneus = $pendencias->where('categoria', 'manutencao_pneus')->where('veiculo_id', $veiculo_id);
        return view('menu.notificacoes.pendencias-pneus', compact('veiculo', 'manut_pneus'));
    }

    /**********************************************************
     * Remove o Agendamento das Notificações
    ***********************************************************/
    public function apagarAgendamento(Pendencia $pendencia, $pendencia_id)
    {
        $response = $pendencia->deletarPendencia($pendencia_id);
    
        if ($response['success']){
        return redirect()
            ->back()
            ->with('success', $response['message']);
        }else {
            return redirect()
            ->back()
            ->with('error', $response['message']);
        }
    }
    
 
}
