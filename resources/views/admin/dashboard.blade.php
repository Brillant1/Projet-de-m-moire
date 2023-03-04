@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Dashboard</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li> &nbsp; /
                         <li class="breadcrumb-item"><a href="#">Ayez une vue globale de la gestion des demandes d'attestations sur la plateforme</a></li> &nbsp;

                        
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">
                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('accueil') }} ">Accéder à l'accueil</a>

                </div>
            </div>
        </nav>
    </div>

    <div class="row justify-content-between">
        <div class=" col-12 col-md-4 col-lg-3">
            <div class=" text-white d-flex align-items-center bg-success rounded ps-2 position-relative">
                <div class="">
                    <p class="mt-2 fs-5 fw-bold">Demande en attente</p>
                    <p class=" fs-1 fw-bold">{{ !is_null($demandeAttente)? $demandeAttente->count() : 0 }}</p>
                </div>
                <div class=" ms-5 rounded-circle p-3 bg-white position-absolute" style="bottom:5px; right:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
                        <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12zM5.904 5.197L10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class=" col-12 col-md-4 col-lg-3">
            <div class=" text-white d-flex align-items-center bg-warning rounded ps-2 position-relative">
                <div class="">
                    <p class="mt-2 fs-5 fw-bold">Demande validée</p>
                    <p class=" fs-1 fw-bold">{{ !is_null($demandeValide)? $demandeValide->count() : 0 }}</p>
                </div>
                <div class=" ms-5 rounded-circle p-3 bg-white position-absolute" style="bottom:5px; right:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
                        <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12zM5.904 5.197L10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class=" col-12 col-md-4 col-lg-3 ">
            <div class=" text-white d-flex align-items-center rounded bg-favorite-color position-relative ps-2">
                <div class="">
                    <p class="mt-2 fs-5 fw-bold">Attestation émise</p>
                    <p class=" fs-1 fw-bold">{{ !is_null($nbr_attestation)? $nbr_attestation->count() : 0}}</p>
                </div>
                <div class=" ms-5 rounded-circle p-3 bg-white position-absolute" style="bottom:5px; right:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
                        <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12zM5.904 5.197L10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class=" col-12 col-md-4 col-lg-3">
            <div class=" text-white d-flex align-items-center bg-danger rounded position-relative ps-2">
                <div class="">
                    <p class="mt-2 fs-5 fw-bold">Nombre de message</p>
                    <p class=" fs-1 fw-bold">{{ !is_null($messages) ? $messages->count() : 0 }}</p>
                </div>
                <div class=" ms-5 rounded-circle p-3 bg-white position-absolute" style="bottom:5px; right:5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
                        <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12zM5.904 5.197L10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
       <div class=" d-flex justify-content-between align-items-center">
            <h4 class=" pt-3 ps-4">Statistique des demandes par mois</h4>
            <div class="pe-4">
                Mois de: &nbsp; <input type="month" class="me-1 p-1 rounded" style=" border: 1px solid rgba(3, 36, 151, 0.96); width:300px;">
            </div>
       </div>
        <div class="p-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <th>Demande validée</th>
                        <th>Demande rejetée</th>
                        <th>Attestation émise</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <div class="card mt-4">
        <div class=" d-flex justify-content-between align-items-center">
            <h4 class=" pt-3 ps-4">Statistique des demandes par année</h4>
            <div class="pe-4">
               Année: &nbsp; <input type="number" name="annee" class="annee me-1 p-1 rounded" style=" border: 1px solid rgba(3, 36, 151, 0.96); width:200px;">
            </div>
       </div>
        <div class="p-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <th>Demande validée</th>
                        <th>Demande rejetée</th>
                        <th>Attestation émise</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <div class="card mt-4">
        <div class=" d-flex justify-content-between align-items-center">
            <h4 class=" pt-3 ps-4">Liste des préoccupations</h4>
            {{-- <div class="pe-4">
               Année: &nbsp; <input type="number" name="annee" class="annee me-1 p-1 rounded" style=" border: 1px solid rgba(3, 36, 151, 0.96); width:200px;">
            </div> --}}
       </div>
        <div class="p-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Messsage</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @forelse ( $messages as $message )
                            
                        <tr>
                            <td>{{ $message->created_at->format('d-m-Y') ." à ". $message->created_at->format('H:i') }}</td>
                            <td>{{ $message->nom }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>
                            <td class="text-center" >
                                <button class=" btn btn-success btn-sm " title="Répondre">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                        <path d="M5.921 11.9L1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('document').ready(function() {
            $('.annee').yearpicker();
        })
    </script>

@endsection