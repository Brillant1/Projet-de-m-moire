@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">demandes</a></li>
                <li class="breadcrumb-item active">Liste demande</li>
                </li>
            </ol>
        </nav>
    </div>

    <div class="tile">
        <div class="tile-body">
            @if (session('updatedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ session('updatedMessage') }} </h3>
                </div>
            @endif
            @if (session('deletedMessage'))
                <div class="alert alert-danger mb-3">
                    <h6> {{ session('deletedMessage') }} </h3>
                </div>
            @endif
            <div class="text-center my-3 alert bg-warning">
                <h4 class="text-white font-italic fw-bold">Liste des demandes</h4>
            </div>
            <div class="text-center mb-4 d-flex justify-content-end">
                <a class="btn btn-success p-2 fw-bold text-white" href=" {{ route('demandes.create') }} ">Ajouter un
                    nouveau</a>
            </div>


        </div>
    </div>
    <div class="shadow p-5" style="border-radius: 10px;">
        <style>
            .info-perso-item {
                display: flex;
                justify-content: space-between
            }

            .first-color {
                background: #032497F5;
            }

            .section-title {
                color: white;
                background: rgba(3, 36, 151, 0.96);
                border-radius: 5px;
                font-size: 1.3rem;
                width: 100%;
            }

            .row-info>p:last-child {
                width: 40%;
                color: #CD101B;
                font-size: 1.2rem;
            }

            .row-info>p:first-child {
                width: 60%;
                font-size: 1.2rem;
            }

            label {}

        </style>
        <div class="">
            <div class="d-flex justify-content-center flex-column align-items-center">
                <img src="{{ asset('storage/' . $demande->photo) }}" alt="" width="700" style="object-fit: cover;">
                <div class="container mt-2">
                    <p class="section-title text-center first-color py-2 mt-5">Informations personnelles du demande</p>

                    <div class="row-info container-fluid  d-flex justify-content-between pt-3">
                        <p>Nom :</p>
                        <p class="">{{ $demande->nom }}</p>
                    </div>

                    <div class="row-info container-fluid  d-flex justify-content-between ">

                        <p>Prénom :</p>
                        <p class="">{{ $demande->prenom }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">

                        <p>Date de naissance :</p>
                        <p>{{ $demande->date_naissance }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">

                        <p class="">Nom du collège :</p>
                        <p>{{ $demande->centre }}</p>

                    </div>
                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Contact du demande :</p>
                        <p>{{ $demande->contact }}</p>

                    </div>
                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Numero de table :</p>
                        <p>{{ $demande->numero_table }}</p>

                    </div>

                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Examen :</p>
                        <p>{{ $demande->type_examen }}</p>

                    </div>
                    
                </div>
                <div class="container">
                    <p class="section-title text-center first-color py-2 mt-5">Informations sur le diplôme</p>

                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">

                        <p>Année d'obtention du diplôme :</p>
                        <p>{{ $demande->annee_obtention }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">

                        <p>Série d'examen :</p>
                        <p>{{ $demande->serie }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">

                        <p>Numero de référence :</p>
                        <p>{{ $demande->numero_reference }}</p>

                    </div>



                </div>

                <div class="container">
                    <p class="section-title text-center first-color py-2 mt-5">Autres informations utiles</p>

                    <div class="pt-3 row-info container-fluid  d-flex justify-content-between">

                        <p>Centre de composition :</p>
                        <p>{{ $demande->centre }}</p>

                    </div>
                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Commune du centre :</p>
                        <p>{{ $demande->commune }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">

                        <p>Département :</p>
                        <p>{{ $demande->departement }}</p>

                    </div>


                </div>
            </div>
            <p class="mt-4 ms-5 fs-5">
                @if ($candidatAdmis)
                    Après vérification des informations à notre porté, le candidat <strong> {{ $candidatAdmis->nom }}
                        {{ $candidatAdmis->prenom }} </strong> né le <strong>{{ $candidatAdmis->date_naissance }}</strong>
                    à <strong> {{ $demande->ville_naissance }} </strong> est supposé admis
                    aux examens du {{ $candidatAdmis->examen }} série {{ $candidatAdmis->serie }}
                    {{ $candidatAdmis->annee_obtention }} et est identifié par le matricule
                    <strong>{{ $candidatAdmis->numero_table }}</strong>.
                    Il a composé au centre du <strong> {{ $candidatAdmis->centre->nom }} </strong>, dans la commune de
                    <strong>{{ $candidatAdmis->centre->commune->nom }} </strong>dans le département des
                    <strong>{{ $candidatAdmis->centre->commune->departement->nom }} </strong>. Procéder aux vérifications
                    manuelles pour toutes décisions.
                @else
                    Nous n'avons pas retrouvé ce candidat dans les candidats éligibles.
                    Veillez procéder à une vérification manuelle pour toute décision.
                @endif
            </p>
            <div class=" d-flex justify-content-start mt-5">
                <div class=" d-flex justify-content-between align-items-center ms-5">
                    <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-5" data-bs-toggle="modal"
                        data-bs-target="{{ '#invalidModal' . $demande->nom }}"> Rejeter
                    </button>
                    <a href="#" class="btn btn-primary btn-lg px-5 ms-3">Alerter</a>
                    <a href="#" class="btn btn-success btn-lg px-5 ms-3">Valider</a>

                    {{-- modal to alert user about invalid demand --}}
                    <div class="modal fade" id="{{ 'invalidModal' . $demande->nom }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header d-flex flex-column-reverse">

                                    <h5 class="modal-title pb-1">Donner aux candidats les raisons du rejet de sa demande.
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('alertInvalidDemande', ['demande' => $demande->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Message au demandeur
                                                {{ $demande->nom . ' ' . $demande->prenom }}</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                            <input type="hidden" name=" demande_id" value="{{ $demande->id }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Annuler</button>
                                        <input type="submit" class="btn btn-primary" value="Envoyer">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}


                </div>
            </div>
        </div>

    </div>
@endsection
