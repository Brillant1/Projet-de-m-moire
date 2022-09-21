@extends('admin.layouts.template')
@section('content')
    <div class="pagetitle mt-3">
        <nav>
            <div class="d-flex justify-content-between align-items-center bg-white px-3 py-4">
                <div class=" ">
                    <h1 style="font-size: 1.2rem;">Liste des flash infos</h1>
                    <ol class="breadcrumb mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('flashInfos.index') }}">Dashboard</a></li> &nbsp; /
                        <li class="breadcrumb-item"><a href="{{ route('flashInfos.index') }}">Flash infos</a></li> &nbsp; /
    
                        <li class="breadcrumb-item active">Liste des flash info</li>
                        </li>
                    </ol>
                </div>
                <div class="text-center d-flex justify-content-between mt-2">
    
                    <a class="btn bg-favorite-color py-2 fw-bold text-white d-flex justify-content-between align-items-center"
                        href=" {{ route('flashInfos.create') }} ">Ajouter un
                        nouveau</a>
    
                </div>
            </div>
        </nav>
    </div>



    <div class="tile">
        <div class="tile-body">
            @if (session('editFlashMessage'))
            <div class="alert alert-success my-3">
                <h5> {{ session('editFlashMessage') }} </h5>
            </div>
        @endif
        @if (session('deletedFlashMessage'))
            <div class="alert alert-success my-3">
                <h5> {{ session('deletedFlashMessage') }} </h5>
            </div>
        @endif
        @if (session('statusMessage'))
            <div class="alert alert-success my-3">
                <h5> {{ session('statusMessage') }} </h5>
            </div>
        @endif


        </div>

        <div class="shadow p-5 mt-3 bg-white" style="border-radius: 10px;">
            <div class=" table-responsive container-fluid">
                <table class="table datatable  table-striped border-collapse">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date du début</th>
                            <th>Date de fin</th>
                            <th>Contenu</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(sizeof($allflashs)>0)
                            @foreach ($allflashs as $info)
                                <tr class="border">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $info->date_debut }}</td>
                                    <td>{{ $info->date_fin }}</td>
                                    <td>{{ substr($info->contenu, 0, 100) }}...</td>
                                    <td class="text-capitalize">{{$info->status}}</td>
                                    <td>

                                        <div class="d-flex">
                                            <a href="" title="{{$info->status == "active"? "Désactiver le flash info":"Activer le flash info"}}"
                                            class="text-primary fw-bold btn btn-sm status-article"
                                            data-toggle="modal"
                                            data-target="{{ '#statusModalFlash' . $info->id }}">
                                            {{-- <i class="{{$info->status == "active"? "fas fa-check-circle":"fas fa-ban"}}"></i> --}}
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-check2-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                                            <path
                                                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                                        </svg>
                                            </a>

                                            <a href="{{ route('flashInfos.edit', ['flashInfo' => $info->id]) }}"
                                                title="Editer l'info" class="btn btn-sm text-success mx-1"
                                                >
                                            
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="" title="Supprimer l'info"
                                                class="text-danger btn btn-sm delete-article"
                                                data-toggle="modal"
                                                data-target="{{ '#deleteModalFlash' . $info->id }}">
                                            
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                height="35" fill="red" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                                <!-- Modal Confirm suppresion -->
                                <div class="modal fade" id="{{ 'deleteModalFlash' . $info->id  }}"
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
                                                {{ Str::substr($info->contenu, 0, 100).'...' }} ?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="{{ route('flashInfos.destroy', ['flashInfo' => $info->id]) }}">

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

                                <!-- Modal Confirm status -->
                                <div class="modal fade" id="{{ 'statusModalFlash' . $info->id }}"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">{{$info->status == "active"? "Confirmer la désactivation du flash info":"Confirmer l'activation du flash info"}}</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$info->status == "active"? "Voulez-vous vraiment désactiver le flash info:":"Voulez-vous vraiment activer le flash info:"}}<br>
                                                <p class="text-danger">
                                                    {{ substr($info->contenu, 0, 100) . '...' }} ?</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>

                                                <a title="Consulter l'article"
                                                href="{{ route('flashInfos.show', ['flashInfo' => $info->id]) }}"
                                                class="btn btn-sm btn-primary">Confirmer</i></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
