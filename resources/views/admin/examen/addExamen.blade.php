@extends('admin.layouts.template')
@section('content')

    <div class="pagetitle mt-3 rounded">
        <nav class="rounded">
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4 ">
                <div class=" ">
                    <h1 style="font-size: 1.2rem">Ajout d'un nouveau examen</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('examens.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('examens.index') }}">Examens</a></li> &nbsp; /

                        <li class="breadcrumb-item active">Ajout d'un nouveau examen</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">

                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('examens.index') }} ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                            class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg> &nbsp;
                        Liste des examens</a>

                </div>
            </div>
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
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                       


                       
                        <div class="card top-selling overflow-auto">


                            <div class="card-body pb-0 MT-3">
                                <p class="mt-5 text-danger fw-bolder fs-10 mb-2"> Tous les champs sont obligatoires*</p>
                                <form method="POST" action="{{ route('examens.store') }}"
                                    enctype="multipart/form-data" class="pb-4">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-3">
                                        <div class="form-group col p-2">
                                            <label for="annee" class="control-label ">Année</label>
                                            <input class="form-control " type="number" required
                                                placeholder="Tapez l'annee de l'examen" name="annee" id="annee">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="reference" class="control-label "> Renseignement du taux des examens de l'année </label>
                                        <div class="row">
                                            <div class="form-group col p-2">
                                                Examens:
    
                                            </div>
                                            <div class="form-group col p-2">
                                                Taux: 
                                            </div>
                                        </div>

                                        
                                        @if(sizeof($type_examens)>0)
                                            @foreach ($type_examens as $i=>$type_examen)
                                                <div class="row">
                                                    <div class="form-group col-4 p-2">
                                                        <input type="text" name="examens[{{ $i }}][examen]" class="form-control border-0"
                                                        value="{{ $type_examen }}" required> 
            
                                                    </div>
                                                    <div class="form-group col-8 p-2">
                                                        <input type="number" name="examens[{{ $i }}][taux]" class="form-control"
                                                        value="{{ old('examens['.$i.'][taux]') }}" required> 
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>


                                    <div class="text-center d-flex justify-content-center mt-4">
                                        <button type="reset" style="background:red;"
                                            class=" col-md-2 p-2 me-2  text-center text-white font-weight-bold border-0 rounded"
                                            name="addFlash" id="addFlash">ANNULER</button>
                                        <input type="submit" value="AJOUTER" style="background: #178B01;"
                                            class=" col-md-2 p-2 ms-2  text-center text-white font-weight-bold border-0 rounded"
                                            name="addFlash" id="addFlash">
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
