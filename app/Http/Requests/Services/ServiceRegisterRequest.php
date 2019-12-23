<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRegisterRequest extends FormRequest
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
            'dataDoServico'         => 'required|date',
            'tituloDoServico'       => 'required|max:50',
            'descricaoDoServico'    => 'max:500',
            'hodometro'             => 'required|numeric|digits_between:1,10',
        ];
    }
}
