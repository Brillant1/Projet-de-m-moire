<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use App\Models\Candidat;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class GererDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function listeDemande()
    {
        $demandes = Demande::all();
        return view('admin.demande.listDemande', compact('demandes'));
    }

    public function singleDemande(Demande $demande){

        $candidatAdmis = Candidat::where('numero_table', $demande->numero_table)->get();
        
        return view('admin.demande.showDemande', 
            [
                'demande'=> $demande,
                'candidatAdmis' => $candidatAdmis
            ]
        );

    }

    public function changeState(Demande $demande){

        if($demande->statut_demande == "non_valider"){
            $demande->statut_demande = "valider";
            $demande->save();
            return back()->with('changeStateMessage', "La demande a été approuvée avec succès");
        }
        else{
             return back()->with('alreadyChangeStateMessage',"Demande déjà approuvée");
        }
    }

    public function changeStateTogenerer(Demande $demande){

        if($demande->statut_demande == "valider"){

            $pdf = App::make('dompdf.wrapper');
            $pdf->PDF::loadView('emails.attestation', compact('demande'));

            Mail::send('emails.attestation', $demande, function($message)use($demande, $pdf) {

                $message->to("esaietchagnonsi@gmail.com", $demande->nom)
    
                        ->subject($demande->prenom)
    
                        ->attachData($pdf->output(), "attestation_BEPC.pdf");
    
            });

            $demande->statut_demande = "generer";
            $demande->save();


            return back()->with('changeStateTogenerer', "Vous avez généré l'attestation en l'avez envoyé au mail du demandeur");

        }
        else if($demande->statut_demande == "generer") {
            return back()->with('alredyGenerateMessage', "Vous avez déjà généré cette attestation");
        }
        else{
            return back()->with('invalidDemandeMessage', "Cette demande n'a pas encore été validée");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
