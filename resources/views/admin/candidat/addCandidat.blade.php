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
                                            <label for="nom" class="control-label ">Nom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du centre" name="nom" id="nom" required>
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="prenom" class="control-label ">Prénom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le prenom du centre" name="prenom" id="prenom" required>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="contact" class="control-label ">Contact du candidat</label>
                                            <input class="form-control border-2 " type="number"
                                                placeholder="Tapez le contact du candidat" name="contact" id="contact" required>
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="sexe">Sexe</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="sexe">
                                                @foreach ($sexes as $sexe)
                                                    <option value="{{ $sexe }}">{{ $sexe }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="photo" class="control-label ">Photo du candidat</label>
                                            <input class="form-control border-2 " type="file" name="photo" id="photo" required>
                                        </div>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="date_naissance" class="control-label ">Date de naissance</label>
                                            <input class="form-control border-2 " type="date"
                                                placeholder="Tapez la date de naissance du candidat" name="date_naissance"
                                                id="date_naissance" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class=" favorite-color fw-bold fs-5 text-start py-2 mt-5">Informations relatives à l'examen</p>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="departement">Departement où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="departement_id" id="departement_id" required>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"> {{ $departement->nom }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="commune">Commune où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="commune_id" id="commune" required>
                                                @foreach ($communes as $commune)
                                                    <option value="{{ $commune->id }}">{{ $commune->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="centre">Centre où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="centre_id" id="centre">
                                                @foreach ($centres as $centre)
                                                    <option value="{{ $centre->id }}">{{ $centre->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="centre">Série du candidat</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="serie" id="serie">
                                                @foreach ($series as $serie)
                                                    <option value="{{ $serie }}">{{ $serie }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="form-group col p-2">
                                            <label for="numero_table" class="control-label "> Numero de table du
                                                candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le numero de table du candidat" name="numero_table"
                                                id="numero_table" required>
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="annee_obtention" class="control-label "> Année d'obtention du
                                                diplôme</label>
                                            <input class="form-control border-2 annee_obtention" type="number"
                                                placeholder="L'année où le candidat a eu le diplôme" name="annee_obtention"
                                                id="annee_obtention" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
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
                                    </div>


                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="reference" class="control-label ">Référence du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez la référence du candidat" name="numero_reference"
                                                id="reference" required>
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="mention" class="control-label ">Mention du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez la mention du candidat" name="mention"
                                                id="mention" required>
                                        </div>


                                    </div>





                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="send" value="Enrégistrer" id="send"
                                            class="btn btn-success fw-bold px-5 mt-4">

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
            $('.annee_obtention').yearpicker(); 
        })
         
    </script>
@endsection


