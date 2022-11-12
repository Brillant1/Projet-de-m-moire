<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Commune;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges= College::with('commune')->get();
        return view('admin.college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Commune::with('departement')->get();
        return view('admin.college.ajout', compact('communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colleges = [
            'nom'=> $request->nom,
            'directeur' => $request->directeur,
            'commune_id'=> $request->commune_id
        ];

        College::create($colleges);
        return back()->with('addedMessage',' Collège ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        $communes = Commune::all();
        return view('admin.college.edit', compact('college','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, College $college)
    {
        $college->update([
            'nom'=> $request->nom,
            'commune' => $request->commune_id,
            'directeur'=>$request->directeur,
            'nombre_candidat'=>$request->nombre_candidat,
            'nombre_candidat_admis'=>$request->nombre_candidat_admis,
        ]);
        $colleges = College::all();
        return view('admin.centre.listCentre', compact('colleges'))->with('updatedMessage',' Centre mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        $college->delete();
        return back()->with('deletedMessage', 'college supprimé avec succès');
    }
}
