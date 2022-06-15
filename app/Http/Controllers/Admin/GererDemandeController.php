<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidat;

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
        }
        else{
             return back()->withText("Demande déjà approuvée");
        }
        return back()->with('changeStateMessage', "La demande a été approuvée avec succès");

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
