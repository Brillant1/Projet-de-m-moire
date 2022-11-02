<?php

namespace App\Http\Controllers;

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
}
