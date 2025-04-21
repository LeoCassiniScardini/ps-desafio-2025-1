<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'veiculo_id' => 'required|exists:veiculos,id',
            'categoria' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'veiculo_id.required' => 'O campo veículo é obrigatório.',
            'veiculo_id.exists' => 'O veículo selecionado é inválido.',
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.string' => 'O campo categoria deve conter texto.',
        ];
    }
}
