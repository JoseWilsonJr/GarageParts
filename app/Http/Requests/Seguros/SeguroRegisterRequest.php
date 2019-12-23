<?php

namespace App\Http\Requests\Seguros;

use Illuminate\Foundation\Http\FormRequest;

class SeguroRegisterRequest extends FormRequest
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
            'placaDoVeiculo'       => 'required',
            'dataDePagamento'      => 'required',
            'valorDaApolice'       => 'required',
            'validadeDoSeguro'     => 'required',
            'numeroDaApolice'      => 'required',
            'numeroDeEmergencia'   => 'required',
            //'nomeDoPosto'           => 'required',
            'seguradora'           => 'required',
            //'descricao'             => 'required',
        ];
    }
}
