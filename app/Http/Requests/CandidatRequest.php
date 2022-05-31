<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatRequest extends FormRequest
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
            'reference'=>'required|string',
            'contact'=>'required|numeric',
            'sexe'=>'required|numeric',
            'serie'=>'required|integer',
            'mention'=>'required|numeric',
            'numero_table'=>'required|string',
            'numero_reference'=>'required|string',
            'annee_obtention'=>'required|string',
            'date_naissance' =>'required|date',
            'nom_pere'=>'required|string',
            'nom_mere'=>'required|string'
        ];
    }
}
