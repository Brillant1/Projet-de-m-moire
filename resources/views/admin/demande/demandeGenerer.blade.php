@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3" style="border-radius: 10px;">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des demandes générées</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Demandes générées</a></li> &nbsp; 
    
               
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">
    
                    {{-- <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href="#">Ajouter un
                        nouveau</a> --}}
    
                </div>
            </div>
        </nav>
    </div>



    <div class="title mt-3" >
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
                <div class="alert alert-danger mb-3">
                    <h6> {{ Session::get('deletedMessage') }} </h3>
                </div>
            @endif

        </div>

        <div class="shadow p-2 pt-4  bg-white" style="border-radius: 10px;">
            <div class="table-responsive container-fluid">
                <table class="table datatable table-striped border-collapse table-bordered ">
                    <thead>
                        <tr class=" ">
                            <th class="">Date</th>
                            <th class=" ">Nom et Prénoms</th>
                            <th class=" ">N° Table</th>
                            <th class="">Centre</th>
                            <th>Attestation générée le</th>
                            <th class="">Action</th>
                        </tr>

                        <style>

                        </style>
                    </thead>
                    <tbody>

                        @foreach ($demandes as $demande)
                        {{-- @php
                            $centres = App\Models\Centre::where('id',$demande->centre)->get();       
                         @endphp --}}
                            <tr class="">
                                {{-- <td class=" "><img src="{{ asset('storage/photo_candidat_demande/'. $demande->photo) }}" alt="" width="60" height="60"
                                    style="object-fit: cover;"></td> --}}
                                    <td>{{ $demande->generated_at }}</td>
                                <td class="">{{ $demande->nom.' '. $demande->prenom  }}</td>
                                <td class=" ">{{ $demande->numero_table }}</td>

                                <td class=""> 
                                    {{ $demande->centre }}
                                </td>
                                <td class="">{{ $demande->updated_at->format('d-m-Y') }}</td>
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
@endsection
