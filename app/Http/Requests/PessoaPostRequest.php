<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PessoaPostRequest extends Request
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
        $rules = [
            'nome' => 'required|min:10',
            'email' => 'email|unique:pessoas',
            'cpf' => 'required|unique:pessoas|min:11',
            'data_nascimento' => 'required',
            'telefones' => 'required',
            'rua' => 'required|min:10',
            'cep' => 'required',
            'bairro' => 'required|min:3',
            'funcoes' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute não pode está vazio',
            'email' => 'O formato do email está errado',
            'email.unique' => 'Este email já foi possui registro',
            'cpf.unique' => 'Este CPF já foi cadastrado',
            'funcoes.required' => 'Escolha pelo menos uma função',
            'telefones.required' => 'Informe pelo menos 1 telefone'
        ];
    }
}
