<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'sexe',
        'serie',
        'mention',
        'numero_table',
        'numero_reference',
        'annee_obtention',
        'date_naissance',
        'nom_pere',
        'nom_mere',
        'photo',
        'centre_id'
    ];

    public function centre(){
        return $this->belongsTo(Centre::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}
