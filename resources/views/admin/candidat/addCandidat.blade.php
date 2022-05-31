@extends('admin.layouts.template')
@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('communes.index') }}">Candidats</a></li>
        <li class="breadcrumb-item active">Ajout candidat</li></li>
        </ol>
    </nav>
</div>

    <section class="section dashboard">
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
                                <h6> {{ session('addedMessage') }} </h6>
                            </div>
                        @endif
                        <div class="card top-selling overflow-auto">
                            <h3 class="card-title bg-warning fw-bold rounded-sm p-3 text-white full-width ">Ajoutez un
                                nouveau candidat</h3>
                            <div class="card-body pb-0">

                                <form method="POST" action="{{ route('candidats.store') }}" enctype="multipart/form-data" class="pb-4">
                                    @csrf

                                    <div class="row mb-3">
                                        <p class="section-title text-start first-color py-2 mt-5">Informations personnelles du candidat</p>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nom" class="control-label ">Nom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du centre" name="nom" id="nom">
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="prenom" class="control-label ">Prénom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le prenom du centre" name="prenom" id="prenom">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="contact" class="control-label ">Contact du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le contact du centre" name="contact" id="contact">
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
                                            <input class="form-control border-2 " type="file" name="photo" id="photo">
                                        </div>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="date_naissance" class="control-label ">Date de naissance</label>
                                            <input class="form-control border-2 " type="date"
                                                placeholder="Tapez la date de naissance du candidat" name="date_naissance"
                                                id="date_naissance">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="section-title text-start first-color py-2 mt-5">Informations concerant le diplôme</p>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="departement">Departement où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="departement_id" id="departement_id">
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"> {{ $departement->nom }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="commune">Commune où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="commune_id" id="commune">
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
                                                name="serie" id="centre" id="serie">
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
                                                id="numero_table">
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="annee_obtention" class="control-label "> Année d'obtention du
                                                diplôme</label>
                                            <input class="form-control border-2 " type="number"
                                                placeholder="L'année où le candidat a eu le diplôme" name="annee_obtention"
                                                id="annee_obtention">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <p class="section-title text-start first-color py-2 mt-5">Autres informations utiles</p>
                                        <div class="form-group col p-2">

                                            <label for="pere" class="control-label "> Nom & Prénoms du père</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du pere du centre" name="pere" id="pere">
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="mere" class="control-label "> Nom & Prénoms de la mère</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du mere du centre" name="mere" id="mere">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="reference" class="control-label ">Référence du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez la référence du candidat" name="numero_reference"
                                                id="reference">
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="mention" class="control-label ">Mention du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez la mention du candidat" name="mention"
                                                id="mention">
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
@endsection


