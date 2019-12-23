<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class EditServiceRequest extends FormRequest
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
            'tituloDoServico'       => 'required|max:50',
            'descricao'             => 'max:500',
            'hodometro'           => 'required|numeric|digits_between:1,10',
            'estabelecimento'       => 'max: 50',
        ];
    }
}
