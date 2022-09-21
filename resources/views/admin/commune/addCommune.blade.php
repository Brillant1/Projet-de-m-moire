@extends('admin.layouts.template')
@section('content')

<div class="pagetitle mt-3 rounded">
    <nav class="rounded">
        <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4 ">
            <div class=" ">
                <h1 style="font-size: 1.2rem">Ajout d'une nouvelle commune</h1>
                <ol class="breadcrumb mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Dashboard</a></li> &nbsp; /
                    <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Communes</a></li> &nbsp; /

                    <li class="breadcrumb-item active">Ajout d'une nouvelle commune</li>
                    </li>
                </ol>
            </div>
            <div class="text-center d-flex justify-content-between mt-2">

                <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                    href=" {{ route('communes.index') }} ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg> &nbsp;
                    Liste des communes</a>

            </div>
        </div>
    </nav>
</div>
        <section class="section dashboard mt-3 bg-white">
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
                    <p class="mt-5 text-danger fw-bolder fs-10 ms-3"> Tous les champs sont obligatoires*</p>
                    <div class="card-body pb-0">
                        <form method="POST" action="{{route('communes.store')}}" enctype="multipart/form-data" class="pb-4">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-6 p-2">
                                    <label for="nom" class="control-label " >Nom de la commune</label>
                                    <input class="form-control border-2 " type="text" placeholder="Tapez le nom de la commune" name="nom" id="nom">
                                </div>
                                <div class="form-group col-md-6 p-2">
                                    <label for="reference" class="control-label" >Référence de la commune</label>
                                    <input class="form-control border-2 " type="text" placeholder="Tapez la référence de la commune" name="reference" id="reference">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-12 p-2" style="padding:10px 0 10px 0;">
                                    <label class="control-label" for="departement">Département d'appartenance de la commune</label>
                                    <select class="form-control border-2 form-select" style="height: 50px;" name="departement_id" id="departement">
                                        @foreach ($departements as $departement )
                                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="text-center d-flex justify-content-center mt-4">
                                <button type="reset" style="background:red;"
                                    class=" col-md-2 p-2 me-2  text-center text-white font-weight-bold border-0 rounded"
                                    name="addFlash" id="addFlash">ANNULER</button>
                                <input type="submit" style="background: #178B01;"
                                    class=" col-md-2 p-2 ms-2  text-center text-white font-weight-bold border-0 rounded"
                                    name="send" value="Enrégistrer" id="send">
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


