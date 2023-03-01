@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
        <style>
            .dataTables_filter {
                display: flex;
                justify-content: end;

            }

            .dataTables_filter,
            .dataTables_length {
                margin-bottom: 15px;
            }

            .dataTables_filter label,
            .dataTables_length label {
                display: flex;
                align-items: center;
            }

            .dataTables_length label select {
                width: 60px !important;
            }

            #sampleTable th {
                background: rgba(3, 36, 151, 0.96);
                ;
                color: white;
            }
        </style>

        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des departements</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('departements.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('departements.index') }}">Departements</a></li> &nbsp; /

                        <li class="breadcrumb-item active">Liste des departements</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">

                    <button type="button"
                        class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter un nouveau
                    </button>



                </div>
            </div>
        </nav>
    </div>

    {{-- Modal to add departement --}}
    <div class="modal fade add-departement-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau département</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" class="add-departement-form" action="{{ route('departements.store') }}"
                    enctype="multipart/form-data" class="pb-4">
                    @csrf

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="form-group col-12">
                                <label for="nom" class="control-label ">Nom du département</label>
                                <input class="form-control" type="text" placeholder="Tapez le nom du département"
                                    name="nom" id="nom">
                            </div>
                            <div class="form-group col-12 mt-3">
                                <label for="reference" class="control-label ">Référence du département</label>
                                <input class="form-control" type="text" placeholder="Tapez la référence du département"
                                    name="reference" id="reference">
                            </div>
                        </div>
                    </div>
                    <div class="emptyfield text-center alert alert-danger" style="display:none;">

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary add-departement">Enrégistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="tile mt-3">
        @if (session('updatedMessage'))
            <div class="alert alert-success mb-3">
                <h6> {{ session('updatedMessage') }} </h3>
            </div>
        @endif
        @if (session('deletedMessage'))
            <div class="alert alert-success mb-3">
                <h6> {{ session('deletedMessage') }} </h3>
            </div>
        @endif
        <div class="tile-body">
        </div>

        <div class="shadow p-5 bg-white" style="border-radius: 10px;">
            <div class="table-responsive container-fluid border-3" style="border-radius: 5px;">
                <table class="table  table-striped  border-collapse table-bordered" id="sampleTable">
                    <thead>
                        <tr class=" ">
                            <th class=" ">Département</th>
                            <th class=" ">Référence</th>
                            <th class=" text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($departements as $departement)
                            <tr class=" ">

                                <td class=" ">{{ $departement->nom }}</td>
                                <td class=" ">{{ $departement->reference }}</td>

                                <td class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-evenly w-50">




                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="{{ '#updateModal' . $departement->nom }}" title="Editer"
                                            class="ms-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="green" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>

                                        <a href="#" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="{{ '#deleteModal' . $departement->nom }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>

                                        {{-- Modal to delete departement --}}
                                        <div class="modal fade" id="{{ 'deleteModal' . $departement->nom }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous vraiment supprimmer le département : <br>
                                                        {{ $departement->nom }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST"
                                                            action="{{ route('departements.destroy', ['departement' => $departement->id]) }}">

                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annuler</button>
                                                            <input type="submit" class="btn btn-danger"
                                                                value="Confirmer">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal to update departement --}}
                                        <div class="modal fade update-departement-modal"
                                            id="{{ 'updateModal' . $departement->nom }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier
                                                            département</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" class="update-departement-form pb-4"
                                                        >
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="row mb-3">
                                                                <div class="form-group col-12">
                                                                    <label for="nom" class="control-label ">Nom du
                                                                        département</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Tapez le nom du département"
                                                                        name="nom" value="{{ $departement->nom }}">
                                                                </div>
                                                                <div class="form-group col-12 mt-3">
                                                                    <label for="reference"
                                                                        class="control-label ">Référence du
                                                                        département</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Tapez la référence du département"
                                                                        name="reference"
                                                                        value="{{ $departement->reference }}">
                                                                </div>
                                                                <input type="hidden" name="departement_id"
                                                                    value="{{ $departement->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="update-msg text-center alert"
                                                            style="display:none;">

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Enrégistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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

                    $('.add-departement').click(function() {
                            let nom = $('.add-departement-form input[name="nom"]').val();
                            let reference = $('.add-departement-form input[name="reference"]').val();
                            if (nom == "" || reference == "") {

                                $('.emptyfield').css('display', 'block');
                                $('.emptyfield').addClass('alert alert-danger');
                                $('.emptyfield').text('Remplissez tous les champs');
                                $('.emptyfield').delay(2000).slideUp(200, function() {
                                    $(this).css('display', 'none');
                                });
                            } else {

                                $.ajax({

                                        type: 'POST',
                                        url: '{{ route('departements.store') }}',
                                        data: {
                                            'nom': nom,
                                            'reference': reference,
                                            _token: "{{ csrf_token() }}"
                                        },
                                        success: function(data) {
                                            $('.emptyfield').css('display', 'block');
                                            $('.emptyfield').removeClass('alert alert-danger');
                                            $('.emptyfield').addClass('alert alert-success');
                                            $('.emptyfield').text('Département ajouté avec succès');
                                            $('.emptyfield').delay(2000).slideUp(200, function() {
                                                $(this).css('display', 'none');
                                            });

                                            setTimeout(() => {
                                                $('.add-departement-modal').modal('hide');
                                            }, 500);
                                            window.location.reload();
                                            console.log(data);

                                        },
                                        // error: function(error) {
                                        //     $('.emptyfield').addClass('alert alert-success');
                                        //     $('.emptyfield').text(error['returnMessage']);
                                        //     $('.emptyfield').delay(2000).slideUp(200, function() {
                                        //         $(this).css('display', 'none');
                                        //     })
                                        // }


                                        })
                                }
                            });

                        $('.update-departement-form').submit(function(e) {
                            e.preventDefault();

                            let id = $('.update-departement-form input[name="departement_id"]').val();
                            
                            let nom = $('.update-departement-form input[name="nom"]').val();
                            let reference = $('.update-departement-form input[name="reference"]').val();
                           
                            $.ajax({
                                type: "put",
                                url: `/departements/${id}`,

                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'id': id,
                                    'nom': nom,
                                    'reference': reference
                                },
                                success: function(data) {


                                    $('.update-msg').css('display', 'block');
                                    $('.update-msg').addClass('alert alert-success');
                                    $('.update-msg').text(data.updatedMessage);
                                    $('.update-msg').delay(2000).slideUp(200, function() {
                                        $(this).css('display', 'none');
                                        window.location.reload();
                                    });
                                    setTimeout(() => {
                                        $('.add-departement-modal').modal('hide');
                                    }, 500);
                                    
                                }
                            });

                        })

                        $('#sampleTable').DataTable({
                            "language": {
                                "info": "_END_ sur _TOTAL_ entrées",
                                "infoEmpty": "_END_ sur _TOTAL_ entrées",
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                            },
                        });
                    });
    </script>
@endsection
