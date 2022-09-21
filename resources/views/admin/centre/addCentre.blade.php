@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3 rounded">
        <nav class="rounded">
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4 ">
                <div class=" ">
                    <h1 style="font-size: 1.2rem">Ajout d'un nouveau centre</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Centres</a></li> &nbsp; /

                        <li class="breadcrumb-item active">Ajout d'un nouveau centre</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">

                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('centres.index') }} ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                            class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg> &nbsp;
                        Liste des centres</a>

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
        </style>
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Top Selling -->
                    <div class="col-12">
                        {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

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

                            <div class="card-body pb-0">
                                <p class="mt-5 text-danger fw-bolder fs-10"> Tous les champs sont obligatoires*</p>
                                <form method="POST" action="{{ route('centres.store') }}" enctype="multipart/form-data"
                                    class="pb-4">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nom" class="control-label ">Nom du centre</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du centre" name="nom" id="nom">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 p-2">
                                            <label for="reference" class="control-label ">Référence du centre</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez la référence du centre" name="reference" id="reference">
                                                @error('reference')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">

                                        <div class="form-group col p-2">
                                            <label for="directeur" class="control-label ">Directeur du centre</label>
                                            <input class="form-control border-2 " type="text"
                                                placeholder="Tapez le nom du directeur du centre" name="directeur"
                                                id="directeur">
                                                @error('directeur')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                            <label class="control-label" for="commune">Commune d'appartenance du
                                                centre</label>
                                            <select class="form-control border-2 form-select" style="height: 50px;"
                                                name="commune_id" id="commune">
                                                @foreach ($communes as $commune)
                                                    <option value="{{ $commune->id }}">{{ $commune->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nombre_candidat" class="control-label">Nombre de candidat ayant
                                                composé</label>
                                            <input type="number" name="nombre_candidat" id="nombre_candidat"
                                                class="form-control border-2"
                                                placeholder="Tapez le nombre de candidat ayant commposé">
                                                @error('nombre_candidat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 p-2">
                                            <label for="nombre_candidat_admis" class="control-label"
                                                class="text-dark">Nombre de candidat admis</label>
                                            <input type="number" name="nombre_candidat_admis" id="nombre_candidat_admis"
                                                class="form-control border-2"
                                                placeholder="Tapez le nombre de candidat ayant admis">
                                                @error('nombre_candidat_admis')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col p-2">
                                            <label for="annee" class="control-label" class="text-dark">Année</label>
                                            <input type="number" name="annee" id="annee"
                                                class="form-control border-2 annee">
                                                @error('annee')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                                
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
        $('document').ready(function() {
            $('.annee').yearpicker();
        })
    </script>
@endsection
