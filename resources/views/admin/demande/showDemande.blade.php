@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        <h1 class="mt-2">Dashboard</h1>
        <nav class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Demandes</a></li> &nbsp; /
                <li class="breadcrumb-item"><a href="{{ route('listeDemande') }}">Listes des demandes</a></li> &nbsp; /
                <li class="breadcrumb-item active">Détails de la demande</li>
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

            <div class="text-center mb-4 d-flex justify-content-between">
                <a class="btn btn-secondary py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                href=" {{ URL::previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                  </svg>&nbsp;
                Retour</a>
                <div>
                    @if ($demande->statut_demande == 'valider')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success px-2 py-1 me-3"
                            data-bs-toggle="modal" data-bs-target="{{ '#genererModalDemande' . $demande->id }}"> Générer attestation
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success px-3 py-1 me-3"
                            data-bs-toggle="modal" data-bs-target="{{ '#validModal' . $demande->id  }}"> Approuvée
                        </button>

                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Alerter
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'non_payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Alerter
                        </button>
                    @endif

                    @if($demande->statut_demande=='generer')
                        <p class="text-danger fw-bold">Demande déjà validée</p>
                    @endif
                </div>

            </div>
            @if (session('changeStateMessage'))
                <div class="alert alert-success text-center container-fluid  my-3 d-flex justify-content-between">
                    <h5> {{ session('changeStateMessage') }} </h5>
                </div>
            @endif
            @if (session('alreadyChangeStateMessage'))
                <div class="alert alert-info text-center container-fluid  my-3 d-flex justify-content-between">
                    <h5> {{ session('alreadyChangeStateMessage') }} </h5>
                    <a href="{{ route('attestation', ['demande' => $demande->id]) }}"
                        class="btn btn-success rounded px-3 text-white"> Générer l'attestation</a>
                </div>
            @endif
            @if (session('changeStateTogenerer'))
                <div class="alert alert-info text-center container-fluid  my-3 d-flex justify-content-between">
                    <h5> {{ session('changeStateTogenerer') }} </h5>
                </div>
            @endif
            @if (session('invalidDemandeMessage'))
                <div class="alert alert-info text-center container-fluid  my-3 d-flex justify-content-between">
                    <h5> {{ session('invalidDemandeMessage') }} </h5>
                </div>
            @endif


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

            <div class="container">

                @if ($demande->statut_payement == 'non_payer')
                    <p class="alert alert-danger fs-6 mt-4 text-center fw-bold">{{ $demande->nom.' '.$demande->prenom }} n'a pas encore payé pour sa demande.
                        Vous l'alerterez peut-être pour le lui en rappeler
                    </p>
                @else
                <p class="alert alert-success fs-6 mt-5 text-center fw-bold">{{ $demande->nom.' '.$demande->prenom }} 
                    a payé un montant de 5000F pour cette demande le {{ $demande->updated_at->format('d-m-Y') }}. Solde délivré du compte de Esaie TCHAGNONSI. ID de la transaction : {{ $demande->kkiapayPayement_id }}  
                </p>
                @endif
            </div>


            {{-- Main content info de la demande --}}
            <div class="d-flex justify-content-center flex-column align-items-center">
                
                
                <img src="{{ asset('storage/photo_candidat_demande/'. $demande->photo) }}" alt="" width="700"
                    style="object-fit: cover;">
                <div class="container mt-2">
                    <p class="section-title text-center first-color py-2 mt-5">Informations personnelles du demandeur</p>

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

                        <p class="">Adresse mail :</p>
                        <p>{{ $demande->email }}</p>

                    </div>
                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Contact téléphonique :</p>
                        <p>{{ $demande->contact }}</p>

                    </div>
                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Ville de naissance :</p>
                        <p>{{ $demande->ville_naissance }}</p>

                    </div>

                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Sexe :</p>
                        <p>{{ $demande->sexe }}</p>

                    </div>

                </div>
                <div class="container">
                    <p class="section-title text-center first-color py-2 mt-5">Informations sur le diplôme demandé</p>


                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        <p>Centre de composition :</p>
                        <p>{{ $demande->centre }}</p>

                    </div>

                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Commune du centre :</p>
                        <p>{{ $demande->commune }}</p>

                    </div>
                    
                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        <p>Etablissement fréquenté :</p>
                        <p>{{ $demande->etablissement }}</p>

                    </div>

                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        <p>Numero de table:</p>
                        <p>{{ $demande->annee_obtention }}</p>

                    </div>

                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        <p>Série de l'examen :</p>
                        <p>{{ $demande->serie}}</p>

                    </div>

                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        <p>Année d'obtention du diplôme :</p>
                        <p>{{ $demande->annee_obtention }}</p>

                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">
                        <p>Jury d'examen :</p>
                        <p>{{ $demande->jury }}</p>
                    </div>
                    <div class="row-info container-fluid  d-flex justify-content-between">
                        <p>Numero de référence :</p>
                        <p>{{ $demande->numero_reference }}</p>
                    </div>
                </div>

                <div class="container mb-4">
                    <p class="section-title text-center first-color py-2 mt-5">Autres informations utiles</p>

                    <div class="pt-3 row-info container-fluid  d-flex justify-content-between">

                        <p>Nom du père :</p>
                        <p>{{ $demande->nom_pere }}</p>

                    </div>
                   
                    <div class="row-info container-fluid d-flex justify-content-between">

                        <p>Nom de la mère :</p>
                        <p>{{ $demande->nom_mere }}</p>

                    </div>

                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Contact des parents :</p>
                        <p>{{ $demande->contact_parent }}</p>

                    </div>
                </div>
               
                
                <div class="container mt-4">
                
                   
                    <iframe src="{{  asset('storage/'.$demande->releve) }}" width="100%" height="1000">Visualiser</iframe>
                    <a href="{{ route('dowload',$demande->id)}}" class="btn btn-success btn-group-sm rounded px-4 fs-5 fw-bold float-end mt-3" >Télécharger</a>

                </div>
            </div>
             {{--End Main content info de la demande --}}

            <p class="mt-5 ms-5 fs-5 fw-bold text-dark text-start">
                @if (count($candidatAdmis) > 0)
                    @foreach ($candidatAdmis as $candidatAdmis)
                        Après vérification des informations à notre portée, le candidat <strong>
                            {{ $candidatAdmis->nom }}
                            {{ $candidatAdmis->prenom }} </strong> né le
                        <strong>{{ $candidatAdmis->date_naissance }}</strong>
                        à <strong> {{ $demande->ville_naissance }} </strong> est supposé admis
                        aux examens du {{ $candidatAdmis->examen }} série {{ $candidatAdmis->serie }}
                        {{ $candidatAdmis->annee_obtention }} et est identifié par le matricule
                        <strong>{{ $candidatAdmis->numero_table }}</strong>.
                        Il a composé au centre du <strong> {{ $candidatAdmis->centre->nom }} </strong>, dans la commune
                        de
                        <strong>{{ $candidatAdmis->centre->commune->nom }} </strong>dans le département des
                        <strong>{{ $candidatAdmis->centre->commune->departement->nom }} </strong>. Procéder aux
                        vérifications
                        manuelles pour toutes décisions.
                    @endforeach
                @else
                    Nous n'avons pas retrouvé ce candidat dans les candidats éligibles.
                    Veillez procéder à une vérification manuelle pour toute décision.
                @endif
            </p>

            <hr>

            <div class=" d-flex justify-content-start mt-5">
                <div class=" d-flex justify-content-end w-100 align-items-center ms-5">
                    @if ($demande->statut_demande == 'valider')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success px-2 py-1 me-3"
                            data-bs-toggle="modal" data-bs-target="{{ '#genererModalDemande' . $demande->id  }}"> Générer attestation
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success px-3 py-1 me-3"
                            data-bs-toggle="modal" data-bs-target="{{ '#validModal' . $demande->id }}"> Approuvée
                        </button>

                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Alerter
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'non_payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Alerter
                        </button>
                    @endif



                    
                </div>
                {{-- modal to alert user about invalid demand --}}
                <div class="modal fade" id="{{ 'invalidModal' . $demande->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex  flex-column-reverse bg-favorite-color text-white">
                                <h5 class="modal-title pb-1">Informez {{ $demande->nom . ' ' . $demande->prenom }} de
                                    tout ce qui concerne sa demande.
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <form action="{{ route('alertInvalidDemande', ['demande' => $demande->id]) }}"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">

                                        <div class="mb-3">
                                            <label for="nom" class="form-label px-2">Nom et Prénoms</label>
                                            <input type="text" class="form-control" name="nom" value="Admin"
                                                id="nom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sujet" class=" px-2">Sujet du message</label>
                                            <select class="form-select  px-2" aria-label="Default select example"
                                                id="sujet" name="sujet" required>
                                                @foreach ($sujets as $sujet)
                                                    <option value="{{ $sujet }}">{{ $sujet }}</option>
                                                @endforeach

                                            </select>
                                        </div>




                                        <label for="exampleFormControlTextarea1">Message au demandeur
                                            {{ $demande->nom . ' ' . $demande->prenom }}</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"
                                            style="height: 150px;"></textarea>
                                        <input type="hidden" name=" demande_id" value="{{ $demande->id }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    @csrf
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <input type="submit" class="btn btn-success" value="Envoyer">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- end modal --}}

                {{-- Modal to approuve demande --}}
                <div class="modal fade" id="{{ 'validModal' .$demande->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmer
                                    <strong class="text-danger">l'approbation</strong> de la demande
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez-vous vraiment <strong class="text-danger">approuver</strong> cette demande de:
                                <span class="text-danger"> {{ $demande->nom }} {{ $demande->prenom }} ?</span>
                            </div>

                            <div class="modal-footer">
                                <form method="POST" action="{{ route('changeState', ['demande' => $demande->id]) }}">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <input type="submit" class="btn btn-danger" value="Confirmer">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                {{-- end modal active demande --}}

                {{-- Modal to send attestation to user through email --}}
                <div class="modal fade" id="{{ 'genererModalDemande' . $demande->id  }}" tabindex="-1"
                    role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmer
                                    <strong class="text-danger">la génération</strong> de l'attestation
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                L'attestation une fois générée sera directement envoyée au mail du candidat:
                                <span class="text-danger"> {{ $demande->nom }} {{ $demande->prenom }} Êtes-vous sûr
                                    de le faire ?</span>
                            </div>

                            <div class="modal-footer">
                                <form method="POST"
                                    action="{{ route('changeStateToGenerer', ['demande' => $demande->id]) }}">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <input type="submit" class="btn btn-danger" value="Confirmer">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                {{-- end modal to send attestation to user through email --}}


            </div>
        </div>

    </div>
@endsection
