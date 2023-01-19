@extends('front.layouts.template')
@section('content')
    <style>
        .form-control border-1 {
            height: 50px;
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
    </style>

    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">

        <div class="d-flex justify-content-center flex-column"
            style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 300px;">
            <h2 class="text-white ms-5 fw-bold" style="line-height:50px;">
                Vous avez des choses à corriger ? C'est le moment.
                <br>Vous pouvez modifier votre demande que si elle n'est pas encore validée .
            </h2>
        </div>
        <div class="carousel-inner" style="height:300px;">
            <div class="carousel-item active" style="height:300px;">
                <img src="{{ asset('img/etu1.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class=" container demande-section-2">
        <div class="demande-section-2-1">
            <div class="info-form mt-5">
                <h2 class="text-center ">Veillez renseigner les informations à modifier puis soumettez le formulaire.
                   </h2>
                <p class="text-center text-danger"></p>
            </div>
            <div class="form-content mt-5">

                @if (session('updatedMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updatedMessage') }}
                    <button class="btn-close  bg-none bg-0" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif  

                {{-- @if (session('updatedMessage'))
                <div class="alert alert-success fs-6 mt-5  alert-dismissible fade show" role="alert">  
                        <span>  </span>                                  
                        <button type="button" class="btn-close bg-none" data-bs-dismiss="alert" aria-label="Close"></button>               
                </div> --}}
               
               
                <form action="{{ route('demandes.update', ['demande'=> $demande->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="favorite-color fw-bold fs-5 mt-2">Vos informations personnelles</p>
                    <div class="row mb-3 mt-4">
                        <div class="form-group col-md-4 p-2">


                            <label for="nom" class="control-label label-color">Nom (en intégralité)
                                &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  py-2" type="text" name="nom" id="nom" value="{{ $demande->nom }}">

                            @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-4 p-2">

                            <label for="prenom" class="control-label label-color">Prénoms(dans l'ordre selon l'acte) &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  " type="text" name="prenom" id="prenom" value="{{ $demande->prenom }}">
                            @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-4 p-2">
                            <label for="date_naissance" class="control-label label-color">Date de naissance  &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  " type="date" name="date_naissance" id="date_naissance" value="{{ $demande->date_naisance }}" required>

                            @if ($errors->has('date_naissance'))
                                <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="form-group col-md-4 p-2">
                            <label for="email" class="control-label label-color">Adresse mail &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  " type="mail" name="email" id="email" value="{{ $demande->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-4 p-2">
                            <label for="contact" class="control-label label-color">Contact (renseignez un numéro
                                joignable) &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  py-2" type="number" maxlenght="8" minlenght="8" name="contact"
                                id="contact" value="{{ $demande->contact }}">
                            @if ($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="sexe">Sexe &nbsp; <span
                                class="text-danger">*</span></label>
                            <select class="form-control border-1 py-1 form-select" style="height: 50px;" name="sexe" id="sexe_id">
                                {{-- <option value="{{ $demande->sexe }}">{{ $demande->sexe }}</option> --}}
                                    <option value="Masculin" @if ($demande->sexe=="Masculin") selected @endif >Masculin</option>
                                       
                                    <option value="Féminin"  @if ($demande->sexe=="Féminin") selected @endif>Féminin</option>
                                    <option value="Autres"  @if ($demande->sexe=="Autres") selected @endif>Autres</option>
                                {{-- @foreach ($sexes as $sexe)
                                    <option value="{{ $sexe }}" @if ( old('sexe_id', $demande->sexe) == $sexe) selected @endif>{{ $sexe }}</option>
                                @endforeach --}}

                            </select>

                        </div>

                    </div>

                    <div class="row mb-3">

                        <div class="form-group col-md-4 p-2">
                            <label for="ville_naissance" class="control-label label-color">Ville de
                                naissance &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  " type="text" name="ville_naissance" id="ville_naissance" value="{{ $demande->ville_naissance }}">

                            @if ($errors->has('vile_naissance'))
                                <span class="text-danger">{{ $errors->first('vile_naissance') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-8 p-2">
                            <label for="photo" class="control-label label-color">Photo claire jusqu'au ventre munie
                                de votre
                                carte d'identité en main (png, jpg ou jpeg) &nbsp; <span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control border-1 " name="photo" id="photo">
                            <img src="{{asset('storage/photo_candidat_demande/'.$demande->photo) }}" width="60" height="60"  alt="">
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>

                    </div>

                    <p class="favorite-color fw-bold fs-5 pt-5">Les informations relatives au diplôme à demander</p>

                    <div class="row mb-3 mt-4">
                        <div class="form-group col-md-4 p-2">
                            <label for="numero_table" class="control-label label-color">Votre
                                    
                                numero de table &nbsp; <span class="text-danger">*</span></label>
                            <input class="form-control border-1  " type="text" name="numero_table" id="numero_table" value="{{ $demande->numero_table }}">

                            @if ($errors->has('numero_table'))
                                <span class="text-danger">{{ $errors->first('numero_table') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="centre">Série de l'examen &nbsp; <span
                                class="text-danger">*</span></label>
                            <select class="form-control border-1  form-select" style="height: 50px;" name="serie" id="serie">
                                <option value="Mod.Court" @if($demande->serie=="Mod.Court") selected @endif >Mod.Court</option>
                                    
                                
                                <option value="Mod.Court"  @if($demande->serie=="Mod.Long") selected @endif >Mod.Long</option>
                                <option value="CAP"  @if($demande->serie=="CAP") selected @endif >CAP</option>
                               

                            </select>

                        </div>

                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="mention">Mention obtenu pour
                                l'examen &nbsp;( <span class="text-danger">optionnel</span> )</label>
                            <select class="form-control border-1  form-select" style="height: 50px;" name="mention" id="mention_id">
                                <option value="Passable" @if($demande->mention=="Passable")selected @endif >Passable</option>  
                                <option value="A.Bien" @if($demande->mention=="A.Bien")selected @endif>A.Bien</option>
                                <option value="Bien" @if($demande->mention=="Bien")selected @endif>Bien</option>
                                <option value="Exellente" @if($demande->mention=="Excellente")selected @endif>Exellente</option>

                                {{-- @foreach ($mentions as $mention)
                                    <option value="{{ $mention }}" @if( old('mention_id', $demande->mention)== $mention) selected @endif>{{ $mention }}</option>
                                @endforeach --}}
                            </select>

                        </div>


                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="departement">Département de
                                avez
                                composé &nbsp; <span class="text-danger">*</span></label>
                            <select class="form-control border-1  form-select" style="height: 50px;" name="departement" id="departement_id">
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}"  @if ( old('departement_id', $demande->departement) == $departement->nom) selected @endif >{{ $departement->nom }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="commune">Commune où vous avez
                                composé &nbsp; <span class="text-danger">*</span></label>
                            <select class="form-control border-1  form-select" style="height: 50px;" name="commune">
                                @foreach ($communes as $commune)
                                    <option value="{{ $commune->nom }}"  @if ( old('commune_id', $demande->commune) == $commune->nom) selected @endif >{{ $commune->nom }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                            <label class="control-label label-color" for="centre">Centre dans lequel vous avez
                                composé &nbsp; <span class="text-danger">*</span></label>
                            <select class="form-control border-1  form-select" style="height: 50px;" name="centre">
                                @foreach ($centres as $centre)
                                    <option value="{{ $centre->nom }}" @if ( old('centre_id', $demande->centre) == $centre->nom) selected @endif>{{ $centre->nom }}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-6 p-2">
                            <label for="annee_obtention" class="control-label label-color">Veillez renseigner l'année où
                                vous avez eu le diplôme</label>
                            <input class="form-control border-1  " type="number" maxlenght="4" max="{{ date('Y') }}"
                                name="annee_obtention" id="annee_obtention" value="{{ $demande->annee_obtention }}">

                            @if ($errors->has('annee_obtention'))
                                <span class="text-danger">{{ $errors->first('annee_obtention') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6 p-2">
                           
                                <label class="control-label label-color" for="jury">Jury de l'examen &nbsp; (<span class="text-danger">optionnel</span>)</label>
                                <input type="text" class="form-control border-1  jury" id="jury" name="jury" value="{{ $demande->jury }}" minlength="3" maxlength="4">
                          

                            @if ($errors->has('numero_reference'))
                                <span class="text-danger">{{ $errors->first('numero_reference') }}</span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-4 p-2">
                            <label for="cni" class="control-label label-color">Relevé de note (maximum 10 MB)&nbsp;</label>
                            <input type="file" class="form-control border-1 " accept=".pdf, .docx" name="releve" id="releve"
                                >
                            
                            @if ($errors->has('releve'))
                                <span class="text-danger">{{ $errors->first('releve') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-4 p-2">
                            <label for="acte_naissance" class="control-label label-color">Acte de naissance (Taille maximale 10MB)&nbsp;</label>
                            <input type="file" class="form-control border-1 " accept=".pdf, .docx" name="acte_naissance" id="acte_naissance"
                                id="acte_naissance">
                        
                            @if ($errors->has('acte_naissance'))
                                <span class="text-danger">{{ $errors->first('acte_naissance') }}</span>
                            @endif
                        </div>
                        <div class="form-group col p-2">
                            <label for="cni" class="control-label label-color"> Carte d'identité (Taille maximale 10MB)</label>
                            <input type="file" class="form-control border-1 "  accept=".pdf, .docx" name="cni" id="cni"
                                 id="cni">
                          
                            @if ($errors->has('cni'))
                                <span class="text-danger">{{ $errors->first('cni') }}</span>
                            @endif
                        </div>
                    </div>

                    <p class="favorite-color fw-bold fs-5 pt-5">Autres informations utiles et obligatoires</p>

                    <div class="row mt-4 mb-3">
                        <div class="form-group col-md-4 p-2">
                            <label for="nom_pere" class="control-label label-color">Noms et prénoms exactes du père</label>
                            <input class="form-control border-1  " type="text" name="nom_pere" id="nom_pere" value="{{ $demande->nom_pere }}">

                            @if ($errors->has('nom_pere'))
                                <span class="text-danger">{{ $errors->first('nom_pere') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-4 p-2">
                            <label for="nom_mere" class="control-label label-color">Noms et prénoms exactes de la mère</label>
                            <input class="form-control border-1  " type="text" name="nom_mere" id="nom_mere" value="{{ $demande->nom_mere }}">

                            @if ($errors->has('nom_mere'))
                                <span class="text-danger">{{ $errors->first('nom_mere') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-4 p-2">
                            <label for="contact_parent" class="control-label label-color">Renseignez un numéro joignable
                                d'un de vos parents</label>
                            <input class="form-control border-1  " type="number" name="contact_parent" id="contact_parent" value="{{ $demande->contact_parent }}">

                            @if ($errors->has('contact_parent'))
                                <span class="text-danger">{{ $errors->first('contact_parent') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class=" mt-5 mb-5">
                        <input type="checkbox" name="valide" id="valide">
                        <span class="text-danger ps-2"> Je certifie exacte et juste toutes les informations
                            renseignées</span> <br>
                        <input type="reset" value="Annuler" class="mt-5 btn btn-md btn-danger px-5 me-4">
                        <input type="submit" value="Soumettre la demande" class="mt-5 btn btn-md btn-success px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
