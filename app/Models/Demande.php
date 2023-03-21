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
        'nom_pere',
        'nom_mere',
        'releve',
        'contact_parent',
        'statut_demande',
        'type_examen',
        'jury',
        'etablissement',
        'user_id',
        'kkiapayPayement_id',
        'acte_naissance',
        'cni',
        'code',
        'attestation',
        'npi',
        'note',
        'validated_at',
        'generated_at',
        'rejected_at',
        'updated_by_user_at'
    ];

    public function alertes(){
        return $this->hasMany(Alerte::class);
    }

    public function attestation(){
        return $this->belongsTo(Attestation::class);
    }

}