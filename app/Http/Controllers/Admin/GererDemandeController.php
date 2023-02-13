<?php

namespace App\Http\Controllers\Admin;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Candidat;
use Barryvdh\DomPDF\PDF;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Mail\AttestationMail;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
 


class GererDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function attestation(){
        $pdf = App::make('dompdf.wrapper');
        $pdf -> loadView('emails.attestation1');
        $pdf->setPaper("a4", "landscape" );
        return $pdf->stream();
    }
    public function listeDemande()
    {
        $demandes = Demande::orderBy('created_at', 'DESC')->get();
        $centres = Centre::all();
        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';', env('SERIE'));
        return view('admin.demande.listDemande', compact('demandes', 'centres', 'communes', 'departements', 'series'));
    }

    public function singleDemande(Demande $demande)
    {

        $candidatAdmis = Candidat::where('numero_table', $demande->numero_table)->get();

        $sujets = explode(';', env('SUJET'));

        return view(
            'admin.demande.showDemande',
            [
                'demande' => $demande,
                'candidatAdmis' => $candidatAdmis,
                'sujets' => $sujets,
            ]
        );
    }

    public function changeState(Demande $demande)
    {

        if ($demande->statut_demande == "non_valider") {
            $demande->statut_demande = "valider";
            $demande->save();
            return back()->with('changeStateMessage', "La demande a été approuvée avec succès");
        } else {
            return back()->with('alreadyChangeStateMessage', "Demande déjà approuvée");
        }
    }


    public function pdf2(Demande $demande)
    {
        $dompdf = new Dompdf();
        $data['id'] = $demande->id;
        $data['prenom'] = $demande->prenom;

        $html = view('front.pdf', ['data'=>$data]); 
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','paysage');
        $dompdf->render();
        $output = $dompdf->output();
        $fileName = $demande->nom.'_'.$demande->prenom.'_'.$demande->numero_table.'.pdf';
        file_put_contents($fileName, $output);
       
        Mail::send('emails.attestation', $data, function ($message) use ($data, $output, $fileName) {
        $message->to("esaietchagnonsi@gmail.com")
            ->subject( $data['prenom'])
            ->attachData($output, $fileName);
        });

        Storage::disk('public')->put('attestation/'.$fileName,$output);

        $pdf_url = Storage::url('attestation' . '/' . $fileName);
         
        $demande->statut_demande = "generer";
        $demande->attestation = $pdf_url;
        $code = strtotime($demande->created_at);
        $code = bcrypt($code);
        $code = '@#'.substr($code, strlen($code)-15).'#@';
        $demande->code = $code;
        $demande->save();
        $demandes = Demande::orderBy('created_at', 'DESC')->get();
        //return back()->with('generateMessage', 'Attestation générée et envoyée au mail du demandeur avec succès !');
        return redirect()->route('demande-recente', ['demandes' => $demandes])->with('generateMessage', 'Attestation générée et envoyée au mail du demandeur avec succès !');
    }


    public function changeStateTogenerer(Demande $demande)
    {
        if ($demande->statut_demande == "valider"){

            $pdf = App::make('dompdf.wrapper');
            $pdf->PDF::loadView('emails.attestation', compact('demande'));

            Mail::send('emails.attestation', $demande, function ($message) use ($demande, $pdf) {

                $message->to("esaietchagnonsi@gmail.com", $demande->nom)
                    ->subject($demande->prenom)
                    ->attachData($pdf->output(), "attestation_BEPC.pdf");
                }); 

            $demande->statut_demande = "generer";
            $demande->save();
            return back()->with('changeStateTogenerer', "Vous avez généré l'attestation en l'avez envoyé au mail du demandeur");
        } else if ($demande->statut_demande == "generer") {
            return back()->with('alredyGenerateMessage', "Vous avez déjà généré cette attestation");
        } else {
            return back()->with('invalidDemandeMessage', "Cette demande n'a pas encore été validée");
        }
    }

    public function dynamicSearchAllDemande(Request $request)
    {

        // $departement = $request->departement;
        // $commune = $request->commune;
        // $serie = $request->serie;
        // $annee = $request->annee;
        $data = $request->all();
        
        
      
        

        $demande = Demande::where( function($query){
            $query->where('statut_payement', 'payer') 
            ->where('statut_demande', 'non_valider')
            ->where('user_id', Auth::user()->id);
        // })
           
            // ->where(function($query) use ($data){
            //     $query->where('departement', 'LIKE', Departement::where('nom', 'LIKE', '%'.$data['departement'].'%'))->get()->pluck('id')
            //     ->orWhere('commune',  'LIKE', Commune::where('nom', 'LIKE', '%'.$data['commune'].'%'))->get()->pluck('id')
            //     ->orWhere('serie', 'LIKE', '%'.$data['serie'].'%')
            //     ->orwhere('annee_obtention', '%'.$data['annee'].'%');
            })->get();

            dd($demande);


        $communes = Commune::all();
        $departements = Departement::all();
        $series = explode(';', env('SERIE'));

        return response()->json([
            'demande'=> $demande,
            'data'=> $data
        ]);

    }

    public function dowloadUserFile($id){
        
        $demande = Demande::findOrFail($id);
        $lien = 'storage/'.$demande->releve;
        return response()->download(public_path($lien));
    }

    public function attestationAll( Demande $demande){

    }

}
