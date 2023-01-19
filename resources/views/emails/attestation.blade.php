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
            width: 100%;
        }
        table{
            width: 100%;
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
            padding: 12px 0px 12px 0px; */
            border: 1px solid blue;
        }

        table {
            border-collapse: collapse;
            /* background-color: rgb(218, 231, 218); */
            margin: auto;
            
        }


        
    </style>
</head>
<body>
    <div class="divTab">
        <table style=" width:100%;">
            <thead>
                <tr>
                    <th style="width:30.33%; text-align:start;">
                        <img style="" src="{{ asset('admin/img/logoDec.png') }}" alt="" height="80">
                    </th>
                    <th style=" padding:0; width:40%;">
                        <p>REPUBLIQUE DU BENIN</p>
                        <p>MINISTERE DE L'ENSEIGNEMENT SECONDAIRE, <br>
                            TECHNIQUE ET DE LA FORMATION PROFESSIONNELLE</p>
                        <p>DIRECTION DES EXAMENS ET CONCOURS</p>
                    </th>
                    <th style="width:27.33%;">
                        <img src="{{asset('img/eza1.jpg')}}" alt="" width="150" height="150" style="margin-right: 10px;">
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center" colspan="3"><h2>ATTESTATION DE REUSSITE</h2></td>
                </tr>
                <tr>
                    <td colspan="3" >Le Directeur des Examens et Concours, soussigné, atteste que :</td>
                </tr>
                <tr style="font-weight: bold">
                    {{-- <td >N° 16/0019/22 / DEC / MESTFP / SIS / SDADC</td> --}}
                    <td colspan="2" >INFORMATIONS PERSONNELLES</td>
                    
                    <td  style=""> A PROPOS DE L'ATTESTATION</td>
                </tr>
                <tr>
                    <td>M :</td>
                    <td  style="">TCHAGNONSI Esaie</td>
                </tr>
                <tr>
                    <td>Né le :</td>
                    <td  style="">20 - 04 - 2000</td>
                    <td>Délivré le:  14-06-2022 à Porto-Novo </td> 
                </tr>
                <tr>
                    <td>à :</td>
                    <td>OUESSE</td>
                    <td>Identifié par: <span style=" font-weight:bold;">@#xvwrtehyu#@ </span> </td>
                </tr>
                <tr>
                    <td>a subi avec succès l'examen du :</td>
                    <td>Brevet d'Etudes du Premier Cycle (BEPC)</td>
                    <td>Site témoin: <a href="#" style="text-decoration: underline; color:blue;">authenticite-bepc.bj</a> </td>
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
                    <td colspan="3"  style="text-align: start; font-weight:bold;">En foi de quoi, la présente Attestation lui est délivrée
                        pour servir et valoir ce que de droit.</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: start">
                        Porto-Novo, le 10 septembre 2020 <br><br>
                
                     Référence: N° 16/0019/22 / DEC / MESTFP / SIS / SDADC <br> <br> &copy Direction des Examens et Concours  <br> <br>
               
                    </td>
                    
                    <td>
                        <img style="" src="{{ asset('admin/img/timbre-removebg-preview.png') }}" alt=""> <br><br>
                        <p style="text-align: center">Professeur Roger KOUDOADINOU</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="line-height: 27px;">
                        Ce document doit faire preuve de bon usage. Tout organe voulant fait usage de ce document doit se rassurer de son authenticité sur la plateforme
                        <a href="#" style="color: blue;">authenticite.bj</a> avec son numero d'identification.
                         Toute falsification de ce document est passible de peine de poursuite judiciaire.
                    </td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</body>
</html>