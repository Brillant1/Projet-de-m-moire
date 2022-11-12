@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
       
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
    
                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('departements.create') }} ">Ajouter un
                        nouveau</a>
    
                </div>
            </div>
        </nav>
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
                <table class="table datatable table-striped  border-collapse table-bordered">
                    <thead>
                        <tr class=" ">
                            <th class=" ">Département</th>
                            <th class=" ">Référence</th>
                            <th class=" ">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($departements as $departement)
                            <tr class=" ">

                                <td class=" ">{{ $departement->nom }}</td>
                                <td class=" ">{{ $departement->reference }}</td>

                                <td class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-evenly w-50">

                      


                                        <a href="{{ route('departements.edit', ['departement' => $departement->id]) }}"
                                            title="Editer" class="ms-2 ">

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
                                                            <input type="submit" class="btn btn-danger" value="Confirmer">
                                                        </form>
                                                    </div>
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
            $('#sampleTable').datatables();
        });
    </script>
@endsection
