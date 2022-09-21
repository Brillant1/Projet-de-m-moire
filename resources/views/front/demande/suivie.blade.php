@extends('front.layouts.template')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">
        <div>
            <div class="d-flex justify-content-center flex-column"
                style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 300px;">
                <h2 class="text-white ms-5 fw-bold" style="line-height:50px;">
                    Suivez ici les demandes que vous avez effectués jusqu'à ce <br> que votre attestation ne soit
                    disponible.
                </h2>
            </div>
            <div class="carousel-inner" style="height:300px;">
                <div class="carousel-item active" style="height:300px;">
                    <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>

            <div class="container-fluid">
                <div class="container ">

                    <p class="text-center fs-2 mt-5 fw-bold">Récapitulatif des demandes</p>

                    @if (session('deletedMessage'))
                        <div class="alert alert-success">
                            <h6> {{ session('deletedMessage') }} </h6>
                        </div>
                    @endif

                    @if (session('addedDemandeMessage'))
                        <div class="alert alert-success">
                            <h6> {{ session('addedDemandeMessage') }} </h6>
                        </div>
                    @endif

                    @if (Session::has('paymentSuccessMessage'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                            {{ Session::get('paymentSuccessMessage') }}</p>
                    @endif

                    <div class="d-flex justify-content-between mt-5 fw-bold">
                        <p class="fs-4">Liste des demandes</p>
                        <a href="{{ route('demandes.create') }}"
                            class="px-5 rounded text-white fw-bold py-2 rosette-bg-green d-flex justify-content-center align-items-center">Faire
                            une demande</a>

                    </div>

                    <div class="mt-5">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Toutes mes demandes faites</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#navprofile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Demande(s) en attente</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Demande(s) validée(s)</button>

                                <button class="nav-link" id="nav-attestation-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-attestation" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">Mes attestations</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            {{-- Tabs 1 --}}
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

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
                                                <td>Date</td>
                                                <td>Nom & Prénoms</td>
                                                <td>Collège</td>
                                                {{-- <td>Dprt du collège</td> --}}
                                                {{-- <td>Commune</td> --}}
                                                <td>N* de Table </td>
                                                <td>Status</td>
                                                {{-- <td>Paiement</td>
                                                <th>Alertes</th> --}}
                                                <td class=" ps-5 ">Action</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @if (count($demandes))
                                                @foreach ($demandes as $demande)
                                                    <tr class="">
                                                        <td class="py-3">{{ $demande->created_at->format('d-m-Y') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demande->nom . ' ' . $demande->prenom }}
                                                        </td>
                                                        <td class="py-3">{{ $demande->centre }}</td>
                                                        {{-- <td class="py-3">{{ $demande->departement }}</td> --}}
                                                        {{-- <td class="py-3">{{ $demande->commune }}</td> --}}
                                                        <td class="py-3">{{ $demande->numero_table }}</td>
                                                        <td class="py-3 label-color">{{ $demande->statut_demande }}</td>
                                                        {{-- <td class="py-3 label-color">
                                                           {{ $demande->statut_payement }}
                                                        </td> --}}
                                                        {{-- <td>{{$demande->id}}</td> --}}

                                                        <td class="py-3">
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
                                                           
                                                            <a href="#" class="btn btn-sm "
                                                                title="Supprimer la demande" data-bs-toggle="modal"
                                                                data-bs-target="{{ '#deleteModal' . $demande->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                    height="35" fill="red" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                                            </a>
                                                            {{-- Modal to delete demande --}}
                                                            <div class="modal fade"
                                                                id="{{ 'deleteModal' . $demande->id }}"
                                                                tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-centered">
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

                                                            {{-- show demande's messages to user --}}
                                                            <button class="btn btn-sm" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="green"
                                                                    class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                                    <path
                                                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                            </button>

                                                            
                                                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                                                <button type="button" class="btn-close text-reset ms-2 mt-2" data-bs-dismiss="offcanvas"
                                                                    aria-label="Close"></button>
                                                                <div class="offcanvas-header">
                                                            
                                                                    <h5 id="offcanvasRightLabel">Messages de
                                                                        l'administration</h5>
                                                            
                                                                </div>
                                                                <div class="offcanvas-body">
                                                            
                                                                    @if ($demande->statut_payement == 'non_payer')
                                                                        <p class="text-danger">Vous n'avez pas encore
                                                                            payer pour cette demande</p>
                                                                        <a href="#" class="btn btn-sm btn-success float-center mt-2" style="margin-left: 25%;">Payer
                                                                            maintenant</a>
                                                                    @endif
                                                                    

                                                                    {{-- @foreach ($demande->alertes as $alerte)
                                                                        <div class="card mt-5">
                                                                            <div class="card-header bg-favorite-color text-white fw-bold">
                                                                                {{ $alerte->sujet }}
                                                                            </div>
                                                                            <div class="card-body">
                                                                
                                                                                <p class="card-text mt-3">
                                                                                    {{ $alerte->message }}</p>
                                                                
                                                                            </div>
                                                                            <div class="card-footer mt-2">
                                                                                <a class=" favorite-color ">{{ $alerte->created_at->format('d-m-Y') }}</a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach --}}
                                                                </div>
                                                            </div>
                                                               
                                                            {{-- <div class=" collapse " id="{{'alerteMessage'. $demande->id}}" style="margin-left: 50px;">
                                                                <div class="p-3 shadow message-collapse rounded" >  </button>
                                                                     
    
                                                                    <p>Messages de l'administrtaton</p>
    
                                                                    @if (count($demande->alertes))
                                                                        
                                                                    
                                                                    @foreach ($demande->alertes as $alerte)
                                                                        <div class="card mt-5">
                                                                            <div
                                                                                class="card-header bg-favorite-color text-white fw-bold">
                                                                                {{ $alerte->sujet }}
                                                                            </div>
                                                                            <div class="card-body">
    
                                                                                <p class="card-text mt-3">
                                                                                    {{ $alerte->message }}</p>
    
                                                                            </div>
                                                                            <div class="card-footer mt-2">
                                                                                <a
                                                                                    class=" favorite-color ">{{ $alerte->created_at->format('d-m-Y') }}</a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <p>Encore aucun message pour cette demande</p>
                                                                    @endif
                                                                </div>
                                                            </div> --}}

                                                        </td>

                                                       
                                                    </tr>

                                                    {{-- Show modal code --}}

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

                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between pt-3">

                                                                            <p>Nom :</p>
                                                                            <p class="">{{ $demande->nom }}</p>

                                                                        </div>

                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between ">

                                                                            <p>Prénom :</p>
                                                                            <p class="">{{ $demande->prenom }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Date de naissance :</p>
                                                                            <p>{{ $demande->date_naissance }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="">Nom du collège :</p>
                                                                            <p>{{ $demande->centre }}</p>

                                                                        </div>
                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Contact du candidat :</p>
                                                                            <p>{{ $demande->contact }}</p>

                                                                        </div>
                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Numero de table :</p>
                                                                            <p>{{ $demande->numero_table }}</p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Informations sur le diplôme</p>

                                                                        <div
                                                                            class=" pt-3 row-info container-fluid  d-flex justify-content-between ">

                                                                            <p>Année d'obtention du diplôme :</p>
                                                                            <p>{{ $demande->annee_obtention }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Série d'examen :</p>
                                                                            <p>{{ $demande->serie }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Numero de référence :</p>
                                                                            <p>{{ $demande->numero_reference }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                            <p>Centre de composition :</p>
                                                                            <p>{{ $demande->centre }}</p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Autres informations utiles</p>

                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Commune du centre :</p>
                                                                            <p>{{ $demande->commune }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Département :</p>
                                                                            <p>{{ $demande->departement }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Nom du père :</p>
                                                                            <p>{{ $demande->nom_pere }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Nom de la mère :</p>
                                                                            <p>{{ $demande->nom_mere }}</p>

                                                                        </div>

                                                                    </div>
                                                                    <a href="{{ route('demandes.pdf') }}"
                                                                        class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                        le récapitulatif</a>
                                                                    <div class="modal-footer">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End show modal code --}}
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            {{-- end tabs 1 --}}


                            {{-- Tabs 2 --}}

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">

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
                                                <td>Date</td>
                                                <td>Nom & Prénoms</td>
                                                <td>Collège</td>
                                                {{-- <td>Dprt du collège</td> --}}
                                                {{-- <td>Commune</td> --}}
                                                <td>N* de Table </td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @if (count($demandeNonValides))
                                                @foreach ($demandeNonValides as $demandeNonValide)
                                                    <tr class="">
                                                        <td class="py-3">
                                                            {{ $demandeNonValide->created_at->format('d-m-Y') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeNonValide->nom . ' ' . $demandeNonValide->prenom }}
                                                        </td>
                                                        <td class="py-3">{{ $demandeNonValide->centre }}</td>
                                                        {{-- <td class="py-3">{{ $demandeNonValide->departement }}</td> --}}
                                                        {{-- <td class="py-3">{{ $demandeNonValide->commune }}</td> --}}
                                                        <td class="py-3">{{ $demandeNonValide->numero_table }}</td>
                                                        <td class="py-3 label-color">
                                                            {{ $demandeNonValide->statut_demande }}
                                                        </td>
                                                        <td class="py-3">

                                                            <a title="Consulter le résultat"
                                                                href="{{ route('demandes.show', ['demande' => $demandeNonValide->id]) }}"
                                                                class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                                data-bs-target="{{ '#showModal' . $demandeNonValide->id }}"
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

                                                            <a href="{{ route('demandes.edit', ['demande' => $demandeNonValide->id]) }}"
                                                                title="Editer le résultat"
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
                                                            <a
                                                                href="{{ route('demandes.destroy', ['demande' => $demandeNonValide->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                    height="35" fill="red" class="bi bi-x"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                                            </a>

                                                            <a href="" title="Info de la demande">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                    height="35" fill="yellow"
                                                                    class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                                    <path
                                                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                            </a>

                                                        </td>
                                                    </tr>

                                                    {{-- Show modal code --}}

                                                    <div class="modal fade container-fluid"
                                                        id="{{ 'showModal' . $demandeNonValide->id }}" tabindex="-1">
                                                        <div class="modal-dialog" style="max-width: 60%">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Récapitulatif de la demande
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div
                                                                    class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                                    {{-- tab modal body --}}
                                                                    <img src="{{ 'storage/' . $demandeNonValide->photo }}"
                                                                        alt="" width="600" height="400"
                                                                        style="object-fit: cover;">
                                                                    <div class="container mt-2">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Informations personnelles du candidat</p>

                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between pt-3">

                                                                            <p>Nom :</p>
                                                                            <p class="">
                                                                                {{ $demandeNonValide->nom }}</p>

                                                                        </div>

                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between ">

                                                                            <p>Prénom :</p>
                                                                            <p class="">
                                                                                {{ $demandeNonValide->prenom }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Date de naissance :</p>
                                                                            <p>{{ $demandeNonValide->date_naissance }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p class="">Nom du collège :</p>
                                                                            <p>{{ $demandeNonValide->centre }}</p>

                                                                        </div>
                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Contact du candidat :</p>
                                                                            <p>{{ $demandeNonValide->contact }}</p>

                                                                        </div>

                                                                    </div>
                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Informations sur le diplôme</p>
                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Numero de table :</p>
                                                                            <p>{{ $demandeNonValide->numero_table }}</p>

                                                                        </div>

                                                                        <div
                                                                            class=" pt-3 row-info container-fluid  d-flex justify-content-between ">

                                                                            <p>Année d'obtention du diplôme :</p>
                                                                            <p>{{ $demandeNonValide->annee_obtention }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Série d'examen :</p>
                                                                            <p>{{ $demandeNonValide->serie }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Numero de référence :</p>
                                                                            <p>{{ $demandeNonValide->numero_reference }}
                                                                            </p>

                                                                        </div>
                                                                        <div
                                                                            class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                            <p>Centre de composition :</p>
                                                                            <p>{{ $demandeNonValide->centre }}</p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="container">
                                                                        <p
                                                                            class="section-title text-center first-color py-2 mt-5">
                                                                            Autres informations utiles</p>

                                                                        <div
                                                                            class=" row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Commune du centre :</p>
                                                                            <p>{{ $demandeNonValide->commune }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Département :</p>
                                                                            <p>{{ $demandeNonValide->departement }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Nom du père :</p>
                                                                            <p>{{ $demandeNonValide->nom_pere }}</p>

                                                                        </div>
                                                                        <div
                                                                            class="row-info container-fluid  d-flex justify-content-between">

                                                                            <p>Nom de la mère :</p>
                                                                            <p>{{ $demandeNonValide->nom_mere }}</p>

                                                                        </div>

                                                                    </div>
                                                                    <a href="{{ route('demandes.pdf') }}"
                                                                        class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                    </a>
                                                                    <div class="modal-footer">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End show modal code --}}
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- end tabs2 --}}


                            {{-- Tabs 3 --}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
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
                                                <td>Date</td>
                                                <td>Nom & Prénoms</td>
                                                <td>Collège</td>
                                                {{-- <td>Dprt du collège</td> --}}
                                                <td>Commune</td>
                                                <td>N* de Table </td>
                                                <td>Status</td>
                                                <td>Messages</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @if (count($demandeValides))
                                                @foreach ($demandeValides as $demandeValide)
                                                    <tr class="">
                                                        <td class="py-3">
                                                            {{ $demandeValide->created_at->format('d-m-Y') }}
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $demandeValide->nom . ' ' . $demandeValide->prenom }}
                                                        </td>
                                                        <td class="py-3">{{ $demandeValide->centre }}</td>
                                                        {{-- <td class="py-3">{{ $demandeValide->departement }}</td> --}}
                                                        <td class="py-3">{{ $demandeValide->commune }}</td>
                                                        <td class="py-3">{{ $demandeValide->numero_table }}</td>
                                                        <td class="py-3 label-color">
                                                            {{ $demandeValide->statut_demande }}
                                                        </td>
                                                        <td class="py-3">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- end tabs3 --}}

                            {{-- Tabs 4 --}}
                            <div class="tab-pane fade" id="nav-attestation" role="tabpanel"
                                aria-labelledby="nav-attestation-tab">
                                ------------------
                                ..................
                            </div>
                            {{-- End tabs 4 --}}

                        </div>

                    </div>

                    <div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
