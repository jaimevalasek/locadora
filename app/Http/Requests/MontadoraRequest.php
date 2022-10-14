<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MontadoraRequest extends FormRequest
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
            'nome' => 'required|unique:montadoras,nome,' . $this->montadora . ',id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da montadora é obrigatório.',
            'nome.unique' => 'O nome dessa montadora já está cadastrado.',
        ];
    }
}
