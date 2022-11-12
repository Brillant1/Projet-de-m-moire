<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'directeur',
        'commune_id'

    ];

    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function candidats(){
        return $this->hasMany(Candidat::class);
    }
}
