<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        body{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Inter";
            color: #222;
           
        }
        .first-section {
            display: flex;
            justify-content: space-between;

        }
        .h2-attestation{
            text-align: center;
            padding: 10px;
            border: 2px solid green;
            color: green;
            border-radius: 5px;
        }
        .dec{
            text-transform: uppercase;
        }
        .img-section {
            display: flex;
            justify-content:space-between;
            align-items:center;
            padding-left: 15px;
            padding-right: 15px;
        }
        .text-location>p{
            text-align: end;
            line-height: 10px;
        }
        .numero-acte{
            font-size: 1.2rem;
            font-weight: bold;
        }
        .mot-accord-dec{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .mot-proces{
            font-size: 18px;
            line-height: 28px;
            text-align: center;
        }
        .h2-brevet, .p-serie, .last-p{
            text-align: center;
        }
        .section-info {
            font-size: 18px;
            line-height: 16px;
            padding-left: 10px;
        }
        .text-important {
            font-weight: bold;
        }
        .signature-dec{
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
        }
        .dec-name{
            text-align: end;
            margin-top: 100px !important;
        }
        .instruction-dec{
            border:  5px solid #e6741e;
            border-radius: 5px;
        }
        .instruction-dec ul{
            line-height: 30px;
        }
    </style>
</head>
<body>
    {{-- <h1 class="">Mon attestation d'étude</h1> --}}
    <div class="first-section">
        @php
            $data = Session::get('data');
           
            $demande = App\Models\Demande::find($data['id']);
            
            $date_generate = $demande->generated_at;
            $candidat = App\Models\Candidat::where('numero_table', $demande->numero_table)->get();
            
            $departement = App\Models\Departement::find($demande->departement); 
            
            $attestation = App\Models\Attestation::find($demande->id);
        @endphp
        <div>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logoDEC.png'))) }}" height="130">
            {{-- <img src="{{ asset('img/logoDEC.png') }}" alt=""> --}}
        </div>
        <div class="text-location">
            <p>10 BP 250 Porto-Novo</p>
            <p class="dec">Fax: +20 21 26 51 86</p>
            <p>https://enseignementsecondaire.gouv.bj</p>
            <p>Rue Delcasée (CAEB), Porto-Novo Quartier: Adjina</p>
            {{-- <p>Tél: +229 21 30 57 95</p> --}}

        </div>
    </div>
    <div class="img-section">
        <div class="numero-acte">
            <p>N°10330 - 19/MESTFP/DEC/DG/SG</p>
        </div>
        <div>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/11754320.jpg'))) }}" height="130">
        </div>
    </div>
    <div class="mot-accord-dec">
        <h2 class="h2-attestation">ATTESTATION DE SUCCES</h2>
        <p class="mot-proces">Vu le procès verbal de délibération du jury N°87 en date du <span>mercredi 17 Juillet 2016</span>,
        le Directeur de la Direction des Examens et Concours de l'Enseignement Secondaire du Bénin, atteste que: </p>
        <div class="section-info">
            <p class="text-important">M. {{ $demande->prenom.' '.$demande->nom }}</p>
            <p>né <span class="text-important">le {{ date('d-m-Y', strtotime($demande->date_naissance)) }} à Ouessè</span></p>
            <p>Pays: <span class="text-important" style="margin-top:5px;">Bénin</span></p>
            <p>a obtenu le grade de:</p>
        </div>
        <h2 class="h2-brevet" style="color:#e6741e;">Brevet d'Etude du Premier Cycle (BEPC)</h2>
        <p class="p-serie"> <span class="text-important"> Série: @if($demande->serie=="Mod.Court") Moderne Court @elseif($demande->serie=="CAP") CAP  @else Moderne Long @endif
            
         </span> </p>
        <div class="section-info">
            <p>Session: <span class="text-important">Juin {{ $demande->annee_obtention }}</span></p>
            <p>Mention <span class="text-important">{{ $demande->mention }}</span></p>
            <p>Centre:  <span class="text-important">{{ $demande->centre }}</span></p>
            <p>Pays: <span class="text-important">Bénin</span></p>
            <p>Numéro de table: <span class="text-important">{{ $demande->numero_table }}</span> </p>
            <p>conformément à la décision <span class="text-important">N° 024/MESTFP/DC/SGM/DEC/STEC/-ECG-STMS/SA</span></p>

        </div>
        <h3 class="last-p">En foi de quoi, la présente attestation lui est délivrée pour servir et valoir ce que de droit.</h3>
        <div class="signature-dec">
            <h4> <span style="border-bottom: 2px solid black;">Signature de l'impétrant</span> </h4>
            <div>
                <p>Fait à Porto-Novo, le {{ formatDate($date_generate) }}</p>
                <h4>Le Directeur des Examens et Concours</h4>
                <h3 class="dec-name"><span style="border-bottom: 2px solid black;">Dr. Roger KOUDOADINOU</span></h3>
            </div>
        </div>
        <div class="instruction-dec">
            <ul>
                <li>Cette attestation sera obligatoirement rendue au moment de la remise du diplôme</li>
                <li>Toute rature, surchage ou photocopie non certifiée conforme annule la valaidité de cette attetsation</li>
                <li>Rendez vous le site <a href="www.attestationsecondaire.bj/verification">www.attestationsecondaire.bj/verification</a> pour vérifier l'authenticité de cette attestation</li>
            </ul>
        </div>
      <h2  style="color: #e6741e;">
        {{ $data['code'] }}
      </h2>
    </div>
</body>
</html>

