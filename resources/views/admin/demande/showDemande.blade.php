@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        {{-- <h1 class="mt-2">Dashboard</h1> --}}
        <nav class="">
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class="">
                    <h1 style="font-size: 1.2rem;">Liste des demandes récentes payées</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Dashbord</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('listeDemande') }}">Demandes</a></li> &nbsp; /
                        <li class="breadcrumb-item active">Detail de la demande</li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">
    
                    {{-- <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href="#">Ajouter un
                        nouveau</a> --}}
    
                </div>
            </div>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Demandes</a></li> &nbsp; /
                <li class="breadcrumb-item"><a href="{{ route('listeDemande') }}">Listes des demandes</a></li> &nbsp; /
                <li class="breadcrumb-item active">Demande payé</li>
                </li>
            </ol> --}}
        </nav>
    </div>

    <div class="tile">
        <div class="tile-body">
            @if (session('updatedMessage'))
            <div class="alert alert-success mb-3  alert-dismissible fade show" role="alert">
                <h6> {{ session('updatedMessage') }} </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            @endif
            @if (session('deletedMessage'))
                <div class="alert alert-success mb-3  alert-dismissible fade show" role="alert">
                    <h6> {{ session('deletedMessage') }} </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                </div>   
               
            @endif

            <div class="text-center mb-4 d-flex justify-content-between">
                <a class="btn btn-secondary btn-sm py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                href=" {{ URL::previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                  </svg>
                Retour</a>
                <div>
                   
                    @if ($demande->statut_demande == 'valider')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success px-2 py-1 me-3"
                            data-bs-toggle="modal" data-bs-target="{{ '#genererModalDemande' . $demande->id }}"> Générer attestation
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success btn-valide px-3 py-1 me-3 "
                            data-bs-toggle="modal" data-bs-target="{{ '#validModal' . $demande->id  }}"> Valider
                        </button>

                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger btn-unvalide px-3 py-1 "
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Invalider
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'non_payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Invalider
                        </button>
                    @endif

                    @if($demande->statut_demande=='generer')
                        <p class="text-danger fw-bold">Demande déjà validée</p>
                    @endif
                </div>

            </div>
            
            @if (session('changeStateMessage'))
                <div class="alert alert-success alert-dismissible fade show text-center container-fluid  my-2 d-flex justify-content-between">
                    <h5> {{ session('changeStateMessage') }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('alreadyChangeStateMessage'))
                <div class="alert alert-info text-center container-fluid  my-1 d-flex justify-content-between">
                    <h5> {{ session('alreadyChangeStateMessage') }} </h5>
                    <a href="{{ route('attestation', ['demande' => $demande->id]) }}"
                        class="btn btn-success rounded px-3 text-white"> Générer l'attestation</a>
                </div>
            @endif
            @if (session('changeStateTogenerer'))
                <div class="alert alert-info text-center container-fluid  my-1 d-flex justify-content-between">
                    <h5> {{ session('changeStateTogenerer') }} </h5>
                </div>
            @endif
            @if (session('invalidDemandeMessage'))
                <div class="alert alert-info text-center container-fluid  my-1 d-flex justify-content-between">
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
                    <p class="alert alert-warning alert-dismissible fade show fs-6 mt-4 text-center fw-bold">{{ $demande->nom.' '.$demande->prenom }} n'a pas encore payé pour sa demande.
                        Vous l'alerterez peut-être pour le lui en rappeler
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </p>
                @else
                    <div class="alert alert-success fs-6 mt-5  alert-dismissible fade show" role="alert">
                        <span class="text-danger">Note:</span> {{$demande->prenom}} 
                            a payé pour cette demande le {{ $demande->updated_at->format('d-m-Y') }}. Solde délivré du compte de Esaie TCHAGNONSI. ID de la transaction : {{ $demande->kkiapayPayement_id }}  
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       
                    </div>              
                @endif
            </div>


            {{-- Main content info de la demande --}}
            <div class="d-flex justify-content-center flex-column align-items-center">
               
                <img src="{{ asset('storage/photo_candidat_demande/'. $demande->photo) }}" alt="" width="700">
            
            
                <div class="container mt-2">
                    <p class="section-title text-center first-color py-2 mt-5">Informations personnelles du demandeur</p>
                    {{-- <p class=" favorite-color h3 text-start ms-2  py-2 mt-5">Informations personnelles</p> --}}
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
                    {{-- <p class=" favorite-color h3 text-start ms-2  py-2 mt-5">Informations sur le diplôme</p> --}}

                    <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">
                        @php
                            $centres = App\Models\Centre::where('id',$demande->centre)->get();   
                            $communes = App\Models\Commune::where('id',$demande->commune)->get();    
                        @endphp
                        <p>Centre de composition :</p>
                        <p>
                            {{-- 
                            @php
                                $centre = App\Models\Centre::where('id', $demande->centre)->get();
                            @endphp --}}
                            
                            @foreach ($centres as $centre)
                                {{ $centre->nom }}
                            @endforeach</p>

                    </div>

                    <div class=" row-info container-fluid  d-flex justify-content-between">

                        <p>Commune :</p>

                        <p>
                            {{-- @php
                                $commune = App\Models\Commune::where('id', $demande->commune)->get();
                            @endphp --}}
                            @foreach ($communes as $commune)
                            {{ $commune->nom }}
                            @endforeach</p>

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

                <div class="container mb-3">
                    {{-- <p class=" favorite-color h3 text-start ms-2  py-2 mt-5">Autres informations utiles</p> --}}
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


                    <div class=" d-flex justify-content-between w-50 ms-4 ">
                        <div class=" text-center">
                            @if (!is_null($demande->releve))
                                <span>Rélevé</span> <br>
                                <a href=" {{ asset('storage/'.$demande->releve) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                                <a href="{{ route('download-releve', $demande->id ) }}" class="mt-5">Télécharger</a>
                            @else
                            Non soumis    
                            @endif
                        </div>
                        <div  class=" text-center">
                            @if (!is_null($demande->acte_naissance))
                            <span>Acte de naissance</span> <br>
                            <a href=" {{ asset('storage/'.$demande->acte_naissance) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                            <a href="{{ route('download-acte', $demande->id ) }}" class="mt-5">Télécharger</a>
                            @else
                            Non soumise
                            @endif
                        </div>
                        <div  class=" text-center">
                            @if (!is_null($demande->cni))
                            <span>Carte d'identité</span> <br>
                            <a href=" {{ asset('storage/'.$demande->cni) }}" target="_blank" class="py-3"><img src="{{ asset('admin/img/pdf-file.svg') }}" alt="" height="50" width="50" /></a> <br>
                            <a href="{{ route('download-cni', $demande->id ) }}" class="mt-5">Télécharger</a>
                            @else
                            Non soumis
                            @endif
                        </div>
                    </div>



                    {{-- <iframe src="{{  asset('storage/'.$demande->releve) }}" width="100%" height="1000">Visualiser</iframe>
                    <a href="{{ route('dowload',$demande->id)}}" class="btn btn-success btn-group-sm rounded px-4 fs-5 fw-bold float-end mt-3" >Télécharger</a> --}}
                </div>
            </div>
             {{--End Main content info de la demande --}}

            <p class="mt-5 ms-3 fs-5 text-dark text-start">
                @if (count($candidatAdmis) > 0)
                    @foreach ($candidatAdmis as $candidatAdmis)
                      <span class="text-danger">Note:</span>  Le candidat <strong>
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
                        <button type="button" class="border-0 bg-none btn btn-lg btn-success btn-valide px-3 py-1 me-3 "
                            data-bs-toggle="modal" data-bs-target="{{ '#validModal' . $demande->id }}"> Valider
                        </button>

                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger btn-unvalide px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Invalider
                        </button>
                    @endif

                    @if ($demande->statut_demande == 'non_valider' && $demande->statut_payement == 'non_payer')
                        <button type="button" class="border-0 bg-none btn btn-lg btn-danger px-3 py-1"
                            data-bs-toggle="modal" data-bs-target="{{ '#invalidModal' . $demande->id }}"> Alerter
                        </button>
                    @endif



                    
                </div>
                

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
                                    <strong class="">la génération</strong> de l'attestation
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                L'attestation une fois générée sera directement envoyée au mail du demandeur:
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

                {{-- modal to alert user about invalid demand --}}
                <div class="modal fade alertDemandeurModal" id="{{ 'invalidModal' . $demande->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header favorite-color">
                                <h5 class="pb-1 modal-title text-dark">Informer {{ $demande->nom.' '.$demande->prenom }} des raisons du rejet de la demande.
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <form action=""
                                method="POST" class="alertDemande">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label px-2">Nom et Prénoms</label>
                                            <input type="text" class="form-control nom" name="nom" value="Admin"
                                                id="nom" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sujet" class=" px-2">Sujet du message</label>
                                            <select class="form-select sujet px-2" aria-label="Default select example"
                                                id="sujet" name="sujet" required>
                                                <option value=""></option>
                                                <option value="Rejet de demande">Informations incorrectes</option>
                                                <option value="Payement non effectué">Payement non effectué</option>
                                                <option value="Autres">Autres raisons</option>
                                            </select>
                                        </div>



                                        <label for="exampleFormControlTextarea1">Message
                                            {{ $demande->nom . ' ' . $demande->prenom }}</label>
                                        <textarea class="form-control message" id="exampleFormControlTextarea1" rows="3" name="message"
                                            style="height: 150px;" ></textarea>
                                        <input type="hidden" name="demande_id" value="{{ $demande->id }}" class="demande_id" required>

                                        <div class="alert alert-success py-3 mt-2 d-none msg-success">
                                            Demande invalidée avec succès et demandeur alerté
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    @csrf
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <button type="button"  class="btn btn-success" id="sendAlert">Envoyer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </div>
        </div>

    </div>

    <script>
        
        $(document).ready(function() {
            
            $('#sendAlert').click(function() {
                
                
                if( $('.alertDemande .nom').val() == "" || $('.alertDemande .sujet').val() == "" || $('textarea.message').val() == "" ){
                    alert('Veuillez remplir tous les champs');
                }else{
                    $('.alertDemande').submit();
                }
            });
      

            $('.alertDemande').submit(function(e) {
                e.preventDefault();
                let nom = $('.alertDemande .nom').val();
                let sujet = $('.alertDemande .sujet').val();
                let message = $('.alertDemande .message').val();
                let id = $('.alertDemande .demande_id').val();
                let successMessage = "";

                $.ajax({
                    type: "POST",
                    url: '{!! URL::to('alertInvalidDemande') !!}',
                    data:{
                        'nom':nom,
                        'sujet':sujet,
                        'message':message,
                        'demande_id':id,
                        _token :"{{ csrf_token() }}"

                    },
                    success:function (data){
                        successMessage = "Demande invalidée avec succès et demandeur alerté.";
                        $('.msg-success').removeClass('d-none');
                        setTimeout(() => {
                            $('.alertDemandeurModal').modal('hide');
                        }, 3000);
                   
                    }
                })
            })
        });

    </script>
@endsection
