<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
      @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family:  Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        table {
          width: 100%;
        }
        table tr{
            padding: 7px 2px;
        }
        table td{
          width: 25%;
          padding-top: 8px;
          padding-bottom: 8px;
        }
        table td span:last-child{
          font-weight: 540;
          font-size: 18px;
          border-bottom: 2px dotted black;
        }
        .mot-dg{
          font-size: 20px;
          font-family: cursive;
        }
        .tr td {
         
          
        }
        .tr td:last-child{
          width: 50%;
         
        }

    </style>
</head>
<body>
    <div>
        <table>
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody >
                <tr>
                    <td colspan="" >
                      {{-- <img src="{{ asset('admin/img/logoDec.png') }}" alt="" height="100" > --}}
                      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('admin/img/logoDec.png'))) }}" height="85" >
                    </td>
                   <td></td>
                   <td></td>
                    <td colspan="" align="right" style="line-height:18px;">
                       
                            01 BP 348 Porto-Novo <br> Tél: +229 95 37 11 54 <br>
                            Fax: +229 21 30 57 95 <br> www.enseignementsecondaire.bj
                    
                        {{-- <p class="" style="text-align: end">01 BP 348 Porto-Novo</p>
                        <p style="text-align: end">Tél: +229 95 37 11 54</p>
                        <p style="text-align: end">Fax: +229 21 30 57 95</p>
                        <p style="text-align: end">www.enseignementsecondaire.bj</p> --}}
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;">
                        <span style="border-bottom: 2px solid black; padding-bottom:5px;">DIRECTION DES EXAMENS ET CONCOURS</span>
                    </td>
                </tr>
                
                <tr style="">
                    <td colspan="5" style="text-align: center; background-color: rgb(211, 210, 210);padding:0;">
                       <h3>ATTESTATION DE REUSSITE DU BEPC</h3>
                    </td>
                </tr>
                @php
                  $demande = App\Models\Demande::find($data['id']);
                  $date_generate = $demande->updated_at;
                  
                  $centre = App\Models\Centre::find($demande->centre);
                  $departement = App\Models\Departement::find($demande->departement);
                @endphp
                <tr>
                  <td colspan="2" align="left" style="padding: 25px 0;">N° 16 / 0019 / 22 / MESTFP / SIS / SDADC</td>
                  <td align="left" colspan="3" style="padding: 25px 0; width:50%;">Identifiant: {{ $demande->code }}</td>
                  
                </tr>
                <tr >
                    <td colspan="5" style="font-size: 20px;" class="mot-dg" align="center">
                      Le Directeur des Examens et Concours, soussigné, atteste que:
                    </td>
                </tr>
                <tr>
                  <td colspan="3" align="left" style=" border-radius:3px;padding-left:10px;"><span>M.  </span><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $demande->nom.''.$demande->prenom }}</span></td> 
                  <td colspan="1" align="right" style=" border-radius:3px;"><span>Né le</span> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('m-d-Y', strtotime($demande->date_naissance)) }}</span></td>
                </tr>
               
                <tr>
                  <td colspan="2" style=" border-radius:3px;padding-left:10px;"><span>à</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $demande->ville_naissance }} </span></td> 
                  <td colspan="2" align="right" style=" border-radius:3px;"><span>Département</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $departement->nom }}</span></td>
                </tr>
                <tr>
                  <td colspan="5" align="center">
                
                     <p style="font-size: 18px; font-weight:bold;"> a subi avec succès l'examen du
                      Brevet d'Etude du Premier Cycle (BEPC)</p>
                  </td> 
                  
                </tr>
                <tr>
                  <td colspan="2" align="left" style=" border-radius:3px;padding-left:10px;"><span>Série  </span><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $demande->serie }}</span></td> 
                  <td colspan="2" align="right" style=" border-radius:3px;"><span>Session de</span> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $demande->annee_obtention }}</span></td>
                  
                </tr>
               
                <tr>
                  <td colspan="1" align="left" style=" border-radius:3px;padding-left:10px;"><span>Centre de</span><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $centre->nom }}</span></td> 
                  <td colspan="3" align="right" style=" border-radius:3px;"><span>A fréquenter</span> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $demande->etablissement }}</span></td>
                  
                </tr>
                <tr>
                  <td colspan="5">
                    <p style="font-size: 18px; font-weight:600;">Conformément à la décision N° 024/MESTFP/DC/SGM/DEC/STEC/-ECG-STMS/SA</p>
                  </td> 
                </tr>
                <tr>
                  <td colspan="5"><span>du</span> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 28 Février 2017</span></td> 
                </tr>
                <tr>
                  <td colspan="5" align="center" style="font-size: 16px; font-weight:700px;">En foi de quoi, la présente attestation lui est délivrée pour servir et valoir ce que de droit.</td> 
                </tr>
                <tr>
                 
                  <td colspan="5" align="right">
                    Porto-Novo, {{ formatDate($date_generate) }} <br>
                    <h4> Le Directeur des examens et Concours,</h4>
                  </td>
                </tr>
                <tr>
                  <td colspan="5" align="left">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('admin/img/timbre-removebg-preview.png'))) }}" height="60" >
                   
                  </td>
                </tr>
                <tr class="tr" >
                  <td colspan="5" align="right" style="">   <span style="border-bottom: 3px solid black; font-size:20px; font-weight:bold;">Dr Roger KOUDOADINOU</span></td>
                </tr>
                <tr>
                  <td colspan="5" align="left">
                    <p >Il n'est délivré qu'une seule attestation. Elle sera obligatoirement rendu au moment de la remise de diplôme. Toute rature, surchage ou photocopie 
                      non certifiée conforme annule la validité de cette attestation.</p>
                  </td>
                </tr>
         

              
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</body>
</html>