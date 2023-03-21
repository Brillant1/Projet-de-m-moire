<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentreRequest extends FormRequest
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
            // 'reference'=>'required|string',
            'directeur'=>'required|string',
            // 'nombre_candidat'=>'required|numeric',
            // 'annee'=>'required|integer',
            // 'nombre_candidat_admis'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'nom.required'=>"Nom de la commune obligatoire",
            'directeur.required'=>'Nom du directeur est obligatoire',
            // 'nombre_candidat.required'=>'Nombre de candidats obligatoire',
            // 'nombre_candidat_admis.required'=>'Nombre de candidat admis obligatoire',
            // 'annee.required' => 'le champs annee est requis'
        ];
    }
}
