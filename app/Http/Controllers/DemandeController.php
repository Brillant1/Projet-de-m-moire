<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centre;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Candidat;
use Barryvdh\DomPDF\PDF;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DemandeRequest;
use Illuminate\Support\Facades\Session;
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

    public function tempStore(Request $request){

        //$photo= Storage::disk('public')->put('photo_candidat_demande', $request->photo);
        $photo = $request->photo;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $date_naissance = $request->date_naissance;
        $email = $request->email;
        $contact = $request->contact;
        $sexe = $request->sexe;
        $ville_naissance = $request->ville_naissance;
        $numero_table = $request->numero_table;
        $serie = $request->serie;
        $mention = $request->mention;
        $departement = $request->departement;
        $commune = $request->commune;
        $centre = $request->centre;
        $numero_reference = $request->numero_reference;
        $annee_obtention = $request->annee_obtention;
        $nom_pere = $request->nom_pere;
        $nom_mere = $request->nom_mere;
        $contact_parent = $request->contact_parent;
        $type_examen = $request->type_examen;
        $user_id = Auth::user()->id;

        Session::put('photo', $photo);
        Session::put('nom', $nom);
        Session::put('prenom', $prenom);
        Session::put('date_naissance', $date_naissance);
        Session::put('email', $email);
        Session::put('contact', $contact);
        Session::put('sexe', $sexe);
        Session::put('ville_naissance', $ville_naissance);
        Session::put('numero_table', $numero_table);
        Session::put('serie', $serie);
        Session::put('mention', $mention);
        Session::put('departement', $departement);
        Session::put('commune', $commune);
        Session::put('centre', $centre);
        Session::put('numero_reference', $numero_reference);
        Session::put('nom_pere', $nom_pere);
        Session::put('nom_mere', $nom_mere);
        Session::put('type_examen', $type_examen);
        Session::put('annee_obtention', $annee_obtention);
        Session::put('contact_parent', $contact_parent);
        Session::put('user_id', $user_id);

        return response()->json([
            'data' => '',
            'message' => "Session crée avec succès",
            "success" => 'success',
            'status' => 200
        ], 200);
    }




    public function store(Request $request)
    {
        // $filename = Storage::disk('public')->put('photo_candidat_demande', $request->photo);
        // $demandes = [
        //     'nom' => $request->nom,
        //     'prenom' => $request->prenom,
        //     'date_naissance' => $request->date_naissance,
        //     'email' => $request->email,
        //     'contact' => $request->contact,
        //     'sexe' => $request->sexe,
        //     'ville_naissance' => $request->ville_naissance,
        //     'photo' => $filename,
        //     'numero_table' => $request->numero_table,
        //     'serie' => $request->serie,
        //     'mention' =>$request->mention,
        //     'departement' => $request->departement,
        //     'commune' => $request->commune,
        //     'centre' => $request->centre,
        //     'numero_reference' => $request->numero_reference,
        //     'annee_obtention' => $request->annee_obtention,
        //     'nom_pere'  => $request->nom_pere,
        //     'nom_mere' => $request->nom_mere,
        //     'contact_parent' => $request->contact_parent,
        //     'type_examen' =>$request->type_examen,
        //     'user_id' => Auth()->user()->id
        // ];
        // Demande::create($demandes);
        // return back()->with('addedMessage', 'Votre demande est soumise avec succès');
        
        $photo =Session::get('photo');
        $nom = Session::get('nom');
        $prenom = Session::get('prenom');
        $date_naissance = Session::get('date_naissance');
        $email = Session::get('email');
        $contact = Session::get('contact');
        $sexe = Session::get('sexe');
        $ville_naissance = Session::get('ville_naissance');
        $numero_table = Session::get('numero_table');
        $serie = Session::get('serie');
        $mention = Session::get('mention');
        $departement = Session::get('departement');
        $commune = Session::get('commune');
        $centre = Session::get('centre');
        $numero_reference = Session::get('numero_reference');
        $annee_obtention = Session::get('annee_obtention');
        $nom_pere = Session::get('nom_pere');
        $nom_mere = Session::get('nom_mere');
        $contact_parent = Session::get('contact_parent');
        $type_examen = Session::get('type_examen');
        $user_id = session::get('user_id');

        if($photo != '' && $prenom != '' && $email !='' && $nom != '' && $annee_obtention != '' &&  $centre !='' && $commune != '' && $mention !='' 
        && $departement !='' && $ville_naissance !='' && $nom_mere !='' && $nom_pere !='' && $contact != '' && $contact_parent != '' && $date_naissance != '' 
        && $type_examen !='' && $sexe !='' && $numero_table != '' && $numero_reference !='' && $user_id != '' && $serie != ''){

            Demande::create([
                'photo' => $photo,
                'nom' => $nom,
                'prenom' => $prenom,
                'date_naissance' => $date_naissance,
                'email' => $email,
                'contact' => $contact,
                'sexe' => $sexe,
                'ville_naissance' => $ville_naissance,
                'numero_table' => $numero_table,
                'serie' => $serie,
                'mention' => $mention,
                'numero_reference' => $numero_reference,
                'annee_obtention' => $annee_obtention,
                'centre' => $centre,
                'nom_pere' => $nom_pere,
                'nom_mere' => $nom_mere,
                'contact_parent' => $contact_parent,
                'type_examen' => $type_examen,
                'user_id' => $user_id,

            ]);

            return back()->with('addedMessage', 'Votre demande est soumise avec succès');

        }

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
        return back()->with([
            'updatedMessage'=> 'Demande modifiée avec succès',
            'demande'=> $demandes
        ]);
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

    public function pdf(){

        $recapitulatif = Demande::where(
            [
                'user_id'=> Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->first();

        $pdf = App::make('dompdf.wrapper');

         $pdf ->loadView('front.recapitulatif', compact('recapitulatif'));
         return $pdf->stream();
    }
}
