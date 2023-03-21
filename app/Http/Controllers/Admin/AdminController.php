<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Demande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $messages = ContactMessage::orderBy('created_at', 'DESC')->get();

        $demandeAttente = Demande::where([
            'statut_demande'=> 'non_valider',
            'statut_payement' => 'payer'
        ])->get();

      

        $demandeValide = Demande::where([
            'statut_demande'=> 'valider',
            'statut_payement' => 'payer'
           
        ])->get();
        $nbr_attestation = Demande::where([
            'statut_demande'=> 'generer',
        ])->get();

        return view('admin.dashboard', compact('messages', 'demandeAttente', 'demandeValide', 'nbr_attestation', 'nbr_message'));
    }
}
