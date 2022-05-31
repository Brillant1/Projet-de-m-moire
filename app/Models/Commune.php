<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'reference',
        'departement_id'
    ];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function centres(){
        return $this->hasMany(Centre::class);
    }

}
