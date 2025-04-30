<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVeiculoRequest extends FormRequest
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
            'nome' => ['sometimes', 'string'],
            'marca' => ['sometimes', 'string'],
            'ano' => ['sometimes', 'integer', 'min:1900', 'max:2025'],
            'imagem' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp'],
            'categoria_id' => ['sometimes', 'exists:categorias,id'],
            'quantidade' => ['sometimes', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.sometimes' => 'O campo nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',

            'marca.sometimes' => 'O campo marca é obrigatório.',
            'marca.string' => 'A marca deve ser um texto.',

            'ano.sometimes' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O ano deve ser um número inteiro.',
            'ano.min' => 'O ano deve ser no mínimo 1900.',
            'ano.max' => 'O ano não pode ser maior que 2025.',
            
            'imagem.mimes' => 'O campo IMAGEM deve conter apenas jpeg, png, jpg e webp.',
            'imagem.image' => 'O campo IMAGEM deve conter apenas imagens.',

            'categoria_id.sometimes' => 'O campo categoria é obrigatório.',
            'categoria_id.exists' => 'A categoria informada é inválida.',

            'quantidade.sometimes' => 'O campo quantidade é obrigatório.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
        ];
    }
}
