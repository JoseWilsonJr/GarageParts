<?php

namespace App\Http\Requests\Abastecimento;

use Illuminate\Foundation\Http\FormRequest;

class AbastecimentoRegisterRequest extends FormRequest
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
            'placaDoVeiculo'        => 'required',
            'litragem'              => 'required',
            'custoTotal'            => 'required',
            'precoLitro'            => 'required',
            'hodometro'              => 'required',
            //'tanqueCheio'           => 'required',
            //'nomeDoPosto'           => 'required',
            'dataDoAbastecimento'   => 'required',
            //'descricao'             => 'required',
        ];
    }
}
