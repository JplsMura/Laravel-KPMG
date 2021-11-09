<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'          => ['required', 'min:3', 'string'],
            'registration'  => ['required'],
            'email'         => ['required', 'email:rfc,dns'],
            'cpf'           => ['required']
        ];
    }

    public function messages()
    {
        return [

            'required'  => 'Este Campo :attribute é Obrigatório',
            'min'       => 'Este Campo :attribute deve ter no mínimo 3 caracteres',
            'string'    => 'Este Campo :attribute deve ser composto por letras'
        ];
    }
}
