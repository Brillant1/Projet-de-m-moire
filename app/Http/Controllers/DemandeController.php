<?php

namespace App\Http\Controllers;

use App\Models\User;
use Kkiapay\Kkiapay;
use App\Models\Alerte;
use App\Models\Centre;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Candidat;
use Barryvdh\DomPDF\PDF;
use App\Mail\DemandeMail;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\DemandeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
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
        return view('front.demande.beforeDemande');
    }

    public function beforeDemande(Request $request)
    {  

        $candidat = Candidat::where([
            'numero_table'=> $request->numero_table,
            'annee_obtention' => $request->annee,
            'nom' => $request->nom,
            'prenom' => $request->prenom
        ])->get();

        
    
        if(!is_null($candidat) && sizeof($candidat)==1 ){
      
            //return redirect()->route('demandes.create')->with(['candidat'=> $candidat]);
            //return view('front.demande.demande', compact('candidat'));
        $centres = Centre::all();
        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';', env('SERIE'));
        $type_examens = explode(';', env('TYPE_EXAMEN'));
        $sexes = explode(';', env('SEXE'));
        $mentions = explode(';', ENV('MENTION'));

        return view('front.demande.demande', compact('centres', 'communes', 'departements', 'series', 'sexes', 'mentions', 'type_examens', 'candidat'));
        }
        else {
            return back()->with('errorMessage', 'Il n\'existe Aucun candidat avec ces informations, veillez fournir les bonnes informations');
        }
    }


    public function demandeUser()
    {

        //$demandes = Demande::where(['user_id' => Auth::user()->id])->orderBy('created_at', 'DESC')->get();

        $demandeNonValides = Demande::orderBy('created_at','DESC')->where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "non_valider",
                'statut_payement' => "payer"
            ]
        )->get();

        $demandeValides = Demande::orderBy('updated_at','DESC')->where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->get();

        $demandeNonPayers = Demande::orderBy('updated_at','DESC')->where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande'=> "non_valider",
                'statut_payement' => "non_payer"
            ]
        )->get();
        $demandeGenerers = Demande::orderBy('updated_at','DESC')->where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande'=> "generer",
                'statut_payement' => "payer"
            ]
        )->get();



        return view('front.demande.suivie', compact( 'demandeNonValides', 'demandeValides', 'demandeNonPayers','demandeGenerers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $filename ='';
        $releve ='';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->numero_table.'_'. time() . '_' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/photo_candidat_demande', $filename);
        }

        if ($request->hasFile('releve')) {
            $file = $request->file('releve');
            $extension = $file->getClientOriginalExtension();
            $releve = $request->numero_table.'_'.time() . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/releve_candidat_demande', $filename);
        }
        
        $releve = Storage::disk('public')->put('releve_candidat_demande', $request->releve);
        $cni  = Storage::disk('public')->put('releve_candidat_demande', $request->cni);
        $acte_naissance  = Storage::disk('public')->put('releve_candidat_demande', $request->acte_naissance);

        

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
            'mention' => $request->mention,
            'departement' => $request->departement,
            'commune' => $request->commune,
            'centre' => $request->centre,
            'numero_reference' => $request->numero_reference,
            'annee_obtention' => $request->annee_obtention,
            'nom_pere'  => $request->nom_pere,
            'nom_mere' => $request->nom_mere,
            'contact_parent' => $request->contact_parent,
            'etablissement' => $request->etablissement,
            'jury' => $request->jury,
            'type_examen' => 'BEPC',
            'releve' => $releve,
            'cni' => $cni,
            'acte_naissance' => $acte_naissance,
            'user_id' => Auth()->user()->id
        ];
      


        $id = Demande::create($demandes)->id;
        $email = $request->email;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $contact = $request->contact;

        if(!is_null($id)){

            $demandeInfos = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'email' => $request->email,
                'contact' => $request->contact,
                'numero_table' => $request->numero_table,
                'id' => $id
            ];
            Mail::to('esaietchagnonsi@gmail.com')->send(new DemandeMail($demandeInfos));
        }

      
        $callbackRoute = route("changeToPayState", ["demande" => $id]);
        $message = " Procéder maintenant au paiement en cliquant sur le bouton PAYER MAINTENANT. Sans cela, votre demande ne fera objet d'aucun traitement. Merci";

        
        return view('front.paiement', compact('demandeInfos','message','callbackRoute'));

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
        $series = explode(';', env('SERIE'));
        $type_examens = explode(';', env('TYPE_EXAMEN'));
        $sexes = explode(';', env('SEXE'));
        $mentions = explode(';', ENV('MENTION'));
        return view('front.demande.editDemande', compact('demande', 'centres', 'communes', 'departements', 'series', 'type_examens', 'sexes', 'mentions'));
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

        $filename = '';
        $cni = '';
        $releve= '';
        $acte_naissance ='';

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($demande->photo);
            $filename = Storage::disk('public')->put('avatars/img', $request->photo);
        }
        else{
            $filename = $demande->photo;
        }
        if ($request->hasFile('cni')) {
            Storage::disk('public')->delete($demande->cni);
            $cni = Storage::disk('public')->put('releve_candidat_demande', $request->cni);
        }
        else{
            $cni = $demande->cni;
        }
        if ($request->hasFile('releve')) {
            Storage::disk('public')->delete($demande->releve);
            $releve = Storage::disk('public')->put('releve_candidat_demande', $request->releve);
        }
        else{
            $releve = $demande->releve;
        }
        if ($request->hasFile('acte_naissance')) {
            Storage::disk('public')->delete($demande->acte_naissance);
            $acte_naissance = Storage::disk('public')->put('releve_candidat_demande', $request->acte_naissance);
        }else{
            $acte_naissance = $demande->acte_naissance;
        }

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
            'mention' => $request->mention,
            'departement' => $request->departement,
            'commune' => $request->commune,
            'centre' => $request->centre,
            'numero_reference' => $request->numero_reference,
            'annee_obtention' => $request->annee_obtention,
            'nom_pere'  => $request->nom_pere,
            'nom_mere' => $request->nom_mere,
            'contact_parent' => $request->contact_parent,
            'etablissement' => $request->etablissement,
            'jury' => $request->jury,
            'type_examen' => 'BEPC',
            'releve' => $releve,
            'cni' => $cni,
            'acte_naissance' => $acte_naissance,
            'user_id' => Auth()->user()->id
        ]);
       
        $demandes = Demande::where('user_id', Auth::user()->id)->get();
        return back()->with([
            'updatedMessage' => 'Demande modifiée avec succès',
            'demande' => $demandes
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

    public function pdf()
    {
        $recapitulatif = Demande::where([
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ])->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('front.recapitulatif', compact('recapitulatif'));
        return $pdf->stream();
    }

    public function changeToPayState(Request $request, $id)
    {

        $transaction_id = $request->query('transaction_id');
        $kkiapay = new Kkiapay(
            "0b7354b0ed5a11ec848227abfc492dc7",
            "tpk_0b7354b2ed5a11ec848227abfc492dc7",
            "tsk_0b737bc0ed5a11ec848227abfc492dc7",
            $sandbox = true
        );

        $demande = Demande::findOrFail($id);

        $demandes = Demande::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        $demandeNonValides = Demande::where(['user_id' => Auth::user()->id,
                'statut_demande' => "non_valider"])->get();
        
                
        $demandeValides = Demande::where([
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ] )->get();
       


        if ($kkiapay->verifyTransaction($transaction_id)->status == "SUCCESS") {
            $demande->statut_payement = "payer";
            $demande->kkiapayPayement_id =  $transaction_id;
            
            $demande->save();
            // Session::flash('paymentSuccessMessage', 'Transaction réussie,
            //         restez en écoute des nouvelles concernant votre demande');
            return redirect()->route('demandeUser', ['demandes' => $demandes, 'demandeNonValides' => $demandeNonValides, 'demandeValides' => $demandeValides])->with('paymentSuccessMessage', 'Transaction réussie et demande prise en compte,
                    restez à écoute des nouvelles concernant votre demande');
        } else {
            return back()->with('paymentFailMessage', 'La transaction a échoué');
        }
    }

    public function demandeRecente()
    {
        $demandes = Demande::where(['statut_payement' => 'payer', 'statut_demande' => 'non_valider'])->orderBy('created_at', 'DESC')->get();
        return view('admin.demande.demandeRecente', compact('demandes'));
    }

    public function demandeApprouvee()
    {
        $demandes = Demande::where('statut_demande', 'valider')->orderBy('created_at', 'DESC')->get();
        return view('admin.demande.demandeApprouvee', compact('demandes'));
    }

    public function demandeGeneree()
    {
        $demandes = Demande::where('statut_demande', 'generer')->orderBy('created_at', 'DESC')->get();
        return view('admin.demande.demandeGenerer', compact('demandes'));
    }

    public function demandeNonPayee()
    {
        $demandes = Demande::where('statut_payement', 'non_payer')->orderBy('created_at', 'DESC')->get();
        return view('admin.demande.demandeNonPayee', compact('demandes'));
    }

    public function communesOfDepartement(Request $request){
        $communesOfDepartement = Commune::where('departement_id', $request->id)->get();
        return response()->json($communesOfDepartement);
    }
    public function centreOfCommune(Request $request){
        $centreOfCommune = Centre::where('commune_id', $request->id)->get();
        return response()->json($centreOfCommune);
    }

    public function download_releve($id){
        $demande = Demande::find($id);
        $releve_path = 'storage/'.$demande->releve;
        return response()->download($releve_path);
    }
    public function download_acte($id){
        $demande = Demande::find($id);

        $acte_path = 'storage/'.$demande->acte_naissance;
        return response()->download($acte_path);
    }
    public function download_cni($id){
        $demande = Demande::find($id);
        $cni_path = 'storage/'.$demande->cni;
        return response()->download($cni_path);
    }
    // public function download_attestation($id){
    //     $demande = Demande::find($id);
    //     $cni_path = 'storage/'.$demande->cni;
    //     return response()->download($cni_path);
    // }
    
}
