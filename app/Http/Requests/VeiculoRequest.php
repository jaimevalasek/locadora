<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'numero_portas' => 'required|integer',
            'cor' => 'required|string|max:20',
            'fabricante' => 'required|string|max:50',
            'ano_modelo' => 'required|integer',
            'ano_fabricacao' => 'required|integer',
            'placa' => 'required|max:8|unique:veiculos,placa',
            'chassi' => 'required|unique:veiculos,chassi',
            'modelo_id' => 'required|integer'

        ];
    }
}
