@extends('admin.layouts.template')
@section('content')

<div class="pagetitle mt-3 rounded">
    <nav class="rounded">
        <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4 ">
            <div class=" ">
                <h1 style="font-size: 1.2rem">Ajout d'un nouveau flash info</h1>
                <ol class="breadcrumb mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('flashInfos.index') }}">Dashboard</a></li> &nbsp; /
                    <li class="breadcrumb-item"><a href="{{ route('flashInfos.index') }}">Flash infos</a></li> &nbsp; /

                    <li class="breadcrumb-item active">Ajout d'un nouveau flash info</li>
                    </li>
                </ol>
            </div>
            <div class="text-center d-flex justify-content-between mt-2">

                <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                    href=" {{ route('flashInfos.index') }} ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg> &nbsp;
                    Liste des flash infos</a>

            </div>
        </div>
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

                    @if (session('addFlashMessage'))

                        <div class="alert alert-success">
                            <h6> {{ session('addFlashMessage') }} </h6>
                        </div>

                    @endif

                    @if (session('editFlashMessage'))
                        <div class="alert alert-success">
                            <h6> {{ session('editFlashMessage') }} </h6>
                        </div>
                    @endif

                    @if (session('statusMessage'))
                        <div class="alert alert-success">
                            <h6> {{ session('statusMessage') }} </h6>
                        </div>
                    @endif

                  <div class="card top-selling overflow-auto">
                
                    <div class="card-body pb-0">
                        <p class="mt-5 text-danger fw-bolder fs-10 mb-2"> Tous les champs sont obligatoires*</p>
                        <form method="POST" action="{{ route('flashInfos.store') }}" class="my-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-11">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class=" pt-3 " for="date_debut">Date de début </label>
                                            <input type="date"
                                                class="form-control-lg  @error('date_debut') is-invalid @enderror   form-control"
                                                name="date_debut" id="date_debut" placeholder="">
                                            @error('date_debut')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label class=" pt-3 " for="date_fin">Date de fin </label>
                                            <input type="date"
                                                class="form-control-lg  @error('date_fin') is-invalid @enderror   form-control"
                                                name="date_fin" id="date_fin" placeholder="">
                                            @error('date_fin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-12 form-group mt-3">
                                        <label class=" " for="contenu">Contenu </label>
                                        <textarea class=" @error('contenu') is-invalid @enderror form-control h-50  " name="contenu" id="contenu"
                                            rows="5"></textarea>
                                        @error('contenu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="text-center d-flex justify-content-center mt-4">
                                        <button type="reset" style="background:red;"
                                            class=" col-md-2 p-2 me-2  text-center text-white font-weight-bold border-0 rounded"
                                            name="addFlash" id="addFlash">ANNULER</button>
                                        <input type="submit" value="AJOUTER" style="background: #178B01;"
                                            class=" col-md-2 p-2 ms-2  text-center text-white font-weight-bold border-0 rounded"
                                            name="addFlash" id="addFlash">
                                    </div>

                                </div>
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


