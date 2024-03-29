@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3" style="border-radius: 10px;">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des demandes récentes payées</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('demandes.index') }}">Demandes payées</a></li> &nbsp; 
    
                        {{-- <li class="breadcrumb-item active">Liste des demandes récentes payées</li>
                        </li> --}}
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



    <div class="title mt-3"  style="margin-bottom: 115px;">
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


            {{-- <div class="advanced-search container-fluid mb-5">
                <p class="fw-bold">Recherche avancée ...</p>
                <form action="#" method="POST" class="advanced-search-form mt-3">
                    @csrf
                    <div class=" col-2">
                        <label class="control-label" for="departement">Département</label>
                        <select class="form-control form-select" name="departement" id="departement">
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->nom }}" @if(old('departement_id')== $departement->nom) selected @endif >{{ $departement->nom }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="ms-3 col-2">
                        <label class="control-label" for="commune">Commune</label>
                        <select class="form-control form-select" name="commune" id="commune">
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
                        <select class="form-control form-select" name="centre" id="commune">
                            @foreach ($centres as $centre)
                                <option value="{{ $centre->nom }}">{{ $centre->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ms-3 col-2">
                        <label class="control-label" for="serie">Série</label>
                        <select class="form-control form-select" name="serie" id="serie">
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
                        <input class="btn btn-success search-button  px-4" type="button" value="Rechercher ...">
                    </div>
                </form>
            </div> --}}

            <div class="container-fluid d-flex justify-content-between mb-3">
                <div>
                    <form action="">

                        <div class="input-group border border-1 rounded">
                            <input class="form-control border-0 rounded search-table " type="text"
                                placeholder="Rechercher ..." id="example-search-input">
                        </div>
                    </form>
                </div>
                <div>
                    <button class=" btn btn-sm fw-bold filterAttente p-2 text-white" style="background-color:  rgba(3, 36, 151, 0.71) !important;">Filtrer &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                          </svg>

                    </button>
                   
                </div>
            </div>
            <div class="table-responsive container-fluid">
                <table class="table table-striped border-collapse table-bordered" id="payeDemandeTable">
                    <thead>
                        <tr class="">
                            <th>Date</th>
                            <th class=" ">Nom et Prénoms</th>
                            <th class=" ">N° Table</th>
                            <th>Commune</th>
                            <th class=" ">Centre</th>
                            <th>Année</th>
                            <th class=" text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot class=" d-none bg-white" id="demandepayeefooter">
                        <tr class="" >
                            <th class="datefoot">Date</th>
                            <th class="nomfoot ">Nom et Prénoms</th>
                            <th class="numerofoot ">N° Table</th>
                            <th class="communefoot">Commune</th>
                            <th class="centrefoot ">Centre</th>
                            <th class="diplomefoot">Diplôme</th>
                            
                            <th class=" "></th>
                        </tr>
                    </tfoot>
                   
                    <tbody>

                        @forelse ( $demandes as $demande )

           
                            
                       
                        
                     
                            <tr class="">
                                <td class="">{{ $demande->created_at->format('d-m-Y') }}  à  {{ $demande->created_at->format('H:i') }}</td>
                                
                                <td class="">{{ $demande->nom.' '.$demande->prenom  }}</td>
                                <td class=" ">{{ $demande->numero_table }}</td>
                                <td>
                                    {{ $demande->commune }}
                                    {{-- @php
                                        $commune = App\Models\Commune::where('id', $demande->commune)->first();
                                    @endphp
                                    @if(!is_null($commune))
                                        {{ $commune->nom }}
                                    @endif --}}
                                </td>
                                <td class=" ">
                                    {{ $demande->centre }}
                                    {{-- @php
                                    $centre = App\Models\Centre::where('id', $demande->centre)->first();
                                @endphp
                                @if(!is_null($centre))
                                {{ $centre->nom }}
                                @endif --}}
                                </td>
                                <td>
                                    {{ $demande->annee_obtention }}
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
                            @empty
                            
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            

            $('.search-button').click(function(e) {
                e.preventDefault();
                let departement = $('.advanced-search-form #departement').val();
                let commune = $('.advanced-search-form #commune').val();
                let centre = $('.advanced-search-form #centre').val();
                let serie = $('.advanced-search-form #serie').val();
                let annee = $('.advanced-search-form #annee').val();
                
                
                let data = $('.advanced-search-form').serialize();
                console.log(data);
                let table_content = '';
                if(departement =='' && commune=='' && centre=='' && serie=='' && annee=='') {
                    alert('Opps, Vous n\'avez défini aucune valeur');
                }else{
                    $.ajax({
                        method:'POST',
                        url: '/demandes/liste',
                        data: data,
                      
                        success: function(data){
                            
                            $('#payeDemandeTable tbody').html('');
                            let demande = data;
                            console.log(demande);
                            for(let i=0;i< demande.length;i++){
                                table_content += '<tr> <td>'+demande[i].created_at+'</td> <td>'+demande[i].nom+' '+ demande[i].prenom+'</td> <td>'+demande[i].numero_table +'</td><td>'+demande[i].commune +'</td> <td>'+demande[i].centre +'</td> <td>'+demande[i].annee_obtention +'</td> <td>  <div class="d-flex justify-content-evenly w-100"> <a href="/singleDemande/'+demande[i].id+'" title="Consulter"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"> <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" /> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" /> </svg> </a> </div> </td>  </tr>' ;
                            }
                            $('#departement option[value="'+data.departement+'"]').addClass('selected');
                            $('#commune option[value="'+data.commune+'"]').addClass('selected');
                            $('#centre option[value="'+data.centre+'"]').addClass('selected');
                            $('#annee option[value="'+data.annee+'"]').addClass('selected');

                            $('#payeDemandeTable tbody').append(table_content);

                        }
                    })
                }


            })



            $('#payeDemandeTable tfoot .nomfoot,#payeDemandeTable tfoot .datefoot, #payeDemandeTable tfoot .numerofoot, #payeDemandeTable tfoot .communefoot,  #payeDemandeTable tfoot .centrefoot,  #payeDemandeTable tfoot .diplomefoot')
                .each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Entrer ' + title + '" />');
            });

            var demandePayeeTable = $('#payeDemandeTable').DataTable({
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
            $('.filterAttente').click(function () {
                if(j==0){
                    $('#demandepayeefooter').removeClass('d-none');
                    $('#demandepayeefooter').addClass('filterfooter');
                    j++;
                }else{
                    $('#demandepayeefooter').removeClass('filterfooter');
                    $('#demandepayeefooter').addClass('d-none');
                    j--;
                }
            });
            $('#example-search-input').keyup(function () {
                demandePayeeTable.search($(this).val()).draw();
            });
    });
    </script>
    
@endsection




