<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use App\Models\Demande;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertes = Alerte::all();
        return view('admin.alertes.listAlerte', compact('alertes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $id = $request->demande_id;
        $demande = Demande::find($id);
       
        $alerte = new Alerte();
        $alerte->nom = $request->nom;
        $alerte->sujet = $request->sujet;
        $alerte->message = $request->message;
        $alerte->demande_id = $request->demande_id;

        $demande->statut_demande = 'rejeter';
        $demande->save();
        $alerte->save();
        
        $message = "Vous avez invalidé cette demande et alerté le demandeur des raisons";
        return response()->json($message);
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

    public function alertInvalidDemande(Request $request){
        $alertes = [
            'nom' => $request->nom,
            'sujet' => $request->sujet,
            'message' => $request->message,
            'demande_id' => $request->demande_id
        ] ;

        Alerte::create($alertes);
        $demande= Demande::where('id',$alertes['demande_id'])->update(['statut_demande'=> 'rejeter']);
        return back()->with('addedAlerteMessage', 'L\'alerte bien envoyée au demandeur');
    }
    
}
