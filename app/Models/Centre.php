<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'directeur',
        'reference',
        'annee',
        'nombre_candidat',
        'nombre_candidat_admis',
        'annee',
        'commune_id'

    ];

    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function candidats(){
        return $this->hasMany(Candidat::class);
    }
}
