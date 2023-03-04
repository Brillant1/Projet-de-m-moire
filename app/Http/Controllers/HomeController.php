<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Examen;
use App\Models\FlashInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    
    public function index(){
        $examen = Examen::where('status','active')->first(); 
        return view('front.accueil', compact('examen'));
    }

    public function redirectIndex(){
        return redirect()->route('accueil');
    }
    public function download_attestation($id){
        $demande = Demande::findOrFail($id);
        $path_attestation = substr($demande->attestation,1);
        if(!is_null($path_attestation)){
            return response()->download($path_attestation);
        }
    }
}
