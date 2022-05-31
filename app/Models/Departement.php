<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'reference',
    ];

    public function communes(){
        return $this->hasMany(Commune::class);
     }
    public function centres(){
        return $this->hasMany(Centre::class);
    }
}
