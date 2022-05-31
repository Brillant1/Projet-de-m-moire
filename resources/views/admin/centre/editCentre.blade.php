@extends('admin.layouts.template')
@section('content')

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('centres.index') }}">Centres</a></li>
                <li class="breadcrumb-item active">Editer centre</li></li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <style>
                .form-control{
                    height: 50px;
                }
                .control-label{
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
                            <h6> {{ session('addedMessage') }} </h6>
                        </div>

                    @endif
                  <div class="card top-selling overflow-auto">
                    <h3 class="card-title bg-warning fw-bold rounded-sm p-3 text-white full-width ">Edition du centre</h3>
                    <div class="card-body pb-0">

                        <form method="POST" action="{{route('centres.update',['centre'=>$centre->id])}}" enctype="multipart/form-data" class="pb-4">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-group col-md-6 p-2">
                                    <label for="nom" class="control-label " >Nom du centre</label>
                                    <input class="form-control border-2 " type="text" value="{{ $centre->nom }}" name="nom" id="nom">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label for="reference" class="control-label " >Référence du centre</label>
                                    <input class="form-control border-2 " type="text" value="{{ $centre->reference }}" name="reference" id="reference">
                                </div>

                            </div>
                            <div class="row mb-3">

                                <div class="form-group col p-2">
                                    <label for="directeur" class="control-label " >Directeur du centre</label>
                                    <input class="form-control border-2 " type="text" value="{{ $centre->nom}}" name="directeur" id="directeur">
                                </div>

                                <div class="form-group col-md-6 p-2" style="padding:10px 0 10px 0;">
                                    <label class="control-label" for="commune">Commune d'appartenance du centre</label>
                                    <select class="form-control border-2 form-select" style="height: 50px;" name="commune_id" id="commune_id">
                                        @foreach ($communes as $commune )
                                            <option value="{{$commune->nom}}"
                                                @if ( old('commune_id', $centre->commune->id) == $commune->id) selected @endif >{{ $commune->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6 p-2">
                                    <label for="nombre_candidat" class="control-label">Nombre de candidat ayant composé</label>
                                    <input type="number" name="nombre_candidat"  id="nombre_candidat" class="form-control border-2"
                                       value="{{ $centre->nombre_candidat }}">
                                </div>
                                <div class="form-group col-md-6 p-2">
                                    <label for="nombre_candidat_admis" class="control-label" class="text-dark">Nombre de candidat admis</label>
                                    <input type="number" name="nombre_candidat_admis"  id="nombre_candidat_admis" class="form-control border-2" value="{{ $centre->nombre_candidat_admis }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col p-2">
                                    <label for="annee" class="control-label" class="text-dark">Année</label>
                                    <input type="number" name="annee" value="{{ $centre->annee }}"  id="annee" class="form-control border-2">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <input type="submit" name="send" value="Enrégistrer les modifications" id="send" class="btn btn-success fw-bold px-5 mt-4">
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

