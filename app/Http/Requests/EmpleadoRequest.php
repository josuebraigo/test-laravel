<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre' => 'regex:/[^0-9]/',
            'apellido_paterno' => 'regex:/[^0-9]/',
            'apellido_materno' => 'regex:/[^0-9]/',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'nombre.regex' => 'El nombre no debe incluír números',
            'apellido_paterno.regex' => 'El apellido paterno no debe incluír números',
            'apellido_materno.regex' => 'El apellido materno no debe incluír números',
            'email' => 'El correo debe tener un formato de e-mail, debe contener un @',
        ];
    }
}
