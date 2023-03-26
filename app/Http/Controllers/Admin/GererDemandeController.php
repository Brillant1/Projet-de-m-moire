<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use App\Models\Centre;
use App\Models\Commune;
use App\Models\Demande;
use App\Models\Candidat;
// use Barryvdh\DomPDF\PDF;
use App\Models\Attestation;
use App\Models\Departement;
use Illuminate\Http\Request;
// use mikehaertl\wkhtmlto\Pdf;
use mikehaertl\wkhtmlto\Pdf;
use App\Mail\AttestationMail;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
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

        $candidatAdmis = Candidat::where(
            [
                'numero_table'=> $demande->numero_table,
                'nom' => $demande->nom,
                'prenom' => $demande->prenom,
                'annee_obtention' => $demande->annee_obtention
            ]
        )->get();

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
            $demande->validated_at = now();
            $demande->save();
            return back()->with('changeStateMessage', "La demande a été approuvée avec succès");
        } else {
            return back()->with('alreadyChangeStateMessage', "Demande déjà approuvée");
        }
    }

    public function restaureDemande(Request $request){
        
        //$demande = Demande::where('id', $request->demande_id)->get();
        
        
        $demande= Demande::where('id',$request->demande_id)->update(['statut_demande'=> 'non_valider']);
           
           
            return response()->json([
                'code'=>200,
                'message'=>'Demande restaurée avec succès',
                'demande'=> $demande
            ]);
            //return redirect(route('singleDemande', $demande))->with('restaureMessage','Demande restaurée avec succès');
            //return back()->with('restaureMessage', "Demande restaurée avec succès");
            //header("Refresh:0");
       
    }


    public function pdf2(Demande $demande)
    {

        $code = strtotime($demande->created_at);
        $code = bcrypt($code);
        $code = '@#'.substr($code, strlen($code)-15).'#@';
        $code = $code;
        
        $data['id'] = $demande->id;
        $data['prenom'] = $demande->prenom;
        $data['email'] = $demande->email;
        $data['code'] = $code;



        Session::put('data', $data);

        // $hex_color = "#73c3c8";
        // $html = '<html><head><style>html,body{}</style></head><body>';

        $html = view('front.fichier')->render();

        $pdf = new Pdf();

        $pdf = $pdf->addPage($html);
        
        $output = $pdf->toString();
       
        $fileName = $demande->nom.'_'.$demande->prenom.'_'.$demande->numero_table.'.pdf';
        file_put_contents($fileName, $output);
       
        Mail::send('emails.attestation', $data, function ($message) use ($data, $output, $fileName) {
        $message->to($data['email'])
            ->subject('DEC-BENIN -'. $data['prenom'])
            ->attachData($output, $fileName, [ 'mime' => 'application/pdf',]);
        });

        Storage::disk('public')->put('attestation/'.$fileName,$output);

        $pdf_url = Storage::url('attestation' . '/' . $fileName);
         
        $demande->statut_demande = "generer";
        $demande->generated_at = now();
        $demande->attestation = $pdf_url;
        $demande->code = $code;
        
        $demande->save();
        $demandes = Demande::orderBy('created_at', 'DESC')->get();

        Attestation::create([
            'nom' => $pdf_url,
            'demande_id'=> $demande->id, 
            'code' => $code
        ]);
        //return back()->with('generateMessage', 'Attestation générée et envoyée au mail du demandeur avec succès !');
        return redirect()->route('demande-recente', ['demandes' => $demandes])->with('generateMessage', 'Attestation générée et envoyée au mail du demandeur avec succès !');
    }


    public function changeStateTogenerer(Demande $demande)
    {
        if ($demande->statut_demande == "valider"){

            $pdf = App::make('dompdf.wrapper');
            $pdf->PDF::loadView('emails.attestation', compact('demande'));

            // Mail::send('emails.attestation', $demande, function ($message) use ($demande, $pdf) {

            //     $message->to("esaietchagnonsi@gmail.com", $demande->nom)
            //         ->subject($demande->prenom)
            //         ->attachData($pdf->output(), "attestation_BEPC.pdf");
            //     }); 

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
       
      
        
        $query = Demande::where(['statut_payement' =>'payer', 'statut_demande' => 'non_valider']);
        if(!empty($data['departement'])){
            $query->where('departement', 'LIKE', Departement::where('nom', 'LIKE', '%'.$data['departement'].'%')->pluck('id'));
        }
        if(!empty($data['commune'])){
            $query->where('commune',  'LIKE', Commune::where('nom', 'LIKE', '%'.$data['commune'].'%')->pluck('id'));
        }
        if(!empty(['annee'])){
            $query->where('annee_obtention',$data['annee']);
        }
        if(!empty($data['serie'])){
            $query->where('serie', $data['serie']);
        }
        if(!empty($data['centre'])){
            $query->where('centre', $data['centre']);
        }

      

        
       $demande = $query->get();
      
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


}
