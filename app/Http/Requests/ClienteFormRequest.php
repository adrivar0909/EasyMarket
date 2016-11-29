<?php

namespace easymarket\Http\Requests;

use easymarket\Http\Requests\Request;

class ClienteFormRequest extends Request
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
            'nombre'=>'required|max:100',
            'correo'=>'required|max:100',
            'contrasena'=>'required|max:255',
            'direccion'=>'required|max:255',
            'telefono'=>'required|max:20',         
        ];
    }
}
