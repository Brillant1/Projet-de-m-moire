<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        
        /* tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        } */
        td {
            
            font-size: 16px;
            padding: 15px 10px 15px 10px;
            border: 1px solid blue;

        }

        table {
            border-collapse: collapse;
            /* background-color: rgb(218, 231, 218); */
            margin: auto;
            padding-left: 10px;
        }

        .divTab {
        
            margin-right: 50% auto;
        }
    </style>
</head>

<body>
    <div class="divTab">
        <table style=" width:80%; border:1px solid blue;">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>

                
                <tr>
                    <td>
                        <img src="{{ asset('admin/img/logoDec.png') }}" alt="" height="80">
                        {{-- <img src="{{asset('admin/img/default-image1-removebg-preview.png')}}" alt="" width="200" height="200" style="margin-right: 10px;">
                        {{!! QrCode::size(250)->generate('Expert Rohila:98745785') !!}} --}}
                    </td>
                    
                    <td style="text-align: center">
                        <p>REPUBLIQUE DU BENIN</p>
                        <p>MINISTERE DE L'ENSEIGNEMENT SECONDAIRE, <br>
                            TECHNIQUE ET DE LA FORMATION PROFESSIONNELLE</p>
                        <p>DIRECTION DES EXAMENS ET CONCOURS</p>
                    </td>
                   
                    <td style="">
                        <img src="{{asset('img/eza1.jpg')}}" alt="" width="150" height="150" style="margin-right: 10px;">
                    </td>
                    <td>
                        
                    </td>
                </tr>
    
                <tr>
                    <td style="text-align: center"><h2>ATTESTATION DE REUSSITE</h2></td>
                </tr>
                <tr>
                    <td >Le Directeur des Examens et Concours, soussigné, atteste que :</td>
                </tr>
                <tr style="font-weight: bold">
                    {{-- <td >N° 16/0019/22 / DEC / MESTFP / SIS / SDADC</td> --}}
                    <td >INFORMATIONS PERSONNELLES</td>
                    
                    <td  style="text-align: center">DETAILS DE LA DEMANDE</td>
                </tr>
               
                <tr>
                    <td>M :</td>
                    <td  style="text-align: center">TCHAGNONSI Esaie</td>
                </tr>
                <tr>
                    <td>Né le :</td>
                    <td  style="text-align: center">20 - 04 - 2000</td>
                </tr>
                <tr>
                    <td>à :</td>
                    <td>OUESSE</td>
                </tr>
                <tr>
                    <td>a subi avec succès l'examen du :</td>
                    <td>Brevet d'Etudes du Premier Cycle (BEPC)</td>
                </tr>
                <tr>
                    <td>Série</td>
                    <td>Mod. Court</td>
                </tr>
                <tr>
                    <td>à la session de : </td>
                    <td>
                        Juin 2016
                    </td>
                </tr>
                <tr>
                    <td>Centre de : </td>
                    <td>CEG 2 OUESSE</td>
                </tr>
                <tr>
                    <td>Conformément à la décision N° : </td>
                    <td>024/MESTFP/DC/SGM/DEC/STEC-ECGSTMS/SA</td>
                </tr>
                <tr>
                    <td>du :</td>
                    <td>18 Février 2017</td>
                </tr>
                <tr>
                    <td  style="text-align: start; font-weight:bold;">En foi de quoi, la présente Attestation lui est délivrée
                        pour servir et valoir ce que de droit.</td>
                </tr>
                <tr>
                    <td style="text-align: start">
                        Porto-Novo, le 10 septembre 2020 <br><br>
                
                     Référence: N° 16/0019/22 / DEC / MESTFP / SIS / SDADC <br> <br> &copy Direction des Examens et Concours  <br> <br>
               
                     Identifié par: <span style=" font-weight:bold;">@#xvwrtehyu#@ </span> 
                    </td>
                    <td>
                        Ce document doit faire preuve de bon usage. Tout organe se trouvant dans l'ogligation d'utiliser ce document doit se rassurer de son authenticité sur la plateforme
                        <a href="#" style="color: blue;">authenticite.bj</a> avec son numero d'identification.
                         Toute falsification de ce document est passible de peine de poursuite judiciaire.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

