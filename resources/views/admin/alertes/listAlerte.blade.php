@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('alertes.index') }}">alerte</a></li>
                <li class="breadcrumb-item active">Toutes les alertes</li>
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
                <h4 class="text-white font-italic fw-bold">Liste des alertes</h4>
            </div>
            <div class="text-center mb-4  d-flex justify-content-end">
                <a class="btn btn-success p-2 fw-bold text-white" href=" # ">Ajouter une
                    nouvelle</a>
            </div>

        </div>

        <div class="shadow p-5" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <tr class=" ">
                            <th class=" ">Date</th>
                            <th class=" ">Candidat</th>
                            <th class=" ">Message</th>
                            <th class=" ">Action</th>
                        </tr>


                    </thead>
                    <tbody>
                       
                        @foreach ($alertes as $alerte)
                            <tr class=" ">

                                <td class=" ">{{ $alerte->created_at->format('d-m-Y') }}</td>
                                <td class=" ">{{ $alerte->demande->nom }}</td>
                                <td class=" ">{{ $alerte->message }}</td>

                                <td class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-evenly w-50">
                                        <a href="{{ route('alertes.edit', ['alerte' => $alerte->id]) }}"
                                            title="Editer l'article" class="btn btn-sm text-white "
                                            style="background-color: #178B01">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="{{ '#deleteModal' . $alerte->nom }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>

                                        <div class="modal fade" id="{{ 'deleteModal' . $alerte->nom }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous vraiment supprimmer l'alerte : <br>
                                                        {{ $alerte->nom }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('alertes.destroy', ['alerte' => $alerte->id]) }}">

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
@endsection

