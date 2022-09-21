<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeRequest extends FormRequest
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
            'prenom'=>'required|string',
            'reference'=>'required|string',
            'contact'=>'required|numeric|max:8|min:8',
            'sexe'=>'required|numeric',
            'serie'=>'required|integer',
            'email' => 'required|email',
            'contact' => 'required|numeric',
            'ville_naissance' =>'required|string',
            'mention'=>'required|numeric',
            'numero_table'=>'required|string',
            'numero_reference'=>'required|string',
            'annee_obtention'=>'required|string',
            'date_naissance' =>'required|date',
            'nom_pere'=>'required|string',
            'nom_mere'=>'required|string',
            'contact_parent' => 'required|numeric'
        ];
    }

    public function messages()
    {
       return [
          
        'email.required' => "Ce champs est obligatoire",
        'email.email' => "Format d'email non valide",
        'numero_table.string' =>'format de numero non valide',
        'nom.required' => "champs obligatoire",
        'prenom.required' => "Ce champs est obligatoire *",
        'reference.required'  => "Ce champs est obligatoire *",
        'contact.required'  => "Ce champs est obligatoire *",
        'ville_naissance.required'  => "Ce champs est obligatoire *",
        'mention.required'  => "Ce champs est obligatoire *",
        'numero_table.required'  => "Ce champs est obligatoire *",
        'numero_reference.required'  => "Ce champs est obligatoire *",
        'annee_obtention.required'  => "Ce champs est obligatoire *",
        'date_naissance.required'  => "Ce champs est obligatoire *",
        'nom_pere.required'  => "Ce champs est obligatoire *",
        'nom_mere.required'  => "Ce champs est obligatoire *",
        'nom_pere.string' => "Format de nom non valide",
        'contact_parent.required' => "le contact est obligatoire" ,
        'prenom_pere.string' => "Format de prénom non valide",
        'valide.required' => "Vous devez cocher ce champs pour continuer"

       ];

    }
}
