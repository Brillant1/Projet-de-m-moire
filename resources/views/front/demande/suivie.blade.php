@extends('front.layouts.template')
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />
    <style>
        .table thead > tr:first-child{
            display: none !important;
        }
    </style>
@section('content')

    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">
        <div>
            <div class="d-flex justify-content-center flex-column"
                style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 250px;">
                <h3 class="text-white ms-5 fw-bold" style="line-height:50px;">
                    Suivez ici les demandes que vous avez effectués jusqu'à ce que votre attestation ne soit
                    disponible.
                </h3>
            </div>
            <div class="carousel-inner" style="height:250px;">
                <div class="carousel-item active" style="height:300px;">
                    <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>

            <div class="container-fluid">
                <div class="container ">

                    <p class="text-center fs-2 mt-5 fw-bold">Récapitulatif des demandes</p>



                    @if (session('deletedMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('deletedMessage') }}
                        <button class="btn-close  bg-none bg-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif  

                    @if (session('addedDemandeMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('addedDemandeMessage') }}
                        <button class="btn-close  bg-none bg-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif  

                   
                  

                    @if (Session::has('paymentSuccessMessage'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                            {{ Session::get('paymentSuccessMessage') }}</p>
                    @endif

                    <div class="d-flex justify-content-between mt-5 fw-bold">
                        <p class="fs-4">Liste des demandes</p>
                        <a href="{{ route('before-demande') }}"
                            class="px-5 rounded text-white fw-bold py-1 rosette-bg-green d-flex justify-content-center align-items-center">Faire
                            une demande</a>

                    </div>



                    <div class="mt-5">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Demandes en attente</button>
                               
                                

                                <button class="nav-link" id="nav-rejet-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-rejet" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Demande(s) invalidée(s)</button>

                                <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Demandes non payées</button>

                                <button class="nav-link" id="nav-attestation-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-attestation" type="button" role="tab"
                                    aria-controls="nav-attestation" aria-selected="false">Mes attestations</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            {{-- Tabs 1 --}}
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">

                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded search-table " type="text"
                                                    placeholder="Rechercher ..." id="example-search-input">
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <button class=" btn btn-sm fw-bold filterAttente p-2 text-white" style="background-color:  rgba(3, 36, 151, 0.71) !important;">Filtrer &nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                              </svg>

                                        </button>
                                       
                                    </div>
                                </div>
                                <div class=" table-responsive">
                                    <table class="table demande-attente-table ">
                                        <thead>
                                            <th>
                                                <tr class="">
                                                    <th>Faite le</th>
                                                    <th>Nom & Prénoms</th>
                                                    <th>N° de Table </th>
                                                    <th>Centre</th>
                                                    <th>Statut</th>
                                                    <th class=" text-center">Action</th>
                                                </tr>
                                            </th>
                                        </thead>
                                        <tfoot class="d-none" id="attentefooter">
                                            <tr>
                                                <th class="date">date</th>
                                                <th class="nom">nom</th>
                                                <th class="numero">n° de table </th>
                                                <th class="centre">centre</th>
                                                <th class="statut">Statut</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody>
                                            @if (!is_null($demandeNonValides))

                                            
                                          
                                                @foreach ($demandeNonValides as $demande)
                                          
                                                  
                                                    <tr class="">
                                                        <td class="py-3">
                                                            {{-- {{ $demande->created_at->format('d-m-Y') }} à {{  $demande->created_at->format('H:i') }} --}}
                                                            @php
                                                                $date = $demande->created_at;
                                                                $date = Carbon\Carbon::parse($date);
                                                                $date = $date->addHours(1);
                                                            @endphp
                                                            {{ $date->format('d-m-Y H:i') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demande->nom . ' ' . $demande->prenom }}
                                                        </td>

                                                        <td class="py-3">{{ $demande->numero_table }}</td>
                                                        <td class="py-3 label-color">
                                                            {{ $demande->centre }}
                                                            {{-- @php
                                                                $centre = App\Models\Centre::where('id', $demande->centre)->first();
                                                            @endphp
                                                            @if(!is_null($centre))
                                                            {{ $centre->nom }}
                                                            @endif --}}
                                                           
                                                        </td>
                                                        <td class="py-3" style="color:#CA8B11">

                                                          Non validée
                                                            
                                                        </td>
                                                        


                                                        <td class="py-3 text-center">
                                                            <a title="Consulter la demande"
                                                                href="{{ route('demandes.show', ['demande' => $demande->id]) }}"
                                                                class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                                data-bs-target="{{ '#showModal' . $demande->id }}"
                                                                title="Consulter">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="currentColor"
                                                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                    <path
                                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                </svg>
                                                            </a>

                                                            <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}"
                                                                title="Editer la demande"
                                                                class="btn btn-sm text-success ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                            </a>
                                                            
                                                            <a href="#" class="btn btn-sm" title="Supprimer la demande" data-bs-toggle="modal"
                                                                
                                                                data-bs-target="{{ '#deleteModal' . $demande->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                    height="35" fill="red" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                                            </a>

                                                            

                                                               

                                                            @php
                                                                $alertes = App\Models\Alerte::where('demande_id',$demande->id)->get();
                                                            @endphp
                                                            <div class="modal modal-lg fade" id="{{ 'infoModal' . $demande->id }}">
                                                                <div class=" modal-dialog modal-lg">
                                                                    <div class=" modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Quelques infos à propos de cette demande</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class=" modal-body">
                                                                            @forelse($alertes as $alerte)
                                                                            <div>
                                                                                <p class=" fw-bold">{{ $alerte->created_at->format('d-m-Y') }} &nbsp; &nbsp;
                                                                                Message de l'administrateur
                                                                                </p>
                                                                                <p>{{ $alerte->message }}</p>
                                                                            </div>
                                                                            @empty
                                                                                    L'admin n'a émis aucun message pour moment
                                                                        
                                                                            @endforelse 
                                                                            <hr>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Modal to delete demande --}}
                                                            <div class="modal fade"
                                                                id="{{ 'deleteModal' . $demande->id }}"
                                                                tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-top">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Confirmer la
                                                                                suppression</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Voulez-vous vraiment supprimmer cette demande de
                                                                            :
                                                                            <br>
                                                                            <span
                                                                                class="text-danger">{{ $demande->type_examen . ' ' . $demande->annee_obtention }}</span>
                                                                            ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="POST"
                                                                                action="{{ route('demandes.destroy', ['demande' => $demande->id]) }}">

                                                                                <input type="hidden" name="_method"
                                                                                    value="DELETE">
                                                                                <input type="hidden" name="_token"
                                                                                    value="{{ csrf_token() }}">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Annuler</button>
                                                                                <input type="submit"
                                                                                    class="btn btn-danger"
                                                                                    value="Confirmer">
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- Modal to delete demande --}}

                                                            @php
                                                                $messages = App\Models\Alerte::where('demande_id', $demande->id)->get();
                                                            @endphp
                                                       </td>
                                                    </tr>

                                                    {{-- Show modal recap demande code --}}

                                                    <div class="modal fade container-fluid"
                                                        id="{{ 'showModal' . $demande->id }}" tabindex="-1">
                                                        <div class="modal-dialog" style="max-width: 60%">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Récapitulatif de la demande du
                                                                        &nbsp; <strong>
                                                                            {{ $demande->created_at->format('d-m-Y') }}
                                                                        </strong></h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div

                                                                
                                                                    class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                                    {{-- tab modal body --}}
                                                                    {{-- <img src="{{ 'storage/' . $demande->photo }}" alt="" width="600"
                                                                        height="400" style="object-fit: cover;"> --}}
                                                                    <div class="container mt-2">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Informations personnelles du candidat</p>
                                                                        {{-- <div class="d-flex justify-content-center align-items-center">
                                                                            <img src="{{ asset('storage/photo_candidat_demande/'. $demande->photo) }}" alt="" width="500" height="500"> 
                                                                        </div> --}}
                                                                        <hr>
                                                                        <div
                                                                            class="row-info container-fluid d-flex justify-content-between pt-3">

                                                                            <p class="w-75">Nom :</p>
                                                                            <p class="w-50">{{ $demande->nom }}</p>

                                                                        </div>

                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between ">

                                                                            <p class="w-75">Prénom :</p>
                                                                            <p class="w-50">{{ $demande->prenom }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Date de naissance :</p>
                                                                            <p class="w-50">{{ $demande->date_naissance }}</p>

                                                                        </div>
                                                                        <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">

                                                                        <p class="w-75">Adresse mail :</p>
                                                                        <p class="w-50">
                                                                            {{$demande->email}}</p>

                                                                        </div>
                                                                        <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">

                                                                        {{-- <p class="w-75">Ville de naissance :</p>
                                                                        <p class="w-50">
                                                                            {{$demande->ville_naissance}}</p>

                                                                        </div>   --}}

                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Contact :</p>
                                                                            <p class="w-50">{{ $demande->contact }}</p>

                                                                        </div>
                                                                        
                                                                     
                                                                      
                                                                        
                                                                    </div>
                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Informations sur le diplôme</p>
                                                                        <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Numero de table :</p>
                                                                            <p class="w-50">{{ $demande->numero_table }}</p>

                                                                        </div>
                                                                        <div class=" row-info container-fluid  d-flex justify-content-between ">                                                               
                                                                            <p class="w-75">Année d'obtention du diplôme :</p>
                                                                            <p class="w-50">{{ $demande->annee_obtention }}</p>
                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">
                                                                            <p class="w-75">Série d'examen :</p>
                                                                            <p class="w-50">{{ $demande->serie }}</p>

                                                                        </div>
                                                                        
                                                                        <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                            <p class="w-75">Centre de composition :</p>
                                                                            
                                                                                <p class="text-danger w-50">
                                                                                    {{ $demande->centre }}
                                                                                    
                                                                                    {{-- @php
                                                                                    $centre = App\Models\Centre::where('id', $demande->centre)->first();
                                                                                @endphp
                                                                                @if(!is_null($centre))
                                                                                {{ $centre->nom }}
                                                                                @endif --}}
                                                                                 
                                                                                 
                                                                                
                                                                              
                                                                                
                                                                              </p>
                                                                        </div>
                                                                        {{-- <div
                                                                            class="pt-3 row-info container-fluid d-flex justify-content-between">
                                                                            <p class="w-75">Etablissement fréquenté :</p>
                                                                            <p class="w-50 text-danger">
                                                                                    {{ $demande->etablissement?$demande->etablissement:'-' }}</p>
                                                                        </div> --}}
                                                                        <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                            <p class="w-75">Année d'obtention du diplôme :</p>
                                                                            
                                                                                <p class="text-danger w-50">
                                                                                   
                                                                                    {{ $demande->annee_obtention }}</p>
                                                                             
                                                                        </div>
                                                                        {{-- <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                            <p class="w-75">Jury de l'examen</p>
                                                                            <p class="w-50 text-danger">

                                                                              
                                                                                    {{ $demande->jury? $demande->jury:'-' }}</p>
                                                                                
                                                                            
                                                                        </div> --}}
                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Commune du centre :</p>
                                                                          
                                                                            <p  class="text-danger w-50">
                                                                                {{ $demande->commune
                                                                                 }}
                                                                                {{-- @php
                                                                                    $commune = App\Models\Commune::where('id', $demande->commune)->first();
                                                                                @endphp
                                                                                @if(!is_null($commune))
                                                                                    {{ $commune->nom }}
                                                                                @endif --}}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Département :</p>
                                                                            <p  class="text-danger w-50">
                                                                                {{ $demande->departement }}
                                                                                {{-- @php
                                                                                $departement = App\Models\Departement::find($demande->departement);
                                                                                @endphp
                                                                                {{ $departement->nom }} --}}
                                                                            </p>

                                                                        </div>
                                                                        

                                                                    </div>

                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Autres informations utiles</p>

                                                                        
                                                                        {{-- <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Nom du père :</p>
                                                                            <p class="w-50">{{ $demande->nom_pere }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="w-75">Nom de la mère :</p>
                                                                            <p class="w-50">{{ $demande->nom_mere }}</p>

                                                                        </div> --}}
                                                                   
                                                                        <div class=" d-flex justify-content-between w-50 ">
                                                                            <div class=" text-center">
                                                                                <span>Rélevé</span> <br>
                                                                                <a href=" {{ asset('storage/'.$demande->releve) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                                <a href="{{ route('download-releve', $demande->id ) }}" class="mt-5">Télécharger</a>
                                                                            </div>
                                                                            {{-- <div  class=" text-center">
                                                                                <span>Acte de naissance</span> <br>
                                                                                <a href=" {{ asset('storage/'.$demande->acte_naissance) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                                <a href="{{ route('download-acte', $demande->id ) }}" class="mt-5">Télécharger</a>
                                                                            </div>
                                                                            <div  class=" text-center">
                                                                                <span>Carte d'identité</span> <br>
                                                                                <a href=" {{ asset('storage/'.$demande->cni) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                                <a href="{{ route('download-cni', $demande->id ) }}" class="mt-5">Télécharger</a>
                                                                            </div> --}}
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('demandes.pdf', $demande->id) }}"
                                                                            class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                            le récapitulatif</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End show modal code --}}




                                                    
                                                @endforeach
                                            @else
                                            <h5 class=" text-center">Pas de demande validé</h5>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            {{-- end tabs 1 --}}


                         


                            {{-- Tabs 3 --}}
                            {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">

                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded" type="text"
                                                    value="Rechercher ..." id="example-search-input">
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="">
                                            <select class="form-select form-select-md mb-3 rounded"
                                                aria-label=".form-select-lg example">
                                                <div class="">
                                                    <option selected>Filtrer suivant ...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </div>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="">
                                    <table class="table">
                                        <th>
                                            <tr class="">
                                                <td>Emise le</td>
                                                <td>Validée le</td>
                                                <td>Nom & Prénoms</td>
                                                <td>N* de Table </td>
                                                <td>Centre</td>
                                         
                                             
                                                <td>Commune</td>
                                                <td>Statut</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @if (count($demandeValides))
                                                @foreach ($demandeValides as $demandeValide)
                                                    @php
                                                    $centres = App\Models\Centre::where('id',$demandeValide->centre)->get();
                                                    $communes = App\Models\Commune::where('id',$demandeValide->commune)->get();
                                                    @endphp
                                                    <tr class="">
                                                        <td class="py-3">
                                                            {{ $demandeValide->created_at->format('d-m-Y') }} à {{ $demandeValide->created_at->format('H:i') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeValide->updated_at->format('d-m-Y') }} à {{ $demandeValide->updated_at->format('H:i')}}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeValide->nom . ' ' . $demandeValide->prenom }}
                                                        </td>
                                                        <td class="py-3">{{ $demandeValide->numero_table }}</td>

                                                       
                                                        <td class="py-3">{{ $demandeValide->centre }}</td>
                                                        <td class="py-3">{{ $demandeValide->commune}}</td>
                                                        <td class="py-3"  style="color:#CA8B11">
                                                            {{ $demandeValide->statut_demande }}
                                                        </td>
                                      
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            {{-- end tabs3 --}}

                            <div class="tab-pane fade" id="nav-rejet" role="tabpanel"
                                aria-labelledby="nav-rejet-tab">
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">

                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded" type="text"
                                                    placeholder="Rechercher ..." id="rejet-search-input">
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <div>
                                            <button class=" btn btn-sm fw-bold filterRejet p-2 text-white" style="background-color:  rgba(3, 36, 151, 0.71) !important;">Filtrer &nbsp;
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                                  </svg>
    
                                            </button>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class=" table-responsive">
                                    <table class="table rejetTable w-100">
                                        <thead>
                                            <th>
                                                <tr class="">
                                                    <td>Invalidée le</td>
                                                    <td>Emise le</td>
                                                    <td>Nom & Prénom(s)</td>
                                                    <td>N° Table</td>
                                                    <td>Centre</td>
                                                    <td>Statut</td>
                                                    <td>Action</td>
                                                </tr>
                                            </th>
                                        </thead>
                                        <tfoot class="d-none" id="rejetfooter">
                                            <tr class="">
                                                <td class="dateinvalide">date</td>
                                                <td class="datedemande">date</td>
                                                <td class="nom">nom</td>
                                                <td class="numero">n° table</td>
                                                <td class="centre">centre</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            
                                                @forelse($demandeRejetes as $demandeRejete)
                                                
                                                    {{-- @php
                                                        $centres = App\Models\Centre::where('id',$demandeRejete->centre)->get();
                                                        $communes = App\Models\Commune::where('id',$demandeRejete->commune)->get();
                                                        
                                                    @endphp --}}
                                                    
                                                    <tr class="">
                                                        <td class="py-3">
                                                            {{ $demandeRejete->updated_at->format('d-m-Y') }} à {{ $demandeRejete->updated_at->format('H:i') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeRejete->created_at->format('d-m-Y') }} à {{ $demandeRejete->created_at->format('H:i') }}
                                                        </td>
                                                        
                                                        <td class="py-3">
                                                            {{ $demandeRejete->nom . ' ' . $demandeRejete->prenom }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeRejete->numero_table }}
                                                        </td>
                                                        
                                                        
                                                        <td class=" py-3">
                                                            {{ $demande->centre }}
                                                            {{-- @foreach ($centres as $centre)
                                                                {{ $centre->nom }}
                                                            @endforeach --}}
                                                        </td>
                                                        {{-- <td class=" py-3">
                                                            @foreach ($communes as $commune)
                                                                {{ $commune->nom }}
                                                            @endforeach
                                                        </td> --}}
                                                        
                                                        <td class="py-3" style="color:#CA8B11">
                                                            Rejetée
                                                        </td>
                                                        <td>

                                                            <a title="Consulter la demande"
                                                            href="{{ route('demandes.show', ['demande' => $demandeRejete->id]) }}"
                                                            class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                            data-bs-target="{{ '#showModal' . $demandeRejete->id }}"
                                                            title="Consulter">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                            </a>

                                                            <a href="{{ route('demandes.edit', ['demande' => $demandeRejete->id]) }}"
                                                                title="Editer la demande"
                                                                class="btn btn-sm text-success ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                            </a>
                                                            
                                                            <a href="#" class="btn btn-sm" title="Info" data-bs-toggle="modal"                    
                                                                data-bs-target="{{ '#infoModal' . $demandeRejete->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="green"
                                                                    class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                                    <path
                                                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                            </a> 
                                                            @php
                                                            $alertes = App\Models\Alerte::where('demande_id',$demandeRejete->id)->get();
                                                        @endphp
                                                        <div class="modal fade" id="{{ 'infoModal' . $demandeRejete->id }}">
                                                            <div class=" modal-dialog modal-lg">
                                                                <div class=" modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Quelques infos à propos de cette demande</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class=" modal-body">
                                                                        @forelse($alertes as $alerte)
                                                                        <div>
                                                                            <p class=" fw-bold">{{ $alerte->created_at->format('d-m-Y') }} &nbsp; &nbsp;
                                                                            Message de l'administrateur
                                                                            </p>
                                                                            <p>{{ $alerte->message }}</p>
                                                                        </div>
                                                                        @empty
                                                                                L'admin n'a émis aucun message pour le moment
                                                                    
                                                                        @endforelse 
                                                                        <hr>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>






                                                {{-- Show modal recap demande code --}}

                                                <div class="modal fade container-fluid"
                                                id="{{ 'showModal' . $demandeRejete->id }}" tabindex="-1">
                                                <div class="modal-dialog" style="max-width: 60%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Demandée le
                                                                &nbsp; <strong>
                                                                    {{ $demandeRejete->updated_at->format('d-m-Y') }}
                                                                </strong></h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div

                                                        
                                                            class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                            {{-- tab modal body --}}
                                                            {{-- <img src="{{ 'storage/' . $demande->photo }}" alt="" width="600"
                                                                height="400" style="object-fit: cover;"> --}}
                                                            <div class="container mt-2">
                                                                <p
                                                                    class="section-title text-center first-color py-2 mt-5">
                                                                    Informations personnelles du candidat</p>
                                                                <div class="d-flex justify-content-center align-items-center">
                                                                    <img src="{{ asset('storage/photo_candidat_demande/'. $demandeRejete->photo) }}" alt="" width="500" height="500"> 
                                                                </div>
                                                                <hr>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between pt-3">

                                                                    <p>Nom :</p>
                                                                    <p class="">{{ $demandeRejete->nom }}</p>

                                                                </div>

                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between ">

                                                                    <p>Prénom :</p>
                                                                    <p class="">{{ $demandeRejete->prenom }}
                                                                    </p>

                                                                </div>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Date de naissance :</p>
                                                                    <p>{{ $demandeRejete->date_naissance }}</p>

                                                                </div>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p class="">Centre :</p>
                                                                    <p>
                                                                        {{$demandeRejete->centre}}</p>

                                                                </div>
                                                                <div
                                                                    class=" row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Contact du candidat :</p>
                                                                    <p>{{ $demandeRejete->contact }}</p>

                                                                </div>
                                                                <div
                                                                    class=" row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Numero de table :</p>
                                                                    <p>{{ $demandeRejete->numero_table }}</p>

                                                                </div>
                                                            </div>
                                                            <div class="container">
                                                                <p
                                                                    class="section-title text-center first-color py-2 mt-5">
                                                                    Informations sur le diplôme</p>

                                                                <div class="pt-3 row-info container-fluid  d-flex justify-content-between ">                                                               
                                                                    <p>Année d'obtention du diplôme :</p>
                                                                    <p>{{ $demandeRejete->annee_obtention }}</p>
                                                                </div>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">
                                                                    <p>Série d'examen :</p>
                                                                    <p>{{ $demandeRejete->serie }}</p>

                                                                </div>
                                                                {{-- <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Numero de référence :</p>
                                                                    <p>{{ $demandeRejete->numero_reference }}</p>

                                                                </div> --}}
                                                                <div
                                                                    class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                    <p>Centre de composition :</p>
                                                                    <p>
                                                                        <p class="text-danger">
                                                                            {{-- @php
                                                                                $centre = App\Models\Centre::where('id', $demandeRejete->centre)->get();
                                                                                
                                                                            @endphp --}}
                                                                            {{ $demandeRejete->centre }}</p>
                                                                        
                                                                        </p>
                                                                </div>

                                                            </div>

                                                            <div class="container">
                                                                <p
                                                                    class="section-title text-center first-color py-2 mt-5">
                                                                    Autres informations utiles</p>

                                                                <div
                                                                    class=" row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Commune du centre :</p>
                                                                    
                                                                    <p  class="text-danger">
                                                                        {{ $demandeRejete->commune}}
                                                                        
                                                                    </p>

                                                                </div>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Département :</p>
                                                                    <p  class="text-danger">
                                                                        {{ $demandeRejete->departement }}
                                                                        {{-- @php
                                                                        $departement = App\Models\Departement::where('id', $demandeRejete->departement)->get();
                                                                        @endphp
                                                                        {{ $departement[0]->nom }} --}}
                                                                    </p>

                                                                </div>
                                                                {{-- <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Nom du père :</p>
                                                                    <p>{{ $demandeRejete->nom_pere }}</p>

                                                                </div>
                                                                <div
                                                                    class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Nom de la mère :</p>
                                                                    <p>{{ $demandeRejete->nom_mere }}</p>

                                                                </div> --}}
                                                                <hr>
                                                                <div class=" d-flex justify-content-between w-50 ">
                                                                    <div class=" text-center">
                                                                        <span>Rélevé</span> <br>
                                                                        <a href=" {{ asset('storage/'.$demandeRejete->releve) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                        <a href="{{ route('download-releve', $demandeRejete->id ) }}" class="mt-5">Télécharger</a>
                                                                    </div>
                                                                    {{-- <div  class=" text-center">
                                                                        <span>Acte de naissance</span> <br>
                                                                        <a href=" {{ asset('storage/'.$demandeRejete->acte_naissance) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                        <a href="{{ route('download-acte', $demandeRejete->id ) }}" class="mt-5">Télécharger</a>
                                                                    </div>
                                                                    <div  class=" text-center">
                                                                        <span>Carte d'identité</span> <br>
                                                                        <a href=" {{ asset('storage/'.$demandeRejete->cni) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                                                        <a href="{{ route('download-cni', $demandeRejete->id ) }}" class="mt-5">Télécharger</a>
                                                                    </div> --}}
                                                                </div>

                                                            </div>
                                                            <a href="{{ route('demandes.pdf', $demandeRejete->id) }}"
                                                                class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                le récapitulatif</a>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End show modal code --}}

                                                        </td>
                                                    </tr>
                                                @empty
                                                    Pas de demande non valide
                                                @endforelse
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            {{-- Tabs 4 --}}
                            <div class="tab-pane fade" id="nav-attestation" role="tabpanel"
                                aria-labelledby="nav-attestation-tab">
                              
                                      
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">

                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded" type="text"
                                                    placeholder="Rechercher ..." id="generer-search-input">
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <div>
                                            <button class=" btn btn-sm fw-bold filterGenerer p-2 text-white" style="background-color:  rgba(3, 36, 151, 0.71) !important;">Filtrer &nbsp;
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                                  </svg>
    
                                            </button>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table attestation-table w-100">
                                        <thead>
                                            <th>
                                                <tr class="">
                                                    <td>Délivrée le</td>
                                                    <td>Demandée le</td>
                                                    <td>Nom & Prénom(s)</td>
                                                    <td>N° Table</td>
                                                    <td>Status</td>
                                                    <td class=" text-center">Action</td>
                                                </tr>
                                            </th>
                                        </thead>
                                        <tfoot class="d-none" id="attestationfooter">
                                            <tr class="">
                                                <td class="datevalide">date</td>
                                                <td class="datedemande">date</td>
                                                <td class="nom">nom</td>
                                                <td class="numero">n° table</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                                
                                                @forelse($demandeGenerers as $demandeGenerer)
                                                  
                                                    <tr class="" demande_id="{{ $demandeGenerer->id }}">
                                                        <td class="py-3">
                                                            {{ $demandeGenerer->updated_at->format('d-m-Y') }} à {{ $demandeGenerer->updated_at->format('H:i:s') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeGenerer->created_at->format('d-m-Y') }} à {{ $demandeGenerer->created_at->format('H:i:s') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeGenerer->nom . ' ' . $demandeGenerer->prenom }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeGenerer->numero_table }}
                                                        </td>
                                                        <td class="py-3 label-color text-danger">
                                                            Délivré
                                                        </td>
                                                        <td class=" text-center">
                                                            
                                                            @if(!is_null($demandeGenerer->attestation))

                                                                

                                                                <a href="#" title="Téléchager" class=" text-white bg-success rounded btn btn-sm " data-bs-toggle="modal"
                                                                
                                                                    data-bs-target="{{ '#downloadModal' . $demandeGenerer->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                    </svg>
                                                                </a>


                                                             {{-- Modal to download demande --}}
                                                             <div class="modal fade downloadModal"
                                                             id="{{ 'downloadModal' . $demandeGenerer->id }}"
                                                             tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-top">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirmer le code de la demande
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action=""
                                                                    method="POST" class="download-form">
                                                                    @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <div>
                                                                                    <input type="text" class=" form-control code" name="code">
                                                                                </div>
                                                                                <input type="hidden" name="demande_id" value="{{ $demandeGenerer->id }}" class="demande_id" required>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            <button type="submit"  class="btn btn-success" demande_id = "{{ $demandeGenerer->id }}" id="downloadAtt">Télécharger</button>
                                                                        </div>
                                                                        <div class="alert py-3 text-center downloadMessage" style="display:none;">
                                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                             </div>
                                                         </div>
                                                         {{-- Modal to download demande --}}
                                                            @else
                                                            Non gérérée
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @empty
                                                    Pas d'attestation générée
                                                @endforelse
                                            
                                        </tbody>
                                    </table>
                                </div>

                                
                            </div>
                            {{-- End tabs 4 --}}


                            <div class="tab-pane fade" id="nav-all" role="tabpanel"
                            aria-labelledby="nav-all-tab">
                            <div>
                                <div class="row">
                                  
                                    <div class="container-fluid d-flex justify-content-between mt-5">
                                        <div>
                                            <form action="">
    
                                                <div class="input-group border border-1 rounded">
                                                    <input class="form-control border-0 rounded" type="text"
                                                        value="Rechercher ..." id="example-search-input">
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="">
                                                <select class="form-select form-select-md mb-3 rounded"
                                                    aria-label=".form-select-lg example">
                                                    <div class="">
                                                        <option selected>Filtrer suivant ...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </div>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="">
                                        <table class="table">
                                            <th>
                                                <tr class="">
                                                    <td>Emise le</td>
                                                    <td>Nom & Prénom(s)</td>
                                                    <td>N° Table</td>
                                                   
                                                    <td>Statut</td>
                                                    <td>Action</td>
                                                </tr>
                                            </th>
                                            <tbody>
                                                
                                                
                                                    @forelse($demandeImpayes as $demandeImpaye)
                                                        <tr class="">
                                                            <td class="py-3">
                                                                {{ $demandeImpaye->created_at->format('d-m-Y') }} à {{ $demandeImpaye->created_at->format('H:i:s') }}
                                                            </td>
                                                            <td class="py-3">
                                                                {{ $demandeImpaye->nom . ' ' . $demandeImpaye->prenom }}
                                                            </td>
                                                            <td class="py-3">
                                                                {{ $demandeImpaye->numero_table }}
                                                            </td>
                                                        
                                                           
                                                           
                                                            
                                                            <td class="py-3 label-color text-danger" style="color: #CA8B11">
                                                                Non payée
                                                            </td>
                                                            <td>
                                                                <button class="rounded text-uppercase tex-white fw-bold bg-white favorite-color px-4 py-2 me-3 text-center kkiapay-button btn-pay" id="button">Payez maintenant</button>
                                                                

                                                            </td>
                                                        </tr>
                                                        <script amount=5000 firstname="{{ $demandeImpaye->prenom }}" lastname="{{ $demandeImpaye->nom }}" email="{{ $demandeImpaye->email }}" position="center" theme="#032497F5" phone="97000000"
                                                            sandbox="true" callback="{{ route("changeToPayState", ["demande" => $demandeImpaye->id]) }}"
                                                            key="0b7354b0ed5a11ec848227abfc492dc7" src="https://cdn.kkiapay.me/k.js">
                                                        </script>
                                                    @empty
                                                        Pas de demande payée
                                                    @endforelse
                                                  
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                               


                            </div>
                            
                            </div>

                        </div>

                    </div>

                    <div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('.demande-attente-table tfoot .date, .demande-attente-table tfoot .nom, .demande-attente-table tfoot .numero, .demande-attente-table tfoot .centre, .demande-attente-table tfoot .statut')
                .each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Entrer ' + title + '" />');
            });
            let demande_attente_table = $('.demande-attente-table').DataTable({

                "initComplete": function() {
                    this.api().columns().every(function(column) {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function() {

                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    })
                },

                "bFilter": true,
                "bLengthChange": false,
                "pageLength": 20,
                "sDom": 't<"pager"ip><"clear">',

                "language": {
                    "info": "_END_ sur _TOTAL_ entrées",
                    "infoEmpty": "_END_ sur _TOTAL_ entrées",
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                order: [
                    [0, "desc"]
                ],
           
            });

            let i=0;
            $('.filterAttente').click(function () {
                if(i==0){
                    $('#attentefooter').removeClass('d-none');
                    $('#attentefooter').addClass('filterfooter');
                    i++;
                }else{
                    $('#attentefooter').removeClass('filterfooter');
                    $('#attentefooter').addClass('d-none');
                    i--;
                }
            });

            $('.search-table').keyup(function () {
                demande_attente_table.search($(this).val()).draw();
            });


            $('.rejetTable tfoot .dateinvalide,.rejetTable tfoot .datedemande, .rejetTable tfoot .nom, .rejetTable tfoot .numero, .rejetTable tfoot .centre')
                .each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Entrer ' + title + '" />');
            });

            let demande_rejet_table = $('.rejetTable').DataTable({

                "initComplete": function() {
                    this.api().columns().every(function(column) {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function() {

                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    })
                },

                "bFilter": true,
                "bLengthChange": false,
                "pageLength": 20,
                "sDom": 't<"pager"ip><"clear">',

                "language": {
                    "info": "_END_ sur _TOTAL_ entrées",
                    "infoEmpty": "_END_ sur _TOTAL_ entrées",
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                order: [
                    [0, "desc"]
                ],
              
            });
            let j=0;
            $('.filterRejet').click(function () {
                if(j==0){
                    $('#rejetfooter').removeClass('d-none');
                    $('#rejetfooter').addClass('filterfooter');
                    j++;
                }else{
                    $('#rejetfooter').removeClass('filterfooter');
                    $('#rejetfooter').addClass('d-none');
                    j--;
                }
            });
            $('#rejet-search-input').keyup(function () {
                demande_rejet_table.search($(this).val()).draw();
            });









            let attestation_table = $('.attestation-table').DataTable({

            "initComplete": function() {
                this.api().columns().every(function(column) {
                    var that = this;
                    $('input', this.footer()).on('keyup change clear', function() {

                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                })
            },

            "bFilter": true,
            "bLengthChange": false,
            "pageLength": 20,
            "sDom": 't<"pager"ip><"clear">',

            "language": {
                "info": "_END_ sur _TOTAL_ entrées",
                "infoEmpty": "_END_ sur _TOTAL_ entrées",
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            },
        
            });

            $('.filterGenerer').click(function () {
                if(j==0){
                    $('#attestationfooter').removeClass('d-none');
                    $('#attestationfooter').addClass('filterfooter');
                    j++;
                }else{
                    $('#attestationfooter').removeClass('filterfooter');
                    $('#attestationfooter').addClass('d-none');
                    j--;
                }
            });
            $('#generer-search-input').keyup(function () {
                attestation_table.search($(this).val()).draw();
            });
            $('.attestation-table tfoot .datevalide,.attestation-table tfoot .datedemande, .attestation-table tfoot .nom, .attestation-table tfoot .numero')
                .each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Entrer ' + title + '" />');
            });



            $('.download-form').submit(function(e){

                e.preventDefault();

                let code = $(this).find('input.code').val();

                 

                let id = $(this).parents('tr').attr('demande_id');
                let errorMessage ="";

                $.ajax({
                    type:"GET",
                    url: '{!! URL::to('downloadAttestation') !!}',
                    data:{
                        'code':code,
                        'demande_id':id,
                        _token :"{{ csrf_token() }}"
                    },
                    success : function (data){
                        console.log(data);

                        if(data.code ==500){

                            $('.downloadMessage').addClass('alert-danger');
                            $('.downloadMessage').text(data.message);
                            $('.downloadMessage').css('display', 'block');
                            $('.downloadMessage').delay(1000).slideUp(200, function(){
                                $(this).css('display', 'none');
                            });
                        }else{
                            $('.downloadMessage').removeClass('alert-danger');
                            $('.downloadMessage').addClass('alert-success');
                            $('.downloadMessage').text(data.message);
                            $('.downloadMessage').css('display', 'block');
                            $('.downloadMessage').delay(1000).slideUp(200, function(){
                                $(this).css('display', 'none');
                            });

                            setTimeout(() => {
                                $('.downloadModal').modal('hide');
                            }, 1000);
                            var url = "{{ route('downloadDocument', ['id' => ':id']) }}".replace(':id', data.id);
                            window.location.replace(url);
                            //window.location.href="localhost:8000/downloadDocument/"+data.id;
                            //$('#download').trigger('click'); 
                        }
                    }
                });
            })
        });


    </script>
@endsection
