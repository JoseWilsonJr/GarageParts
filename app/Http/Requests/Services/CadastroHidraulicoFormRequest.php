<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class CadastroHidraulicoFormRequest extends FormRequest
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
            'tipoDeFluido'            => 'required|max:50', 
            'quantidade'     => 'required|numeric', 
            'valorPorUnidade'          => 'required',
            'kmDeAutonomia'          => 'numeric',
            'dataDeValidade'          => 'date',
        ];
    }
}
