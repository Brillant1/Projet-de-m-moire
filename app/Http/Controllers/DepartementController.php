<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartementRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = $departements = DB::table('departements')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.departement.listDepartement', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departement.addDepartement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementRequest $request)
    {
        
       $existeDepartement = Departement::where('nom', $request->nom)->orWhere('reference', $request->reference)->get();
       if(Departement::where('nom', $request->nom)->exists()){
        return response()->json('returnMessage', 'Ce département existe déja');
       }else if(Departement::where('reference', $request->reference)->exists()) {
        return response()->json('returnMessage', 'Cette référence existe déja pour un département');
       }
       else{

       
       $departement= [
            'nom'=> $request->nom,
            'reference'=>$request->reference,
       ];

       $departement = Departement::create($departement);
       return response()->json(
        [
            'returnMessage'=>' Département ajouté avec succès',
            'departement' => $departement
            
        ]);
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        return view('admin.departement.editDepartement', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departement = Departement::find($id);
       
        $departement->update([
            'nom'=> $request->nom,
            'reference' => $request->reference
        ]);
        

 
        
        return response()->json([
            'updatedMessage'=>'Département modifé avec succès!',
            'departement' => $departement
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departement::findOrFail($id)->delete();
        return back()->with('deletedMessage','Département supprimé avec succès !');
    }
}
