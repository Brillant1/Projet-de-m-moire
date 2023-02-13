@extends('admin.layouts.template')
<style>
    
</style>
@section('content')
    <div class="pagetitle mt-3" style="border-radius: 10px;">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des demandes</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Liste des demandes</a></li> &nbsp;
                    </ol>
                </div>
                {{-- <div class="text-center d-flex justify-content-between mt-2">

                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href="#">Ajouter un
                        nouveau</a>

                </div> --}}
            </div>
        </nav>
    </div>



    <div class="title mt-3">
        <div class="tile-body">
            @if (Session::has('updatedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ Session::get('updatedMessage') }} </h3>
                </div>
            @endif



            @if (session('generateMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ Session('generateMessage') }} </h3>
                </div>
            @endif
            @if (Session::has('deletedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ Session::get('deletedMessage') }} </h3>
                </div>
            @endif

        </div>

    

        <div class="shadow p-5 bg-white" style="border-radius: 10px;">

            <div class="advanced-search container-fluid mb-5">
                <p class="fw-bold">Recherche avancée ...</p>
                <form action="{{ route('demandes-liste') }}" method="POST" class="advanced-search-form mt-3">
                    @csrf
                    <div class=" col-2">
                        <label class="control-label" for="departement">Département</label>
                        <select class="form-control form-select" name="departement_id" id="departement">
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->nom }}" @if(old('departement_id')== $departement->nom) selected @endif >{{ $departement->nom }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="ms-3 col-2">
                        <label class="control-label" for="commune">Commune</label>
                        <select class="form-control form-select" name="commune_id" id="commune">
                            @foreach ($communes as $commune)
                                <option value="{{ $commune->nom }}">{{ $commune->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    @php
                        $centres= App\Models\Centre::all();
                    @endphp
                    <div class="ms-3 col-2">
                        <label class="control-label" for="commune">Centre</label>
                        <select class="form-control form-select" name="commune_id" id="commune">
                            @foreach ($centres as $centre)
                                <option value="{{ $centre->nom }}">{{ $centre->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ms-3 col-2">
                        <label class="control-label" for="serie">Série</label>
                        <select class="form-control form-select" name="serie_id" id="serie">
                            <option value="">Choisissez la série</option>
                            <option value="Mod.Court">Mod.Court</option>
                            <option value="Mod.Long">Mod.Long</option>
                            <option value="CAP">CAP</option>
                        </select>
                    </div>

                    <div class="ms-3">
                        <label for="">Année</label>
                        <input type="number" class="form-control" id="annee" name="annee" value="{{ @old('annee') }}">
                    </div>


                    <div class="ms-3 mt-3">
                        <input class="btn btn-success  px-4" type="submit" value="Rechercher ...">
                    </div>
                </form>
            </div>

            <div class="table-responsive container-fluid ">
                <table class="table border-collapse table-responsive datatable" id="demandeTable">
                    <thead>
                        <tr class=" ">
                            <th class="">Date</th>
                            <th class=" ">Nom</th>
                            <th class=" ">N° Table</th>
                            <th class="">Centre</th>
                            <th>Commune</th>
                            <th>Année</th>
                            <th>Statut</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="" id="">
                            <th class="">Date</th>
                            <th class=" ">Nom</th>
                            <th class=" ">N° Table</th>
                            <th class="">Centre</th>
                            <th>Commune</th>
                            <th>Année</th>
                            <th>Statut</th>
                            <th class=""></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($demandes as $demande)
                      
                        @php
                            $centres = App\Models\Centre::where('id',$demande->centre)->get();    
                            $communes = App\Models\Commune::where('id',$demande->commune)->get();    
                        @endphp
                            <tr class="">
                                <td class="">{{ $demande->created_at->format('d-m-Y') }}  à  {{ $demande->created_at->format('H:i') }}</td>

                                {{-- <td>{{ $demande->created_at->format('m-d-Y') }} à {{ $demande->created_at()->format('H:i') }}</td> --}}
                                {{-- <td class=" "><img src="{{ asset('storage/photo_candidat_demande/' . $demande->photo) }}" alt=""width="60" height="60" style="object-fit: cover;"></td>                     --}}
                                <td class="">{{ $demande->nom.' '.$demande->prenom }}</td>
                                <td class=" ">{{ $demande->numero_table }}</td>
                                <td class=" ">
                                    @foreach ($centres as $centre)
                                       {{ $centre->nom }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($communes as $commune)
                                        {{ $commune->nom }}
                                    @endforeach
                                </td>
                              
                                <td>{{ $demande->annee_obtention }}</td>
                                <td  style="color:#CA8B11">
                                    @if($demande->statut_demande=="non_valider")
                                        En attente
                                    @elseif($demande->statut_demande=="generer")
                                        Générée
                                    @elseif($demande->statut_demande=="rejeter")
                                        Rejetée
                                    @else
                                        Validée
                                    @endif
                                </td>
                                <td class="">
                                    <div class="d-flex justify-content-evenly w-100">

                                        <a href="{{ route('singleDemande', ['demande' => $demande->id]) }}"
                                            title="Consulter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        $('document').ready(function() {

            let demandeTable = $('#demandeTable').Datatables({
                
            });


            $('#annee').yearpicker();
        })
    </script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    
@endsection
