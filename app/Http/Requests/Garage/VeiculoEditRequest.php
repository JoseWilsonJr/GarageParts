<?php

namespace App\Http\Requests\Garage;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoEditRequest extends FormRequest
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
            'numedoDoRenavan'   => 'nullable|numeric',
            'cor'               => 'required|alpha',
            'valorDeCompra'     => 'required',
            'dataDaTransferencia'   => 'date',
        ];
    }
}
