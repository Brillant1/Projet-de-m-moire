@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3" style="border-radius: 10px;">
        <nav style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center bg-white p-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;" class="fw-bold">Liste des attestations générées</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('candidats.index') }}">Attestations</a></li> &nbsp; /

                        <li class="breadcrumb-item active">Liste des attestations</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">

                    {{-- <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('candidats.create') }} ">Ajouter un
                        nouveau</a> --}}

                </div>
            </div>
        </nav>
    </div>
    
    <div class="shadow p-2 pt-4" style="border-radius: 10px;">
        <div class="container-fluid d-flex justify-content-between mb-3">
            <div>
                <form action="">

                    <div class="input-group border border-1 rounded">
                        <input class="form-control border-0 rounded search-table " type="text"
                            placeholder="Rechercher ..." id="example-search-input-attestation">
                    </div>
                </form>
            </div>
            <div>
                <button class=" btn btn-sm fw-bold filterAttestation p-2 text-white" style="background-color:  rgba(3, 36, 151, 0.71) !important;">Filtrer &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                      </svg>

                </button>
               
            </div>
        </div>
        <div class="table-responsive container-fluid">
            <table class="table table-striped border-collapse table-bordered" id="allAttestattiontable">
                <thead>
                    <tr class="">
                        <th>Date d'émission</th>
                        <th class=" ">Nom</th>
                        <th class=" ">N° Table</th>
                        <th class="">Centre</th>
                        {{-- <th class=" ">Commune</th> --}}
                        <th class=" ">Année</th>
                        {{-- <th class="">Série</th> --}}
                        <th class="text-center">Action</th>
                    </tr>

                </thead>
                <tfoot class="d-none"  id="allattestationfoot">
                    <tr class="">
                        <th class="nom">nom</th>
                        <th class="numero">n° Table</th>
                        <th class="centre">centre</th>
                        {{-- <th class="commune">commune</th> --}}
                        <th class="annee">année</th>
                        {{-- <th class="serie">série</th> --}}
                        <th class=""></th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    @forelse ( $attestations as $attestation )
                            
                       
                            @php

                                $demande = App\Models\Demande::find($attestation->demande_id);
                                
                                
                                
                            @endphp
                        
                            <tr class="">
                                <td class="">{{ $attestation->created_at->format('d-m-Y') }}  à  {{ $attestation->created_at->format('H:i') }}</td>
                                
                                <td class="">{{ $demande->nom.' '.$demande->prenom  }}</td>
                                <td class=" ">{{ $demande->numero_table }}</td>
                                <td>
                                        @php
                                             $centre = App\Models\Centre::find($demande->centre);
                                        @endphp
                                        @if (!is_null($centre))
                                            {{ $centre->nom }}
                                        @endif
                                       
                                    
                                    {{-- @foreach ($commune as $commune)
                                        {{ $commune->nom }}
                                    @endforeach --}}
                                </td>
                               
                                <td>
                                    {{ $demande->annee_obtention }}
                                </td>
                                
                              
                                <td class="">
                                    <div class="d-flex justify-content-evenly w-100">

                                        <a href="{{ route('downloadDocument', $demande->id) }}"
                                            title="Téléchager" class="text-white bg-success rounded btn btn-sm d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            
                            @endforelse
                </tbody>
            </table>

            <script>
                $(document).ready(function(){

                    $('#allattestationfoot  .nom,#allattestationfoot .numero, #allattestationfoot .centre, #allattestationfoot .commune,   #allattestationfoot .annee, #allattestationfoot .serie')
                        .each(function() {
                        var title = $(this).text();
                        $(this).html('<input type="text" placeholder="Entrer ' + title + '" />');
                    });

                    let allAttestattiontable = $('#allAttestattiontable').dataTable({
                        "initComplete": function() {
                        this.api().columns().every(function(column) {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {

                                if (that.search() !== this.value) {
                                   
                                    that.search(this.value).draw();
                                }
                            });
                        })
                    },
                    "bFilter": true,
                    "bLengthChange": false,
                    "pageLength": 20,
                    "sDom": 't<"pager"ip><"clear">',
                
                    "language": {
                        "info": "_END_ sur _TOTAL_ entrées",
                        "infoEmpty": "_END_ sur _TOTAL_ entrées",
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    },
                    order: [[0, 'desc']],
                });

                let j=0;
            $('.filterAttestation').click(function () {
                if(j==0){
                    $('#allattestationfoot').removeClass('d-none');
                    $('#allattestationfoot').addClass('filterfooter');
                    j++;
                }else{
                    $('#allattestationfoot').removeClass('filterfooter');
                    $('#allattestationfoot').addClass('d-none');
                    j--;
                }
            });
            $('#example-search-input-attestation').keyup(function () {
                allAttestattiontable.search($(this).val()).draw();
            });
            })
            </script>
    @endsection