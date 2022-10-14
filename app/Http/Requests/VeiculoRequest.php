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
            'placa' => 'required|max:8|unique:veiculos,placa,' . $this->veiculo . ',id',
            'chassi' => 'required|unique:veiculos,chassi,' . $this->veiculo. ',id',
            'modelo_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'numero_portas.required' => 'Informe o número de portas',
            'cor.required' => 'Informe a cor do veículo',
            'fabricante.required' => 'Informe o fabricante do veículo',
            'ano_modelo.required' => 'Informe o ano do modelo do veículo',
            'ano_fabricacao.required' => 'Informe o ano de fabricação do veículo',
            'placa.required' => 'Informe a placa do veículo',
            'chassi.required' => 'Informe o chassi do veículo',
            'modelo_id.required' => 'Selecione o modelo do veículo',
            'modelo_id.integer' => 'Selecione o modelo do veículo',
            'placa.unique' => 'Já tem um carro cadastrado com esta placa',
            'chassi.unique' => 'Já tem um carro cadastrado com este chassi',
        ];
    }
}
