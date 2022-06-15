<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centre;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Candidat;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DemandeRequest;
use Illuminate\Support\Facades\Storage;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
    }

    public function demandeUser(){
        

         $demandes = Demande::where('user_id', Auth::user()->id )->get();
         $demandeNonValides = Demande::where(
            [
                'user_id'=> Auth::user()->id,
                'statut_demande' => "non_valider"
            ]
        )->get();  
        $demandeValides = Demande::where(
            [
                'user_id'=> Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->get();      

        return view('front.demande.suivie', compact('demandes','demandeNonValides','demandeValides'));

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
        $series = explode(';',env('SERIE'));
        $type_examens = explode(';',env('TYPE_EXAMEN'));
        $sexes = explode(';',env('SEXE'));
        $mentions = explode(';', ENV('MENTION'));

        return view('front.demande.demande', compact('centres', 'communes', 'departements', 'series', 'sexes', 'mentions', 'type_examens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = Storage::disk('public')->put('photo_candidat_demande', $request->photo);
        $demandes = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'email' => $request->email,
            'contact' => $request->contact,
            'sexe' => $request->sexe,
            'ville_naissance' => $request->ville_naissance,
            'photo' => $filename,
            'numero_table' => $request->numero_table,
            'serie' => $request->serie,
            'mention' =>$request->mention,
            'departement' => $request->departement,
            'commune' => $request->commune,
            'centre' => $request->centre,
            'numero_reference' => $request->numero_reference,
            'annee_obtention' => $request->annee_obtention,
            'nom_pere'  => $request->nom_pere,
            'nom_mere' => $request->nom_mere,
            'contact_parent' => $request->contact_parent,
            'type_examen' =>$request->type_examen,
            'user_id' => Auth()->user()->id
        ];
        
        
        Demande::create($demandes);
        return back()->with('addedMessage', 'Votre demande est soumise avec succès'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        // return view('front.demande.showDemande', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        $centres = Centre::all();
        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';',env('SERIE'));
        $type_examens = explode(';',env('TYPE_EXAMEN'));
        $sexes = explode(';',env('SEXE'));
        $mentions = explode(';', ENV('MENTION'));
        return view('front.demande.editDemande', compact('demande','centres','communes','departements','series','type_examens','sexes','mentions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        if( $request->hasFile('photo') ){
            Storage::disk('public')->delete($demande->photo);
            $filename = Storage::disk('public')->put('avatars/img', $request->photo);
            $demande->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'email' => $request->email,
            'contact' => $request->contact,
            'sexe' => $request->sexe,
            'ville_naissance' => $request->ville_naissance,
            'photo' => $filename,
            'numero_table' => $request->numero_table,
            'serie' => $request->serie,
            'mention' =>$request->mention,
            'departement' => $request->departement,
            'commune' => $request->commune,
            'centre' => $request->centre,
            'numero_reference' => $request->numero_reference,
            'annee_obtention' => $request->annee_obtention,
            'nom_pere'  => $request->nom_pere,
            'nom_mere' => $request->nom_mere,
            'contact_parent' => $request->contact_parent,
            'type_examen' =>$request->type_examen,
            'user_id' => Auth()->user()->id
        ]);
        }
        else{
            $filename = $demande->photo;
            $demande->update(
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

        $demande->update(
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
                'nom_pere'  => $request->nom_pere,
                'nom_mere' => $request->nom_mere,
                'photo' => $filename
            ]
        );


        $demandes = Demande::where('user_id', Auth::user()->id )->get();
        return back()->with('updatedMessage', 'Demande modifiée avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return back()->with('deletedMessage', 'Demande supprimée avec succès');
        
    }
}
