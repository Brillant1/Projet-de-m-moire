<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Candidat;
use Illuminate\Http\File;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::all();
        return view('admin.candidat.listCandidat', compact('candidats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centres = Centre::all();
        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';',env('TYPE_EXAMEN'));
        $sexes = explode(';',env('SEXE'));
        return view('admin.candidat.addCandidat', compact('centres', 'communes', 'departements','series', 'sexes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        // if($request->hasFile('photo')){
            // $file = $request->file('photo');
            // $extension = $file->getClientOriginalExtension();
            // $filename  = time().'.'.$extension;
            // $file->storeAs('public/admin/img', $filename);

            // $filename = time().'.'.$request->photo->extension();
            // $request->photo->storeAs('admin/images', $filename);
            $filename = Storage::disk('public')->put('avatars/img', $request->photo);
            


            $candidats = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'contact' => $request->contact,
                'sexe' => $request->sexe,
                'serie' => $request->serie,
                'mention' =>$request->mention,
                'numero_table' => $request->numero_table,
                'numero_reference' => $request->numero_reference,
                'annee_obtention' => $request->annee_obtention,
                'date_naissance' =>$request->date_naissance,
                'npi'=> $request->npi,
                'note' => $request->note,
                'nom_pere'  => $request->pere,
                'nom_mere' => $request->mere,
                'photo' => $filename,
                'lieu_naissance' => $request->lieu_naissance,
                'centre_id' => $request->centre_id

            ];

            Candidat::create($candidats);
            return back()->with('addedMessage', 'Candidat ajouté');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(Candidat $candidat)
    {
        return view('admin.candidat.showCandidat', compact('candidat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        $centres = Centre::all();
        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';',env('SERIE'));
        $sexes = explode(';',env('SEXE'));
        return view('admin.candidat.editCandidat', compact('candidat','centres','communes','departements','series','sexes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidat $candidat)
    {
        $filename = " ";

        if( $request->hasFile('photo') ){
            Storage::disk('public')->delete($candidat->photo);
            $filename = Storage::disk('public')->put('avatars/img', $request->photo);
            $candidat->update(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'contact' => $request->contact,
                    'sexe' => $request->sexe,
                    'serie' => $request->serie,
                    'mention' => $request->mention,
                    'mention' =>$request->mention,
                    'numero_table' => $request->numero_table,
                    'numero_reference' => $request->numero_reference,
                    'annee_obtention' => $request->annee_obtention,
                    'date_naissance' =>$request->date_naissance,
                    'nom_pere'  => $request->pere,
                    'nom_mere' => $request->mere,
                    'photo' => $filename
                ]
            );
        }
        else{
            $filename = $candidat->photo;
            $candidat->update(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'contact' => $request->contact,
                    'sexe' => $request->sexe,
                    'serie' => $request->serie,
                    'mention' => $request->mention,
                    'numero_table' => $request->numero_table,
                    'numero_reference' => $request->numero_reference,
                    'annee_obtention' => $request->annee_obtention,
                    'date_naissance' =>$request->date_naissance,
                    'nom_pere'  => $request->pere,
                    'nom_mere' => $request->mere,
                    'photo' => $filename
                ]
            );
        }


            $candidat->update(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'contact' => $request->contact,
                    'sexe' => $request->sexe,
                    'serie' => $request->serie,
                    'mention' =>$request->mention,
                    'numero_table' => $request->numero_table,
                    'numero_reference' => $request->numero_reference,
                    'annee_obtention' => $request->annee_obtention,
                    'date_naissance' =>$request->date_naissance,
                    'nom_pere'  => $request->pere,
                    'nom_mere' => $request->mere,
                    'photo' => $filename
                ]
            );

            $candidats = Candidat::all();
            return redirect()->route('candidats.index',compact('candidats'))->with('updatedMessage','Infos du candidat mis à jour');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidat $candidat)
    {
        $candidat->delete();
        return back()->with('deletedMessage', 'Candidat supprimé' );
    }
}
