@extends('admin.layouts.template')
@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('communes.index') }}">Candidats</a></li>
        <li class="breadcrumb-item active">Modifier candidat</li></li>
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
                            <h3 class="card-title bg-warning fw-bold rounded-sm p-3 text-white full-width ">Modifier les infos du candidat</h3>
                            <div class="card-body pb-0">

                                <form method="POST" action="{{ route('candidats.update',['candidat'=>$candidat->id]) }}" enctype="multipart/form-data" class="pb-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nom" class="control-label ">Nom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                                value="{{ $candidat->nom }}" name="nom" id="nom">
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="prenom" class="control-label ">Prénom du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->prenom }}" name="prenom" id="prenom">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="contact" class="control-label ">Contact du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->contact }}" name="contact" id="contact">
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="sexe">Sexe</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="sexe" id="sexe_id">
                                                @foreach ($sexes as $sexe)
                                                    <option value="{{ $sexe }}" @if ( old('sexe_id', $candidat->sexe) == $sexe) selected @endif >{{ $sexe }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="departement">Departement où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="departement_id" id="departement_id">
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}"  @if ( old('departement_id', $candidat->centre->commune->departement->nom) == $departement->nom) selected @endif > {{ $departement->nom }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="commune">Commune où le candidat a
                                                composé</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="commune_id" id="commune_id">
                                                @foreach ($communes as $commune)
                                                    <option value="{{ $commune->id }}" @if ( old('commune_id', $candidat->centre->commune->nom) == $commune->nom) selected @endif >{{ $commune->nom }}</option>
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
                                                name="serie" id="serie_id">
                                                @foreach ($series as $serie)
                                                    <option value="{{ $serie }}"  @if ( old('sexe_id', $candidat->serie) == $serie) selected @endif >{{ $serie }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="form-group col p-2">
                                            <label for="numero_table" class="control-label "> Numero de table du
                                                candidat</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->numero_table }}"  name="numero_table"
                                                id="numero_table">
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="annee_obtention" class="control-label "> Année d'obtention du
                                                diplôme</label>
                                            <input class="form-control border-2 " type="number"
                                            value="{{ $candidat->annee_obtention }}"  name="annee_obtention"
                                                id="annee_obtention">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col p-2">
                                            <label for="pere" class="control-label "> Nom & Prénoms du père</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->nom_pere }}"  name="pere" id="pere">
                                        </div>

                                        <div class="form-group col p-2">
                                            <label for="mere" class="control-label "> Nom & Prénoms de la mère</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->nom_mere }}"  name="mere" id="mere">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="reference" class="control-label ">Référence du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->numero_reference }}" name="numero_reference"
                                                id="reference">
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="mention" class="control-label ">Mention du candidat</label>
                                            <input class="form-control border-2 " type="text"
                                            value="{{ $candidat->mention }}" name="mention"
                                                id="mention">
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="photo" class="control-label ">Photo du candidat</label>
                                            <input class="form-control border-2 " type="file" name="photo" id="photo">
                                            <img src="{{asset('storage/'.$candidat->photo) }}" width="60" height="60"  alt="">
                                        </div>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="date_naissance" class="control-label ">Date de naissance</label>
                                            <input class="form-control border-2 " type="date"
                                            value="{{ $candidat->date_naissance }}"  name="date_naissance" id="date_naissance">
                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="send" value="Enrégistrer les mofications" id="send"
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





