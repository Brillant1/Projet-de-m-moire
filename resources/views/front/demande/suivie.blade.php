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

                    <div class="d-flex justify-content-between mt-5 fw-bold">
                        <p class="fs-4">Liste des demandes</p>
                        <a href="{{ route('demandes.create') }}"
                            class="px-5 rounded text-white fw-bold py-3 rosette-bg-green">Faire une
                            demande</a>
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
                                                <input class="form-control border-0 rounded" type="text" value="Rechercher ..."
                                                    id="example-search-input">
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
                                                <td>Action</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @foreach ($demandes as $demande)
                                                <tr class="">
                                                    <td class="py-3">{{ $demande->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="py-3">
                                                        {{ $demande->nom . ' ' . $demande->prenom }}
                                                    </td>
                                                    <td class="py-3">{{ $demande->centre }}</td>
                                                    {{-- <td class="py-3">{{ $demande->departement }}</td> --}}
                                                    <td class="py-3">{{ $demande->commune }}</td>
                                                    <td class="py-3">{{ $demande->numero_table }}</td>
                                                    <td class="py-3 label-color">{{ $demande->statut_demande }}</td>
                                                    <td class="py-3">
        
                                                        <a title="Consulter le résultat"
                                                            href="{{ route('demandes.show', ['demande' => $demande->id]) }}"
                                                            class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                            data-bs-target="{{ '#showModal' . $demande->id }}" title="Consulter">
        
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                        </a>
        
                                                        <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}"
                                                            title="Editer le résultat" class="btn btn-sm text-success ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('demandes.destroy', ['demande' => $demande->id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                                fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
        
                                                    </td>
                                                </tr>
        
                                                {{-- Show modal code --}}
        
                                                <div class="modal fade container-fluid" id="{{ 'showModal' . $demande->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog" style="max-width: 60%">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Récapitulatif de la demande</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div
                                                                class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                                {{-- tab modal body --}}
                                                                <img src="{{ 'storage/' . $demande->photo }}" alt="" width="600"
                                                                    height="400" style="object-fit: cover;">
                                                                <div class="container mt-2">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
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
                                                                    <p class="section-title text-center first-color py-2 mt-5">
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
                                                                    <p class="section-title text-center first-color py-2 mt-5">
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
                                                                <a href=""
                                                                    class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                    le récapitulatif</a>
                                                                <div class="modal-footer">
        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    {{-- End show modal code --}}
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                            {{-- end tabs 1 --}}


                            {{-- Tabs 2 --}}
                           
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">
        
                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded" type="text" value="Rechercher ..."
                                                    id="example-search-input">
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
                                                <td>Action</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @foreach ($demandeNonValides as $demandeNonValide)
                                            
                                                <tr class="">
                                                    <td class="py-3">{{ $demandeNonValide->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="py-3">
                                                        {{ $demandeNonValide->nom . ' ' . $demandeNonValide->prenom }}
                                                    </td>
                                                    <td class="py-3">{{ $demandeNonValide->centre }}</td>
                                                    {{-- <td class="py-3">{{ $demandeNonValide->departement }}</td> --}}
                                                    <td class="py-3">{{ $demandeNonValide->commune }}</td>
                                                    <td class="py-3">{{ $demandeNonValide->numero_table }}</td>
                                                    <td class="py-3 label-color">{{ $demandeNonValide->statut_demande }}</td>
                                                    <td class="py-3">
        
                                                        <a title="Consulter le résultat"
                                                            href="{{ route('demandes.show', ['demande' => $demandeNonValide->id]) }}"
                                                            class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                            data-bs-target="{{ '#showModal' . $demandeNonValide->id }}" title="Consulter">
        
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                        </a>
        
                                                        <a href="{{ route('demandes.edit', ['demande' => $demandeNonValide->id]) }}"
                                                            title="Editer le résultat" class="btn btn-sm text-success ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('demandes.destroy', ['demande' => $demandeNonValide->id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                                fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
        
                                                    </td>
                                                </tr>
        
                                                {{-- Show modal code --}}
        
                                                <div class="modal fade container-fluid" id="{{ 'showModal' . $demandeNonValide->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog" style="max-width: 60%">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Récapitulatif de la demande</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div
                                                                class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                                {{-- tab modal body --}}
                                                                <img src="{{ 'storage/' . $demandeNonValide->photo }}" alt="" width="600"
                                                                    height="400" style="object-fit: cover;">
                                                                <div class="container mt-2">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
                                                                        Informations personnelles du candidat</p>
        
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between pt-3">
        
                                                                        <p>Nom :</p>
                                                                        <p class="">{{ $demandeNonValide->nom }}</p>
        
                                                                    </div>
        
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between ">
        
                                                                        <p>Prénom :</p>
                                                                        <p class="">{{ $demandeNonValide->prenom }}
                                                                        </p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Date de naissance :</p>
                                                                        <p>{{ $demandeNonValide->date_naissance }}</p>
        
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
                                                                    <div
                                                                        class=" row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Numero de table :</p>
                                                                        <p>{{ $demandeNonValide->numero_table }}</p>
        
                                                                    </div>
                                                                </div>
                                                                <div class="container">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
                                                                        Informations sur le diplôme</p>
        
                                                                    <div
                                                                        class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
        
                                                                        <p>Année d'obtention du diplôme :</p>
                                                                        <p>{{ $demandeNonValide->annee_obtention }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Série d'examen :</p>
                                                                        <p>{{ $demandeNonValide->serie }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Numero de référence :</p>
                                                                        <p>{{ $demandeNonValide->numero_reference }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                        <p>Centre de composition :</p>
                                                                        <p>{{ $demandeNonValide->centre }}</p>
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="container">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
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
                                                                <a href=""
                                                                    class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                    le récapitulatif</a>
                                                                <div class="modal-footer">
        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    {{-- End show modal code --}}
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--end tabs2 --}} 
                            

                            {{-- Tabs 3 --}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="container-fluid d-flex justify-content-between mt-5">
                                    <div>
                                        <form action="">
        
                                            <div class="input-group border border-1 rounded">
                                                <input class="form-control border-0 rounded" type="text" value="Rechercher ..."
                                                    id="example-search-input">
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
                                                <td>Action</td>
                                            </tr>
                                        </th>
                                        <tbody>
                                            @foreach ($demandeValides as $demandeValide)
                                            
                                                <tr class="">
                                                    <td class="py-3">{{ $demandeValide->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="py-3">
                                                        {{ $demandeValide->nom . ' ' . $demandeValide->prenom }}
                                                    </td>
                                                    <td class="py-3">{{ $demandeValide->centre }}</td>
                                                    {{-- <td class="py-3">{{ $demandeValide->departement }}</td> --}}
                                                    <td class="py-3">{{ $demandeValide->commune }}</td>
                                                    <td class="py-3">{{ $demandeValide->numero_table }}</td>
                                                    <td class="py-3 label-color">{{ $demandeValide->statut_demande }}</td>
                                                    <td class="py-3">
        
                                                        <a title="Consulter le résultat"
                                                            href="{{ route('demandes.show', ['demande' => $demandeValide->id]) }}"
                                                            class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                            data-bs-target="{{ '#showModal' . $demandeValide->id }}" title="Consulter">
        
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                        </a>
        
                                                        <a href="{{ route('demandes.edit', ['demande' => $demandeValide->id]) }}"
                                                            title="Editer le résultat" class="btn btn-sm text-success ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('demandes.destroy', ['demande' => $demandeValide->id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                                fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
        
                                                    </td>
                                                </tr>
        
                                                {{-- Show modal code --}}
        
                                                <div class="modal fade container-fluid" id="{{ 'showModal' . $demandeValide->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog" style="max-width: 60%">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Récapitulatif de la demande</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div
                                                                class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                                {{-- tab modal body --}}
                                                                <img src="{{ 'storage/' . $demandeValide->photo }}" alt="" width="600"
                                                                    height="400" style="object-fit: cover;">
                                                                <div class="container mt-2">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
                                                                        Informations personnelles du candidat</p>
        
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between pt-3">
        
                                                                        <p>Nom :</p>
                                                                        <p class="">{{ $demandeValide->nom }}</p>
        
                                                                    </div>
        
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between ">
        
                                                                        <p>Prénom :</p>
                                                                        <p class="">{{ $demandeValide->prenom }}
                                                                        </p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Date de naissance :</p>
                                                                        <p>{{ $demandeValide->date_naissance }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p class="">Nom du collège :</p>
                                                                        <p>{{ $demandeValide->centre }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class=" row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Contact du candidat :</p>
                                                                        <p>{{ $demandeValide->contact }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class=" row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Numero de table :</p>
                                                                        <p>{{ $demandeValide->numero_table }}</p>
        
                                                                    </div>
                                                                </div>
                                                                <div class="container">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
                                                                        Informations sur le diplôme</p>
        
                                                                    <div
                                                                        class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
        
                                                                        <p>Année d'obtention du diplôme :</p>
                                                                        <p>{{ $demandeValide->annee_obtention }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Série d'examen :</p>
                                                                        <p>{{ $demandeValide->serie }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Numero de référence :</p>
                                                                        <p>{{ $demandeValide->numero_reference }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="pt-3 row-info container-fluid  d-flex justify-content-between">
                                                                        <p>Centre de composition :</p>
                                                                        <p>{{ $demandeValide->centre }}</p>
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="container">
                                                                    <p class="section-title text-center first-color py-2 mt-5">
                                                                        Autres informations utiles</p>
        
                                                                    <div
                                                                        class=" row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Commune du centre :</p>
                                                                        <p>{{ $demandeValide->commune }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Département :</p>
                                                                        <p>{{ $demandeValide->departement }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Nom du père :</p>
                                                                        <p>{{ $demandeValide->nom_pere }}</p>
        
                                                                    </div>
                                                                    <div
                                                                        class="row-info container-fluid  d-flex justify-content-between">
        
                                                                        <p>Nom de la mère :</p>
                                                                        <p>{{ $demandeValide->nom_mere }}</p>
        
                                                                    </div>
        
                                                                </div>
                                                                <a href=""
                                                                    class="rosette-bg-green fw-bold text-white px-4 rounded py-2 mt-5">Télécharger
                                                                    le récapitulatif</a>
                                                                <div class="modal-footer">
        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    {{-- End show modal code --}}
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--end tabs3 --}}
                        </div>

                    </div>

                    <div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
