<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\CentreRequest;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centres= Centre::with('commune')->get();
        return view('admin.centre.listCentre', compact('centres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Commune::with('departement')->get();
        return view('admin.centre.addCentre', compact('communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CentreRequest $request)
    {
        $centres= [
            'nom'=> $request->nom,
            'reference'=>$request->reference,
            'annee'=>$request->annee,
            'directeur'=>$request->directeur,
            'nombre_candidat'=>$request->nombre_candidat,
            'nombre_candidat_admis'=>$request->nombre_candidat_admis,
            'commune_id'=> $request->commune_id
       ];
       Centre::create($centres);
       return back()->with('addedMessage',' Centre ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(Centre $centre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre)
    {
        $communes = Commune::all();
        return view('admin.centre.editCentre', compact('centre','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(CentreRequest $request, Centre $centre)
    {
        $centre->update([
            'nom'=> $request->nom,
            'reference'=>$request->reference,
            'annee'=>$request->annee,
            'directeur'=>$request->directeur,
            'nombre_candidat'=>$request->nombre_candidat,
            'nombre_candidat_admis'=>$request->nombre_candidat_admis,
        ]);
        $centres = Centre::all();
        return view('admin.centre.listCentre', compact('centres'))->with('updatedMessage',' Centre mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centre $centre)
    {
        //
    }
}
