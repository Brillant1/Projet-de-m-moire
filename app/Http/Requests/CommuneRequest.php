<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommuneRequest extends FormRequest
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
            'nom'=>'required|string',
            // 'reference'=>'string',
        ];
    }

    public function messages()
    {
        return [
            'nom.required'=>"Nom de la commune obligatoire",
            // 'reference.required'=>'Champs reference obligatoire',
        ];
    }
}
