<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\CommuneRequest;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::with('departement')->orderBy('departement_id')->get();
        return view('admin.commune.listCommune', compact('communes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('admin.commune.addCommune', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommuneRequest $request)
    {
        $communes= [
            'nom'=> $request->nom,
            'reference'=> $request->reference,
            'departement_id'=> $request->departement_id
       ];

       Commune::create($communes);
       return back()->with('addedMessage',' Commune ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        $departements = Departement::all();
        return view('admin.commune.editCommune', compact('commune','departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(CommuneRequest $request, Commune $commune)
    {

        $commune->update($request->all());
        $communes = Commune::all();
        return view('admin.commune.listCommune', compact('communes'))->with('updatedMessage', 'Commune modifée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commune::findOrFail($id)->delete();
        return back()->with('deletedMessage','Commune supprimée !');
    }
}
