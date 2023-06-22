<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name 
 * @property string $last_name
 * @property string $email 
 * @property string $password 
 * @property string $phone 
 * @property string $position 
 * @property string $role
 */
class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

     /**
      * validaciones del body que va a llegar a la funcion.
      */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "last_name" => "required|string",
            'email' =>'required|string|unique:USUARIO,correo_usuario',
            'password' => 'required|string',
            'phone'=>'required|numeric|digits:10|unique:USUARIO,telefono_usuario',
            'position' => 'required|numeric|exists:CARGO,ID_Cargo',
            'role' => 'required|numeric|exists:ROL,ID_Rol'
        ];
    }


    /**
     * son mensajes que van a parecer en las peticiones si en algunas 
     * de las validaciones falla.
     */
    public function messages(): array
    {
        return [
            "name.required" => "El nombre es requerido",
            "name.string" => "El nombre debe ser una cadena de valores",
            "last_name.required" => "El apellido es requerido",
            "last_name.string" => "El apellido debe ser una cadena de valores",
            'email.required' =>'El email es requerido',
            'email.string' =>'El email debe ser una cadena de valores',
            'email.unique' =>'ya hay un usuario con el mismo correo electronico',
            'password.required' => 'la contrasena es requerida',
            'password.string' => 'la contrasena debe ser una cadena de valores',
            'phone.required' =>'El telefono es requerido',
            'phone.string' =>'El telefono debe ser una cadena de valores',
            'phone.unique' =>'ya hay un usuario con el mismo telefono',
            'position.required' => 'el cargo es requerido',
            'position.numeric' => 'el cargo debe ser un numero',
            'position.exists' => 'el cargo no existe en la base de datos',
            'role.required' => 'el rol es requerido',
            'role.numeric' => 'el rol debe ser un numero',
            'role.exists' => 'el rol no existe en la base de datos'
        ];
    }
}
