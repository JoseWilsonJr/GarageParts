<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class CadastroMecanicoFormRequest extends FormRequest
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

            'nomeDaPeca'            => 'required|max:30', 
            'quantidadeDePecas'     => 'required|numeric', 
            'valorPorPeca'          => 'required',
            // 'validadeKM'            => 'numeric',
            // 'dataValidade'          => 'date',
        ];
    }
}
