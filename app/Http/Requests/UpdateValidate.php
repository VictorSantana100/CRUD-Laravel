<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateValidate extends FormRequest
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
            'primeiro_nome' => 'required|min:3',
            'sobrenome'=>'required|min:3',
            'num_celular'=>'required|min:11|max:14',
            'email'=>'required|min:5|ends_with:.com',
            'cargo'=>'required|min:5',
            'departamento'=>'required|min:5'
        ];
    }
}
