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
    </style>

    <div id="carouselExampleIndicators" class="carousel slide container-fluid p-0 m-0 position-relative"
        data-bs-ride="carousel">

        <div class="d-flex justify-content-center flex-column"
            style=" z-index: 99 ;position: absolute; top: 0px; background: rgba(3, 36, 151, 0.71); width: 100% ; height: 300px;">
            <h2 class="text-white ms-5 fw-bold" style="line-height:50px;">
                Formulaire de demande d'attestation des examens au Bénin.
                <br> Nous protégeons toutes vos informations personnelles.
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
                <h2 class="text-center ">Veillez remplir en suivant rigoureusement les règles données, le formulaire
                    suivant pour votre demande</h2>
                <p class="text-center text-danger">Tous les champs sont obligatoires *</p>
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
                        }

                        .progressbar::before,
                        .progress {
                            content: "";
                            position: absolute;
                            margin-top: 47px;
                            width: 70.6%;
                            height: 4px;
                            background-color: #cdcdcd;
                            transform: translateY(-50%);
                            z-index: -100;
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
                            <div class="form-group col-md-4 p-2">

                                <label for="nom" class="control-label label-color">Mettez vos noms en ordre et en
                                    intégralité &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 py-1" type="text" name="nom" id="nom"
                                    value="{{ old('nom') }}">
                                <span class="text-danger" id="nomError"> </span>
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2">

                                <label for="prenom" class="control-label label-color">Prénoms inscrits sur
                                    l'acte de naissance (en ordre) &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="text" name="prenom"
                                    value="{{ old('prenom') }}" id="prenom">
                                <span class="text-danger" id="prenomError"> </span>
                                @if ($errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2">
                                <label for="date_naissance" class="control-label label-color">Date de naissance (celle
                                    inscrite sur l'acte de naissance) &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 input-mask" type="date" name="date_naissance"
                                    value="{{ old('date_naissance') }}" id="date_naissance"
                                    data-inputmask=" 'mask':'99/9999' " im-insert="true">
                                <span class="text-danger" id="date_naissanceError"> </span>

                                @if ($errors->has('date_naissance'))
                                    <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="row mb-3">

                            <div class="form-group col-md-4 p-2">
                                <label for="email" class="control-label label-color">Renseignez une adresse mail valide
                                    et
                                    joignable &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="mail" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="exemple@gmail.com">
                                <span class="text-danger" id="emailError"> </span>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2">
                                <label for="contact" class="control-label label-color">Votre numéro (renseignez un numéro
                                    joignable) &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 contact" type="number" name="contact" id="contact"
                                    value="{{ old('contact') }}" maxlength="8" >
                                <span class="text-danger" id="contactError"> </span>
                                @if ($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="sexe">Sexe &nbsp; <span
                                        class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="sexe">

                                    @foreach ($sexes as $sexe)
                                        <option value="{{ $sexe }}"> {{ $sexe }}</option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="form-group col-md-4 p-2">
                                <label for="ville_naissance" class="control-label label-color">Votre ville de
                                    naissance &nbsp; <span class="text-danger">*</span></label>

                                <input class="form-control border-1 " type="text" name="ville_naissance"
                                    value="{{ old('ville_naissance') }}" id="ville_naissance">
                                <span class="text-danger" id="ville_naissanceError"> </span>

                                @if ($errors->has('vile_naissance'))
                                    <span class="text-danger">{{ $errors->first('vile_naissance') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-8 p-2">
                                <label for="photo" class="control-label label-color">Photo claire jusqu'au ventre munie
                                    de votre
                                    carte d'identité en main (png, jpg ou jpeg) &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" name="photo" id="photo"
                                    value="{{ old('photo') }}">
                                <span class="text-danger" id="photoError"> </span>
                                @if ($errors->has('photo'))
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif

                            </div>

                        </div>
                        <div class="d-flex justify-content-end ">

                            <button
                                class="btn btn-next next1 text-white fw-bold p-2 text-center col-2 mt-5 mb-5 rounded bg-success"
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
                            <div class="form-group col-md-4 p-2">
                                <label for="numero_table" class="control-label label-color">Veillez renseigner exactement
                                    votre
                                    numero de table &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="text" name="numero_table"
                                    id="numero_table" value="{{ old('numero_table') }}"
                                    placeholder="Exemple : 528-AB7-88" >
                                <span class="text-danger" id="numero_tableError"> </span>

                                @if ($errors->has('numero_table'))
                                    <span class="text-danger">{{ $errors->first('numero_table') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="centre">Série de l'examen &nbsp; <span
                                        class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="serie" id="serie">

                                    @foreach ($series as $serie)
                                        <option value="{{ $serie }}">{{ $serie }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger" id="serieError"> </span>

                            </div>

                            {{-- <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="serie">Type de l'examen &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="BEPC" class="form-control border-1 ">
                            </div> --}}

                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="mention">Mention obtenu pour
                                    l'examen &nbsp; <span class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="mention">

                                    @foreach ($mentions as $mention)
                                        <option value="{{ $mention }}">{{ $mention }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="departement">Département dans laquelle vous
                                    avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="departement">
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->nom }}">{{ $departement->nom }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="commune">Commune où vous avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="commune">
                                    @foreach ($communes as $commune)
                                        <option value="{{ $commune->nom }}">{{ $commune->nom }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group col-md-4 p-2" style="padding:10px 0 10px 0;">
                                <label class="control-label label-color" for="centre">Centre dans lequel vous avez
                                    composé &nbsp; <span class="text-danger">*</span></label>
                                <select class="form-control border-1 form-select" name="centre">
                                    @foreach ($centres as $centre)
                                        <option value="{{ $centre->nom }}">{{ $centre->nom }}</option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="form-group col-md-4 p-2">
                                <label class="control-label label-color" for="etablissement">Établissement fréquenté &nbsp; <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border-1 etablissement" id="etablissement" name="etablissement">
                            </div>

                            <div class="form-group col-md-4 p-2">
                                <label for="annee_obtention" class="control-label label-color">Année
                                    d'obtention du diplôme  &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control  border-1 annee" type="number" name="annee_obtention" length="4"
                                    id="annee_obtention" value="{{ old('annee_obtention') }}">
                                <span class="text-danger" id="annee_obtentionError"> </span>

                                @if ($errors->has('annee_obtention'))
                                    <span class="text-danger">{{ $errors->first('annee_obtention') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 p-2">
                                <label class="control-label label-color" for="jury">Jury de l'examen &nbsp; <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border-1 jury" id="jury" name="jury" minlength="3" maxlength="4">
                            </div>
                           
                            
                        </div>

                       
                        <div class="row mb-3">
                            <div class="form-group col p-2">
                                <label for="photo" class="control-label label-color">Relevé de note + Acte de naissance + Carte d'identité<b class="text-uppercase"> (UN SEUL FICHIER PDF)</b> &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control border-1" name="releve" id="releve"
                                    value="{{ old('releve') }}">
                                <span class="text-danger" id="releveError"> </span>
                                @if ($errors->has('releve'))
                                    <span class="text-danger">{{ $errors->first('releve') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex dis justify-content-end mb-5">
                            <button id="prev1"
                                class="text-white btn btn-prev fw-bold p-2 me-3 text-center col-2 mt-5 mb-5 rounded bg-danger">
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
                            <button
                                class="text-white fw-bold btn btn-next p-2 ms-3 text-center col-2 mt-5 mb-5 rounded btn btn-success"
                                id="next2">
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

                    {{-- form section 3 --}}
                    <div class="form-section form-section3" id="form-section3">
                        <p class="favorite-color fw-bold fs-4 pt-5">Autres informations utiles et obligatoires</p>

                        <div class="row mt-4 mb-3">
                            <div class="form-group col-md-4 p-2">
                                <label for="nom_pere" class="control-label label-color">Noms et prénoms exactes du
                                    père &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " value="{{ old('nom_pere') }}" type="text"
                                    name="nom_pere" id="nom_pere" required>
                                <span class="text-danger" id="nom_pereError"> </span>

                                @if ($errors->has('nom_pere'))
                                    <span class="text-danger">{{ $errors->first('nom_pere') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 p-2">
                                <label for="nom_mere" class="control-label label-color">Noms et prénoms exactes de la
                                    mère &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 " type="text" name="nom_mere" id="nom_mere"
                                    value="{{ old('nom_mere') }}" required>
                                <span class="text-danger" id="nom_mereError"> </span>

                                @if ($errors->has('nom_mere'))
                                    <span class="text-danger">{{ $errors->first('nom_mere') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 p-2">
                                <label for="contact_parent" class="control-label label-color">Renseignez un numéro
                                    joignable
                                    d'un de vos parents &nbsp; <span class="text-danger">*</span></label>
                                <input class="form-control border-1 contact_parent" type="number" name="contact_parent"
                                    id="contact_parent" value="{{ old('contact_parent') }}" required length="8" >
                                <span class="text-danger" id="numero_contact_parentError"> </span>

                                @if ($errors->has('contact_parent'))
                                    <span class="text-danger">{{ $errors->first('contact_parent') }}</span>
                                @endif

                            </div>
                        </div>

                        <button
                            class="text-white btn btn-prev fw-bold p-2 me-3 text-center col-2 mt-5 mb-5 rounded bg-danger"
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
                        </button>
                        <div class="mb-5">
                            <input type="checkbox" name="valide" id="valide" required>
                            <span class="text-danger ps-2"> Je certifie exactes et justes toutes les informations
                                renseignées</span> <br>
                            <input type="reset" value="Annuler tout"
                                class="mt-5 btn btn-md bg-favorite-color text-white px-5 me-4">
                            <button class="mt-5 btn btn-md btn-success px-5" id="sendDemande" type="submit">Payez pour
                                soumettre
                                votre demande</button>
                        </div>
                    </div>
                    {{-- end form section 3 --}}
                </form>





            </div>
        </div>
    </div>

    <script src="https://cdn.kkiapay.me/k.js"></script>

    <script>
        $('document').ready(function() {

            $('#next1').click(function(e) {
                e.preventDefault();

                let photo = $("#photo").val();
                let nbre = photo.length;

                // var sizePhoto = document.getElementById('photo').files[0].size;
               
                
                var fileInput = document.getElementById('photo');
                var filePath = fileInput.value;

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
                } else if ($("#ville_naissance").val() == '') {
                    $('#ville_naissanceError').text('la ville de naissance est obligatoire');
                } else if (photo == '') {
                    $('#photoError').text('la photo est obligatoire');
                } 
                // else if(sizePhoto > 15000000){
                //     $('#photoError').text('Taille de fichier trop grande');
                // }
                
                else if (!allowedExtensions.exec(filePath)) {
                    $('#photoError').text('Extension de fichier non correcte');
                }
                // else if ( (photo.slice(photo.length -4, photo.length)) != ".png" || (photo.slice(photo.length -4, photo.length) != ".jpg") || (photo.slice(photo.length -5, photo.length)) != ".jpeg") {
                //     $('#photoError').text('Extension de fichier non correcte');
                // }
                else {
                    $('#form-section1').removeClass('form-section-active');
                    $('#form-section2').addClass('form-section-active');
                    $('#progresse2').addClass('progressbar-item-active');
                    $('.progress').width('34%');
                }
            });

            $('#prev1').click(function(e) {
                e.preventDefault();
                $('#form-section2').removeClass('form-section-active');
                $('#form-section1').addClass('form-section-active');
                $('#progresse2').removeClass('progressbar-item-active');
                $('.progress').width('0%');
            });

            $('#next2').click(function(e) {

                var inputNumeroTableRule = /^[0-9]{3}\-[A-Za-z0-9]{3}\-[0-9]{2}$/;
                var releveFileSize = document.getElementById('releve').files[0].size;
                var releveFileType = document.getElementById('releve').files[0].type;
                

                e.preventDefault();
                if ($("#numero_table").val() == '') {
                    $('#numero_tableError').text('le numero de table est obligatoire');
                }

                else if(!inputNumeroTableRule.test($("#numero_table").val())) {
                    $('#numero_tableError').text('le numero de table est obligatoire');
                }
                
                else if ($('#serie').val() == '') {
                    $('#serieError').text('Choisissez une série');
                } else if ($("#annee_obtention").val() == '') {
                    $('#annee_obtentionError').text('Année obligatoire');
                } else if ($("#annee_obtention").val() < 2010 || $("#annee_obtention").val() > 2022) {
                    $('#annee_obtentionError').text('Format de l\'année non correct');
                } else if ($('#releve').val() == '') {
                    $('#releveError').text('Le releve de note est obligatoire');
                } 
                else if ( releveFileSize >15000000 ) {
                    $('#releveError').text('Taille de fichier trop grande');
                } 

                else if ( releveFileType !="application/pdf") {
                    $('#releveError').text('Vous devez uploader un fichier pdf');
                }
                // else if (!allowedExtensionPdf.exec(filePathPdf)){
                //     $('#releveError').text('Le relevé doit être au format pdf');
                // }
                else {
                    $('#form-section2').removeClass('form-section-active');
                    $('#form-section3').addClass('form-section-active');
                    $('#progresse3').addClass('progressbar-item-active');
                    $('.progress').width('67%');
                }
            });

            $('#prev2').click(function(e) {
                e.preventDefault();
                $('#form-section3').removeClass('form-section-active');
                $('#form-section2').addClass('form-section-active');
                $('#progresse3').removeClass('progressbar-item-active');
                $('.progress').width('34%');
            });

            $('#sendDemande').click(function(e) {

                if ($("#nom_pere").val() == '') {
                    $('#nom_pereError').text('le nom du père est obligatoire');
                } else if ($("#nom_mere").val() == '') {
                    $('#nom_mereError').text('le nom de la mère est obligatoire');

                } else if ($("#contact_parent").val() == '') {
                    $('#contact_parentError').text('le contact du parent est obligatoire');
                }
            });

            $(".contact_parent").inputmask("(999) 999-9999");


            $("#annee_obtention").yearpicker({

            });

            // var setting = #^[0-9]{3}\-[A-Za-z0-9]{3}\-[0-9]{2}$#;

            

        });
    </script>
@endsection
