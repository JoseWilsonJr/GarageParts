<?php

namespace App\Http\Controllers\Relatorios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Garage\Veiculo;
use PDF;

class RelatoriosController extends Controller
{
    public function index ()
    {
        return view('menu.relatorios.index');
    }

    public function geraRelatorio()
    {
        $veiculo = auth()->user()->veiculos()->first();

        $pdf = PDF::loadView('menu.relatorios.relatorio-veiculos', compact('veiculo'));

        return $pdf->setPaper('a4')->stream('Relatorio Veiculos');

        // return view('menu.relatorios.relatorio-veiculos', compact('veiculo'));
    }
}
