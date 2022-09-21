<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
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
        $alerte = new Alerte();
        $alerte->nom = $request->nom;
        $alerte->sujet = $request->sujet;
        $alerte->message = $request->message;
        $alerte->save();
        return back()->with('addedAlerteMessage', "L'alerte a bien été envoyée");

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
        return back()->with('addedAlerteMessage', 'L\'alerte bien envoyée au demandeur');
    }
}
