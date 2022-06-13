@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">demandes</a></li>
                <li class="breadcrumb-item active">Liste demande</li>
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
                <h4 class="text-white font-italic fw-bold">Liste des demandes faites</h4>
            </div>
            <div class="text-center mb-4 d-flex justify-content-end">
                <a class="btn btn-success p-2 fw-bold text-white" href=" {{ route('demandes.create') }} ">Ajouter un
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
                            <th class=" ">Prénom</th>
                            <th class=" ">N° Table</th>
                           
                            <th class="">Centre</th>
                            <th class=" ">Commune</th>
                            <th class=" ">Département</th>
                            
                            <th class=" ">Année</th>
                            <th class="">Série</th>
                            <th class="">Action</th>
                        </tr>

                        <style>

                        </style>
                    </thead>
                    <tbody>

                        @foreach ($demandes as $demande)
                            <tr class="   ">
                                <td class=" "><img src="{{asset('storage/'.$demande->photo)}}" width="60" height="60"  alt=""></td>
                                <td class="">{{ $demande->nom }}</td>
                                <td class="">{{ $demande->prenom }}</td>
                                <td class=" ">{{ $demande->numero_table }}</td>
                                
                                <td class=" ">{{ $demande->centre }}</td>
                                <td class=" ">{{ $demande->commune }}</td>
                                <td class=" ">{{ $demande->departement }}</td>
                                
                                <td class=" ">{{ $demande->annee_obtention }}</td>
                                <td class="">{{ $demande->serie }}</td>

                                <td class="">
                                    <div class="d-flex justify-content-evenly w-100">
                                        
                                        <a href="{{ route('demandes.showDemande', ['demande' => $demande->id]) }}" title="Consulter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
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
@endsection
