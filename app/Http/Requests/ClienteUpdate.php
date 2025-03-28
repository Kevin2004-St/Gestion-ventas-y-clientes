<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdate extends FormRequest
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
          
            'cedula' => 'required|string|min:10|unique:clientes,cedula,' . $this->route('id') ,
            "nombres" => "required|min:5",
            "apellidos" => "required|min:5",
            "email" => "required|email|unique:clientes,email," . $this->route('id'),
            "celular" => "required|digits:10",
            "direccion" => "nullable|min:5",
            "fecha_nacimiento" => "nullable|date|before:today",
        
        ];
    }

    public function messages()
    {
        return [
            "cedula.min" => "La cedula debe tener mínimo 10 digitos",
            "cedula.unique" => "Esta cédula ya esta registrada",
            "nombres.required" => "El campo de nombre es obligatorio.",
            "nombres.min" => "El nombre debe tener mínimo 4 caracteres.",
            "apellidos.required" => "El campo de apellidos es obligatorio.",
            "apellidos.min" => "El apellido debe tener mínimo 4 caracteres.",
            "email.email" => "El email debe ser válido.",
            "email.unique" => "Este correo ya está registrado.",
            "celular.min" => "El celular debe tener minimo 10 dígitos.",
            "direccion.min" => "La dirección debe tener mínimo 3 caracteres.",
            "fecha_nacimiento.before_or_equal" => "La fecha de nacimiento debe ser anterior a la fecha actual.",
        ];
    }
}

