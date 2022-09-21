<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlerteUserController extends Controller
{
    public function displayAlereToUser(){

        $alerte =  Alerte::where('user_id',Auth::user()->id)->get();
        return view('front.demande.suivie', compact('alerte'));
    }
}
