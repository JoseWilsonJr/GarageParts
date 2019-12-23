<?php

namespace App\Http\Requests\Garage;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa'             => 'required|alpha_dash|min:8|max:8|unique:veiculos,placa',
            'numedoDoRenavan'   => 'nullable|numeric',
            'tipoVeiculo'       => 'required|alpha',
            'montadora'         => 'required|numeric',
            'modelo'            => 'required|numeric',
            'anoDoModelo'         => 'required|alpha_dash',
            'cor'               => 'required|alpha',
            'hodometro'       => 'required|numeric',
            'valorDeCompra'     => 'required',
            'dataDeAquisicao'   => 'date',
        ];
    }
}
