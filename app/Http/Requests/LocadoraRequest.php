<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocadoraRequest extends FormRequest
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
            'nome_fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required|unique:locadoras,cnpj',
            'email' => 'required|email',
            'telefone' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ];
    }
}
