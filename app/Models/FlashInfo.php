<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_debut",
        "date_fin",
        "contenu"
    ];
}
