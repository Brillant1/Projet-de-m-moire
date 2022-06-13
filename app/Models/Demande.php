<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'prenom',
        'date_naissance',
        'email',
        'contact',
        'sexe',
        'ville_naissance',
        'photo',
        'numero_table',
        'serie',
        'mention',
        'departement',
        'commune',
        'centre',
        'annee_obtention',
        'numero_reference',
        'nom_pere',
        'nom_mere',
        'contact_parent',
        'statut_demande',
        'type_examen',
        'user_id'
    ];

    public function alertes(){
        return $this->hasMany(Alerte::class);
    }

}