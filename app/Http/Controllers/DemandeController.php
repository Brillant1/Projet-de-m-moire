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
    }

    public function demandeUser()
    {

        $demandes = Demande::where(['user_id' => Auth::user()->id])->orderBy('created_at', 'DESC')->get();

        $demandeNonValides = Demande::where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "non_valider"
            ]
        )->get();
        $demandeValides = Demande::where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->get();



        return view('front.demande.suivie', compact('demandes', 'demandeNonValides', 'demandeValides'));
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
        $series = explode(';', env('SERIE'));
        $type_examens = explode(';', env('TYPE_EXAMEN'));
        $sexes = explode(';', env('SEXE'));
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
            'user_id' => Auth()->user()->id
        ];


        $id = Demande::create($demandes)->id;
        $email = $request->email;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $contact = $request->contact;

        if($id){

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
        $message = " Jusqu'à ce que vous ne payiez, cette demande reste non valide et ne sera pas traité. Veillez payer pour faire valider votre demande";

        
        return view('front.paiement', compact('message', 'email', 'nom', 'prenom', 'contact', 'callbackRoute'));


        // return redirect()->route('validationDemande')->with([
        //     'id'=>$id,
        //     'email'=>$email,
        //     'nom'=>$nom,
        //     'prenom'=>$contact,
        //     'callbackRoute'=>$callbackRoute,
        //     'contact'=>$contact,
        //     'message'=>$message
        // ]);


        // $photo =Session::get('photo');


        // $nom = Session::get('nom');
        // $prenom = Session::get('prenom');
        // $date_naissance = Session::get('date_naissance');
        // $email = Session::get('email');
        // $contact = Session::get('contact');

        // $sexe = Session::get('sexe');
        // $ville_naissance = Session::get('ville_naissance');
        // $numero_table = Session::get('numero_table');
        // $serie = Session::get('serie');
        // $mention = Session::get('mention');

        // $departement = Session::get('departement');
        // $commune = Session::get('commune');
        // $centre = Session::get('centre');
        // $numero_reference = Session::get('numero_reference');
        // $annee_obtention = Session::get('annee_obtention');
        // $nom_pere = Session::get('nom_pere');
        // $nom_mere = Session::get('nom_mere');
        // $contact_parent = Session::get('contact_parent');
        // $type_examen = Session::get('type_examen');
        // $user_id = session::get('user_id');

        // if($photo != '' && $prenom != '' && $email !='' && $nom != '' && $annee_obtention != '' &&  $centre !='' && $commune != '' && $mention !='' 
        // && $departement !='' && $ville_naissance !='' && $nom_mere !='' && $nom_pere !='' && $contact != '' && $contact_parent != '' && $date_naissance != '' 
        // && $type_examen !='' && $sexe !='' && $numero_table != '' && $numero_reference !='' && $user_id != '' && $serie != ''){

        // Demande::create([
        //     'photo' => $photo,
        //     'nom' => $nom,
        //     'prenom' => $prenom,
        //     'date_naissance' => $date_naissance,
        //     'email' => $email,
        //     'contact' => $contact,
        //     'sexe' => $sexe,
        //     'ville_naissance' => $ville_naissance,
        //     'numero_table' => $numero_table,
        //     'serie' => $serie,
        //     'mention' => $mention,
        //     'numero_reference' => $numero_reference,
        //     'annee_obtention' => $annee_obtention,
        //     'centre' => $centre,
        //     'nom_pere' => $nom_pere,
        //     'nom_mere' => $nom_mere,
        //     'contact_parent' => $contact_parent,
        //     'type_examen' => $type_examen,
        //     'user_id' => $user_id,

        // ]);

        //return view('front.demande.suivie', compact('demandes', 'demandeNonValides', 'demandeValides'))->with('addedMessage', 'Votre demande est soumise avec succès');


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
        if ($request->hasFile('photo')) {
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
                'type_examen' => $request->type_examen,
                'user_id' => Auth()->user()->id
            ]);
        } else {
            $filename = $demande->photo;
            $demande->update(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'contact' => $request->contact,
                    'sexe' => $request->sexe,
                    'serie' => $request->serie,
                    'releve' => $request->releve,
                    'mention' => $request->mention,
                    'numero_table' => $request->numero_table,
                    'numero_reference' => $request->numero_reference,
                    'annee_obtention' => $request->annee_obtention,
                    'date_naissance' => $request->date_naissance,
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
                'date_naissance' => $request->date_naissance,
                'nom_pere'  => $request->nom_pere,
                'nom_mere' => $request->nom_mere,
                'photo' => $filename
            ]
        );


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

        $recapitulatif = Demande::where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->first();

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

        $demandeNonValides = Demande::where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "non_valider"
            ]
        )->get();
        $demandeValides = Demande::where(
            [
                'user_id' => Auth::user()->id,
                'statut_demande' => "valider"
            ]
        )->get();


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
        $demandes = Demande::where(['statut_payement' => 'payer', 'statut_demande' => 'non_valider'])->get();
        return view('admin.demande.demandeRecente', compact('demandes'));
    }

    public function demandeApprouvee()
    {
        $demandes = Demande::where('statut_demande', 'valider')->get();
        return view('admin.demande.demandeApprouvee', compact('demandes'));
    }

    public function demandeGeneree()
    {
        $demandes = Demande::where('statut_demande', 'generer')->get();
        return view('admin.demande.demandeGenerer', compact('demandes'));
    }

    public function demandeNonPayee()
    {
        $demandes = Demande::where('statut_payement', 'non_payer')->get();
        return view('admin.demande.demandeNonPayee', compact('demandes'));
    }
}
