@extends('admin.layouts.template')
@section('content')

<div class="pagetitle mt-3 rounded">
    <nav class="rounded">
        <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4 ">
            <div class=" ">
                <h1 style="font-size: 1.2rem">Ajout d'un nouveau candidat</h1>
                <ol class="breadcrumb mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Dashboard</a></li> &nbsp; /
                    <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Candidats</a></li> &nbsp; /

                    <li class="breadcrumb-item active" >Ajout d'un nouveau candidat</li>
                    </li>
                </ol>
            </div>
            <div class="text-center d-flex justify-content-between mt-2">

                <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                    href=" {{ route('candidats.index') }} ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg> &nbsp;
                    Liste des candidats</a>

            </div>
        </div>
    </nav>
</div>

    <section class="section dashboard mt-3">
        <style>
            .form-control {
                height: 50px;
            }

            .control-label {
                padding-bottom: 5px;
                color: black;
                font-weight: bold;
            }
            .first-color{
                background: #032497F5;
            }
            .section-title{
                color: white;
                background: rgba(3, 36, 151, 0.96);
                border-radius: 5px;
                font-size: 1.2rem;
            }

        </style>
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Top Selling -->
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('addedMessage'))
                            <div class="alert alert-success">
                                <h6> {{ session('addedMessage') }} </h6>
                            </div>
                        @endif

                        @if (session('updatedMessage'))
                            <div class="alert alert-success">
                                <h6> {{ session('updatedMessage') }} </h6>
                            </div>
                        @endif
                        <div class="card top-selling overflow-auto">
            
                            <div class="card-body pb-0">
                                <p class="mt-5 text-danger fw-bolder fs-10"> Tous les champs sont obligatoires*</p>
                                <form method="POST" action="{{ route('candidats.store') }}" enctype="multipart/form-data" class="pb-4">
                                    @csrf

                                    <div class="row mb-3">
                                        <p class=" favorite-color fw-bold fs-5 text-start py-2">Informations personnelles du candidat</p>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nom" class="control-label ">Nom du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du centre" name="nom" id="nom" required>
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="prenom" class="control-label ">Prénom du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le prenom du centre" name="prenom" id="prenom" required>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="contact" class="control-label ">Contact du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="number"
                                                placeholder="Tapez le contact du candidat" name="contact" id="contact" required>
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label label-color" for="sexe">Sexe &nbsp; <span class="text-danger">*</span></label>
                                                    
                                            <select class="form-control border-2 form-select" name="sexe">
                                                <option value="Masculin">Masculin</option>
                                                <option value="Féminin">Féminin</option>
                                                <option value="Autres">Autres</option>
                                            </select>
            
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="date_naissance" class="control-label ">Date de naissance</label>
                                            <input class="form-control border-2 " type="date"
                                                placeholder="Tapez la date de naissance du candidat" name="date_naissance"
                                                id="date_naissance" required>
                                        </div>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="lieu_naissance" class="control-label ">Lieu de naissance du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="text" name="lieu_naissance" id="lieu_naissance" placeholder="Lieu de naissance" required>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12 p-2">
                                            <label for="photo" class="control-label ">Photo du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="file" name="photo" id="photo" required>
                                        </div>
                                       
                                    </div>

                                    <div class="row mb-3">
                                        <p class=" favorite-color fw-bold fs-5 text-start py-2 mt-5">Informations relatives à l'examen</p>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="departement">Département où le candidat a
                                                composé</label> &nbsp; <span class="text-danger">*</span>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="departement_id" id="departement_id" required>
                                                <option value=" "> Sélectionnez le département</option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"> {{ $departement->nom }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="commune">Commune où le candidat a
                                                composé</label> &nbsp; <span class="text-danger">*</span>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="commune_id" id="commune_id" required>
                                                {{-- @foreach ($communes as $commune)
                                                    <option value="{{ $commune->id }}">{{ $commune->nom }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="centre">Centre où le candidat a
                                                composé</label> &nbsp; <span class="text-danger">*</span>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="centre_id" id="centre_id">
                                                {{-- @foreach ($centres as $centre)
                                                    <option value="{{ $centre->id }}">{{ $centre->nom }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label label-color" for="centre">Série de l'examen &nbsp; <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control border-2 form-select" name="serie" id="serie">
                                                <option value="">Choisissez la série</option>
                                                <option value="Mod.Court">Mod.Court</option>
                                                <option value="Mod.Long">Mod.Long</option>
                                                <option value="CAP">CAP</option>
                                               
            
                                            </select>
                                            <span class="text-danger" id="serieError"> </span>
            
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="form-group col p-2">
                                            <label for="numero_table" class="control-label "> Numero de table du
                                                candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le numero de table du candidat" name="numero_table"
                                                id="numero_table" required>
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="annee_obtention" class="control-label "> Année d'obtention du
                                                diplôme</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 annee_obtention" type="number"
                                                placeholder="L'année où le candidat a eu le diplôme" name="annee_obtention"
                                                id="annee_obtention" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="form-group col p-2">
                                            <label for="npi" class="control-label "> Renseignez le numero NPI du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 " type="number"
                                                placeholder="Entrez le numero NPI du candidat" name="npi"
                                                id="npi" required>
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="note" class="control-label "> Renseigner la note en français du candidat</label> &nbsp; <span class="text-danger">*</span>
                                            <input class="form-control border-2 note" type="number"
                                                placeholder="La note en français du candidat" name="note"
                                                id="note" required>
                                        </div>
                                        <div class="row mb-3">
                                            {{-- <div class="form-group col-md-6 p-2">
                                                <label for="reference" class="control-label ">Référence du candidat</label>&nbsp; <span class="text-danger">*</span>
                                                <input class="form-control border-2 " type="text"
                                                    placeholder="Tapez la référence du candidat" name="numero_reference"
                                                    id="reference" required>
                                            </div> --}}
    
                                            <div class="form-group col-md-6 p-2">
                                                <label for="mention" class="control-label ">Mention du candidat</label> &nbsp; <span class="text-danger">*</span>
                                                <input class="form-control border-2 " type="text"
                                                    placeholder="Tapez la mention du candidat" name="mention"
                                                    id="mention" required>
                                            </div>
    
    
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <p class=" favorite-color fw-bold fs-5 text-start py-2 mt-5">Autres informations utiles</p>
                                        <div class="form-group col p-2">

                                            <label for="pere" class="control-label "> Nom & Prénoms du père</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du pere du centre" name="pere" id="pere" required>
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="mere" class="control-label "> Nom & Prénoms de la mère</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du mere du centre" name="mere" id="mere" required>
                                        </div>
                                    </div> --}}


                                    





                                    <div class="d-flex justify-content-center"> 
                                        <input type="reset" value="Annuler" id="send"
                                            class="btn btn-danger fw-bold px-5 mt-4 me-2">
                                        <input type="submit" name="send" value="Enrégistrer" id="send"
                                            class="btn btn-success fw-bold px-5 mt-4 ms-2">

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">

            </div>

        </div>
    </section>
    <script>


        $('document').ready(function(){

            $('#departement_id').on('change', function() {
                let id = $(this).val();
                let commune = document.getElementById('commune_id');
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
                        console.log(communeList);
                        $('#commune_id').html('');
                        $('#commune_id').append(communeList);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            });


            $('#commune_id').on('change', function() {
                let id = $(this).val();
                let centre = document.getElementById('centre_id');
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
                        $('#centre_id').html('');
                        $('#centre_id').append(centreList);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            });


            $('.annee_obtention').yearpicker(); 
        })
         
    </script>
@endsection


