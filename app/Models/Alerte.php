<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'sujet',
        'message',
        'demande_id'
    ];
    
    public function demande(){
        return $this->belongsTo(Demande::class);
    }
}
