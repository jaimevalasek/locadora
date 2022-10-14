<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'cnpj' => 'required|unique:locadoras,cnpj,' . $this->locadora . ',id',
            //'cnpj' => 'required', 'unique:locadoras,cnpj,' . $this->locadora,
            'email' => 'required|email',
            'telefone' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
        ];

    }
}
