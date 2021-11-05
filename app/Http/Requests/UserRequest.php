<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

            'name'          => 'required|string|min:3',
            'registration'  => 'required',
            'email'         => 'required|email',
            'cpf'           => 'required'

        ];
    }

    public function messages()
    {
        return [

            'required' => 'Este Campo :attribute é Obrigatório',
            'min' => 'Campo deve ter no mínimo 10 caracteres',
            'string' => 'Esse campo deve ser composto por letras'
        ];
    }
}
