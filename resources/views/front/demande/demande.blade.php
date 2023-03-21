@extends('front.layouts.template')
@section('content')
    <style>
        .form-control,
        select {
            height: 45px;
        }

        .control-label {
            padding-bottom: 5px;
            font-family: 'Inter';
            font-style: normal;
            font-size: 15px;
            margin-top: 10px;
            line-height: 24px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .info-form {
            line-height: 35px;
        }

        .info-form>h2 {

            line-height: 50px;
        }
        .carousel-inner, .carousel-inner>div, .texte-demande{
            height:250px;
        }
        .texte-demande{
            z-index: 99 ;
            position: absolute; 
            top: 0px; 
            background: rgba(3, 36, 151, 0.71); 
            width: 100% ; 
        }
        .texte-demande> h3{
            line-height:50px;
        }
        @media screen and (max-width:767px){
            .texte-demande> h3{
                line-height:35px;
                margin-top: 70px !important;
                font-size: 18px;
            } 
            .carousel-inner,.carousel-inner>div,.texte-demande{
                height:300px;
                font-size: 16px;
            }
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-lg-0 position-relative"
        data-bs-ride="carousel">

        <div class="d-flex justify-content-center flex-column texte-demande">
           
            <h3 class="text-white text-center ms-0 ms-lg-5 fw-bold">
                FINALISEZ AVEC VOTRE DEMANDE
            </h3>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class=" container-fluid container-lg demande-section-2">
        <div class="demande-section-2-1">
            <div class="info-form mt-5">
         
                @if(URL::previous()=="demandes")
                    <div class="alert alert-success py-0 text-center">
                        <span class="text-center text-danger">Super ! Vous pouvez continuer maintenant</span>
                    </div>
                @endif
                <h4 class=" ">
                    Veuillez renseigner les champs vide pour soumettre votre demande.
                </h4>
                <ul class="text-danger">
                    <li>Renseignez une adresse mail valide, vous recevrez votre attestation via cette adresse</li>
                    <li>Veuillez renseigner un numero valide possible d'être joint en cas d'urgence</li>
                </ul>
                
                {{-- <p class="text-center text-danger">Tous les champs sont obligatoires *</p> --}}
            </div>
            <div class="form-content mt-5">
                @if (session('addedMessage'))
                    <div class="alert alert-success">
                        <h6> {{ session('addedMessage') }} </h6>
                    </div>
                @endif

                    
                <form action="{{ route('validationDemande') }}" enctype="multipart/form-data" method="POST" id="myForm">
                    @csrf
                    <style>
                        .progressbar-item {
                            width: 70px;
                            height: 70px;
                            background-color: #cdcdcd;
                        }

                        .progressbar-item-active {
                            background-color: #198754;
                            color: white;
                            animation: section-animate 0.5s ease-in;
                        }

                        .progressbar {
                            counter-reset: step;
                            width: 100%;
                        }
                        .progressbar::before,
                        .progress {
                            content: "";
                            position: absolute;
                            margin-top: 47px;
                            /* width: 70%; */
                            width: 1250px;
                            height: 4px;
                            background-color: #cdcdcd;
                            transform: translateY(-50%);
                            z-index: -100;
                     
                        }

                        @media screen and (max-width:1399px) {
                            .progressbar::before,
                            .progress {
                                width: 1100px;
                            }
                        }
                        @media screen and (max-width:1199px) {
                            .progressbar::before,
                            .progress {
                                width: 900px;
                            }
                        }
                        @media screen and (max-width:920px) {
                            .progressbar::before,
                            .progress {
                                width: 850px;
                            }
                        }
                        @media screen and (max-width:875px) {
                            .progressbar::before,
                            .progress {
                                width: 92%;
                            }
                        }

                        .progress {
                            background-color: green;
                            width: 0%;
                        }

                        .form-section {
                            display: none;
                            transform-origin: top;
                            animation: ease animate 0.5s;

                        }

                        .form-section-active {
                            display: block;
                            animation: animate ease 0.5s;
                        }

                        @keyframes animate {
                            0% {
                                transform: scale(1, 0);
                                /* margin-top: -100px; */
                                opacity: 0;
                            }

                            100% {
                                transform: scale(1, 1);
                                /* margin-left: 0; */
                                opacity: 1;
                            }
                        }

                        .progressbar-item::before {
                            counter-increment: step;
                            content: counter(step);
                        }
                        @media screen and (max-width:768px) {
                            .progressbar-item {
                                width: 50px;
                                height: 50px;
                            }
                        }
                    </style>
                    <div class="progressbar d-flex justify-content-between mb-5 mt-5">
                        <div class="progress" id="progress">
                        </div>
                        <div class="progressbar-item progressbar-item-active rounded-pill bg-favorite-color mt-2 d-flex justify-content-center align-items-center text-white fw-bold"
                            id="progresse">
                        </div>
                        <div class="progressbar-item rounded-pill mt-2 d-flex justify-content-center align-items-center fw-bold"
                            id="progresse2">
                        </div>
                        <div class="progressbar-item rounded-pill mt-2 d-flex justify-content-center align-items-center fw-bold"
                            id="progresse3">
                        </div>
                    </div>
                    {{-- form section 1 --}}

                    <div class="form-section form-section1 form-section-active mb-5" id="form-section1">
                        <p class="favorite-color fw-bold fs-4">Vos informations personnelles</p>

                        <div class="row mb-3 mt-4">
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                           
                                <label for="nom" class="control-label label-color">Nom (en intégralité)
                                     &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 py-1" type="text" name="nom" id="nom"
                                    value=" @if(!is_null($candidat)) {{ $candidat[0]->nom}}  @endif " readonly>
                                <span class="text-danger" id="nomError"> </span>
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">

                                <label for="prenom" class="control-label label-color">Prénoms(dans l'ordre selon l'acte) &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="text" name="prenom"
                                    value=" @if(!is_null($candidat)) {{ $candidat[0]->prenom }}  @endif" id="prenom" readonly>
                                <span class="text-danger" id="prenomError"> </span>
                                @if ($errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="date_naissance" class="control-label label-color">Date de naissance  &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 input-mask" max="01-01-2010" type="date" name="date_naissance"
                                    value="<?php echo date('Y-m-d', strtotime($candidat[0]->date_naissance)); ?>" id="date_naissance"
                                    readonly >
                                <span class="text-danger" id="date_naissanceError"> </span>

                                @if ($errors->has('date_naissance'))
                                    <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                                @endif
                            </div>
                      
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="email" class="control-label label-color">Renseignez une adresse mail valide &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="email" name="email" id="email"
                                    value="@if(!is_null($candidat)) {{ $candidat[0]->email }} @else {{ old('email') }}  @endif " placeholder="exemple@gmail.com" required>
                                <span class="text-danger" id="emailError"> </span>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif  
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="contact" class="control-label label-color">Contact (renseignez un numéro
                                    joignable) &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 contact" type="number" name="contact" id="contact"
                                    value="{{ old('contact') }}" maxlength="8" required>
                                <span class="text-danger" id="contactError"> </span>
                                @if ($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="sexe">Sexe &nbsp; <span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control serie" name="sexe" id="sexe" value="{{ $candidat[0]->sexe }}" readonly>

                                        
                                {{-- <select class="form-control border-1 form-select" name="sexe">
                                    <option value="Masculin" @if(!is_null($candidat))  @if($candidat[0]->sexe=="Masculin") selected @endif @endif>Masculin</option>
                                    <option value="Féminin"@if(!is_null($candidat)) @if($candidat[0]->sexe=="Féminin") selected @endif @endif>Féminin</option>
                                    <option value="Autres"@if(!is_null($candidat)) @if($candidat[0]->sexe=="Autres") selected @endif @endif>Autres</option>
                                </select> --}}

                            </div>

    

                            {{-- <div class="form-group  col-12 col-lg-4 p-2">
                                <label for="ville_naissance" class="control-label label-color">Ville de
                                    naissance &nbsp; <span class="text-danger">*</span></label>

                                <input class="form-control border-1 " type="text" name="ville_naissance"
                                    value="{{ old('ville_naissance') }}" id="ville_naissance">
                                <span class="text-danger" id="ville_naissanceError"> </span>

                                @if ($errors->has('vile_naissance'))
                                    <span class="text-danger">{{ $errors->first('vile_naissance') }}</span>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group col-12 col-lg-8 p-2">
                                <label for="photo" class="control-label label-color">Photo claire jusqu'au ventre munie
                                    de votre
                                    carte d'identité en main (png, jpg ou jpeg) &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" name="photo" id="photo"
                                    value="{{ old('photo') }}" accept=".png, .jpg, .jpeg">
                                <span class="text-danger" id="photoError"> </span>
                                @if ($errors->has('photo'))
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div> --}}

                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-end ">
                            <button type="button"
                                class="btn btn-next next1 text-white fw-bold p-2 text-center col-3 mt-5 mb-5 rounded bg-success"
                                id="next1">
                                Suivant
                                &nbsp; &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </button>
                        </div>
                    </div>


                    {{-- end form section 1 --}}


                    {{-- form section 2 --}}

                    <div class="form-section form-section2" id="form-section2">
                        <p class="favorite-color fw-bold fs-4 pt-5">Les informations relatives au diplôme à demander</p>
                       
                        <div class="row mb-3 mt-4">
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="numero_table" class="control-label label-color">Votre
                                    
                                    numero de table &nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="numero_table" id="numero_table" value=" @if(!is_null($candidat)) {{ $candidat[0]->numero_table }}  @endif " placeholder="" readonly>
                                {{-- <input class="form-control border-1 "  type="text" name="numero_table" id="numero_table" value="{{ @if(!is_null($candidat)) {{ $candidat[0]->numero_table }} @endif }}" placeholder="Exemple : 528-AB7-88" > --}}
                                    
                                <span class="text-danger" id="numero_tableError"> </span>

                                @if ($errors->has('numero_table'))
                                    <span class="text-danger">{{ $errors->first('numero_table') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="serie">Série de l'examen &nbsp; <span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control serie" name="serie" id="serie" value="{{ $candidat[0]->serie }}" readonly>
                                {{-- <select class="form-control border-1 form-select" name="serie" id="serie">
                                    <option value="">Choisissez la série</option>
                                    <option value="Mod.Court">Mod.Court</option>
                                    <option value="Mod.Long">Mod.Long</option>
                                    <option value="CAP">CAP</option>
                                   

                                </select> --}}
                                <span class="text-danger" id="serieError"> </span>

                            </div>

                            {{-- <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="serie">Type de l'examen &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="BEPC" class="form-control border-1 ">
                            </div> --}}

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="mention">Mention obtenu pour
                                    l'examen &nbsp;( <span class="text-danger">optionnel</span> )</label>
                                    <input type="text" class="form-control mention" name="mention" id="mention" value="{{ $candidat[0]->mention }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="departement">Département de
                                    avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="departement" id="departement" class="form-control" value="{{ $candidat[0]->centre->commune->departement['nom'] }}" readonly>
                                {{-- <select class="form-control border-1 form-select" name="departement" id="departement">
                                    <option value="#">Sélectionner le département</option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                    @endforeach

                                </select> --}}
                                <span class="text-danger" id="departementError"> </span>

                          
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="commune">Commune où vous avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="commune" id="commune" class="form-control" value="{{ $candidat[0]->centre->commune['nom']}}" readonly>

                                {{-- <select class="form-control form-select border-1 form-select" name="commune" id="commune">

                                    <option value=" ">Choisissez la commune</option>
                                    

                                </select> --}}

                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="centre">Centre dans lequel vous avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="centre" id="centre" class="form-control" value="{{ $candidat[0]->centre['nom']}}" readonly>

                                {{-- <select class="form-control border-1 form-select" name="centre" id="centre">
                                    <option value=" ">Choisissez le centre</option>
                                    

                                </select> --}}

                            </div>

                        </div>


                        
                        <div class="row mb-3">

                            {{-- <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="etablissement">Établissement fréquenté &nbsp; <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border-1 etablissement" id="etablissement" name="etablissement">
                                <span class="text-danger" id="etablissementError"> </span>
                            </div> --}}

                            <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label for="annee_obtention" class="control-label label-color">Année
                                    d'obtention du diplôme  &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control  border-1 annee" type="text" name="annee_obtention" readonly
                                    id="annee_obtention" value=" @if(!is_null($candidat)) {{ $candidat[0]->annee_obtention }}  @endif">
                                <span class="text-danger" id="annee_obtentionError"> </span>

                                @if ($errors->has('annee_obtention'))
                                    <span class="text-danger">{{ $errors->first('annee_obtention') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-8 p-2">
                                <label for="cni" class="control-label label-color">Relevé de note (maximum 10 MB)&nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" accept=".pdf, .docx" name="releve" id="releve"
                                    value="{{ old('releve') }}" required>
                                <span class="text-danger" id="releveError"> </span>
                                @if ($errors->has('releve'))
                                    <span class="text-danger">{{ $errors->first('releve') }}</span>
                                @endif
                            </div>

                            {{-- <div class="form-group col-12 col-md-6 col-lg-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="jury">Jury de l'examen &nbsp; (<span class="text-danger">optionnel</span>)</label>
                                <input type="text" class="form-control border-1 jury" id="jury" name="jury" minlength="3" maxlength="4">
                            </div>           --}}
                        </div>

                      

                        {{-- Releve de note --}}
                        <div class="row mb-3">
                            
                        </div>

                        <div class="d-flex justify-content-center justify-content-lg-end mb-5">
                            <button id="prev1"
                                class="text-white btn btn-prev fw-bold p-2 me-3 text-center col-3 mt-5 mb-5 rounded bg-danger">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg>
                                </i>
                                &nbsp; &nbsp;
                                Précédent
                            </button>
                                <button type="button"
                                    class="text-white fw-bold btn btn-next p-2 ms-3 text-center col-3 mt-5 mb-5 rounded btn btn-success"
                                    id="sendDemande">
                                    <span>Soumettre et payer</span>
                                    &nbsp; &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-joystick" viewBox="0 0 16 16">
                                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                                      </svg>
                                </button>
                            {{-- <button class="mt-5 btn btn-md btn-success px-5" >Soumettre et payer</button> --}}





                            {{-- <div class="mb-5 d-flex justify-content-center justify-content-lg-start">
                                <input type="reset" value="Annuler tout"
                                    class="mt-5 btn btn-md bg-favorite-color text-white px-5 me-4">
                            </div> --}}


                        </div>
                    </div>

                    {{-- form section 3 --}}
                    {{-- <div class="form-section form-section3" id="form-section3"> --}}
                        {{-- <p class="favorite-color fw-bold fs-4 pt-5">Autres informations utiles et obligatoires</p>
                        <div class="row mt-2 mb-3"> --}}


                              {{--Upload acte de naissance --}}
                        {{-- <div class="row mb-1">
                            <div class="form-group col p-2">
                                <label for="acte_naissance" class="control-label label-color">Acte de naissance (Taille maximale 10MB)&nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" accept=".pdf, .docx" name="acte_naissance" id="acte_naissance"
                                    value="{{ old('acte_naissance') }}" id="acte_naissance" required>
                                <span class="text-danger" id="acteError"> </span>
                                @if ($errors->has('acte_naissance'))
                                    <span class="text-danger">{{ $errors->first('acte_naissance') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- Carte nationale d'identité --}}
                        {{-- <div class="row mb-3">
                            <div class="form-group col p-2">
                                <label for="cni" class="control-label label-color"> Carte d'identité (Taille maximale 10MB)<span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" required accept=".pdf, .docx" name="cni" id="cni"
                                    value="{{ old('cni') }}" id="cni">
                                <span class="text-danger" id="cniError"> </span>
                                @if ($errors->has('cni'))
                                    <span class="text-danger">{{ $errors->first('cni') }}</span>
                                @endif
                            </div>
                        </div> --}}
                        
                        {{-- <div class="row mb-3">
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="nom_pere" class="control-label label-color">Noms et prénoms exactes du
                                    père &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " value="{{ old('nom_pere') }}" type="text"
                                    name="nom_pere" id="nom_pere" required>
                                <span class="text-danger" id="nom_pereError"> </span>

                                @if ($errors->has('nom_pere'))
                                    <span class="text-danger">{{ $errors->first('nom_pere') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-4 p-2">
                                <label for="nom_mere" class="control-label label-color">Noms et prénoms exactes de la
                                    mère &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="text" name="nom_mere" id="nom_mere"
                                    value="{{ old('nom_mere') }}" required>
                                <span class="text-danger" id="nom_mereError"> </span>

                                @if ($errors->has('nom_mere'))
                                    <span class="text-danger">{{ $errors->first('nom_mere') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-12 col-lg-4 p-2">
                                <label for="contact_parent" class="control-label label-color">Renseignez un numéro
                                    joignable
                                    d'un de vos parents &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 contact_parent" type="number" name="contact_parent"
                                    id="contact_parent" value="{{ old('contact_parent') }}" required length="8" >
                                <span class="text-danger" id="contact_parentError"> </span>

                                @if ($errors->has('contact_parent'))
                                    <span class="text-danger">{{ $errors->first('contact_parent') }}</span>
                                @endif

                            </div>
                        </div> --}}

                        {{-- <button
                            class="text-white btn btn-prev fw-bold p-2 me-3 text-center col-3 mt-5 mb-5 rounded bg-danger"
                            id="prev2">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                            </i>
                            &nbsp; &nbsp;
                            Précédent
                        </button> --}}
                        
                    {{-- </div> --}}
                    {{-- end form section 3 --}}
                </form>
            </div>
        </div>
    </div>

    <div class="modal rounded fade alert-payement" data-bs-backdrop="static" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> --}}
              <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                <p class="text-center">Demande d'attestation</p>
                <img src="{{ asset('img/pay.png') }}" alt="" width="100" class="my-4">
                <p class="text-center text-primary">
                    Cette opération nécessite des frais d’une valeur de <span class="text-danger">5000 FCFA</span> payable par MTN Mobile money ou Moov Money
                </p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="button" class="btn rounded text-white" id="ok" style="background-color: #078466">Continuer</button>
            </div>
          </div>
        </div>
      </div>

    {{-- <script src="https://cdn.kkiapay.me/k.js"></script> --}}
 
    <script>
        $('document').ready(function() {
            $('.annee').yearpicker();
        })
    </script>
  

    <script>
      
        $('document').ready(function() {

           
     

            $('#next1').click(function(e) {
                e.preventDefault();

                //let photo = $("#photo").val();
                //let nbre = photo.length;

              
               
                
                //var fileInput = document.getElementById('photo');
                //var filePath = fileInput.value;

                var fileInputPdf = document.getElementById('releve');
                var filePathPdf = fileInputPdf.value;
           
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                var allowedExtensionPdf = /(\.pdf)$/i;
                



                if ($("#nom").val() == '') {
                    $('#nomError').text('le nom est obligatoire');

                } else if ($("#prenom").val() == '') {
                    $('#prenomError').text('le prénom est obligatoire');
                } else if ($("#date_naissance").val() == '') {
                    $('#date_naissanceError').text('le date de naissance est obligatoire');
                } else if ($("#email").val() == '') {
                    $('#emailError').text('Adresse mail est obligatoire');
                } else if ($("#contact").val() == '') {
                    $('#contactError').text('le conatct est obligatoire');
                } else if ($("#contact").val() < 50000000 || $("#contact").val() > 99999999) {
                    $('#contactError').text('le format du contact n\'est pas correct');
                } 
                // else if ($("#ville_naissance").val() == '') {
                //     $('#ville_naissanceError').text('la ville de naissance est obligatoire');
                // } 
                // else if (photo == '') {
                //     $('#photoError').text('la photo est obligatoire');
                // } 
                // else if(sizePhoto > 15000000){
                //     $('#photoError').text('Taille de fichier trop grande');
                // }
                
                // else if (!allowedExtensions.exec(filePath)) {
                //     $('#photoError').text('Extension de fichier non correcte');
                // }
                // else if ( (photo.slice(photo.length -4, photo.length)) != ".png" || (photo.slice(photo.length -4, photo.length) != ".jpg") || (photo.slice(photo.length -5, photo.length)) != ".jpeg") {
                //     $('#photoError').text('Extension de fichier non correcte');
                // }
                else {
                    $('#form-section1').removeClass('form-section-active');
                    $('#form-section2').addClass('form-section-active');
                    $('#progresse2').addClass('progressbar-item-active');
                    $('.progress').width('33.34%');
                }
            });

            $('#prev1').click(function(e) {
                e.preventDefault();
                $('#form-section2').removeClass('form-section-active');
                $('#form-section1').addClass('form-section-active');
                $('#progresse2').removeClass('progressbar-item-active');
                $('.progress').width('0%');
            });

            // $('#next2').click(function(e) {

            //     e.preventDefault();
                //var inputNumeroTableRule = /^[0-9]{3}\-[A-Za-z0-9]{3}\-[0-9]{2}$/;

                // var releveFileSize = document.getElementById('releve').files[0].size;
                // var releveFileType = document.getElementById('releve').files[0].type;
                
                // if ($("#numero_table").val() == '') {
                //     $('#numero_tableError').text('le numero de table est obligatoire');
                // }

                // else if(!inputNumeroTableRule.test($("#numero_table").val())) {
                //     $('#numero_tableError').text('le numero de table est obligatoire');
                // }
                
                // else if ($('#serie').val() == '') {
                //     $('#serieError').text('Choisissez une série');
                // } 
                // else if($('#departement').val() == '' || $('#departement').val() == '#'){
                //     alert('Veillez sélectionner le département');
                // }
                // else if($('#etablissement').val() ==''){
                //     $('#etablissementError').text('Collège obligatoire');
                // }
                // else if ($("#annee_obtention").val() == '') {
                //     $('#annee_obtentionError').text('Année obligatoire');
                // } else if ($("#annee_obtention").val() < 2010 || $("#annee_obtention").val() > 2022) {
                //     $('#annee_obtentionError').text('Format de l\'année non correct');
                // } 
                
                // else if ( releveFileSize >10000000 ) {
                //     $('#releveError').text('Taille de fichier trop grande');
                // } 

                // else if ( releveFileType !="application/pdf") {
                //     $('#releveError').text('Vous devez uploader un fichier pdf');
                // }
               

                // else {
                //     $('#form-section2').removeClass('form-section-active');
                //     $('#form-section3').addClass('form-section-active');
                //     $('#progresse3').addClass('progressbar-item-active');
                //     $('.progress').width('67%');
                // }
            // });

            // $('#prev2').click(function(e) {
            //     e.preventDefault();
            //     $('#form-section3').removeClass('form-section-active');
            //     $('#form-section2').addClass('form-section-active');
            //     $('#progresse3').removeClass('progressbar-item-active');
            //     $('.progress').width('33.34%');
            // });

            $('#sendDemande').click(function(e) {
                e.preventDefault(); 

                if ($('#releve').val() == '') {
                    $('#releveError').text('Le releve de note est obligatoire');
                } 
                //var acteFileSize = document.getElementById('acte_naissance').files[0].size;
                // var cniFileSize = document.getElementById('cni').files[0].size;
                // if($('#acte_naissance').val() == '') {
                //     $('#acteError').text('l\'acte de naissance est obligatoire'); 
                // }
                // else if($('#cni').val() == '') {
                //     $('#cniError').text('la carte d\identité est obligatoire');
                // } 
                      
                // else if ($("#nom_pere").val() == '') {
                //     $('#nom_pereError').text('le nom du père est obligatoire');
                // } else if ($("#nom_mere").val() == '') {
                //     $('#nom_mereError').text('le nom de la mère est obligatoire');
                // } else if ($("#contact_parent").val() == '') {
                //     $('#contact_parentError').text('le contact du parent est obligatoire');
                // } 
                else{
                    $('#staticBackdrop').modal('show');
                }
            });
            $('#ok').click(function(){
                $('#myForm').submit();
                $('#staticBackdrop').modal('hide');
            });

            

            $('#departement').on('change', function() {
                let id = $(this).val();
                let commune = document.getElementById('commune');
                var communeList = " ";
                
                $.ajax({
                    type: 'POST',
                    url: '{!! URL::to('communesOfDepartement') !!}',
                    data: {
                        'id': id,
                        _token :"{{ csrf_token() }}"
                    },                                        
                    success: function(data) {
                        console.log(data);
                        communeList += '<option value=" "> Choisissez la commune </option>';
                        for(let i = 0; i < data.length; i++){
                            communeList += '<option value="'+ data[i].id + '">' + data[i].nom + '</option>';
                        }
                        $('#commune').html('');
                        $('#commune').append(communeList);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            });


            $('#commune').on('change', function() {
                let id = $(this).val();
                let centre = document.getElementById('commune');
                var centreList = " ";
                
                $.ajax({
                    type: 'POST',
                    url: '{!! URL::to('centreOfCommune') !!}',
                    data: {
                        'id': id,
                        _token :"{{ csrf_token() }}"
                    },                                        
                    success: function(data) {
                        console.log(data);
                        centreList += '<option value=" "> Choisissez le centre </option>';
                        for(let i = 0; i < data.length; i++){
                            
                            centreList += '<option value="'+ data[i].id + '">' + data[i].nom + '</option>';
                        }
                        $('#centre').html('');
                        $('#centre').append(centreList);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            });




            // $(".contact_parent").inputmask("(999) 999-9999");
            
            // var setting = #^[0-9]{3}\-[A-Za-z0-9]{3}\-[0-9]{2}$#;
        });
      

        
    </script>
@endsection
