@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">candidats</a></li>
                <li class="breadcrumb-item active">Liste candidat</li>
                </li>
            </ol>
        </nav>
    </div>



    <div class="tile">
        <div class="tile-body">
            @if (session('updatedMessage'))
                <div class="alert alert-success mb-3">
                    <h6> {{ session('updatedMessage') }} </h3>
                </div>
            @endif
            @if (session('deletedMessage'))
                <div class="alert alert-danger mb-3">
                    <h6> {{ session('deletedMessage') }} </h3>
                </div>
            @endif
            <div class="text-center my-3 alert bg-warning">
                <h4 class="text-white font-italic fw-bold">Liste des candidats</h4>
            </div>
            <div class="text-center mb-4 d-flex justify-content-end">
                <a class="btn btn-success p-2 fw-bold text-white" href=" {{ route('candidats.create') }} ">Ajouter un
                    nouveau</a>
            </div>

        </div>

        <div class="shadow p-5" style="border-radius: 10px;">
            <div class="table-responsive container-fluid">
                <table class="table datatable table-striped border-collapse table-bordered ">
                    <thead>
                        <tr class=" ">
                            <th class="">Photo</th>
                            <th class=" ">Nom</th>
                            <th class=" ">N° Table</th>
                            {{-- <th class="">N° Référence</th> --}}
                            <th class="">Centre</th>
                            <th class=" ">Commune</th>
                            {{-- <th class="">Département</th> --}}
                            <th class=" ">Année</th>
                            <th class="">Série</th>
                            <th class="">Action</th>
                        </tr>

                        <style>

                        </style>
                    </thead>
                    <tbody>

                        @foreach ($candidats as $candidat)
                            <tr class="   ">
                                <td class=" "><img src="{{'storage/'.$candidat->photo}}" width="60" height="60"  alt=""></td>
                                <td class="">{{ $candidat->nom.' '.$candidat->prenom }}</td>
                                <td class=" ">{{ $candidat->numero_table }}</td>
                                {{-- <td class=" ">{{ $candidat->numero_reference }}</td> --}}
                                <td class=" ">{{ $candidat->centre->nom }}</td>
                                <td class=" ">{{ $candidat->centre->commune->nom }}</td>
                                {{-- <td class=" ">{{ $candidat->centre->commune->departement->nom }}</td> --}}
                                <td class=" ">{{ $candidat->annee_obtention }}</td>
                                <td class="">{{ $candidat->serie }}</td>
                                <td class="">
                                    <div class="d-flex justify-content-evenly w-100">
                                        <a href="{{ route('candidats.show', ['candidat' => $candidat->id]) }}" title="Consulter"
                                            data-bs-toggle="modal"
                                            data-bs-target="{{ '#showModal' . $candidat->id }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('candidats.edit', ['candidat' => $candidat->id]) }}"
                                            title="Editer" class="ms-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>

                                        <button type="button" class="border-0 bg-none fw-bold" data-bs-toggle="modal"
                                            data-bs-target="{{ '#deleteModal' . $candidat->nom }}" title="Spprimer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" title="Supprimer"
                                                fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                        {{--  delete modal --}}
                                        <div class="modal fade" id="{{ 'deleteModal' . $candidat->nom }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous vraiment supprimmer le candidat : <br>
                                                        {{ $candidat->nom.' '.$candidat->prenom }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('candidats.destroy', ['candidat' => $candidat->id]) }}">

                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annuler</button>
                                                            <input type="submit" class="btn btn-danger" value="Confirmer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         {{--  end delete modal --}}

                                        {{-- show modal --}}
                                       
                                        <div class="modal fade container-fluid" id="{{ 'showModal' . $candidat->id }}"
                                            tabindex="-1" >
                                            <div class="modal-dialog" style="max-width: 60%">
                                                <div class="modal-content" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center flex-column align-items-center">
                                                         {{-- tab modal body --}}
                                                         <img src="{{'storage/'.$candidat->photo}}" alt="" width="600" height="400" style="object-fit: cover;">
                                                        <div class="container mt-2">
                                                             <p class="section-title text-center first-color py-2 mt-5">Informations personnelles du candidat</p>

                                                             <div class="row-info container-fluid  d-flex justify-content-between pt-3">

                                                                <p>Nom :</p>
                                                                <p class="">{{ $candidat->nom }}</p>

                                                        </div>

                                                                <div class="row-info container-fluid  d-flex justify-content-between ">

                                                                        <p>Prénom :</p>
                                                                        <p class="">{{ $candidat->prenom }}</p>

                                                                </div>
                                                            <div class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Date de naissance :</p>
                                                                    <p>{{ $candidat->date_naissance }}</p>

                                                            </div>
                                                            <div class="row-info container-fluid  d-flex justify-content-between">

                                                                    <p class="">Nom du collège :</p>
                                                                    <p>{{ $candidat->centre->nom }}</p>

                                                            </div>
                                                            <div class=" row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Contact du candidat :</p>
                                                                    <p>{{ $candidat->contact }}</p>

                                                            </div>
                                                            <div class=" row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Numero de table :</p>
                                                                    <p>{{ $candidat->numero_table }}</p>

                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <p class="section-title text-center first-color py-2 mt-5">Informations sur le diplôme</p>

                                                           <div class=" pt-3 row-info container-fluid  d-flex justify-content-between ">

                                                                   <p>Année d'obtention du diplôme :</p>
                                                                   <p>{{ $candidat->annee_obtention }}</p>

                                                           </div>
                                                           <div class="row-info container-fluid  d-flex justify-content-between">

                                                                   <p>Série d'examen :</p>
                                                                   <p>{{ $candidat->serie }}</p>

                                                           </div>
                                                           <div class="row-info container-fluid  d-flex justify-content-between">

                                                                   <p>Numero de référence :</p>
                                                                   <p>{{ $candidat->numero_reference }}</p>

                                                           </div>

                                                        </div>

                                                        <div class="container">
                                                            <p class="section-title text-center first-color py-2 mt-5">Autres informations utiles</p>

                                                           <div class="pt-3 row-info container-fluid  d-flex justify-content-between">

                                                                    <p>Centre de composition :</p>
                                                                    <p>{{ $candidat->centre->nom }}</p>

                                                           </div>
                                                           <div class=" row-info container-fluid  d-flex justify-content-between">

                                                                   <p>Commune du centre :</p>
                                                                   <p>{{ $candidat->centre->commune->nom }}</p>

                                                           </div>
                                                           <div class="row-info container-fluid  d-flex justify-content-between">

                                                                   <p>Département :</p>
                                                                   <p>{{ $candidat->centre->commune->departement->nom }}</p>

                                                           </div>

                                                        </div>

                                                    <div class="modal-footer">
                                                        {{-- <form method="POST" action="{{ route('candidats.destroy', ['candidat' => $candidat->id]) }}">

                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annuler</button>
                                                            <input type="submit" class="btn btn-danger" value="Confirmer">
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end show modal --}}

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
